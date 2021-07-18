<div id='select2_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label>
            <?php

            use GoGetForums\includes\RequiredStar;

            echo $data['field_title'];
            if ($data['required'])
                new RequiredStar("", "");
            ?>
        </label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>

    <div id='select2'>
        <?php
        foreach ($data['content_file'] as $key => $value) {
            echo ("
            <label for='goget_$meta_key'>
                <select id='goget_$meta_key" . $key . "' class=" . $data['validate_class'][$key] . " name='goget_$meta_key" . "[]'></select>
            </label>
            ");
        }
        ?>
        <!-- <label for=<?php echo ('goget_' . $meta_key) ?>>
            <select id=<?php echo ('goget_' . $meta_key) ?> name=<?php echo ('goget_' . $meta_key . '[]') ?>></select>
        </label> -->
    </div>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/select2.js'); ?>
<?php
$data_file = array();
foreach ($data['content_file'] as $value) {
    $data_file[$value] = file_get_contents(GOGETFORUMS_ASSETS . 'js/' . $value . '.js');
}
?>
<script type='text/javascript'>
    <?php if ($data['is_first']) echo "var data = {};" ?>
    <?php foreach ($data['content_file'] as $value) {
        echo $data_file[$value];
    } ?>
    <?php echo $js_data ?>
    <?php foreach ($data['content_file'] as $key => $value) {
        echo ("setSelect2('goget_" . $meta_key . $key . "', '" . $value . "');");
    } ?>
</script>