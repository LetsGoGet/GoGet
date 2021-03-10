function generateRichEditor($textarea_num, $hashed_fieldName) {
    var editor_array = [], textarea_array = [];
    var $editor_num = $textarea_num.slice(10);
    var quill_ID = 'quill_' + $hashed_fieldName + '_editor';
    var textarea_ID = 'bbp_' + $hashed_fieldName + '_content';
    var wordcount_ID = 'word_' + $hashed_fieldName + '_count';
    var wordcount_box = 'wordcount_' + $hashed_fieldName + '_box';
    editor_array[$editor_num] = new Quill('#' + quill_ID, {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link']
            ]
        },
        theme: 'snow',
        formats: ['bold', 'italic', 'underline', 'list', 'indent', 'link']
    });
    jQuery.data(document.getElementById(quill_ID), "quill", editor_array[$editor_num]);

    textarea_array[$editor_num] = document.getElementById(textarea_ID);
    textarea_array[$editor_num].setAttribute('style', 'display: none;');
    document.getElementById(wordcount_ID).innerHTML = '必填';
    editor_array[$editor_num].on('editor-change', function () {
        textarea_array[$editor_num].innerHTML = '<div class=\"ql-editor\">' + editor_array[$editor_num].root.innerHTML + '</div>';
        var wordcount = editor_array[$editor_num].getLength() - 1;
        document.getElementById(wordcount_box).value = wordcount;
        if ($editor_num == 6) {
            if (wordcount === 0)
                document.getElementById(wordcount_ID).innerHTML = '必填';
            else
                document.getElementById(wordcount_ID).innerHTML = '';
        }
        else {
            if (wordcount < 100 & $editor_num != 14)
                document.getElementById(wordcount_ID).innerHTML = '再回想看看，還有什麼準備的小細節想跟大家分享嗎？（字數下限：' + wordcount + ' /100）';
            else if (wordcount > 10000)
                document.getElementById(wordcount_ID).innerHTML = '超過字數限制。（字數上限：" ' + wordcount + ' "/10000）';
            else
                document.getElementById(wordcount_ID).innerHTML = '';
        }
    });
}