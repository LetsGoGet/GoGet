function generateRichEditor($textarea_num, $hashed_fieldName) {
    var editor_array = [], textarea_array = [];
    var $editor_num = $textarea_num.slice(10);
    var quill_ID = '#quill_' + $hashed_fieldName + '_editor'
    editor_array[$editor_num] = new Quill(quill_ID, {
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
    var textarea_ID = 'bbp_' + $hashed_fieldName + '_content';
    textarea_array[$editor_num] = document.getElementById(textarea_ID);
    textarea_array[$editor_num].setAttribute('style', 'display: none;');
    editor_array[$editor_num].on('editor-change', function () {
        textarea_array[$editor_num].innerHTML = '<div class=\"ql-editor\">' + editor_array[$editor_num].root.innerHTML + '</div>';
    });
}