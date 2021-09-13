<?php

namespace GoGetForums\includes\forums;

use GoGetForums\includes\GoGetForumsAssets;
use HTMLPurifier;
use HTMLPurifier_Config;

/**
 * Class forum
 * Specify each forum's components
 */
class forum
{
    public $id;
    public $validator;
    public $meta_keys;
    public $tag_meta_keys; // 要加入 tag 的 meta keys
    public $mycred_pos;
    public $purifier;

    public function __construct($id)
    {
        // initialize purifier
        $this->init_purifier();
    }

    private function init_purifier(){
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML', 'Allowed',
            'a[accesskey|href|rel|tabindex}target|type]
                             ,area[accesskey|alt, coords|href|name|shape|tabindex|target]
                             ,img[alt|border|height|ismap|src|usemap|width]
                             ,b,blockquote[cite],br,dd,div[class],dl,dt,em,h1,h2,h3,h4,h5,h6
                             ,hr,i,li[class|value],map,ol[start|type]
                             ,nav[accesskey|contenteditable|contextmenu|data-*|draggable|dropzone|hidden|spellcheck|tabindex|translate]
                             ,ol[class|start|type],p,pre,rp,rt,ruby,s,small,source,span,strike,strong,style,sub,sup,
                             ,table[border|cols|summary|cellpadding|cellspacing|align]
                             ,tbody[valign],td[bordercolor|colspan|rowspan],tfoot[valign]
                             ,th[colspan|rowspan|scope],thead[valign],tr[colspan|rowspan]
                             ,tt,u,ul,video[autoplay|controls|height|loop|muted|poster|preload|src|width]
                             '
        );
        $this->purifier = new HTMLPurifier($config);
    }

    public function init_frontend_validator()
    {
        GoGetForumsAssets::load_jquery_validator_assets();
    }

    public function init_components()
    {
        GoGetForumsAssets::load_common_assets();
    }

    public function get_content($post_meta)
    {
        GoGetForumsAssets::load_show_post_common_assets();
    }
}
