<div id='select2_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>

    <div id='select2'>
        <label for=<?php echo ('goget_' . $meta_key) ?>>
            <select id=<?php echo ('goget_' . $meta_key) ?> name=<?php echo ('goget_' . $meta_key) ?>></select>
        </label>
    </div>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/select2.js'); ?>
<!-- for testing -->
<?php $test_data = file_get_contents(ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/js/sub_industry_data.js'); ?>
<script type='text/javascript'>
    <?php echo $test_data ?>
    <?php echo $js_data ?>
    <?php echo ("setSelect2('goget_" . $meta_key . "');"); ?>
</script>