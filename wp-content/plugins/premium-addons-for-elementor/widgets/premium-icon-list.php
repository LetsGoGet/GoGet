<?php

/**
 * Class: Premium_Icon_list
 * Name: Bullet List
 * Slug: premium-addon-icon-list
 */

namespace PremiumAddons\Widgets;

// Elementor Classes.
use Elementor\Icons_Manager;
use Elementor\Control_Media;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;


// PremiumAddons Classes.
use PremiumAddons\Includes\Helper_Functions;
use PremiumAddons\Includes\Premium_Template_Tags;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

/**
 * Class Premium_Icon_List
 */
class Premium_Icon_List extends Widget_Base {

    public function getTemplateInstance() {
        return $this->templateInstance = Premium_Template_Tags::getInstance();
    }

    public function get_name() {
        return  'premium-icon-list';
    }
   
    public function get_title() {
        return sprintf( '%1$s %2$s', Helper_Functions::get_prefix(), __('Bullet list', 'premium-addons-for-elementor') );
    }

    public function get_style_depends() {
        return [
            'premium-addons'
        ];
    }

    public function get_script_depends() {
        return [
            'elementor-waypoints',
            'lottie-js',
            'premium-addons'
        ];
    }

    public function get_icon() {
		return 'pa-icon-list';
	}

    public function get_categories() {
        return [ 'premium-elements' ];
    }

    public function get_custom_help_url() {
		return 'https://premiumaddons.com/support/';
	}
    
