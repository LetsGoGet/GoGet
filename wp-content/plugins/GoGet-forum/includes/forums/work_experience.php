<?php

namespace GoGetForums\includes\forums;

use GoGetForums\includes\ComboBox;
use GoGetForums\includes\Dropdown;
use GoGetForums\includes\InputBox;
use GoGetForums\includes\work_experience_val;
use GoGetForums\includes\Radio;
use GoGetForums\includes\Select2;
use GoGetForums\includes\SingleSelection;
use GoGetForums\includes\Textarea;

ob_start();
class work_experience extends forum
{
    public function __construct($id)
    {
        parent::__construct($id);

        // init meta_keys
        $this->meta_keys = array(
            'company' => '公司名稱',
            'job_type' => '職務性質',
            'job_category' => '職務類別',
            'job_title' => '職務名稱',
            'industry_category' => '產業類別',
            'industry_subcategory' => '細分產業類別',
            'anonymous' => '是否隱藏帳號名稱',
            'is_on_the_job' => '現在是否在職',
            'job_duration' => '任職多久',
            'job_recommendation_level' => '職務推薦指數',
            'salary_level' => '薪資區間',
            'week_working_hr' => '一週工時',
            'job_content' => '工作內容',
            'job_advantage' => '職位優點',
            'job_disadvantage' => '職位缺點',
            'company_culture' => '公司與團隊文化',
            'supervisor_style' => '主管帶領方式',
            'growth' => '獲得的成長',
            'other_sharing' => '其他分享',
            'reference' => '參考連結',
            'author' => '作者背景',
            'tag' => '標籤'
        );

        $this->tag_meta_keys = array(
            'job_title', 'industry_category', 'industry_subcategory', 'tag', 'job_category'
        );

        // init validator
        $this->validator = new work_experience_val($this->meta_keys);

        $this->mycred_pos = array('salary_level', 'reference');

        // init front-end validator
        $this->init_frontend_validator();
    }

