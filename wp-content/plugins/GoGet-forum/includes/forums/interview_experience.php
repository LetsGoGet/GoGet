<?php

namespace GoGetForums\includes\forums;

use GoGetForums\includes\ComboBox;
use GoGetForums\includes\DatePicker;
use GoGetForums\includes\Dropdown;
use GoGetForums\includes\InputBox;
use GoGetForums\includes\interview_experience_val;
use GoGetForums\includes\MultiCheckBox;
use GoGetForums\includes\Radio;
use GoGetForums\includes\Select2;
use GoGetForums\includes\SingleSelection;
use GoGetForums\includes\Textarea;

/**
 * ob_start() is important for avoiding "Warning: Cannot modify header information - headers already sent by ERROR"
 * It turn on the output buffer mechanism in PHP.
 */
ob_start();

class interview_experience extends forum
{
    public function __construct($id)
    {
        parent::__construct($id);

        // init meta_keys
        $this->meta_keys = array(
            'company' => '公司名稱',
            'job_type' => '職務性質',
            'job_title' => '職務名稱',
            'industry_category' => '產業類別',
            'industry_subcategory' => '細分產業類別',
            'anonymous' => '是否隱藏帳號名稱',
            'author' => '作者背景',
            'interview_date' => '面試時間',
            'interview_location' => '面試地點',
            'interview_difficulty' => '面試難度',
            'interview_result' => '面試結果',
            'interview_level' => '面試項目',
            'prepare' => '準備過程',
            'interview_process' => '面試過程',
            'experiences_suggestions' => '心得建議',
            'tag' => '標籤'
        );

        $this->tag_meta_keys = array(
           'job_title', 'industry_category', 'industry_subcategory', 'tag'
        );

        // init validator
        $this->validator = new interview_experience_val($this->meta_keys);

        $this->mycred_pos = array('interview_level', 'experiences_suggestions');

        // init components
        // $this->components = $this->init_components();

        // init front-end validator
        $this->init_frontend_validator();
    }

    // public function show_components(){
    //     foreach( $this->components as $component){
    //         $component->show();
    //     }
    // }