    public function _register_controls() {
       
        // Content Tab
        // List Items Content
        $this->start_controls_section(
            'list_items_section',
            [
                'label' => __( 'List Items', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Title control 
        $repeater_list = new REPEATER();

		$repeater_list->add_control(
            'list_title',
            [
				'label' => __( 'Title', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'premium-addons-for-elementor' ),
				'label_block' => true,
			]
        );	
  
        // Show and Hide icons from view
         $repeater_list->add_control(
			'show_icon',
			[
				'label' => __( 'Show Bullet', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
                'default' => 'yes',
			]
        );

        // Check icon type
        $repeater_list->add_control(
            'icon_type',
            [
                'label' => __( 'Bullet Type', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'render_type' => 'template',
                'options' => [
                    'icon'  => __( 'Icon', 'premium-addons-for-elementor' ),
                    'image' => __( 'Image', 'premium-addons-for-elementor' ),
                    'lottie' => __( 'Lottie Animation', 'premium-addons-for-elementor' ),
                    'text' => __( 'Text', 'premium-addons-for-elementor' ),                
                ],
                'condition' => [
                    'show_icon'  => 'yes'
                ]
            ]
        );

        // If Icon Type is selected
        $repeater_list->add_control(
            'premium_icon_list_font_updated',
            [
                'label'             => __('Icon','premium-addons-for-elementor'),
                'type'              => Controls_Manager::ICONS,
                'default' => [
                    'value'     => 'fas fa-star',
                    'library'   => 'fa-solid',
                ],
                'condition' => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'icon'
                ]
            ]
        );

        // If Media Type is selected
        $repeater_list->add_control(
            'custom_image',
            [
                'label'        => __('Custom Image','premium-addons-for-elementor'),
                'type'         => Controls_Manager::MEDIA,
                'dynamic'       => [ 'active' => true ],
                'default'      => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
                'condition'    => [
                    'show_icon'  => 'yes',
                    'icon_type'    => 'image'
                ]
            ]
        );

        // If Text Type is selected
        $repeater_list->add_control(
            'list_text_icon',
            [
                'label'         => __('Text', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::TEXT,
                'default' => __( 'New' , 'premium-addons-for-elementor' ),
                'condition'    => [
                    'show_icon'  => 'yes',
                    'icon_type'    => 'text'
                ]
            ]
        );	

        // If Animation Type is selected
        $repeater_list->add_control(
            'lottie_url', 
            [
                'label'             => __( 'Animation JSON URL', 'premium-addons-for-elementor' ),
                'type'              => Controls_Manager::TEXT,
                'dynamic'           => [ 'active' => true ],
                'description'       => 'Get JSON code URL from <a href="https://lottiefiles.com/" target="_blank">here</a>',
                'label_block'       => true,
                'render_type' => 'template',
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'lottie'
                ]
            ]
        );

        $repeater_list->add_control(
            'lottie_loop',
            [
                'label'         => __('Loop','premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'return_value'  => 'true',
                'default'       => 'true',
                'render_type' => 'template',
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'lottie'
                ]
            ]
        );

        $repeater_list->add_control(
            'lottie_reverse',
            [
                'label'         => __('Reverse','premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'return_value'  => 'true',
                'render_type' => 'template',
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'lottie'
                ]
            ]
        );

        // Show list link
        $repeater_list->add_control(
            'show_list_link',
            [
                'label' => __( 'Link', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
            ]
        );

        // URL/Existing Page Control
        $repeater_list->add_control(
            'link_select', 
            [
                'label'         => __('Link/URL', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'url'   => __('URL', 'premium-addons-for-elementor'),
                    'existing_page'  => __('Existing Page', 'premium-addons-for-elementor'),
                ],
                'default'       => 'url',
                'label_block'   => true,
                'condition' => [
                    'show_list_link'  => 'yes'
                ]
            ]
        );

        $repeater_list->add_control(
            'link',
            [
                'label'         => __('URL', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::URL,
                'dynamic'       => [ 'active' => true ],
                'placeholder'   => 'https://premiumaddons.com/',
                'label_block'   => true,
                'condition'     => [
                    'link_select' => 'url',
                    'show_list_link'  => 'yes'
                ]
            ]
        );

        $repeater_list->add_control(
            'existing_page', 
            [
                'label'         => __('Existing Page', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT2,
                'options'       => $this->getTemplateInstance()->get_all_posts(),
                'condition'     => [
                    'link_select'     => 'existing_page',
                    'show_list_link'  => 'yes'
                ],
                'label_block'   => true,
            ]
        );

        $repeater_list->add_control(
            'link_title',
            [
                'label'         => __('Link Title', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::TEXT,
                'condition'     => [
                    'link_select' => 'yes',
                    'show_list_link'  => 'yes'
                ],
                'label_block'   => true
            ]
        );

        // Show Badge
        $repeater_list->add_control(
            'show_badge',
            [
                'label'        => __( 'Badge', 'premium-addons-for-elementor' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'separator' => 'before'
            ]
        );

        $repeater_list->add_control(
            'badge_title',
            [
                'label'         => __('Badge Text', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::TEXT,
				'default' => __( 'New' , 'premium-addons-for-elementor' ),
                'condition'     => [
                    'show_badge' => 'yes',
                ],
            ]
        );

        // badge color if selected
        $repeater_list->add_control(
            'badge_text_color',
            [
                'label' => __( 'Text Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-badge span' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'show_badge' => 'yes',
                ]
            ]
        );

        // Badge Back ground color
        $repeater_list->add_control(
            'badge_background_color',
            [
                'label' => __( 'Background', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-badge span' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'show_badge' => 'yes',
                ]
            ]
        );

        // Show global style switcher
        $repeater_list->add_control(
            'show_global_style',
            [
                'label' => __( 'Override Global Style', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before'
            ]
        );  

        // List box Size 
        $repeater_list->add_control(
            'list_box_size',
            [
                'label'         => __('Size', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px','em','%'],
                'range'         => [
                    'px'    => [
                        'min' => 5,
                        'max' => 200
                    ],
                    'em'    => [
                        'min' => 5,
                        'max' => 30
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-text span ,{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-wrapper i ,{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-wrapper .premium-icon-list-icon-text p' => 'font-size: {{SIZE}}{{UNIT}} ',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-wrapper .premium-lottie-animation svg , {{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-wrapper img' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important;',
                ],
                'condition'     => [
                    'show_global_style' => 'yes',
                ]
            ]
        );

        // Colors Tabs
        $repeater_list->start_controls_tabs(
            'colors_style_tabs'
        );

        // Normal State
        $repeater_list->start_controls_tab(
            'color_normal_state',
            [
                'label' => __( 'Normal', 'premium-addons-for-elementor' ),
                'condition'     => [
                    'show_global_style' => 'yes'
                ]
            ]  
        );

        // Icon color if selected
        $repeater_list->add_control(
            'icon_color',
            [
                'label' => __( 'Icon/Text Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-wrapper i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur:hover {{CURRENT_ITEM}} .premium-icon-list-wrapper i ' => 'text-shadow: 0 0 3px {{VALUE}};'

                ],
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'icon',
                    'show_global_style' => 'yes',
                ]
            ]
        );

        // Text color if selected
        $repeater_list->add_control(
            'text_icon_color',
            [
                'label' => __( 'Icon/Text Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}  .premium-icon-list-icon-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur:hover {{CURRENT_ITEM}} .premium-icon-list-icon-text p' => 'text-shadow: 0 0 3px {{VALUE}};'
                ],
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'text',
                    'show_global_style' => 'yes',
                ]
            ]
        );
                
        // background text icon color if selected
        $repeater_list->add_control(
            'background_text_icon_color',
            [
                'label' => __( 'Icon/Text Background', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}  .premium-icon-list-icon-text p' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'text',
                    'show_global_style' => 'yes',
                ],
            ]
        );
        
        // Title color 
        $repeater_list->add_control(
            'title_list_color',
            [
                'label' => __( 'Title Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .premium-icon-list-text span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur:hover {{CURRENT_ITEM}} .premium-icon-list-text span' => 'text-shadow: 0 0 3px {{VALUE}};'
                ],
                'condition'     => [
                    'show_global_style' => 'yes'
                ]
            ]
        );

        // Back ground color
        $repeater_list->add_control(
            'background_color',
            [
                'label' => __( 'Background', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.premium-icon-list-content' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'show_global_style' => 'yes',
                ]
            ]
        );

        $repeater_list->end_controls_tab();
        // Hover State
        $repeater_list->start_controls_tab(
            'color_hover_state',
            [
                'label' => __( 'Hover', 'premium-addons-for-elementor' ),
                'condition'     => [
                    'show_global_style' => 'yes'
                ]
            ]
        );

        // Icon hover color
        $repeater_list->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Icon/Text Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}}  {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-wrapper i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-wrapper i' => 'text-shadow: none !important; color: {{VALUE}} !important;'
                ],
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'icon',
                    'show_global_style' => 'yes',
                ]
			]
        );

        // Text hover color if selected
        $repeater_list->add_control(
            'text_icon_hover_color',
            [
                'label' => __( 'Icon/Text Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-icon-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-icon-text p' => 'text-shadow: none !important; color: {{VALUE}} !important;'
                ],
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'text',
                    'show_global_style' => 'yes',
                ]
            ]
        );

        // background text icon color if selected
        $repeater_list->add_control(
            'background_text_icon_hover_color',
            [
                'label' => __( 'Icon/Text Background ', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-icon-text p' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'show_icon'  => 'yes',
                    'icon_type'  => 'text',
                    'show_global_style' => 'yes',
                ],
            ]
        );
        
        // Text hover color
        $repeater_list->add_control(
			'title_hover_color',
			[
				'label' => __( 'Title Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-text span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur {{CURRENT_ITEM}}.premium-icon-list-content:hover .premium-icon-list-text span' => 'text-shadow: none !important; color: {{VALUE}} !important;'
                ],
                'condition'     => [
                    'show_global_style' => 'yes',
                ]
			]
        );

        // Back ground hover color
        $repeater_list->add_control(
			'background_hover_color',
			[
				'label' => __( 'Background', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.premium-icon-list-content:hover' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'show_global_style' => 'yes',
                ]
			]
        );
        
        $repeater_list->end_controls_tab();
        $repeater_list->end_controls_tabs();

        //Reapeter control for items
		$this->add_control(
			'list',
			[
				'label' => __( 'List Items', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields'        => $repeater_list->get_controls(),
                'render_type' => 'template',
                'default' => [
                    [
                        'list_title'   => 'List Title #1',
                        'premium_icon_list_font_updated' => [
							'value' => 'fas fa-star',
							'library' => 'fa-solid',
						],
                    ],
                    [
                        'list_title'   => 'List Title  #2',
                        'premium_icon_list_font_updated' => [
                            'value' => 'far fa-smile',
                            'library' => 'fa-regular',
                        ],
                       
                    ],
                    [
                        'list_title'   => 'List Title  #3',
                        'premium_icon_list_font_updated' => [
							'value' => 'fa fa-check',
							'library' => 'fa-solid',
						],
                    ],
                ],
                'title_field'   => '<# if ( "icon" === icon_type ) { #> {{{ elementor.helpers.renderIcon( this, premium_icon_list_font_updated, {}, "i", "panel" ) }}}<#} else if( "text" === icon_type ) { #> {{list_text_icon}} <# } else if( "image" === icon_type) {#> <img class="editor-pa-img" width="20px" height="20px" src="{{custom_image.url}}"><# } #> {{{ list_title }}}'
			]
        );

        $this->end_controls_section(); 
        //End of List items tab

        // Display Options Content
        $this->start_controls_section(
            'display_options_section',
            [
                'label' => __( 'Display Options', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // over flow Style 
         $this->add_control(
            'list_overflow',
            [
                'label'         => __( 'List Overflow', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'visible'         => __( 'Visible', 'premium-addons-for-elementor' ),
                    'hidden'        => __( 'Hidden', 'premium-addons-for-elementor' ),
                ],
                'default'       =>'hidden',
                'render_type' => 'template',
                'selectors'     => [
                    '{{WRAPPER}} .premium-icon-list-content' => 'overflow: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'overflow_render_notice', 
            [
                'raw'               => __("Please note that bullet connector option only appears when overflow set to visible.", 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ] 
        );

        // Check Layout inline/block
        $this->add_responsive_control(
            'layout_type',
            [
                'label' => __( 'Layout Type', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'row'  => __( 'Inline', 'premium-addons-for-elementor' ),
                    'column' => __( 'Block', 'premium-addons-for-elementor' ),
                
                ],
                'render_type' => 'template',
                'default'       => 'column',
                'selectors'     => [
                    '{{WRAPPER}}  .premium-icon-list-box ' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        // Display Alignments
        $this->add_responsive_control(
            'premium_icon_list_align',
            [
                'label'         => __( 'Alignment', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'render_type' => 'template',
                'options'       => [
                    'flex-start'      => [
                        'title'=> __( 'Left', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title'=> __( 'Center', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end'     => [
                        'title'=> __( 'Right', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-icon-list-content , {{WRAPPER}} .premium-icon-list-box ' => 'justify-content:{{VALUE}};',
                    '{{WRAPPER}} .premium-icon-list-divider , {{WRAPPER}} .premium-icon-list-wrapper-top ' => 'align-self:{{VALUE}};',
                ],
                'default' => 'flex-start',
            ]
        );

        // Icon postion select
        $this->add_control(
            'icon_postion',
            [
                'label' => __( 'Bullet Position', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'row'  => __( 'Before', 'premium-addons-for-elementor' ),
                    'column' => __( 'Top', 'premium-addons-for-elementor' ),
                    'row-reverse' => __( 'After', 'premium-addons-for-elementor' ),
                ],
                'render_type' => 'template',
                'default' => 'row',
                'selectors'     => [
                    '{{WRAPPER}} .premium-icon-list-text' => 'display:flex;flex-direction: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control('top_icon_align',
            [
                'label'         => __( 'Bullet Alignment', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'      => [
                        'title'=> __( 'Left', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title'=> __( 'Center', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end'     => [
                        'title'=> __( 'Right', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .premium-icon-list-wrapper-top '      => 'align-self: {{VALUE}} !important',
                ],
                'condition'     => [
                    'icon_postion'                 => 'column',
                ]
            ]
        );

        // badge align Horizontal Style
        $this->add_responsive_control(
            'badge_align_h',
            [
                'label'         => __( 'Badge Alignment ', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    '8'      => [
                        'title'=> __( 'Right', 'premium-addons-for-elementor' ),
                        'icon' => 'fas fa-long-arrow-alt-right',
                    ],
                    '3'     => [
                        'title'=> __( 'Left', 'premium-addons-for-elementor' ),
                        'icon' => 'fas fa-long-arrow-alt-left',
                    ],
                ],
                'default'       => '8',
                'selectors'     => [
                    '{{WRAPPER}} .premium-icon-list-text' => 'order:5 ;',
                    '{{WRAPPER}} .premium-icon-list-badge' => 'order:{{VALUE}} ;'
                ],
                'separator' => 'after'
            ]
        );

        // Show Divider
        $this->add_control(
            'show_divider',
            [
                'label'        => __( 'Divider', 'premium-addons-for-elementor' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
            ]
        );

        // Show Connector
        $this->add_control(
            'show_connector',
            [
                'label'        => __( 'Bullet Connector', 'premium-addons-for-elementor' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'condition'     => [
                    'layout_type' => 'column',
                    'icon_postion!' => 'column',
                    'hover_effect_type!' => 'grow',
                    'list_overflow'  => 'visible',
                ],
            ]
        );
        
        $this->add_control('premium_icon_list_animation_switcher',
            [
                'label'        => __('Animation','premium-addons-for-elementor'),
                'type'         => Controls_Manager::SWITCHER,
            ]
        );
        
        $this->add_control('premium_icon_list_animation',
			[
				'label'         => __( 'Entrance Animation', 'premium-addons-for-elementor' ),
				'type'          => Controls_Manager::ANIMATION,
				'default'       => '',
				'label_block'   => true,
                'frontend_available' => true,
                'render_type' => 'template',
                'condition'     => [
                    'premium_icon_list_animation_switcher' => 'yes'
                ],
			]
		);
        
        $this->add_control('premium_icon_list_animation_duration',
			[
				'label'         => __( 'Animation Duration', 'premium-addons-for-elementor' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					'slow' => __( 'Slow', 'premium-addons-for-elementor' ),
					''     => __( 'Normal', 'premium-addons-for-elementor' ),
					'fast' => __( 'Fast', 'premium-addons-for-elementor' ),
				],
                'condition'     => [
                    'premium_icon_list_animation_switcher' => 'yes',
					'premium_icon_list_animation!'    => '',
				],
			]
		);
        
        $this->add_control('premium_icon_list_animation_delay',
			[
				'label'         => __( 'Animation Delay in Between (s)', 'premium-addons-for-elementor' ) ,
				'type'          => Controls_Manager::NUMBER,
				'default'       => 0,
				'step'          => 0.1,
				'condition'     => [
                    'premium_icon_list_animation_switcher' => 'yes',
					'premium_icon_list_animation!'    => '',
				],
				'frontend_available' => true,
			]
		);

        //  select hover type
        $this->add_control(
            'hover_effect_type',
            [
                'label' => __( 'Hover Effect', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none'  => __( 'None', 'premium-addons-for-elementor' ),
                    'blur'  => __( 'Blur', 'premium-addons-for-elementor' ),
                    'grow' => __( 'Grow', 'premium-addons-for-elementor' ),
                    'linear gradient' => __( 'Text Gradient', 'premium-addons-for-elementor' ),
                ],
                'render_type' => 'template',
                'default' => 'none',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'              => 'gradient_color',
                'types'             => [ 'gradient' ],
                'condition'         => [
                    'hover_effect_type' => 'linear gradient'
                ],
                'selector'          => '{{WRAPPER}}  a[data-text]::before ,{{WRAPPER}} .premium-icon-list-gradient-effect::before'
            ]
        );

        $this->end_controls_section();
        //End of display options tab

        $this->start_controls_section('section_pa_docs',
            [
                'label'         => __('Helpful Documentations', 'premium-addons-for-elementor'),
            ]
        );

        $doc1_url = Helper_Functions::get_campaign_link( 'https://premiumaddons.com/docs/icon-list-widget-tutorial/', 'editor-page', 'wp-editor', 'get-support' ); 

        $this->add_control('doc_1',
            [
                'type'            => Controls_Manager::RAW_HTML,
                'raw'             => sprintf(  '<a href="%s" target="_blank">%s</a>', $doc1_url ,__( 'Gettings started »', 'premium-addons-for-elementor' ) ),
                'content_classes' => 'editor-pa-doc',
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {

        // List Style Settings
        $this->start_controls_section(
            'list_style_section',
            [
                'label' => __( ' General ', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //list items back ground color
        $this->add_control(
			'list_items_color',
			[
				'label' => __( 'Background Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}}  .premium-icon-list-content' => 'background-color: {{VALUE}}',
                ], 
			]
        );

        //List items hover style color
        $this->add_control(
			'list_items_hover_color',
			[
				'label' => __( 'Hover Background Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .premium-icon-list-content:hover ' => 'background-color: {{VALUE}}',
                ],
			]
        );

        // List items Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'list_items_shadow',
                'selector' => '{{WRAPPER}} .premium-icon-list-content',
            ]
        );

        // List items Shadow Hover
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'list_items_shadow_hover',
                'label' => 'Hover Box Shadow',
                'selector' => '{{WRAPPER}} .premium-icon-list-content:hover',
            ]
        );

        // list item Border 
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'list_item_border',
				'label' => __( 'Border', 'premium-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .premium-icon-list-content ',
			]
        );
        
        // list item Border  Radius
        $this->add_responsive_control(
            'list_item_border_radius',
            [
                'label' => __( 'Border Radius', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // List Items Margin
        $this->add_responsive_control(
            'list_item_margin',
            [
                'label' => __( 'Margin', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

         // List Items Padding
         $this->add_responsive_control(
            'list_items_padding',
            [
                'label' => __( 'Padding', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End of list style settings

        // Icon Style Settings
        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => __( 'Bullet', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_render_notice', 
            [
                'raw'               => __("Options below will be applied on items with no style options set individually from the repeater.", 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
            ] 
        );

        // Icon Style Size
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Size', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em'],
                'range'         => [
                    'px'    => [
                        'min'   => 1, 
                        'max'   => 200,
                    ],
                    'em'    => [
                        'min'   => 1, 
                        'max'   => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .premium-icon-list-wrapper i , {{WRAPPER}}  .premium-icon-list-wrapper .premium-icon-list-icon-text p' => 'font-size: {{SIZE}}{{UNIT}} ',
                    '{{WRAPPER}}  .premium-icon-list-wrapper .premium-lottie-animation svg , {{WRAPPER}}  .premium-icon-list-wrapper img'    => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );
                
        $this->add_control(
            'icon_color_render_notice', 
            [
                'raw'               => __('Color options below will be applied on Font Awesome and Text.', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
                "separator" => "before" 
            ] 
        );

        //Icon style color
        $this->add_control(
			'icon_color',
			[
                'label' => __( 'Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' =>  Scheme_Color::COLOR_1,
				],
				'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-wrapper i , {{WRAPPER}}  .premium-icon-list-icon-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur:hover .premium-icon-list-wrapper i , {{WRAPPER}} .premium-icon-list-blur:hover .premium-icon-list-wrapper .premium-icon-list-icon-text p' => 'text-shadow: 0 0 3px {{VALUE}};'
                ],
			]
        );

        //Icon hover style color
        $this->add_control(
			'icon_hover_color',
			[
                'label' => __( 'Hover Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content:hover .premium-icon-list-wrapper i ,{{WRAPPER}} .premium-icon-list-content:hover  .premium-icon-list-icon-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur .premium-icon-list-content:hover .premium-icon-list-wrapper i , {{WRAPPER}} .premium-icon-list-blur .premium-icon-list-content:hover  .premium-icon-list-icon-text p' => 'text-shadow: none !important; color: {{VALUE}} !important;'                    
                ],
			]
        );

        $this->add_control(
            'background_render_notice', 
            [
                'raw'               => __('Background Color options below will be applied on all bullet types.', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
                'separator' => 'before'
            ] 
        );

        //Icon Background style color
        $this->add_control(
			'icon_background_color',
			[
				'label' => __( 'Background', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .premium-icon-list-wrapper i , {{WRAPPER}}  .premium-icon-list-wrapper svg ,{{WRAPPER}}  .premium-icon-list-wrapper img , {{WRAPPER}}  .premium-icon-list-icon-text p' => 'background-color: {{VALUE}}',
                ],                
			]
        );

        //Icon Background Hover style color
        $this->add_control(
			'icon_background_hover_color',
			[
				'label' => __( ' Hover Background', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .premium-icon-list-content:hover .premium-icon-list-wrapper i,{{WRAPPER}} .premium-icon-list-content:hover .premium-icon-list-wrapper svg ,{{WRAPPER}} .premium-icon-list-content:hover .premium-icon-list-wrapper img ,  {{WRAPPER}} .premium-icon-list-content:hover  .premium-icon-list-icon-text p' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
            'typo_text_render_notice', 
            [
                'raw'               => __('Typography option below will be applied on text.', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
                'separator'         => 'before' 
            ] 
        );

        //  Text icon Typography Style
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_icon_typography',
                'label' => __( 'Typography', 'premium-addons-for-elementor' ),
                'selector' => ' {{WRAPPER}}  .premium-icon-list-icon-text p',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        // Icon Border 
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'border',
				'label'     => __( 'Border', 'premium-addons-for-elementor' ),
                'selector'  => '{{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper i , {{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper svg , {{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper img ,{{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper .premium-icon-list-icon-text p',
                'separator' => 'before'
			]
        );
        
        // Icon Border Radius
        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => __( 'Border Radius', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper i ,{{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper .premium-icon-list-icon-text p, {{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper svg , {{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Icon Margin
        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => __( 'Margin', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-wrapper ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before'
            ]
        );

        // Icon Padding
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Padding', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper i,{{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper .premium-icon-list-icon-text p , {{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper svg , {{WRAPPER}} .premium-icon-list-content .premium-icon-list-wrapper img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End of icon style settings

        // Title Style Settings
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Title', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_render_notice', 
            [
                'raw'               => __("Options below will be applied on items with no style options set individually from the repeater.", 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
            ] 
        );

        // Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_typography',
                'label' => __( 'Typography', 'premium-addons-for-elementor' ),
                'selector' => ' {{WRAPPER}}  .premium-icon-list-text span ',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,

            ]
        );

        //Title style color
        $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
                ],
				'selectors' => [
                    ' {{WRAPPER}}  .premium-icon-list-text span' => 'color: {{VALUE}}',
                    ' {{WRAPPER}} .premium-icon-list-blur:hover .premium-icon-list-text span' => 'text-shadow: 0 0 3px {{VALUE}};'
                ],
			]
        );

        //Title hover style color
        $this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Hover Color', 'premium-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' =>  Scheme_Color::get_type(),
					'value' =>  Scheme_Color::COLOR_1,
				],
				'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-content:hover .premium-icon-list-text span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .premium-icon-list-blur .premium-icon-list-content:hover .premium-icon-list-text span' => 'text-shadow: none !important; color: {{VALUE}} !important;'
                ],
			]
        );

        // Title Shadow
        $this->add_group_control(
            Group_Control_text_Shadow::get_type(),
            [
                'name' => 'list_title_shadow',
                'selector' => '{{WRAPPER}} .premium-icon-list-text span',
            ]
        );


        // Title Margin
        $this->add_responsive_control(
            'list_title_margin',
            [
                'label' => __( 'Margin', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-text ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End of title style settings

        // badge Style Settings
        $this->start_controls_section(
            'badge_style_section',
            [
                'label' => __( ' Badge ', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // badge text Style
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_title_typography',
                'label' => __( 'Typography', 'premium-addons-for-elementor' ),
                'selector' => ' {{WRAPPER}}  .premium-icon-list-badge span',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            'badge_color_render_notice', 
            [
                'raw'               => __('Color options below will be applied on badge with no style options set individually from the repeater.', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::RAW_HTML,
                'separator'         => 'before' 
            ] 
        );

         // badge color 
         $this->add_control(
            'badge_text_style_color',
            [
                'label' => __( 'Text Color', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-badge span' => 'color: {{VALUE}}',
                ],
                'default' => '#fff',
            ]
        );

        // Badge Back ground color
        $this->add_control(
            'badge_background_style_color',
            [
                'label' => __( 'Background', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#6ec1e4',
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-badge span' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'after'
            ]
        );
        
        // Badge Border  Radius
        $this->add_responsive_control(
            'badge_border_radius',
            [
                'label' => __( 'Badge Radius', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 2,
                    'right' => 2,
                    'bottom' => 2,
                    'left' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-badge span ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Badge text Shadow
        $this->add_group_control(
            Group_Control_text_Shadow::get_type(),
            [
                'name' => 'Badge_text_shadow',
                'selector' => '{{WRAPPER}} .premium-icon-list-badge span',
            ]
        );

        // Badge box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'Badge_box_shadow',
                'selector' => '{{WRAPPER}} .premium-icon-list-badge span',
            ]
        );

         // Badge Margin
         $this->add_responsive_control(
            'Badge_margin',
            [
                'label' => __( 'Margin', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-badge ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

         // Badge Padding
         $this->add_responsive_control(
            'Badge_padding',
            [
                'label' => __( 'Padding', 'premium-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 2,
                    'right' => 5,
                    'bottom' => 2,
                    'left' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .premium-icon-list-badge span ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End of badge style settings 

        // Divider Style Settings
        $this->start_controls_section(
            'divider_style_section',
            [
                'label' => __( ' Divider ', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'show_divider'  => 'yes'
                ]
            ]
        );        
        
        // Divider Style 
        $this->add_control(
            'list_divider_type',
            [
                'label'         => __( 'Divider Style', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'solid'         => __( 'Solid', 'premium-addons-for-elementor' ),
                    'double'        => __( 'Double', 'premium-addons-for-elementor' ),
                    'dotted'        => __( 'Dotted', 'premium-addons-for-elementor' ),
                    'dashed'        => __( 'Dashed', 'premium-addons-for-elementor' ),
                    'groove'        => __( 'Groove', 'premium-addons-for-elementor' ),
                ],
                'default'       =>'solid',
                'selectors'     => [
                    '{{WRAPPER}} .premium-icon-list-divider:not(:last-child):after' => 'border-top-style: {{VALUE}};',
                    '{{WRAPPER}} .premium-icon-list-divider-inline:not(:last-child):after' => 'border-left-style: {{VALUE}};'
                ],
                'condition' => [
                    'show_divider'  => 'yes'
                ]
            ]
        );
        
        // Divider Width
        $this->add_responsive_control(
            'list_divider_width',
            [
                'label'         => __(' Width', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em' ],
                'range'         => [
                    'px'    => [
                        'min'       => 0,
                        'max'       => 600
                    ],
                    'em'    => [
                        'min'       => 0,
                        'max'       => 30
                    ]
                ],
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}}  .premium-icon-list-divider:not(:last-child):after' => 'width:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}  .premium-icon-list-divider-inline:not(:last-child):after ' => 'border-left-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_divider'  => 'yes'
                ]
            ]
        );

        // Divider Height 
        $this->add_responsive_control(
            'list_divider_height',
            [
                'label'         => __(' Height', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em' ],
                'range'         => [
                    'px'    => [
                        'min'       => 0,
                        'max'       => 600
                    ],
                    'em'    => [
                        'min'       => 0,
                        'max'       => 30
                    ]
                ],
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}}  .premium-icon-list-divider:not(:last-child):after ' => 'border-top-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}  .premium-icon-list-divider-inline:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'show_divider'  => 'yes'
                ]
            ]
        );

        // Divider Color 
        $this->add_control(
            'list_divider_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'default' => '#ddd',
                'selectors'     => [
                    '{{WRAPPER}}  .premium-icon-list-divider:not(:last-child):after ' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}}  .premium-icon-list-divider-inline:not(:last-child):after ' => 'border-left-color: {{VALUE}};'
                ],
                'condition' => [
                    'show_divider'  => 'yes'
                ]
            ]
        );
        
        $this->end_controls_section();
        //End of divider style settings

        // Connector Style Settings
        $this->start_controls_section(
            'connector_style_section',
            [
                'label' => __( ' Connector ', 'premium-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'    => [
                    'layout_type' => 'column',
                    'icon_postion!'    => 'column',
                    'show_connector'  => 'yes',
                    'hover_effect_type!' => 'grow',
                    'list_overflow'  => 'visible',
                ]
            ]
        );        
        
        // Connector Style 
        $this->add_control(
            'icon_connector_type',
            [
                'label'         => __( 'Style', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'solid'         => __( 'Solid', 'premium-addons-for-elementor' ),
                    'double'        => __( 'Double', 'premium-addons-for-elementor' ),
                    'dashed'        => __( 'Dashed', 'premium-addons-for-elementor' ),
                    'dotted'        => __( 'Dotted', 'premium-addons-for-elementor' ),
                    'dashed'        => __( 'Dashed', 'premium-addons-for-elementor' ),
                    'groove'        => __( 'Groove', 'premium-addons-for-elementor' ),
                ],
                'default'       =>'solid',
                'selectors'     => [
                    '{{WRAPPER}} li.premium-icon-list-content:not(:last-of-type) .premium-icon-list-connector .premium-icon-connector-content:after ' => 'border-right-style: {{VALUE}};'
                ],
                'condition' => [
                    'show_connector'  => 'yes'
                ]
            ]
        );
        
        // Connector Width
        $this->add_responsive_control(
            'icon_connector_width',
            [
                'label'         => __(' Width', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em' ],
                'range'         => [
                    'px'    => [
                        'min'       => 0,
                        'max'       => 600
                    ],
                    'em'    => [
                        'min'       => 0,
                        'max'       => 30
                    ]
                ],
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}}  li.premium-icon-list-content:not(:last-of-type) .premium-icon-list-connector .premium-icon-connector-content:after' => 'border-right-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_connector'  => 'yes'
                ]
            ]
        );

        // Connector Height 
        $this->add_responsive_control(
            'icon_connector_height',
            [
                'label'         => __(' Height', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em' ],
                'default' => [
					'unit' => 'px',
					'size' => 28,
				],
                'range'         => [
                    'px'    => [
                        'min'       => 0,
                        'max'       => 600
                    ],
                    'em'    => [
                        'min'       => 0,
                        'max'       => 30
                    ]
                ],
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}}  li.premium-icon-list-content:not(:last-of-type) .premium-icon-list-connector .premium-icon-connector-content:after' => 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'show_connector'  => 'yes'
                ]
            ]
        );

        // Connector Color 
        $this->add_control(
            'icon_connector_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'default' => '#ddd',
                'selectors'     => [
                    '{{WRAPPER}}  li.premium-icon-list-content:not(:last-of-type) .premium-icon-list-connector .premium-icon-connector-content:after' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'show_connector'  => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
        //End of connector style settings

    }

    /**
	 * Render Bullet List output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 3.21.2
	 * @access protected
	 */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('box', 'class', 'premium-icon-list-box');

        if( $settings['hover_effect_type'] === 'blur'){

            $this->add_render_attribute('box', 'class', 'premium-icon-list-blur');

        }

        $animation_switch = $settings['premium_icon_list_animation_switcher'] ;

        if( 'yes' == $animation_switch) {

            $animation_class = $settings['premium_icon_list_animation'];

            if( '' != $settings['premium_icon_list_animation_duration'] ) {
                $animation_dur = 'animated-' . $settings['premium_icon_list_animation_duration'];
            } 
            else {
                $animation_dur = 'animated-';
            }

            $this->add_render_attribute( 'box', 'data-list-animation',
                [
                    $animation_class,
                    $animation_dur,
                ]
            );
        } 

        ?>
        <ul <?php echo $this->get_render_attribute_string('box');?>>
        <?php  

        $delay = 0;

		if ( $settings['list'] ) {
			foreach (  $settings['list'] as $index => $item ) {
                
                $textIcon  = $this->get_repeater_setting_key('list_text_icon','list', $index);

                $textBadge  = $this->get_repeater_setting_key('badge_title','list', $index);

                $this->add_inline_editing_attributes($textIcon, 'basic');

                $this->add_inline_editing_attributes($textBadge, 'basic');

                $item_link = 'link_' . $index;

                $separator_link_type = $item['link_select'];

                $link_url = ( 'url' ===  $separator_link_type ) ? $item['link']['url'] : get_permalink( $item['existing_page'] );

                if ( $item['show_list_link'] === 'yes' ) {

                    if( ! empty( $item['link']['is_external'] ) ) {
                        $this->add_render_attribute( $item_link, 'target', "_blank" );
                    }

                    if( ! empty( $item['link']['nofollow'] ) ) {
                        $this->add_render_attribute( $item_link, 'rel',  "nofollow" );
                    }

                    if( ! empty( $item['link']['url'] ) || ! empty( $item['existing_page'] ) ) {
                        $this->add_render_attribute( $item_link, 'href',  $link_url );
                    }
                }
                
                $lottie_key = 'icon_lottie_' . $index;

                if('lottie' === $item['icon_type']){
                    
                    $this->add_render_attribute( $lottie_key, [
                        'class' => 'premium-lottie-animation',
                        'data-lottie-url' => $item['lottie_url'],
                        'data-lottie-loop' => $item['lottie_loop'],
                        'data-lottie-reverse' => $item['lottie_reverse']
                    ]);
                }

                $list_content_key = 'content_index_' . $index;
                                
                $this->add_render_attribute( $list_content_key, 'class',
                    [
                        'premium-icon-list-content',
                        'elementor-repeater-item-' . $item['_id']
                    ]
                );
                if( 'yes' == $animation_switch) {

                    $this->add_render_attribute( $list_content_key, 'data-delay',
                        [
                            $delay
                        ]
                    );

                    $delay+=$settings['premium_icon_list_animation_delay']*1000;
                }
                if ( 'row' === $settings['layout_type'] ) {
                    $this->add_render_attribute( $list_content_key, 'class',
                        [
                            'premium-icon-list-content-inline',
                        ]
                    );  
                }

                if ( 'grow' === $settings['hover_effect_type'] ) {

                    $this->add_render_attribute( $list_content_key, 'class',
                        [
                            'premium-icon-list-content-grow-effect',
                        ]
                    );  
                }
                if ( 'column' === $settings['layout_type']) {

                    if('flex-start' === $settings['premium_icon_list_align'] ) {
                        $this->add_render_attribute( $list_content_key, 'class',
                            [
                                'premium-icon-list-content-grow-lc',
                            ]
                        );  
                    }
                    else if( 'flex-end' === $settings['premium_icon_list_align'] ) {
                        $this->add_render_attribute( $list_content_key, 'class',
                            [
                                'premium-icon-list-content-grow-rc',
                            ]
                        );  
                    }
                    else {
                        $this->add_render_attribute( $list_content_key, 'class',
                            [
                                'premium-icon-list-content-grow-cc',
                            ]
                        );  
                    }
                }
        ?>

            <li <?php echo $this->get_render_attribute_string( $list_content_key ); ?> >
            <?php 
                if ( 'yes' === $item['show_icon'] ) {

                    $wrapper_class = 'premium-icon-list-wrapper';

                    $this->add_render_attribute( 'wrapper', 'class', $wrapper_class );

                    if('column' === $settings['icon_postion']){

                        $wrapper_top_class = 'premium-icon-list-wrapper-top ';

                        $this->add_render_attribute( 'wrapper', 'class', $wrapper_top_class );

                    }

                    $gradient_effect_class =  'premium-icon-list-gradient-effect';

                    if ( $settings['hover_effect_type'] === 'linear gradient' ) {
                        $this->add_render_attribute( 'title', 'class',
                            [
                                $gradient_effect_class,
                            ]
                        );   
                    }
                    
            ?>  
                <div class="premium-icon-list-text">
                <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
                    <?php 
                    if ('yes' === $settings['show_connector'] && 'column' === $settings['layout_type'] && 'column' !== $settings['icon_postion'] && 'grow' !== $settings['hover_effect_type'] && 'visible' === $settings['list_overflow']) {
                    ?>
                    <div class="premium-icon-list-connector" >
                        <div class="premium-icon-connector-content"></div>
                    </div>
                    <?php
                    }
                    if ('icon' === $item['icon_type']) {
                            Icons_Manager::render_icon( $item['premium_icon_list_font_updated'], [ 'aria-hidden'   => 'true' ]);
                    } 
                    else if('text' === $item['icon_type']){ ?>
                    <div class="premium-icon-list-icon-text" >
                        <p  <?php echo  $this->get_render_attribute_string( $textIcon )  ?> ><?php echo $item['list_text_icon'] ;?></p>
                    </div>
                    <?php 
                    }
                    else if('image' === $item['icon_type']){

                        if( ! empty( $item['custom_image']['url'] ) ) {
                            echo '<img  src="' . $item['custom_image']['url'] . '">';  
                        }
                    }
                    else {                       
                        echo '<div '.$this->get_render_attribute_string( $lottie_key ).'></div>';  
                    }
                echo '</div>' ;
                }
                    ?>
                    <?php
                    echo '<span ' . $this->get_render_attribute_string( 'title' ) . '  data-text="'.strip_tags($item['list_title']) .'" > '.$item['list_title'] .' </span>';
                    ?> 
                </div>
                <?php
                    if('yes' === $item['show_badge']){
                ?>
                <div class="premium-icon-list-badge">
                    <span <?php echo $this->get_render_attribute_string( $textBadge ) ?>><?php echo $item['badge_title'] ?></span>
                </div>
                <?php 
                    }
                ?>
                <?php       
                if('yes' === $item['show_list_link']){
                ?>
                <a class="premium-icon-list-link" <?php echo  $this->get_render_attribute_string( $item_link )  ?> ></a>
                <?php } ?>
            </li>
            <?php
            if( 'yes' === $settings[ 'show_divider' ] ) {
                $layout = $settings['layout_type'];
                $divider_class = 'premium-icon-list-divider';
                if( 'row' === $layout )
                    $divider_class .='-inline';

                $this->add_render_attribute( 'divider', 'class', $divider_class );
            ?>
            <div <?php echo $this->get_render_attribute_string('divider'); ?>></div>                
            <?php 
                } 
            }
        }
            ?>
        </ul>
        <?php
        }

    /**
     * Render Bullet List widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 3.21.2
     * @access protected
     */
    protected function content_template() {
        ?>
        <#
        view.addRenderAttribute( 'box', 'class', 'premium-icon-list-box');

        if( 'blur' === settings.hover_effect_type){

            view.addRenderAttribute( 'box', 'class', 'premium-icon-list-blur');

        }
        
        animationSwitch = settings.premium_icon_list_animation_switcher ;
                
        if( 'yes' == animationSwitch  ) {

            animationClass = settings.premium_icon_list_animation;

            if( '' != settings.premium_icon_list_animation_duration ) {

                animationDur = 'animated-' + settings.premium_icon_list_animation_duration;

            } else {
                animationDur = 'animated-';
            }
            view.addRenderAttribute( 'box', 'data-list-animation',
                [
                    animationClass,
                    animationDur,
                ]
            );
        } 
        #>

        <ul {{{ view.getRenderAttributeString('box') }}}> 

            <# 
            var delay=0;
                
            _.each( settings.list, function( item ,index ) { 
                    
                var textIcon  = view.getRepeaterSettingKey( 'list_text_icon', 'list', index );
                var textBadge  = view.getRepeaterSettingKey( 'badge_title', 'list', index );

                view.addInlineEditingAttributes( textIcon, 'basic' );
                view.addInlineEditingAttributes( textBadge, 'basic' );

                var itemLink = 'link_' + index;

                var separatorLinkType, linkUrl, linkTitle;  

                separatorLinkType = item.link_select;

                linkUrl= 'url' ===  separatorLinkType  ? item.link.url : item.existing_page;
                
                if( 'yes' === item.show_list_link ) {
                    if( '' != item.link.is_external ) {
                        view.addRenderAttribute(itemLink, 'target', '_blank');
                    }
                    if( '' != item.link.nofollow ) {
                        view.addRenderAttribute(itemLink, 'rel', 'nofollow');
                    }
                    if( ('' != item.link.url) || ('' != item.existing_page) ) {
                        view.addRenderAttribute(itemLink, 'href', linkUrl);
                    }
                }

                var lottieKey = 'icon_lottie_' + index;

                if( 'lottie' === item.icon_type ) {
                    view.addRenderAttribute( lottieKey, {
                        'class':  'premium-lottie-animation',
                        'data-lottie-url': item.lottie_url,
                        'data-lottie-loop': item.lottie_loop,
                        'data-lottie-reverse': item.lottie_reverse
                    });

                }

                var listContentKey = 'content_index_' + index;

                view.addRenderAttribute( listContentKey, 'class',
                    [ 
                        'premium-icon-list-content' ,
                        'elementor-repeater-item-' + item._id
                    ]
                );
                if( 'yes' == animationSwitch  ) {

                    view.addRenderAttribute( listContentKey, 'data-delay',
                        [
                            delay
                        ]
                    );

                    delay+=settings.premium_icon_list_animation_delay*1000;
                }

                if ( 'row' === settings.layout_type ) {

                    view.addRenderAttribute( listContentKey, 'class',
                        [ 
                            'premium-icon-list-content-inline' 
                        ]
                    );

                }

                if ( 'grow' === settings.hover_effect_type ){

                    view.addRenderAttribute( listContentKey, 'class',
                        [ 
                            'premium-icon-list-content-grow-effect' 
                        ]
                    );
                    
                }
                if ( 'column' === settings.layout_type ) {
                    if('flex-start' === settings.premium_icon_list_align) {
                        view.addRenderAttribute( listContentKey, 'class',
                            [ 
                                'premium-icon-list-content-grow-lc' 
                            ]
                        );
                    }
                    else if( 'flex-end' === settings.premium_icon_list_align ) {
                        view.addRenderAttribute( listContentKey, 'class',
                            [ 
                                'premium-icon-list-content-grow-rc' 
                            ]
                        );
                    }
                    else {
                        view.addRenderAttribute( listContentKey, 'class',
                            [ 
                                'premium-icon-list-content-grow-cc' 
                            ]
                        );
                    }
                }

                var gradient_effect_class ='';

                if (settings.hover_effect_type === 'linear gradient'){

                    gradient_effect_class =  'premium-icon-list-gradient-effect';
                   
                }                
            #>
            <li  {{{ view.getRenderAttributeString( listContentKey ) }}}>
              
                <div class="premium-icon-list-text">
                <# if ( 'yes' === item.show_icon ) { 
                        var wrapper_top_class ;

                        if('column' === settings.icon_postion){
                            wrapper_top_class = 'premium-icon-list-wrapper-top';
                        }
                #>
                <div class="premium-icon-list-wrapper {{wrapper_top_class}}">
                    <#
                    if ('yes' === settings.show_connector && 'column' === settings.layout_type && 'column' !== settings.icon_postion && 'grow' !== settings.hover_effect_type && 'visible' === settings.list_overflow) {
                    #>
                    <div class="premium-icon-list-connector" >
                        <div class="premium-icon-connector-content"></div>
                    </div>
                    <# } 
                    if ( 'icon' == item.icon_type ) { 

                    var iconHTML = elementor.helpers.renderIcon( view, item.premium_icon_list_font_updated, {
                        'aria-hidden': true
                        }, 'i' , 'object' );

                    if ( iconHTML && iconHTML.rendered ) { #>
                        {{{ iconHTML.value }}}
                    <# 
                    } 
                    else { 
                    #>
                    <i class =" {{ item.premium_icon_list_font }} "></i>
                    <# } 
                    }
                    else if ( 'image' === item.icon_type ) { 
                        if ( item.custom_image.url ) {

                            var image = {
                                id: item.custom_image.id,
                                url: item.custom_image.url,
                                size: item.thumbnail_size,
                                dimension: item.thumbnail_custom_dimension,
                                model: view.getEditModel()
                            };

                            var image_url = elementor.imagesManager.getImageUrl( image );
                    #>
                    <img src="{{ image_url }}"/>
                    <#  
                        }
                    }
                    else if ( 'text' === item.icon_type) {
                    #>
                    <div class="premium-icon-list-icon-text">
                        <p {{{ view.getRenderAttributeString( textIcon ) }}}>{{{item.list_text_icon}}}</p>
                    </div>
                    <#    
                    }
                    else {  
                    #>
                    <div {{{ view.getRenderAttributeString( lottieKey) }}}></div>
                    <# 
                    }
                    #>
                </div>
                <#
                } 
                #>
                    <span class="{{{ gradient_effect_class }}}" data-text="{{{ item.list_title }}}" >{{{ item.list_title }}}</span>
                </div> 
                <# if ( 'yes' === item.show_badge ){ #>
                <div class="premium-icon-list-badge">
                    <span  {{{ view.getRenderAttributeString( textBadge ) }}} >{{{ item.badge_title }}}</span>
                </div>
                <# } #>
                <#
                if ( 'yes' === item.show_list_link ) {
                    linkType=item.link_select;

                    url = 'url' === linkType ? item.link.url : item.existing_page; 
                #>
                <a class="premium-icon-list-link" {{{ view.getRenderAttributeString( itemLink ) }}} ></a>
                <# } #>
            </li>
            <# 
            if( 'yes' === settings.show_divider ) {
                var dividerClass ='premium-icon-list-divider';
                if( 'row' === settings.layout_type ) {
                    dividerClass += '-inline';
                }
            #>
            <div class=" {{dividerClass}}"></div> 
            <# }
            }); 
            #>
        </ul> 
  
        <?php
    }

}