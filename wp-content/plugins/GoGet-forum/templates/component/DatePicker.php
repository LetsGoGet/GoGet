<div id='date_picker' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label> <?php echo $data['field_title'] ?> </label> </p>
    <p style='font-size: 9px; color: #9c9c9c'> <?php echo $data['field_subtitle'] ?></p>
    <input type='text' id='date_picker_test1' name='date_picker_test1'>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/date_picker.js'); ?>
<script type='text/javascript'>
    <?php echo $js_data ?>
    <?php echo ("setDatePicker('date_picker_test1');"); ?>
</script>