<?php

namespace GoGetForums\includes;

/**
 * Class forum
 * Specify each forum's components
 */
class forum
{
    public function __construct()
    {
        // include common assets
    }
}

class testForum extends forum
{
    public function __construct()
    {
        parent::__construct();

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
        $comboBox = new ComboBox($test_data);

        // Dropdown
        $test_data = [
            'field_title' => '職務性質',
            'field_subtitle' => '',
            'content' => [
                'job_type' => ['正職', '實習', '兼職'],
            ]
        ];
        $dropdown = new Dropdown($test_data);

        // InputBox
        $test_data = [
            'field_title' => '職務名稱',
            'field_subtitle' => '',
            'inputBox_cnt' => 1
        ];
        $inputBox = new InputBox($test_data);

        // Multi-column Dropdown
        $test_data = [
            'field_title' => '產業類別',
            'field_subtitle' => '請選擇最接近的產業類別',
            'content' => [
                'industry1' => ['金融', '顧問', '零售', '科技', '新創', '其他'],
                'industry2' => ['(無)', '金融', '顧問', '零售', '科技', '新創', '其他']
            ]
        ];
        $dropdown = new Dropdown($test_data);

        // Select2
        $test_data = [
            'field_title' => '細分產業類別',
            'field_subtitle' => '請選擇最接近的產業類別'
        ];
        $select2 = new Select2($test_data);

        // Radio
        $test_data = [
            'field_title' => '是否隱藏帳號名稱',
            'field_subtitle' => '無論是否隱藏，皆不會公布帳號名稱外的資訊',
            'content' => ['是', '否']
        ];
        $radio = new Radio($test_data);

        // Textarea
        $test_data = [
            'field_title' => '作者背景',
            'field_subtitle' => '讓相似背景的人有機會透過解鎖文章獲得幫助',
            'content' => '不知道該怎麼下手嗎？可以參考這裡的這裡的範例格式：'
        ];
        $textarea = new Textarea($test_data);

        // DatePicker
        $test_data = [
            'field_title' => '面試時間',
            'field_subtitle' => '',
        ];
        $datePicker = new DatePicker($test_data);

        // SingleSelection
        $test_data = [
            'field_title' => '面試難度',
            'field_subtitle' => '',
            'content' => ['很簡單', '簡單', '普通', '困難', '很困難'],
            'color' => ['blue', 'blue', 'orange', 'red', 'red'],
        ];
        $singleSelection = new SingleSelection($test_data);

        // SingleSelection
        $test_data = [
            'field_title' => '面試結果',
            'field_subtitle' => '',
            'content' => ['錄取', '未錄取', '等待中', '無聲卡'],
            'color' => ['blue', 'red', 'orange', 'black'],
        ];
        $singleSelection = new SingleSelection($test_data);

        // MultiCheckBox
        $test_data = [
            'field_title' => '面試項目',
            'field_subtitle' => '選擇申請過程中有參與到的項目/關卡（可複選）',
            'content' => ['個人面試', '團體面試', '筆試', '線上測驗']
        ];
        $multi_checkbox = new MultiCheckBox($test_data);

        // multi-Inputbox
        $test_data = [
            'field_title' => '標籤',
            'field_subtitle' => '範例：暑期實習、FMCG、外商',
            'inputBox_cnt' => 3
        ];
        $inputBox = new InputBox($test_data);
    }
}
