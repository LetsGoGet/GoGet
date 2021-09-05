jQuery(document).ready(function ($) {
    $.validator.addMethod('richEditor_100', function (val, element) {
        if (val >= 100 && val <= 100000)
            return true;
        else {
            element.nextElementSibling.removeAttribute('style');
            return false;
        }
    }, '');

    $.validator.addMethod('richEditor_200', function (val, element) {
        if (val >= 200 && val <= 100000)
            return true;
        else {
            element.nextElementSibling.removeAttribute('style');
            return false;
        }
    }, '');

    $.validator.addMethod('richEditor_400', function (val, element) {
        if (val >= 400 && val <= 100000)
            return true;
        else {
            element.nextElementSibling.removeAttribute('style');
            return false;
        }
    }, '');

    $.validator.addMethod('richEditor_required', function (val, element) {
        if (val >= 1 && val <= 100000)
            return true;
        else
            return false;
    }, '必填')

    $.validator.addMethod('cRequired', jQuery.validator.methods.required, '必填');

    $.validator.addClassRules({
        "required-field": {
            cRequired: true
        },
        "word-limit-100": {
            richEditor_100: true
        },
        "word-limit-200": {
            richEditor_200: true
        },
        "word-limit-400": {
            richEditor_400: true
        },
        'word-limit-required': {
            richEditor_required: true
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