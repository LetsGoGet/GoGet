<?php
$radio_input = "";
foreach ($data['content'] as $d) {
    $radio_input .= "<input type='radio' id='radio_input' name='radio_input_' value='" . $d . "'> " . $d . " </input>";
}
?>

<div id='radio' style='margin-bottom: 3px; margin-top: 10px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <label id='radio_label' for='radio_input'>
        <?php echo $radio_input ?>
    </label>
</div>