    public function init_components() //: array
    {
        // ComboBox
        $test_data = [
            'field_title' => '公司名稱',
            'field_subtitle' => '外商可直接輸入英文查詢，非外商可輸入中文查詢，若沒有找到請自行輸入',
            'fetch_type' => 'company',
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $comboBox = new ComboBox($test_data, 'company');

        // Dropdown
        $test_data = [
            'field_title' => '職務性質',
            'field_subtitle' => '',
            'content' => [
                '1' => ['正職', '實習', '兼職'],
            ],
            'required' => true,
            'validate_class' => [
                '1' => 'required-field'
            ]
        ];
        $dropdown_1 = new Dropdown($test_data, 'job_type');

        // InputBox
        $test_data = [
            'field_title' => '職務名稱',
            'field_subtitle' => '',
            'inputBox_cnt' => 1,
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $inputBox_1 = new InputBox($test_data, 'job_title');

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
        $dropdown_2 = new Dropdown($test_data, 'industry_category');

        // Select2
        // store option data in js file, put the file in assets/js, pass file name in content_file
        $test_data = [
            'field_title' => '細分產業類別',
            'field_subtitle' => '請選擇最接近的產業類別',
            'content_file' => ['sub_industry_data1', 'sub_industry_data2'],
            'required' => true,
            'validate_class' => ['required-field', '']
        ];
        $select2 = new Select2($test_data, 'industry_subcategory');

        // Radio
        $test_data = [
            'field_title' => '是否隱藏帳號名稱',
            'field_subtitle' => '無論是否隱藏，皆不會公布帳號名稱外的資訊',
            'content' => ['是', '否'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $radio = new Radio($test_data, 'anonymous');

        // Textarea
        $test_data = [
            'field_title' => '作者背景',
            'field_subtitle' => '讓相似背景的人有機會透過解鎖文章獲得幫助',
            'content' => '讓相似背景的人有機會透過解鎖文章獲得幫助<br/>
            不知道該怎麼下手嗎？可以參考這裡的這裡的範例格式：<br/>
            1. 學歷：國立OO大學/OO學系<br/>
            2. 工作：OOO公司暑期實習生<br/>
            3. 經驗：OOO總召<br/>
            4. 證照：多益OOO分<br/>',
            'required' => true,
//            'validate_class' => 'word-limit'
        ];
        $textarea_1 = new Textarea($test_data, 'author');

        // DatePicker
        $test_data = [
            'field_title' => '面試時間',
            'field_subtitle' => '',
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $datePicker = new DatePicker($test_data, 'interview_date');

        // Multi-column Dropdown - location
        $country_data = array();
        $country_data_file = file_get_contents(GOGETFORUMS_ASSETS . 'data/countries_and_cities_data.json');
        $cc = json_decode($country_data_file, true);
        foreach ($cc as $country => $city) {
            array_push($country_data, $country);
            $city_data[$country] = $city;
        }

        $test_data = [
            'field_title' => '職缺地點',
            'field_subtitle' => '',
            'content' => [
                '1' => $country_data,
                '2' => $city_data['台灣']
            ],
            'required' => true,
            'validate_class' => [
                '1' => 'required-field',
                '2' => ''
            ]
        ];

        $dropdown_3 = new Dropdown($test_data, 'interview_location');

        $location_js = file_get_contents(GOGETFORUMS_ASSETS . 'js/special_dropdown.js');
        echo ("<script>");
        echo $location_js;
        echo ("setSpecialDropdown('goget_interview_location_1', 'goget_interview_location_2', '台灣', " . json_encode($city_data) . ")");
        echo ("</script>");

        // SingleSelection
        $test_data = [
            'field_title' => '面試難度',
            'field_subtitle' => '',
            'content' => ['很簡單', '簡單', '普通', '困難', '很困難'],
            'color' => ['blue', 'blue', 'orange', 'red', 'red'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $singleSelection_1 = new SingleSelection($test_data, 'interview_difficulty');

        // SingleSelection
        $test_data = [
            'field_title' => '面試結果',
            'field_subtitle' => '',
            'content' => ['錄取', '未錄取', '等待中', '無聲卡'],
            'color' => ['blue', 'red', 'orange', 'black'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $singleSelection_2 = new SingleSelection($test_data, 'interview_result');

        // MultiCheckBox
        $test_data = [
            'field_title' => '面試項目',
            'field_subtitle' => '選擇申請過程中有參與到的項目/關卡（可複選）',
            'content' => ['個人面試', '團體面試', '筆試', '線上測驗'],
            'required' => true,
            'validate_class' => 'required-field'
        ];
        $multi_checkbox = new MultiCheckBox($test_data, 'interview_level');

        // Textarea
        $test_data = [
            'field_title' => '準備過程',
            'field_subtitle' => '',
            'content' => '履歷、面試準備方法及時間安排',
            'required' => true,
//            'validate_class' => 'word-limit'
        ];
        $textarea_2 = new Textarea($test_data, 'prepare');

        // Textarea
        $test_data = [
            'field_title' => '面試過程',
            'field_subtitle' => '',
            'content' => '不知道該怎麼下手嗎？可以參考這裡的這裡的範例格式：<br/>
            第一關<br/>
            
            1. 時程：月份或間隔週數<br/>
            2. 形式：單獨或團體、紙筆或面試<br/>
            3. 面試官：人資或部門主管<br/>
            4. 內容：回想看看自我介紹內容的重點是甚麼？遇到的特別題目與你的答案？<br/>
            5. 注意事項：針對關卡的技巧或小叮嚀<br/>
            
            填寫得愈完整愈能幫助到其他面試者喔！',
            'required' => true,
//            'validate_class' => 'word-limit'
        ];
        $textarea_2 = new Textarea($test_data, 'interview_process');

        // Textarea
        $test_data = [
            'field_title' => '心得建議',
            'field_subtitle' => '',
            'content' => '給同樣朝夢想努力的人一些鼓勵及建議吧！',
            'validate_class' => ''
        ];
        $textarea_3 = new Textarea($test_data, 'experiences_suggestions');

        // multi-Inputbox
        $test_data = [
            'field_title' => '標籤',
            'field_subtitle' => '範例：暑期實習、FMCG、外商',
            'inputBox_cnt' => 3,
            'validate_class' => ''
        ];
        $inputBox_4 = new InputBox($test_data, 'tag');

        // return array(
        //     $comboBox, $dropdown_1, $inputBox_1, $dropdown_2, $select2, $radio,
        //     $textarea_1, $textarea_2, $datePicker, $singleSelection_1, $singleSelection_2,
        //     $multi_checkbox, $inputBox_2
        // );
    }

    public function get_content($post_meta): ?string
    {
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
            if ($post_meta['goget_' . $meta_key]) {
                if (gettype($post_meta['goget_' . $meta_key]) == 'array') {
                    $concat_content = '';
                    foreach ($post_meta['goget_' . $meta_key] as $value) {
                        $concat_content = $concat_content . $value . ' ';
                    }
                    $content = $content . "<p>
                    <strong><u><font size='3pt'>$title</font></u></strong>
                    <br>" . $concat_content . "</p>";
                } else {
                    $content = $content . "<p>
                    <strong><u><font size='3pt'>$title</font></u></strong>
                    <br>" . $post_meta['goget_' . $meta_key] . "</p>";
                }

                // counter ++
                $counts_of_forum_meta += 1;
            } else {
                $content = $content . "<p>
                <strong><u><font size='3pt'>$title</font></u></strong>
                <br>未填寫</p>";
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
