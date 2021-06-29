<?php
$option = "";
$btn = "";
foreach ($data['content'] as $key => $content) {
    $option .= "<input type='radio' id='goget_" . $meta_key . "' name='goget_" . $meta_key . "' value='" . $content . "'>" . $content . "<input />";
    $btn .= "<button data-item='" . $key . "' style='margin-right: 8px; border-radius: 17px; background-color: white; color: " . $data['color'][$key] . "'>" . $content . "</button>";
}
?>

<div id='single_selection' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label>
            <?php

            use GoGetForums\includes\RequiredStar;

            echo $data['field_title'];
            if ($data['required'])
                new RequiredStar("", "");
            ?>
        </label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <label style='display: none;' id=<?php echo ('goget_' . $meta_key . '_label') ?> for=<?php echo ('goget_' . $meta_key) ?>>
        <?php echo $option ?>
    </label>
</div>

<div id=<?php echo ('single_selection_btn_' . $meta_key) ?> style='margin-bottom: 15px'>
    <?php echo $btn ?>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/single_selection.js'); ?>
<script type='text/javascript'>
    <?php echo $js_data ?>
    <?php echo ("setSingleSelection('single_selection_btn_" . $meta_key . "', 'goget_" . $meta_key . "_label', " . json_encode($data['color']) . " );"); ?>
</script>