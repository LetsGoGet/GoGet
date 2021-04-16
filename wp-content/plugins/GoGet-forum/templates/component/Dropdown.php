<?php
$html = "";
foreach ($data as $a) {
    $html .= "<option value='" . $a . "'>" . $a . "</option>";
}
?>

<div id='dropdown_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label>Dropdown測試</label> </p>
    <p style='font-size: 9px; color: #9c9c9c'>dropdown testing</p>
    <div id='dropdown'>
        <label for='dropdown_test1'>
            <select id='dropdown_test1' name='dropdown_test1'> <?php echo $html ?> </select>
        </label>
    </div>
</div>