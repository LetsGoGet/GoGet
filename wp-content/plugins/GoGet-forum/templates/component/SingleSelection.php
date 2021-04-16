<?php
$option = "";
$btn = "";
foreach ($data['content'] as $key => $content) {
    $option .= "<input type='radio' id='single_selection' name='single_selection' value='" . $content . "'>" . $content . "<input />";
    $btn .= "<button data-item='" . $key . "' style='margin-right: 8px; border-radius: 17px; background-color: white; color: " . $data['color'][$key] . "'>" . $content . "</button>";
}
?>

<div id='single_selection_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label>Single Selection測試</label> </p>
    <label id='single_selection_label' style='display: none;' for='single_selection'>
        <?php echo $option ?>
    </label>
</div>

<div id='single_selection_btn' style='margin-bottom: 15px'>
    <?php echo $btn ?>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/single_selection.js'); ?>
<script type='text/javascript'>
    <?php echo $js_data ?>
    <?php echo ("setSingleSelection('single_selection_btn', 'single_selection_label', " . json_encode($data['color']) . " );"); ?>
</script>