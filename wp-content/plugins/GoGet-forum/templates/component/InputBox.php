<?php
$input_box = "";
for ($i = 0; $i < $data['inputBox_cnt']; $i++) {
    if ($i == 0)
        $input_box .= "<input type='text' name='input_box_test1'>";
    else
        $input_box .= "<input type='text' name='input_box_test1' style='margin-left: 10px'>";
}
?>

<div id='input_box' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <?php echo $input_box ?>
</div>