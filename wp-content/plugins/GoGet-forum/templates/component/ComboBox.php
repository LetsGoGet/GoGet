<div id='combo_box' style='margin-bottom: 3px'>
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
        <select id=<?php echo ('goget_' . $meta_key) ?> name=<?php echo ('goget_' . $meta_key) ?> class=<?php echo $data['validate_class'] ?>>
            <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
        </select>
    </label>
</div>

<?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/combo_box.js'); ?>
<script type='text/javascript'>
    <?php echo $js_data ?>
    <?php echo ("setComboBox('goget_" . $meta_key . "', '" . $data['fetch_type'] . "', 'interview-experience');"); ?>
</script>