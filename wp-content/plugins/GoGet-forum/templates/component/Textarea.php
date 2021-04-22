<div id='textarea_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label><?php echo $data['field_title'] ?></label> </p>
    <p style='font-size: 9px; color: #9c9c9c'><?php echo $data['field_subtitle'] ?></p>

    <!-- for submit -->
    <?php
    bbp_the_content(array('context' => "", 'default_content' => $data['content']));
    ?>

    <!-- for validation -->
    <input id='wordcount__box' name='wordcount__box' style="display: none;" type="number" value="0"></input>
    <div id='word__count' style="display: none;"></div>

    <div id='quill__editor' style="margin-bottom: 5px;"><?php echo $data['content'] ?></div>

    <?php $js_data = file_get_contents(GOGETFORUMS_ASSETS . 'js/rich_editor.js'); ?>
    <script type='text/javascript'>
        <?php echo $js_data ?>
        generateRichEditor("1", "");
    </script>
</div>