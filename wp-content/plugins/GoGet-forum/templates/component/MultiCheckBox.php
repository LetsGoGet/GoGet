<?php
$checkbox = "";
foreach ($data['content'] as $key => $d) {
    $checkbox .= "<input type='checkbox' id='checkBox_test1' name='checkBox_test1' value='" . $d . "' />
    <label for='checkBox_test1'> " . $d . " </label>";
}
?>

<div id='multi_checkBox_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <div id='multi_checkBox'>
        <?php echo $checkbox ?>
    </div>
</div>