<div id='textarea_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>

    <!-- for submit -->
    <textarea id=<?php echo ('goget_' . $meta_key) ?> name=<?php echo ('goget_' . $meta_key) ?>></textarea>

    <!-- for validation -->
    <input id=<?php echo ('wordcount_' . $meta_key . '_box') ?> name=<?php echo ('wordcount_' . $meta_key . '_box') ?> style="display: none;" type="number" value="0"></input>
    <div id=<?php echo ('word_' . $meta_key . '_count') ?> style="display: none;"></div>

    <div id=<?php echo ('quill_' . $meta_key . '_editor') ?> style="margin-bottom: 5px;"><?php echo $data['content'] ?></div>

    <?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/rich_editor.js'); ?>
    <script type='text/javascript'>
        <?php echo $js_data ?>
        <?php echo ("generateRichEditor('" . $meta_key . "');") ?>
    </script>
</div>