    public function init_components()
    {
        parent::init_components();

        // ComboBox
        $test_data = [
            'field_title' => '公司名稱',
            'field_subtitle' => '外商可直接輸入英文查詢，非外商可輸入中文查詢，若沒有找到請自行輸入',
            'fetch_type' => 'company',
            'url_split' => 'job-experience',
            'required' => true,
            'validate_class' => 'required-field'
        ];
        new ComboBox($test_data, 'company');

        // Dropdown
        $test_data = [
            'field_title' => '職務性質',
            'field_subtitle' => '',
            'content' => [
                '1' => ['正職', '實習', '工讀', '兼職', '約聘'],
            ],
            'required' => true,
            'validate_class' => [
                '1' => 'required-field'
            ]
        ];
        new Dropdown($test_data, 'job_type');

        // Select2
        // store option data in js file, put the file in assets/js, pass file name in content_file
        // be sure to have ; at the end of the file
        $test_data = [
            'field_title' => '職務類別',
            'field_subtitle' => '請選擇最接近的職務類別',
            'content_file' => ['job_category_data'],
            'is_first' => true,
            'required' => true,
            'validate_class' => ['required-field']
        ];
        new Select2($test_data, 'job_category');

        // InputBox
        $test_data = [
            'field_title' => '職務名稱',
            'field_subtitle' => '',
            'inputBox_cnt' => 1,
            'input_type' => 'text',
            'required' => true,
            'validate_class' => 'required-field'
        ];
        new InputBox($test_data, 'job_title');

        // Multi-column Dropdown
        $test_data = [
            'field_title' => '產業類別',
            'field_subtitle' => '請選擇最接近的產業類別',
            'content' => [
                '1' => ['金融', '顧問', '零售', '科技', '新創', '其他'],
                '2' => ['(無)', '金融', '顧問', '零售', '科技', '新創', '其他']
            ],
            'required' => true,
            'validate_class' => [
                '1' => 'required-field',
                '2' => ''
            ]
        ];
        new Dropdown($test_data, 'industry_category');

        // Select2
        // store option data in js file, put the file in assets/js, pass file name in content_file
        $test_data = [
            'field_title' => '細分產業類別',
            'field_subtitle' => '請選擇最接近的產業類別',
            'content_file' => ['sub_industry_data1', 'sub_industry_data2'],
            'is_first' => false,
            'required' => true,
            'validate_class' => ['required-field', '']
        ];
        new Select2($test_data, 'industry_subcategory');

        // Radio
        $test_data = [
            'field_title' => '是否隱藏帳號名稱',
            'field_subtitle' => '無論是否隱藏，皆不會公布帳號名稱外的資訊',
            'content' => ['是', '否'],
            'default' => ['', 'checked'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        new Radio($test_data, 'anonymous');

        // Radio
        $test_data = [
            'field_title' => '現在是否在職',
            'field_subtitle' => '',
            'content' => ['在職', '已離職', '不告訴你：）'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        new Radio($test_data, 'is_on_the_job');

        // Dropdown
        $test_data = [
            'field_title' => '任職多久',
            'field_subtitle' => '請選擇最接近之選項',
            'content' => [
                '1' => ['1年以下', '1~2年', '2~3年', '3~4年', '4~5年', '5年以上'],
            ],
            'required' => true,
            'validate_class' => [
                '1' => 'required-field'
            ]
        ];
        new Dropdown($test_data, 'job_duration');

        // SingleSelection
        $test_data = [
            'field_title' => '職務推薦指數',
            'field_subtitle' => '',
            'content' => ['很不推', '不推', '普通', '推', '很推'],
            'color' => ['blue', 'blue', 'orange', 'red', 'red'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        new SingleSelection($test_data, 'job_recommendation_level');

        // Multi-column Dropdown - special
        $test_data = [
            'field_title' => '薪資區間',
            'field_subtitle' => '請選擇最接近之答案，新台幣計價',
            'content' => [
                '1' => ['時薪', '月薪', '年薪'],
                '2' => ['150以下', '150~300', '超過300']
            ],
            'required' => false,
            'validate_class' => [
                '1' => '',
                '2' => ''
            ]
        ];

        $dropdown_3 = new Dropdown($test_data, 'salary_level');

        $special_dropdown_js = file_get_contents(GOGETFORUMS_ASSETS . 'js/special_dropdown.js');
        $salary_level_data = file_get_contents(GOGETFORUMS_ASSETS . 'data/salary_level_data.json');
        echo ("<script>");
        echo $special_dropdown_js;
        echo ("setSpecialDropdown('goget_salary_level_1', 'goget_salary_level_2', " . $salary_level_data . ")");
        echo ("</script>");

        // InputBox
        $test_data = [
            'field_title' => '一週工時',
            'field_subtitle' => '',
            'inputBox_cnt' => 1,
            'input_type' => 'number',
            'required' => true,
            'validate_class' => 'required-field'
        ];
        new InputBox($test_data, 'week_working_hr');

        // Textarea
        // TODO: word limit 400~100000
        $test_data = [
            'field_title' => '工作內容',
            'field_subtitle' => '',
            'content' => '不知道該怎麼下手嗎？可以參考這裡的這裡的範例格式：<br/>
            <ol><li>職位介紹 (組織, 部門...)</li>
            <li>主要職責</li>
            <li>一日工作流程</li>
            <li>所需技能</li>
            <li>其他</li></ol>',
            'required' => true,
            'validate_class' => 'word-limit-400'
        ];
        new Textarea($test_data, 'job_content', 400);

        // Textarea
        $test_data = [
            'field_title' => '職位優點',
            'field_subtitle' => '你覺得這個職位有什麼讓你很喜歡、會想要分享給他人的點？
            學習曲線?轉職機會?升遷速度?出差機會?履歷加分?薪資優渥?',
            'content' => '',
            'required' => true,
            'validate_class' => 'word-limit-100'
        ];
        new Textarea($test_data, 'job_advantage', 100);

        // Textarea
        $test_data = [
            'field_title' => '職位缺點',
            'field_subtitle' => '你覺得這份工作有甚麼缺點？
            高工時?壓力大?缺乏挑戰?低薪?主管能力?',
            'content' => '',
            'required' => true,
            'validate_class' => 'word-limit-100'
        ];
        new Textarea($test_data, 'job_disadvantage', 100);

        // Textarea
        $test_data = [
            'field_title' => '公司與團隊文化',
            'field_subtitle' => '你覺得公司與部門的文化如何？是活潑、安靜、自由、還是氣氛嚴肅...等？
            與同事相處起來感受又是如何呢？',
            'content' => '',
            'required' => false,
            'validate_class' => ''
        ];
        new Textarea($test_data, 'company_culture', 0);

        // Textarea
        $test_data = [
            'field_title' => '主管帶領方式',
            'field_subtitle' => '公司主管/mentor帶領與教導的方式如何呢？
            你覺得這樣的方式適合或不適合你？為什麼？',
            'content' => '',
            'required' => false,
            'validate_class' => ''
        ];
        new Textarea($test_data, 'supervisor_style', 0);

        // Textarea
        $test_data = [
            'field_title' => '獲得的成長',
            'field_subtitle' => '在這份工作中學到了什麼？
            最印象深刻的成長或挫敗經驗是什麼呢？',
            'content' => '',
            'required' => false,
            'validate_class' => ''
        ];
        new Textarea($test_data, 'growth', 0);

        // Textarea
        $test_data = [
            'field_title' => '其他分享',
            'field_subtitle' => '還有沒有很想分享給大家知道的事情？
            例如不會出現在job description中的工作、這份工作帶給你意想不到的好處/壞處等等',
            'content' => '',
            'required' => false,
            'validate_class' => ''
        ];
        new Textarea($test_data, 'other_sharing', 0);

        // Textarea
        $test_data = [
            'field_title' => '參考連結',
            'field_subtitle' => '參考資料、面試心得文、相同或類似職位經驗分享文',
            'content' => '',
            'required' => false,
            'validate_class' => ''
        ];
        new Textarea($test_data, 'reference', 0);

        // Textarea
        $test_data = [
            'field_title' => '作者背景',
            'field_subtitle' => '讓相似背景的人有機會透過解鎖文章獲得幫助',
            'content' => '讓相似背景的人有機會透過解鎖文章獲得幫助<br/>
            不知道該怎麼下手嗎？可以參考這裡的這裡的範例格式：<br/>
            <ol><li>學歷：OO大學/OO學系</li>
            <li>經歷：O年OO產業OO職位經歷</li>
            <li>技能/證照：多益OOO分</li></ol>',
            'required' => true,
            'validate_class' => 'word-limit-required'
        ];
        new Textarea($test_data, 'author', 0);

        // multi-Inputbox
        $test_data = [
            'field_title' => '標籤',
            'field_subtitle' => '範例：暑期實習、FMCG、外商',
            'inputBox_cnt' => 3,
            'input_type' => 'text',
            'required' => false,
            'validate_class' => ''
        ];
        new InputBox($test_data, 'tag');
    }

    public function get_content($post_meta): ?string
    {
        parent::get_content([]);

        /* Check whether this content is deprecated or not
         * Old content version doesn't have any metadata included prefix of "goget_"
         */
        $counts_of_forum_meta = 0;
        $content = null; // concat html

        foreach ($this->meta_keys as $meta_key => $title) {
            if ($meta_key == 'anonymous')
                continue;
            if ($meta_key == $this->mycred_pos[0]) {
                // mycred start point
                $content .= '[mycred_sell_this]';
            }
            if ($post_meta['goget_' . $meta_key][0]) {
                if (gettype($post_meta['goget_' . $meta_key]) == 'array') {
                    $concat_content = '';
                    foreach ($post_meta['goget_' . $meta_key] as $value) {
                        if ($value != '')
                            $concat_content = $concat_content . $value . ',';
                    }
                    $concat_content = substr($concat_content, 0, strlen($concat_content) - 1);
                    $content = $content . "<p>
                        <strong><u><font size='3pt'>$title</font></u></strong>
                        " . $concat_content . "</p>";
                } else {
                    $content = $content . "<p>
                    <strong><u><font size='3pt'>$title</font></u></strong>
                    " . $post_meta['goget_' . $meta_key] . "</p>";
                }

                // counter ++
                $counts_of_forum_meta += 1;
            }
            if ($meta_key == $this->mycred_pos[1]) {
                // mycred end point
                $content .= '[/mycred_sell_this]';
            }
        }

        error_log("counts_of_forum_meta = " . $counts_of_forum_meta);

        return $counts_of_forum_meta > 0 ? $content : null;
    }
}
