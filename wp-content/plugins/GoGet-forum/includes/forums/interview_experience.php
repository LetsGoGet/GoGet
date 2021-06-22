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

        // init validator
        $this->validator = new interview_experience_val();

        // init components
        $this->components = $this->init_components();
    }

    public function show_components(){
        foreach( $this->components as $component){
            $component->show();
        }
    }

    public function init_components(): array
    {
        // For testing
        // Using select2
        echo ('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/zh-TW.min.js"></script>');

        // ComboBox
        $test_data = [
            'field_title' => '公司名稱',
            'field_subtitle' => '外商可直接輸入英文查詢，非外商可輸入中文查詢，若沒有找到請自行輸入',
            'fetch_type' => 'company'
        ];
        $comboBox = new ComboBox($test_data, 'company');

        // Dropdown
        $test_data = [
            'field_title' => '職務性質',
            'field_subtitle' => '',
            'content' => [
                '1' => ['正職', '實習', '兼職'],
            ]
        ];
        $dropdown_1 = new Dropdown($test_data, 'job_type');

        // InputBox
        $test_data = [
            'field_title' => '職務名稱',
            'field_subtitle' => '',
            'inputBox_cnt' => 1
        ];
        $inputBox_1 = new InputBox($test_data, 'job_title');

        // Multi-column Dropdown
        $test_data = [
            'field_title' => '產業類別',
            'field_subtitle' => '請選擇最接近的產業類別',
            'content' => [
                '1' => ['金融', '顧問', '零售', '科技', '新創', '其他'],
                '2' => ['(無)', '金融', '顧問', '零售', '科技', '新創', '其他']
            ]
        ];
        $dropdown_2 = new Dropdown($test_data, 'industry_category');

        // Select2
        $test_data = [
            'field_title' => '細分產業類別',
            'field_subtitle' => '請選擇最接近的產業類別'
        ];
        $select2 = new Select2($test_data, 'industry_subcategory');

        // Radio
        $test_data = [
            'field_title' => '是否隱藏帳號名稱',
            'field_subtitle' => '無論是否隱藏，皆不會公布帳號名稱外的資訊',
            'content' => ['是', '否']
        ];
        $radio = new Radio($test_data, 'anonymous');

        // Textarea
        $test_data = [
            'field_title' => '作者背景',
            'field_subtitle' => '讓相似背景的人有機會透過解鎖文章獲得幫助',
            'content' => '不知道該怎麼下手嗎？可以參考這裡的這裡的範例格式：'
        ];
        $textarea_1 = new Textarea($test_data, 'author');

        // Textarea
        $test_data = [
            'field_title' => '準備過程',
            'field_subtitle' => '',
            'content' => '履歷、面試準備方法及時間安排'
        ];
        $textarea_2 = new Textarea($test_data, 'prepare');

        // DatePicker
        $test_data = [
            'field_title' => '面試時間',
            'field_subtitle' => '',
        ];
        $datePicker = new DatePicker($test_data, 'interview_date');

        // SingleSelection
        $test_data = [
            'field_title' => '面試難度',
            'field_subtitle' => '',
            'content' => ['很簡單', '簡單', '普通', '困難', '很困難'],
            'color' => ['blue', 'blue', 'orange', 'red', 'red'],
        ];
        $singleSelection_1 = new SingleSelection($test_data, 'interview_difficulty');

        // SingleSelection
        $test_data = [
            'field_title' => '面試結果',
            'field_subtitle' => '',
            'content' => ['錄取', '未錄取', '等待中', '無聲卡'],
            'color' => ['blue', 'red', 'orange', 'black'],
        ];
        $singleSelection_2 = new SingleSelection($test_data, 'interview_result');

        // MultiCheckBox
        $test_data = [
            'field_title' => '面試項目',
            'field_subtitle' => '選擇申請過程中有參與到的項目/關卡（可複選）',
            'content' => ['個人面試', '團體面試', '筆試', '線上測驗']
        ];
        $multi_checkbox = new MultiCheckBox($test_data, 'interview_level');

        // multi-Inputbox
        $test_data = [
            'field_title' => '標籤',
            'field_subtitle' => '範例：暑期實習、FMCG、外商',
            'inputBox_cnt' => 3
        ];
        $inputBox_2 = new InputBox($test_data, 'tag');

        return array(
            $comboBox, $dropdown_1, $inputBox_1, $dropdown_2, $select2, $radio,
            $textarea_1, $textarea_2, $datePicker, $singleSelection_1, $singleSelection_2,
            $multi_checkbox, $inputBox_2
        );
    }

    public function get_content($post_meta): ?string
    {
        $content = null; // concat html

        foreach($this->components as $component){
            switch ($component->meta_key){
                case "company":
                    $content = $content . "<p> " . $post_meta['goget_company'][0] . " </p>";
                    break;
                case "job_type":
                    $content = $content . "<p> " . $post_meta['goget_job_type'][0] . " </p>";
                    break;
                case "job_title":
                    $content = $content . "<p> " . $post_meta['goget_job_title'][0] . " </p>";
                    break;
                default:
                    break;
            }
        }

        return $content;
    }
}
