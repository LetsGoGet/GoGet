function generateRichEditor($fieldName) {
    var editor_array = {}, textarea_array = {};
    var quill_ID = 'quill_' + $fieldName + '_editor';
    var textarea_ID = 'goget_' + $fieldName;
    // var wordcount_ID = 'word_' + $fieldName + '_count';
    var wordcount_box = 'wordcount_' + $fieldName + '_box';
    editor_array[$fieldName] = new Quill('#' + quill_ID, {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                ['link']
            ]
        },
        theme: 'snow',
        formats: ['bold', 'italic', 'underline', 'list', 'indent', 'link']
    });
    jQuery.data(document.getElementById(quill_ID), "quill", editor_array[$fieldName]);

    textarea_array[$fieldName] = document.getElementById(textarea_ID);
    textarea_array[$fieldName].setAttribute('style', 'display: none;');
    // document.getElementById(wordcount_ID).innerHTML = '必填';
    editor_array[$fieldName].on('editor-change', function () {
        textarea_array[$fieldName].innerHTML = '<div class=\"ql-editor\">' + editor_array[$fieldName].root.innerHTML + '</div>';
        var wordcount = editor_array[$fieldName].getLength() - 1;
        document.getElementById(wordcount_box).value = wordcount;
        // if (wordcount < 100)
        //     document.getElementById(wordcount_ID).innerHTML = '再回想看看，還有什麼細節想跟大家分享嗎？（字數下限：' + wordcount + ' /100）';
        // else if (wordcount > 10000)
        //     document.getElementById(wordcount_ID).innerHTML = '超過字數限制。（字數上限：" ' + wordcount + ' "/10000）';
    });
}