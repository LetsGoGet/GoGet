var editor_array = {}, textarea_array = {};
var quill_ID = 'quill_' + component.meta_key + '_editor';
var textarea_ID = 'goget_' + component.meta_key;
var wordcount_ID = 'word_' + component.meta_key + '_count';
var wordcount_box = 'wordcount_' + component.meta_key + '_box';
editor_array[component.meta_key] = new Quill('#' + quill_ID, {
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
jQuery.data(document.getElementById(quill_ID), "quill", editor_array[component.meta_key]);

textarea_array[component.meta_key] = document.getElementById(textarea_ID);
textarea_array[component.meta_key].setAttribute('style', 'display: none;');

document.getElementById(wordcount_ID).innerHTML = '必填';

setQuillHandler(editor_array[component.meta_key], textarea_array[component.meta_key], wordcount_ID, wordcount_box, component.word_limit);

function setQuillHandler(editor, textarea, wordcount_ID, wordcount_box, word_limit) {
    editor.on('editor-change', function () {
        textarea.innerHTML = '<div class=\"ql-editor\">' + editor.root.innerHTML + '</div>';
        var wordcount = editor.getLength() - 1;
        document.getElementById(wordcount_box).value = wordcount;
        if (wordcount < word_limit)
            document.getElementById(wordcount_ID).innerHTML = '再回想看看，還有什麼細節想跟大家分享嗎？（字數下限：' + wordcount + ' /' + word_limit + '）';
        else if (wordcount > 100000)
            document.getElementById(wordcount_ID).innerHTML = '超過字數限制。（字數上限：" ' + wordcount + ' "/100000）';
        else
            document.getElementById(wordcount_ID).innerHTML = '';
    });
}