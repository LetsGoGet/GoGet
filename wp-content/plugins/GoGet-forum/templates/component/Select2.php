<div id='select2_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>

    <div id='select2'>
        <label id='select2_label' for='select2_test1'>
            <select id='select2_test1' name='select2_test1'></select>
        </label>
    </div>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/select2.js'); ?>
<!-- for testing -->
<?php $test_data = file_get_contents(ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/js/sub_industry_data.js'); ?>
<script type='text/javascript'>
    <?php echo $test_data ?>
    <?php echo $js_data ?>
    <?php echo ("setSelect2('select2_test1');"); ?>
</script>