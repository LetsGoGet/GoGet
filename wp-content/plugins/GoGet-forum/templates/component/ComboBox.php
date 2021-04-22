<div id='combo_box' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <label id='combo_box_label' for='combo_box_test1'>
        <select name='combo_box_test1' id='combo_box_test1'>
            <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
        </select>
    </label>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/combo_box.js'); ?>
<script type='text/javascript'>
    <?php echo $js_data ?>
    <?php echo ("setComboBox('combo_box_test1', '" . $data['fetch_type'] . "', 'forums');"); ?>
</script>