<?php
$radio_input = "";
foreach ($data['content'] as $d) {
    $radio_input .= "<input type='radio' id='goget_" . $meta_key . "' name='goget_" . $meta_key . "' value='" . $d . "'> " . $d . " </input>";
}
?>

<div id='radio' style='margin-bottom: 3px; margin-top: 10px'>
    <p style='margin-bottom: -2px'> <label>
            <?php

            use GoGetForums\includes\RequiredStar;

            echo $data['field_title'];
            if ($data['required'])
                new RequiredStar("", "");
            ?>
        </label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>
    <label for=<?php echo ('goget_' . $meta_key) ?>>
        <?php echo $radio_input ?>
    </label>
</div>