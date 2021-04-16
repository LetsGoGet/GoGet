<div id='textarea_section' style='margin-bottom: 3px'>
    <p style='margin-bottom: -2px'> <label>Textarea測試</label> </p>
    <p style='font-size: 9px; color: #9c9c9c'>textarea testing</p>

    <!-- for submit -->
    <?php
    bbp_the_content(array('context' => "", 'default_content' => $data));
    ?>

    <!-- for validation -->
    <input id="wordcount__box" name="wordcount__box" style="display: none;" type="number" value="0"></input>
    <div id="word__count" style="display: none;"></div>

    <div id="quill__editor" style="margin-bottom: 5px;"><?php echo $data ?></div>

    <?php $js_data = file_get_contents(ABSPATH . 'wp-content/plugins/GoGet-forum/js/rich_editor.js'); ?>
    <script type='text/javascript'>
        <?php echo $js_data ?>
        generateRichEditor("1", "");
    </script>
</div>