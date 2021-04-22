function setDatePicker(datepicker_id) {
    jQuery(document).ready(function ($) {
        $('#' + datepicker_id).datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy.mm',
            onClose: function (dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });
}
