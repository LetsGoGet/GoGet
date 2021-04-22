function setSelect2(select_id) {
    jQuery(document).ready(function ($) {
        $('#' + select_id).select2({
            language: 'zh-tw',
            data: data1
        });
    });
}