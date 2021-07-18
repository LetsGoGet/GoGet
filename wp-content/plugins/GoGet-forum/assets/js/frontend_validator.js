jQuery(document).ready(function ($) {
    $.validator.addMethod('richEditor', function (val, element) {
        if (val >= 100 && val <= 100000)
            return true;
        else
            return false;
    }, function (params, element) {
        if (element.value < 100)
            return '再回想看看，還有什麼細節想跟大家分享嗎？（字數下限：' + element.value + ' /100）';
        else
            return '超過字數限制。（字數上限：" ' + element.value + ' "/10000）';
    });

    $.validator.addMethod('cRequired', jQuery.validator.methods.required, '必填');

    $.validator.addClassRules({
        "required-field": {
            cRequired: true
        },
        "word-limit": {
            richEditor: true
        }
    });

    $("#new-post").validate({
        ignore: ".ql-editor",
        errorElement: "div",
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.insertBefore(element.parent("label"));
            }
            else if (element.is(":checkbox") || element.is(":input")) {
                error.insertBefore(element);
            }
            else {
                error.insertAfter(element);
            }
            error.addClass("errTxt");
        }
    });
});