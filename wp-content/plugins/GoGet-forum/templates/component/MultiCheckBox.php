<?php
$checkbox = "";
foreach ($data['content'] as $key => $d) {
    if ($key == 0)
        $checkbox .= "<input type='checkbox' class=" . $data['validate_class'] . " id='goget_" . $meta_key . "' name='goget_" . $meta_key . "[]" . "' value='" . $d . "' />
    <label for='goget_" . $meta_key . "'> " . $d . " </label>";
    else
        $checkbox .= "<input type='checkbox' id='goget_" . $meta_key . "' name='goget_" . $meta_key . "[]" . "' value='" . $d . "' />
    <label for='goget_" . $meta_key . "'> " . $d . " </label>";
}
?>

<div id='multi_checkBox_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label>
            <?php

            use GoGetForums\includes\RequiredStar;

            echo $data['field_title'];
            if ($data['required'])
                new RequiredStar("", "");
            ?>
        </label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <div id='multi_checkBox'>
        <?php echo $checkbox ?>
    </div>
</div>