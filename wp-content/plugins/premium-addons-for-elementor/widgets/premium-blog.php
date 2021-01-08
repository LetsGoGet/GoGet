<?php

/**
 * Premium Banner.
 */
namespace PremiumAddons\Widgets;

// Elementor Classes.
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Box_Shadow;

// PremiumAddons Classes.	
use PremiumAddons\Includes\Premium_Template_Tags as Blog_Helper;
use PremiumAddons\Includes\Helper_Functions;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

/**
 * Class Premium_Blog
 */
class Premium_Blog extends Widget_Base {
    
    public function get_name() {
        return 'premium-addon-blog';
    }

    public function get_title() {
		return sprintf( '%1$s %2$s', Helper_Functions::get_prefix(), __('Blog', 'premium-addons-for-elementor') );
	}

    public function is_reload_preview_required() {
        return true;
    }
    
    public function get_style_depends() {
        return [
            'font-awesome-5-all',
            'premium-addons'
        ];
    }
    
    public function get_script_depends() {
        return [
            'isotope-js',
            'jquery-slick',
            'premium-addons'
        ];
    }

    public function get_icon() {
        return 'pa-blog';
    }
    
    public function get_keywords() {
		return [ 'posts', 'grid', 'item', 'loop', 'query', 'portfolio', 'cpt', 'custom' ];
	}

    public function get_categories() {
        return [ 'premium-elements' ];
    }
    
    
    public function get_custom_help_url() {
		return 'https://premiumaddons.com/support/';
	}

    /**
	 * Register Blog controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function _register_controls() {
        
        $this->start_controls_section('general_settings_section',
            [
                'label'         => __('General', 'premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('premium_blog_skin',
            [
                'label'         => __('Skin', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'classic'       => __('Classic', 'premium-addons-for-elementor'),
                    'modern'        => __('Modern', 'premium-addons-for-elementor'),
                    'cards'         => __('Cards', 'premium-addons-for-elementor'),
                    'side'          => __('On Side', 'premium-addons-for-elementor'),
                    'banner'        => __('Banner', 'premium-addons-for-elementor'),
                ],
                'default'       => 'classic',
                'label_block'   => true
            ]
        );

        $this->add_control('banner_skin_notice', 
            [
                'raw'               => __('If content height is larger than image height, then you may need to increase image height from Featured Image tab', 'premium-addons-for-elemeentor'),
                'type'              => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                'condition'     => [
                    'premium_blog_skin' => 'banner'
                ]
            ] 
        );

        $this->add_responsive_control('content_offset',	
            [	
                'label'         => __('Content Offset', 'premium-addons-for-elementor'),	
                'type'          => Controls_Manager::SLIDER,	
                'range'         => [	
                    'px'    => [	
                        'min'   => -100, 	
                        'max'   => 100,	
                    ],	
                ],	
                'condition'     => [	
                    'premium_blog_skin' =>  'modern',	
                ],	
                'selectors'     => [	
                    '{{WRAPPER}} .premium-blog-skin-modern .premium-blog-content-wrapper' => 'top: {{SIZE}}{{UNIT}}'	
                ]	
            ]	
        );
        
        $this->add_control('premium_blog_grid',
            [
                'label'         => __('Grid', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
            ]
        );
        
        $this->add_control('premium_blog_layout',
            [
                'label'             => __('Layout', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                    'even'      => __('Even', 'premium-addons-for-elementor'),
                    'masonry'   => __('Masonry', 'premium-addons-for-elementor'),
                ],
                'default'           => 'even',
                'condition'         => [
                    'premium_blog_grid' => 'yes'
                ]
            ]
        );
        
        $this->add_control('force_height',	
            [	
                'label'         => __('Equal Height', 'premium-addons-for-elementor'),	
                'type'          => Controls_Manager::SWITCHER,	
                'return_value'  => 'true',	
                'condition'         => [	
                    'premium_blog_grid' => 'yes',	
                    'premium_blog_layout' => 'even'	
                ]	
            ]	
        );	
		
        $this->add_control('force_height_notice', 	
            [	
                'raw'               => __('Equal Height option uses JS to force all content boxes to take the equal height, so you will need to make sure all featured images are the same height. You can set that from Featured Image tab.', 'premium-addons-for-elemeentor'),	
                'type'              => Controls_Manager::RAW_HTML,	
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',	
                'condition'         => [	
                    'premium_blog_grid' => 'yes',	
                    'premium_blog_layout' => 'even',	
                    'force_height'      => 'true'	
                ]	
            ] 	
        );

        $this->add_responsive_control('premium_blog_columns_number',
            [
                'label'         => __('Number of Columns', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    '50%'   => __('2 Columns', 'premium-addons-for-elementor'),
                    '33.33%'=> __('3 Columns', 'premium-addons-for-elementor'),
                    '25%'   => __('4 Columns', 'premium-addons-for-elementor'),
                    '20%'       => __( '5 Columns', 'premium-addons-for-elementor' ),
					'16.66%'    => __( '6 Columns', 'premium-addons-for-elementor' ),
                ],
                'default'       => '50%',
                'tablet_default'=> '50%',
                'mobile_default'=> '100%',
                'render_type'   => 'template',
                'label_block'   => true,
                'condition'     => [
                    'premium_blog_grid' =>  'yes',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-outer-container'  => 'width: {{VALUE}}'
                ],
            ]
        );
        
        $this->add_control('premium_blog_number_of_posts',
            [
                'label'         => __('Posts Per Page', 'premium-addons-for-elementor'),
                'description'   => __('Set the number of per page','premium-addons-for-elementor'),
                'type'          => Controls_Manager::NUMBER,
                'min'			=> 1,
                'default'		=> 4,
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('section_query_options',
            [
                'label'         => __('Query', 'premium-addons-for-elementor'),
            ]
        );

        $post_types = Blog_Helper::get_posts_types();

        $this->add_control('post_type_filter',
            [
                'label'       => __( 'Source', 'premium-addons-for-elementor' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $post_types,
                'default'     => 'post',
                'separator'   => 'after',
            ]
        );

		foreach ( $post_types as $key => $type ) {

			// Get all the taxanomies associated with the selected post type.
			$taxonomy = Blog_Helper::get_taxnomies( $key );
            
			if ( ! empty( $taxonomy ) ) {

				// Get all taxonomy values under the taxonomy.
				foreach ( $taxonomy as $index => $tax ) {

					$terms = get_terms( $index );

					$related_tax = array();

					if ( ! empty( $terms ) ) {

						foreach ( $terms as $t_index => $t_obj ) {

							$related_tax[ $t_obj->slug ] = $t_obj->name;
                        }

                        // Add filter rule for the each taxonomy
						$this->add_control( $index . '_' . $key . '_filter_rule',
							[
								'label'       => sprintf( __( '%s Filter Rule', 'premium-addons-for-elementor' ), $tax->label ),
								'type'        => Controls_Manager::SELECT,
								'default'     => 'IN',
								'label_block' => true,
								'options'     => array(
									'IN'     => sprintf( __( 'Match %s', 'premium-addons-for-elementor' ), $tax->label ),
									'NOT IN' => sprintf( __( 'Exclude %s', 'premium-addons-for-elementor' ), $tax->label ),
								),
								'condition'   => [
									'post_type_filter' => $key,
                                ]
                            ]
						);

						// Add select control for each taxonomy.
						$this->add_control( 'tax_' . $index . '_' . $key . '_filter',
							[
								'label'       => sprintf( __( '%s Filter', 'premium-addons-for-elementor' ), $tax->label ),
								'type'        => Controls_Manager::SELECT2,
                                'default'     => '',
                                'multiple'    => true,
								'label_block' => true,
								'options'     => $related_tax,
								'condition'   => array(
									'post_type_filter' => $key,
								),
								'separator'   => 'after',
                            ]
						);

					}
				}
			}
		}
        
        $this->add_control('author_filter_rule',
            [
                'label'       => __( 'Filter By Author Rule', 'premium-addons-for-elementor' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'author__in',
                'separator'     => 'before',
                'label_block' => true,
                'options'     => [
                    'author__in'     => __( 'Match Authors', 'premium-addons-for-elementor' ),
                    'author__not_in' => __( 'Exclude Authors', 'premium-addons-for-elementor' ),
                ]
            ]
        );
        
        $this->add_control('premium_blog_users',
            [
                'label'         => __( 'Authors', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Blog_Helper::get_authors(),        
            ]
        );
        
        $this->add_control('posts_filter_rule',
            [
                'label'       => __( 'Filter By Post Rule', 'premium-addons-for-elementor' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'post__not_in',
                'separator'     => 'before',
                'label_block' => true,
                'options'     => [
                    'post__in'     => __( 'Match Post', 'premium-addons-for-elementor' ),
                    'post__not_in' => __( 'Exclude Post', 'premium-addons-for-elementor' ),
                ]
            ]
        );
        
        $this->add_control('premium_blog_posts_exclude',
            [
                'label'         => __( 'Posts', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Blog_Helper::get_posts_list(),        
            ]
        );

        $this->add_control('ignore_sticky_posts',
            [
                'label'        => __( 'Ignore Sticky Posts', 'premium-addons-for-elementor' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'premium-addons-for-elementor' ),
                'label_off'    => __( 'No', 'premium-addons-for-elementor' ),
                'default'      => 'yes',
            ]
        );
        
        $this->add_control('premium_blog_offset',
			[
				'label'         => __( 'Offset', 'premium-addons-for-elementor' ),
                'description'   => __('This option is used to exclude number of initial posts from being display.','premium-addons-for-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
                'default' 		=> '0',
				'min' 			=> '0',
			]
        );
        
        $this->add_control('query_exclude_current',
            [
                'label'        => __( 'Exclude Current Post', 'premium-addons-for-elementor' ),
                'type'         => Controls_Manager::SWITCHER,
                'description'  => __( 'This option will remove the current post from the query.', 'premium-addons-for-elementor' ),
                'label_on'     => __( 'Yes', 'premium-addons-for-elementor' ),
                'label_off'    => __( 'No', 'premium-addons-for-elementor' ),
            ]
        );
        
        $this->add_control('premium_blog_order_by',
            [
                'label'         => __( 'Order By', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT,
                'separator'     => 'before',
                'label_block'   => true,
                'options'       => [
                    'none'  => __('None', 'premium-addons-for-elementor'),
                    'ID'    => __('ID', 'premium-addons-for-elementor'),
                    'author'=> __('Author', 'premium-addons-for-elementor'),
                    'title' => __('Title', 'premium-addons-for-elementor'),
                    'name'  => __('Name', 'premium-addons-for-elementor'),
                    'date'  => __('Date', 'premium-addons-for-elementor'),
                    'modified'=> __('Last Modified', 'premium-addons-for-elementor'),
                    'rand'  => __('Random', 'premium-addons-for-elementor'),
                    'comment_count'=> __('Number of Comments', 'premium-addons-for-elementor'),
                ],
                'default'       => 'date'
            ]
        );
        
        $this->add_control('premium_blog_order',
            [
                'label'         => __( 'Order', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    'DESC'  => __('Descending', 'premium-addons-for-elementor'),
                    'ASC'   => __('Ascending', 'premium-addons-for-elementor'),
                ],
                'default'       => 'DESC'
            ]
        );
            
        $this->end_controls_section();

        $this->start_controls_section('premium_blog_general_settings',
            [
                'label'         => __('Featured Image', 'premium-addons-for-elementor'),
            ]
        );

        $this->add_control('show_featured_image',	
            [	
                'label'         => __('Show Featured Image', 'premium-addons-for-elementor'),	
                'type'          => Controls_Manager::SWITCHER,	
                'default'       => 'yes',
                'condition'	        => [
                    'premium_blog_skin!' => 'banner'
                ]
            ]	
        );	
		
        $featured_image_conditions = array(	
            'show_featured_image'   => 'yes'	
        );
        
        $this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'featured_image',
                'default' => 'full',
                'condition' => $featured_image_conditions
			]
		);
        
        $this->add_control('premium_blog_hover_color_effect',
            [
                'label'         => __('Overlay Effect', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'description'   => __('Choose an overlay color effect','premium-addons-for-elementor'),
                'options'       => [
                    'none'     => __('None', 'premium-addons-for-elementor'),
                    'framed'   => __('Framed', 'premium-addons-for-elementor'),
                    'diagonal' => __('Diagonal', 'premium-addons-for-elementor'),
                    'bordered' => __('Bordered', 'premium-addons-for-elementor'),
                    'squares'  => __('Squares', 'premium-addons-for-elementor'),
                ],
                'default'       => 'framed',
                'label_block'   => true,
                'condition'     => array_merge( $featured_image_conditions, [	
                    'premium_blog_skin' => ['modern', 'cards']
                ])
            ]
        );
        
        $this->add_control('premium_blog_hover_image_effect',
            [
                'label'         => __('Hover Effect', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'description'   => __('Choose a hover effect for the image','premium-addons-for-elementor'),
                'options'       => [
                    'none'   => __('None', 'premium-addons-for-elementor'),
                    'zoomin' => __('Zoom In', 'premium-addons-for-elementor'),
                    'zoomout'=> __('Zoom Out', 'premium-addons-for-elementor'),
                    'scale'  => __('Scale', 'premium-addons-for-elementor'),
                    'gray'   => __('Grayscale', 'premium-addons-for-elementor'),
                    'blur'   => __('Blur', 'premium-addons-for-elementor'),
                    'bright' => __('Bright', 'premium-addons-for-elementor'),
                    'sepia'  => __('Sepia', 'premium-addons-for-elementor'),
                    'trans'  => __('Translate', 'premium-addons-for-elementor'),
                ],
                'default'       => 'zoomin',
                'label_block'   => true,
                'condition' => $featured_image_conditions
            ]
        );

        $this->add_responsive_control('thumb_width',
            [
                'label'         => __('Width (%)', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'default'       => [
                    'size' => '25'
                ],
                'condition'     => array_merge( $featured_image_conditions, [	
                    'premium_blog_skin' => 'side'
                ] ),
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-thumb-effect-wrapper' => 'flex-basis: {{SIZE}}%'
                ]
            ]
        );
        
        $this->add_responsive_control('premium_blog_thumb_min_height',
            [
                'label'         => __('Height', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em'],
                'range'         => [
                    'px'    => [
                        'min'   => 0, 
                        'max'   => 600,
                    ],
                    'em'    => [
                        'min'   => 1, 
                        'max'   => 60,
                    ],
                ],
                'condition'     => array_merge( $featured_image_conditions ),
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-thumbnail-container img' => 'height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control('premium_blog_thumbnail_fit',
            [
                'label'         => __('Thumbnail Fit', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'cover'  => __('Cover', 'premium-addons-for-elementor'),
                    'fill'   => __('Fill', 'premium-addons-for-elementor'),
                    'contain'=> __('Contain', 'premium-addons-for-elementor'),
                ],
                'default'       => 'cover',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-thumbnail-container img' => 'object-fit: {{VALUE}}'
                ],
                'condition'     => array_merge( $featured_image_conditions ),
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_content_settings',
            [
                'label'         => __('Display Options', 'premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('premium_blog_title_tag',
			[
				'label'			=> __( 'Title HTML Tag', 'premium-addons-for-elementor' ),
				'description'	=> __( 'Select a heading tag for the post title.', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h2',
				'options'       => [
                    'h1'    => 'H1',
                    'h2'    => 'H2',
                    'h3'    => 'H3',
                    'h4'    => 'H4',
                    'h5'    => 'H5',
                    'h6'    => 'H6',
                    'div'   => 'div',
                    'span'  => 'span',
                    'p'     => 'p',
                ],
				'label_block'	=> true,
			]
		);
        
        $this->add_responsive_control('premium_blog_posts_columns_spacing',
            [
                'label'         => __('Rows Spacing', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%', "em"],
                'range'         => [
                    'px'    => [
                        'min'   => 1, 
                        'max'   => 200,
                    ],
                ],
                'default'       => [
                    'size' => 5,
                    'unit' => 'px'
				],
                'render_type'   => 'template',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-outer-container' => 'margin-bottom: {{SIZE}}{{UNIT}}'
                ]
            ]
        );
        
        $this->add_responsive_control('premium_blog_posts_spacing',
            [
                'label'         => __('Columns Spacing', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'default'       => [
					'size' => 5,
				],
                'range'         => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
                'selectors'     => [
					'{{WRAPPER}} .premium-blog-post-outer-container' => 'padding-right: calc( {{SIZE}}{{UNIT}}/2 ); padding-left: calc( {{SIZE}}{{UNIT}}/2 )',
					'{{WRAPPER}} .premium-blog-wrap' => 'margin-left: calc( -{{SIZE}}{{UNIT}}/2 ); margin-right: calc( -{{SIZE}}{{UNIT}}/2 );',
				],
                'condition'     => [
                    'premium_blog_grid'   => 'yes'
                ],
            ]
        );
        
        $this->add_responsive_control('premium_flip_text_align',
            [
                'label'         => __( 'Alignment', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'=> __( 'Left', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title'=> __( 'Center', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title'=> __( 'Right', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
				],
				'toggle'		=> false,
				'default'       => 'left',
				'prefix_class'	=> 'premium-blog-align-',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-content-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control('content_vertical_alignment',
            [
                'label'         => __( 'Vertical Alignment', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'    => [
                        'title' => __( 'Top', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-long-arrow-up',
                    ],
                    'center'        => [
                        'title' => __( 'Center', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                    'flex-end'      => [
                        'title' => __( 'Bottom', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-long-arrow-down',
                    ],
                ],
                'default'       => 'flex-end',
                'toggle'        => false,
                'condition'     => [
                    'premium_blog_skin'     => 'banner',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-content-wrapper' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_posts_options',
            [
                'label'         => __('Post Options', 'premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('premium_blog_excerpt',
            [
                'label'         => __('Show Post Content', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
            ]
        );
        
        $this->add_control('content_source',
            [
                'label'         => __('Get Content From', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'excerpt'       => __('Post Excerpt', 'premium-addons-for-elementor'),
                    'full'          => __('Post Full Content', 'premium-addons-for-elementor'),
                ],
                'default'       => 'excerpt',
                'label_block'   => true,
                'condition'     => [
                    'premium_blog_excerpt'  => 'yes',
                ]
            ]
        );

        $this->add_control('premium_blog_excerpt_length',
            [
                'label'         => __('Excerpt Length', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::NUMBER,
                'description'   => __('Excerpt is used for article summary with a link to the whole entry. The default except length is 55','premium-addons-for-elementor'),
                'default'       => 22,
                'condition'     => [
                    'premium_blog_excerpt'  => 'yes',
                    'content_source'        => 'excerpt'
                ]
            ]
        );
        
        $this->add_control('premium_blog_excerpt_type',
            [
                'label'         => __('Excerpt Type', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'dots'   => __('Dots', 'premium-addons-for-elementor'),
                    'link'   => __('Link', 'premium-addons-for-elementor'),
                ],
                'default'       => 'dots',
                'label_block'   => true,
                'condition'     => [
                    'premium_blog_excerpt'  => 'yes',
                ]
            ]
        );
        
        $this->add_control('read_more_full_width',
            [
                'label'         => __('Full Width', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'prefix_class'  => 'premium-blog-cta-full-',
                'condition'     => [
                    'premium_blog_excerpt'      => 'yes',
                    'premium_blog_excerpt_type' => 'link'
                ]
            ]
        );

        $this->add_control('premium_blog_excerpt_text',
			[
				'label'			=> __( 'Read More Text', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::TEXT,
                'default'   => __( 'Read More »', 'premium-addons-for-elementor' ),
                'condition'     => [
                    'premium_blog_excerpt'      => 'yes',
                    'premium_blog_excerpt_type' => 'link'
                ]
			]
		);
        
        $this->add_control('premium_blog_author_meta',
            [
                'label'         => __('Author Meta', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
            ]
        );
        
        $this->add_control('premium_blog_date_meta',
            [
                'label'         => __('Date Meta', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
            ]
        );
        
        $this->add_control('premium_blog_categories_meta',
            [
                'label'         => __('Categories Meta', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'description'   => __('Display or hide categories meta','premium-addons-for-elementor'),
                'default'       => 'yes',
            ]
        );

        $this->add_control('premium_blog_comments_meta',
            [
                'label'         => __('Comments Meta', 'premium-addons-for-elementor'),
                'description'   => __('Display or hide comments meta','premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
            ]
        );
        
        $this->add_control('premium_blog_tags_meta',
            [
                'label'         => __('Tags Meta', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'description'   => __('Display or hide post tags','premium-addons-for-elementor'),
            ]
        );
        
        // $this->add_control('premium_blog_post_format_icon',
        //     [
        //         'label'         => __( 'Post Format Icon', 'premium-addons-for-elementor' ),
        //         'type'          => Controls_Manager::SWITCHER,
        //         'description'   => __( 'Please note that post format icon is hidden for 3 and 4 columns', 'premium-addons-for-elementor' ),
		// 		'default'       => 'yes',
		// 		'prefix_class'	=> 'premium-blog-format-icon-',
		// 		'render_type'	=> 'template'
        //     ]
        // );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_advanced_settings',
            [
                'label'         => __('Advanced Settings', 'premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('premium_blog_cat_tabs',
            [
                'label'         => __('Filter Tabs', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'condition'     => [
                    'premium_blog_carousel!'  => 'yes'
                ]
            ]
        );
        
        $this->add_control('filter_tabs_type',
            [
                'label'       => __( 'Get Tabs From', 'premium-addons-for-elementor' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'category',
                'label_block' => true,
                'options'     => [
                    'category'    => __( 'Categories', 'premium-addons-for-elementor' ),
                    'tag'          => __( 'Tags', 'premium-addons-for-elementor' ),
                ],
                'condition'     => [
                    'premium_blog_cat_tabs'     => 'yes',
                    'premium_blog_carousel!'    => 'yes'
                ]
            ]
        );
        
        $this->add_control('filter_tabs_notice', 
            [
                'raw'               => __('Please make sure to select the categories/tags you need to show from Query tab.', 'premium-addons-for-elemeentor'),
                'type'              => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                'condition'     => [
                    'premium_blog_cat_tabs'     => 'yes',
                    'premium_blog_carousel!'    => 'yes'
                ]
            ] 
        );
        
        $this->add_control('premium_blog_tab_label',
			[
				'label'			=> __( 'First Tab Label', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::TEXT,
                'default'       => __('All', 'premium-addons-for-elementor'),
                'condition'     => [
                    'premium_blog_cat_tabs'     => 'yes',
                    'premium_blog_carousel!'    => 'yes'
                ]
			]
		);
        
        $this->add_responsive_control('premium_blog_filter_align',
            [
                'label'         => __( 'Alignment', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'    => [
                        'title' => __( 'Left', 'premium-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'        => [
                        'title' => __( 'Center', 'premium-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end'      => [
                        'title' => __( 'Right', 'premium-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'       => 'center',
                'toggle'        => false,
                'condition'     => [
                    'premium_blog_cat_tabs'     => 'yes',
                    'premium_blog_carousel!'    => 'yes'
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-filter' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control('premium_blog_new_tab',
            [
                'label'         => __('Links in New Tab', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'description'   => __('Enable links to be opened in a new tab','premium-addons-for-elementor'),
                'default'       => 'yes',
            ]
        );
 
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_carousel_settings',
            [
                'label'         => __('Carousel', 'premium-addons-for-elementor'),
                'condition'     => [
                    // 'premium_blog_grid' => 'yes',
                    'premium_blog_paging!'      => 'yes',
                ]
            ]
        );
        
        $this->add_control('premium_blog_carousel',
            [
                'label'         => __('Enable Carousel', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER
            ]
        );
        
        $this->add_control('premium_blog_carousel_fade',
            [
                'label'         => __('Fade', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'condition'     => [
                    'premium_blog_carousel'  => 'yes',
                    'premium_blog_columns_number' => '100%'
                ]
            ]
        );
        
        $this->add_control('premium_blog_carousel_play',
            [
                'label'         => __('Auto Play', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'condition'     => [
                    'premium_blog_carousel'  => 'yes',
                ]
            ]
        );

        $this->add_control('slides_to_scroll',
			[
				'label'			=> __( 'Slides To Scroll', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::NUMBER,
				'condition'		=> [
					'premium_blog_carousel' => 'yes',
				],
			]
        );
        
        $this->add_control('premium_blog_carousel_autoplay_speed',
			[
				'label'			=> __( 'Autoplay Speed', 'premium-addons-for-elementor' ),
				'description'	=> __( 'Autoplay Speed means at which time the next slide should come. Set a value in milliseconds (ms)', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::NUMBER,
				'default'		=> 5000,
				'condition'		=> [
					'premium_blog_carousel' => 'yes',
                    'premium_blog_carousel_play' => 'yes',
				],
			]
        );
        
        $this->add_control('premium_blog_carousel_center',
            [
                'label'         => __('Center Mode', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'condition'     => [
                    'premium_blog_carousel' => 'yes',
                ]
            ]
        );

        $this->add_control('premium_blog_carousel_spacing',
			[
				'label' 		=> __( 'Slides\' Spacing', 'premium-addons-for-elementor' ),
                'description'   => __('Set a spacing value in pixels (px)', 'premium-addons-for-elementor'),
				'type'			=> Controls_Manager::NUMBER,
                'default'		=> '15',
                'condition'     => [
                    'premium_blog_carousel' => 'yes',
                ]
			]
		);
        
        $this->add_control('premium_blog_carousel_dots',
            [
                'label'         => __('Navigation Dots', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'condition'     => [
                    'premium_blog_carousel'  => 'yes'
                ]
            ]
        );
        
        $this->add_control('premium_blog_carousel_arrows',
            [
                'label'         => __('Navigation Arrows', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'condition'     => [
                    'premium_blog_carousel'  => 'yes'
                ]
            ]
        );
        
        $this->add_responsive_control('premium_blog_carousel_arrows_pos',
            [
                'label'         => __('Arrows Position', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', "em"],
                'range'         => [
                    'px'    => [
                        'min'       => -100, 
                        'max'       => 100,
                    ],
                    'em'    => [
                        'min'       => -10, 
                        'max'       => 10,
                    ],
                ],
                'condition'		=> [
					'premium_blog_carousel'         => 'yes',
                    'premium_blog_carousel_arrows'  => 'yes'
				],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-wrap a.carousel-arrow.carousel-next' => 'right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .premium-blog-wrap a.carousel-arrow.carousel-prev' => 'left: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_pagination_section',
            [
                'label'         => __('Pagination', 'premium-addons-for-elementor'),
                'condition'     => [
                    'premium_blog_carousel!'      => 'yes',
                ]
            ]
        );
        
        $this->add_control('premium_blog_paging',
            [
                'label'         => __('Enable Pagination', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'description'   => __('Pagination is the process of dividing the posts into discrete pages','premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('max_pages',
            [
                'label'     => __( 'Page Limit', 'premium-addons-for-elementor' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 5,
                'condition'     => [
                    'premium_blog_paging'      => 'yes',
                ]
            ]
        );
        
        $this->add_control('pagination_strings',
            [
                'label'         => __('Enable Pagination Next/Prev Strings', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'condition'     => [
                    'premium_blog_paging'   => 'yes'
                ]
            ]
        );
        
        $this->add_control('premium_blog_prev_text',
			[
				'label'			=> __( 'Previous Page String', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::TEXT,
                'default'       => __('Previous','premium-addons-for-elementor'),
                'condition'     => [
                    'premium_blog_paging'   => 'yes',
                    'pagination_strings'    => 'yes'
                ]
			]
		);

        $this->add_control('premium_blog_next_text',
			[
				'label'			=> __( 'Next Page String', 'premium-addons-for-elementor' ),
				'type'			=> Controls_Manager::TEXT,
                'default'       => __('Next','premium-addons-for-elementor'),
                'condition'     => [
                    'premium_blog_paging'   => 'yes',
                    'pagination_strings'    => 'yes'
                ]
			]
		);
        
        $this->add_responsive_control('premium_blog_pagination_align',
            [
                'label'         => __( 'Alignment', 'premium-addons-for-elementor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'=> __( 'Left', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title'=> __( 'Center', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title'=> __( 'Right', 'premium-addons-for-elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default'       => 'right',
                'toggle'        => false,
                'condition'     => [
                    'premium_blog_paging'      => 'yes',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container' => 'text-align: {{VALUE}}',
                ]
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section('premium_blog_filter_style',
            [
                'label'     => __('Filter','premium-addons-for-elementor'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'premium_blog_cat_tabs'    => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'premium_blog_filter_typo',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .premium-blog-filters-container li a.category',
            ]
        );

        $this->start_controls_tabs('tabs_filter');

        $this->start_controls_tab('tab_filter_normal',
            [
                'label'         => __('Normal', 'premium-addons-for-elementor'),
            ]
        );

        $this->add_control('premium_blog_filter_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-filters-container li a.category span' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control('premium_blog_background_color',
           [
               'label'         => __('Background Color', 'premium-addons-for-elementor'),
               'type'          => Controls_Manager::COLOR,
               'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
               'selectors'     => [
                   '{{WRAPPER}} .premium-blog-filters-container li a.category' => 'background-color: {{VALUE}};',
               ],
           ]
       );

       $this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'              => 'premium_blog_filter_border',
                'selector'          => '{{WRAPPER}} .premium-blog-filters-container li a.category',
            ]
        );

        $this->add_control('premium_blog_filter_border_radius',
            [
                'label'             => __('Border Radius', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => ['px','em','%'],
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-filters-container li a.category'  => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'separator'         => 'after'
            ]
        );

       $this->end_controls_tab();

       $this->start_controls_tab('tab_filter_active',
            [
                'label'         => __('Active', 'premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('premium_blog_filter_active_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-filters-container li a.active span' => 'color: {{VALUE}};',
                ]
            ]
        );
        
        $this->add_control('premium_blog_background_active_color',
            [
               'label'         => __('Background Color', 'premium-addons-for-elementor'),
               'type'          => Controls_Manager::COLOR,
               'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                   '{{WRAPPER}} .premium-blog-filters-container li a.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'              => 'filter_active_border',
                'selector'          => '{{WRAPPER}} .premium-blog-filters-container li a.active',
            ]
        );

        $this->add_control('filter_active_border_radius',
            [
                'label'             => __('Border Radius', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => ['px','em','%'],
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-filters-container li a.active'  => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
                'separator'         => 'after'
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'premium_blog_filter_shadow',
                'selector'      => '{{WRAPPER}} .premium-blog-filters-container li a.category'
            ]
        );
        
        $this->add_responsive_control('premium_blog_filter_margin',
                [
                    'label'             => __('Margin', 'premium-addons-for-elementor'),
                    'type'              => Controls_Manager::DIMENSIONS,
                    'size_units'        => ['px', 'em', '%'],
                    'selectors'             => [
                        '{{WRAPPER}} .premium-blog-filters-container li a.category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control('premium_blog_filter_padding',
                [
                    'label'             => __('Padding', 'premium-addons-for-elementor'),
                    'type'              => Controls_Manager::DIMENSIONS,
                    'size_units'        => ['px', 'em', '%'],
                'selectors'             => [
                    '{{WRAPPER}} .premium-blog-filters-container li a.category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_image_style_section',
            [
                'label'         => __('Image', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => $featured_image_conditions
            ]
        );
        
        $this->add_control('premium_blog_plus_color',
            [
                'label'         => __('Plus Sign Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-thumbnail-container:before, {{WRAPPER}} .premium-blog-thumbnail-container:after' => 'background-color: {{VALUE}} !important',
                ],
                'condition'     => [
                    'premium_blog_skin' => [ 'modern', 'cards' ]
                ]
            ]
        );
        
        $this->add_control('premium_blog_overlay_color',
            [
                'label'         => __('Overlay Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-framed-effect, {{WRAPPER}} .premium-blog-bordered-effect,{{WRAPPER}} .premium-blog-squares-effect:before,{{WRAPPER}} .premium-blog-squares-effect:after,{{WRAPPER}} .premium-blog-squares-square-container:before,{{WRAPPER}} .premium-blog-squares-square-container:after, {{WRAPPER}} .premium-blog-thumbnail-overlay' => 'background-color: {{VALUE}};',
                ]
            ]
        );
        
        $this->add_control('premium_blog_border_effect_color',
            [
                'label'         => __('Border Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'condition'     => [
                    'premium_blog_hover_color_effect'  => 'bordered',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-link:before, {{WRAPPER}} .premium-blog-post-link:after' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} .premium-blog-thumbnail-container img',
            ]
        );
        
        $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'      => 'hover_css_filters',
                'label'     => __('Hover CSS Filters', 'premium-addons-for-elementor'),
				'selector'  => '{{WRAPPER}} .premium-blog-post-container:hover .premium-blog-thumbnail-container img'
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_title_style_section',
            [
                'label'         => __('Title', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'premium_blog_title_typo',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .premium-blog-entry-title, {{WRAPPER}} .premium-blog-entry-title a',
            ]
        );
        
        $this->add_control('premium_blog_title_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-entry-title a'  => 'color: {{VALUE}};',
                ]
            ]
        );
        
        $this->add_control('premium_blog_title_hover_color',
            [
                'label'         => __('Hover Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-entry-title:hover a'  => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_responsive_control('title_spacing',
            [
                'label'             => __('Bottom Spacing', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => ['px', 'em', '%'],
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-entry-title'  => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section('post_categories_style_section',
            [
                'label'         => __('Categories', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'premium_blog_skin' => [ 'side', 'banner' ],
                    'premium_blog_categories_meta' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'category_typography',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_2,
                'selector'      => '{{WRAPPER}} .premium-blog-cats-container a',
            ]
        );
        
        $repeater = new REPEATER();

        $repeater->add_control('category_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}'  => 'color: {{VALUE}}',
                ]
            ]
        );

        $repeater->add_control('category_hover_color',
            [
                'label'         => __('Hover Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover'  => 'color: {{VALUE}}',
                ]
            ]
        );
        
        $repeater->add_control('category_background_color',
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}'  => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $repeater->add_control('category_hover_background_color',
            [
                'label'         => __('Hover Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover'  => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'              => 'category_border',
                'selector'          => '{{WRAPPER}} {{CURRENT_ITEM}}',
            ]
        );

        $repeater->add_control('category_border_radius',
            [
                'label'             => __('Border Radius', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => ['px','em','%'],
                'selectors'         => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}'  => 'border-radius: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
		
        $this->add_control('categories_repeater',
            [
                'label'         => __('Categories', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'default'       => [
                    [
                        'category_background_color'   => '',
                    ],
                ],
                'render_type'   => 'ui',
                'condition'     => [
                    'premium_blog_skin' => [ 'side', 'banner' ],
                    'premium_blog_categories_meta' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control('categories_margin',
            [
                'label'         => __('Margin', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-cats-container a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        $this->add_responsive_control('categories_padding',
            [
                'label'         => __('Padding', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-cats-container a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_meta_style_section',
            [
                'label'         => __('Metadata', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'premium_blog_meta_typo',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_2,
                'selector'      => '{{WRAPPER}} .premium-blog-meta-data',
            ]
        );
        
        $this->add_control('premium_blog_meta_color',
            [
                'label'         => __('Metadata Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-meta-data > *'  => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control('premium_blog_meta_hover_color',
            [
                'label'         => __('Links Hover Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-meta-data:not(.premium-blog-post-time):hover > *'  => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control('separator_color',
            [
                'label'         => __('Separator Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'separator'     => 'before',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-meta-separator'  => 'color: {{VALUE}}',
                ]
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_content_style_section',
            [
                'label'         => __('Content Box', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'premium_blog_content_typo',
				'selector'      => '{{WRAPPER}} .premium-blog-post-content',
				'condition'		=> [
					'content_source'	=> 'excerpt'
				]
            ]
        );
        
        $this->add_control('premium_blog_post_content_color',
            [
                'label'         => __('Text Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-content'  => 'color: {{VALUE}};',
				],
				'condition'		=> [
					'content_source'	=> 'excerpt'
				]
            ]
        );

        $this->add_responsive_control('excerpt_text_margin',
            [
                'label'         => __('Text Margin', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'		=> [
					'content_source'	=> 'excerpt'
				]
            ]
        );
        
        $this->add_control('premium_blog_content_background_color',
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'separator'     => 'before',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-content-wrapper'  => 'background-color: {{VALUE}};',
                ],
                'condition'         => [
                    'premium_blog_skin!' => 'banner'
                ]
            ]
        );

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'              => 'premium_blog_content_background_color',
                'types'             => [ 'classic', 'gradient' ],
                'selector'          => '{{WRAPPER}} .premium-blog-content-wrapper',
                'condition'         => [
                    'premium_blog_skin' => 'banner'
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'premium_blog_box_shadow',
                'selector'      => '{{WRAPPER}} .premium-blog-content-wrapper',
            ]
        );
        
        $this->add_responsive_control('prmeium_blog_content_margin',
            [
                'label'         => __('Margin', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-content-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        $this->add_responsive_control('prmeium_blog_content_padding',
            [
                'label'         => __('Padding', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section('premium_blog_read_more_style',
            [
                'label'         => __('Button', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'premium_blog_excerpt'      => 'yes',
                    'premium_blog_excerpt_type' => 'link'
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'premium_blog_read_more_typo',
                'selector'      => '{{WRAPPER}} .premium-blog-excerpt-link',
            ]
        );
        
        $this->add_responsive_control('read_more_spacing',
            [
                'label'             => __('Spacing', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-excerpt-link'  => 'margin-top: {{SIZE}}px',
                ]
            ]
        );
        
        $this->start_controls_tabs('read_more_style_tabs');
        
        $this->start_controls_tab('read_more_tab_normal',
            [
                'label'         => __('Normal', 'premium-addons-for-elementor'),
                
            ]
        );
        
         $this->add_control('premium_blog_read_more_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-excerpt-link'  => 'color: {{VALUE}};',
                ]
            ]
        );
         
        $this->add_control('read_more_background_color',
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-excerpt-link'  => 'background-color: {{VALUE}};',
                ]
            ]
		);
		
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'              => 'read_more_border',
                'selector'          => '{{WRAPPER}} .premium-blog-excerpt-link',
            ]
        );

        $this->add_control('read_more_border_radius',
            [
                'label'             => __('Border Radius', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => ['px','em','%'],
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-excerpt-link'  => 'border-radius: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('read_more_tab_hover',
            [
                'label'         => __('Hover', 'premium-addons-for-elementor'),
            ]
        );
        
        $this->add_control('premium_blog_read_more_hover_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-excerpt-link:hover'  => 'color: {{VALUE}};',
                ]
            ]
        );
        
        $this->add_control('read_more_hover_background_color',
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-excerpt-link:hover'  => 'background-color: {{VALUE}};',
                ]
            ]
		);
		
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'              => 'read_more_hover_border',
                'selector'          => '{{WRAPPER}} .premium-blog-excerpt-link:hover',
            ]
        );

        $this->add_control('read_more_hover_border_radius',
            [
                'label'             => __('Border Radius', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => ['px','em','%'],
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-excerpt-link:hover'  => 'border-radius: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->add_responsive_control('read_more_padding',
            [
                'label'             => __('Padding', 'premium-addons-for-elementor'),
                'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => ['px', 'em', '%'],
				'separator'         => 'before',
                'selectors'         => [
                    '{{WRAPPER}} .premium-blog-excerpt-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section('premium_blog_tags_style_section',
            [
                'label'         => __('Tags', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'premium_blog_tags_typo',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_2,
                'selector'      => '{{WRAPPER}} .premium-blog-post-tags-container',
            ]
        );

        $this->add_control('premium_blog_tags_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-tags-container'  => 'color: {{VALUE}}',
                ]
            ]
        );
        
        $this->add_control('premium_blog_tags_hoer_color',
            [
                'label'         => __('Hover Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-tags-container a:hover'  => 'color: {{VALUE}}',
                ]
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_box_style_section',
            [
                'label'         => __('Box', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control('premium_blog_box_background_color',
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#f5f5f5',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-container'  => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'          => 'box_border',
                'selector'      => '{{WRAPPER}} .premium-blog-post-container',
            ]
        );
        
        $this->add_control('box_border_radius',
            [
                'label'         => __('Border Radius', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px','em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-container' => 'border-radius: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control('prmeium_blog_box_padding',
            [
                'label'         => __('Spacing', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-outer-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        $this->add_responsive_control('prmeium_blog_inner_box_padding',
            [
                'label'         => __('Padding', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-post-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('premium_blog_pagination_Style',
            [
                'label'         => __('Pagination', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'premium_blog_paging'   => 'yes',
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'premium_blog_pagination_typo',
                'selector'          => '{{WRAPPER}} .premium-blog-pagination-container > .page-numbers',
            ]
        );
        
        $this->start_controls_tabs('premium_blog_pagination_colors');
        
        $this->start_controls_tab('premium_blog_pagination_nomral',
            [
                'label'         => __('Normal', 'premium-addons-for-elementor'),
                
            ]
        );
        
        $this->add_control('prmeium_blog_pagination_color', 
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers' => 'color: {{VALUE}};'
                ]
            ]
        );
        
        $this->add_control('prmeium_blog_pagination_back_color', 
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers' => 'background-color: {{VALUE}};'
                ]
            ]
		);
		
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'          => 'navigation_border',
                'separator'     => 'before',
                'selector'      => '{{WRAPPER}} .premium-blog-pagination-container .page-numbers',
            ]
        );
        
        $this->add_control('navigation_border_radius',
            [
                'label'         => __('Border Radius', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers' => 'border-radius: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('premium_blog_pagination_hover',
            [
                'label'         => __('Hover', 'premium-addons-for-elementor'),
                
            ]
        );
        
        $this->add_control('prmeium_blog_pagination_hover_color', 
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers:hover' => 'color: {{VALUE}};'
                ]
            ]
        );
        
        $this->add_control('prmeium_blog_pagination_back_hover_color', 
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers:hover' => 'background-color: {{VALUE}};'
                ]
            ]
		);
		
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'          => 'hover_navigation_border',
                'separator'     => 'before',
                'selector'      => '{{WRAPPER}} .premium-blog-pagination-container .page-numbers:hover',
            ]
        );
        
        $this->add_control('hover_navigation_border_radius',
            [
                'label'         => __('Border Radius', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers:hover' => 'border-radius: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('premium_blog_pagination_active',
            [
                'label'         => __('Active', 'premium-addons-for-elementor'),
                
            ]
        );
        
        $this->add_control('prmeium_blog_pagination_active_color', 
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container span.current' => 'color: {{VALUE}};'
                ]
            ]
        );
        
        $this->add_control('prmeium_blog_pagination_back_active_color', 
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container span.current' => 'background-color: {{VALUE}};'
                ]
            ]
		);
		
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'          => 'active_navigation_border',
                'separator'     => 'before',
                'selector'      => '{{WRAPPER}} .premium-blog-pagination-container span.current',
            ]
        );
        
        $this->add_control('active_navigation_border_radius',
            [
                'label'         => __('Border Radius', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container span.current' => 'border-radius: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->add_responsive_control('prmeium_blog_pagination_margin',
            [
                'label'         => __('Margin', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => ['px', 'em', '%'],
				'separator'		=> 'before',
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        $this->add_responsive_control('prmeium_blog_pagination_padding',
            [
                'label'         => __('Padding', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-pagination-container .page-numbers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control('pagination_overlay_color', 
            [
                'label'         => __('Overlay Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'separator'     => 'before',
                'selectors'     => [
                    '{{WRAPPER}} .premium-loading-feed' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control('spinner_color', 
            [
                'label'         => __('Spinner Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-loader' => 'border-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control('spinner_fill_color', 
            [
                'label'         => __('Fill Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .premium-loader' => 'border-top-color: {{VALUE}}'
                ]
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('carousel_dots_style',
            [
                'label'         => __('Carousel Dots', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'premium_blog_carousel'         => 'yes',
                    'premium_blog_carousel_dots'  => 'yes'
                ]
            ]
        );
        
        $this->add_control('carousel_dot_navigation_color',
			[
				'label' 		=> __( 'Color', 'premium-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
				    'type' 	=> Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_2,
				],
				'selectors'		=> [
					'{{WRAPPER}} ul.slick-dots li' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control('carousel_dot_navigation_active_color',
			[
				'label' 		=> __( 'Active Color', 'premium-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
				    'type' 	=> Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors'		=> [
					'{{WRAPPER}} ul.slick-dots li.slick-active' => 'color: {{VALUE}}'
				]
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section('carousel_arrows_style',
            [
                'label'         => __('Carousel Arrows', 'premium-addons-for-elementor'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'premium_blog_carousel'         => 'yes',
                    'premium_blog_carousel_arrows'  => 'yes'
                ]
            ]
        );
        
        $this->add_control('arrow_color',
            [
                'label'         => __('Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-wrap .slick-arrow' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_responsive_control('premium_blog_carousel_arrow_size',
            [
                'label'         => __('Size', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-wrap .slick-arrow i' => 'font-size: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        
        $this->add_control('premium_blog_carousel_arrow_background',
            [
                'label'         => __('Background Color', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-wrap .slick-arrow' => 'background-color: {{VALUE}};',
                ]
            ]
        );
        
        $this->add_control('premium_blog_carousel_border_radius',
            [
                'label'         => __('Border Radius', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-wrap .slick-arrow' => 'border-radius: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control('premium_blog_carousel_arrow_padding',
            [
                'label'         => __('Padding', 'premium-addons-for-elementor'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .premium-blog-wrap .slick-arrow' => 'padding: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        
        $this->end_controls_section();

    }

    
    /**
	 * Get Filter Array.
	 *
	 * Returns an array of filters
	 *
	 * @since 3.20.8
	 * @access protected
     * 
     * @param $filter string filter by
     * 
     * @return array 
	 */
	public function get_filter_array( $filter ) {

        $settings = $this->get_settings();

        $post_type = $settings['post_type_filter'];

        if( 'tag' === $filter && 'post' === $post_type ) {
            $filter = 'post_tag';
        }
        
        $filter_rule = isset( $settings[ $filter . '_' . $post_type . '_filter_rule' ] ) ? $settings[ $filter . '_' . $post_type . '_filter_rule' ] : '';

        //Fix: Make sure there is a value set for the current tax control
        if( empty( $filter_rule ) ) {
            return;
        }
        
        $filters = $settings[ 'tax_' . $filter . '_' . $post_type . '_filter' ];
        
		// Get the categories based on filter source.
		$taxs = get_terms( $filter );

		$tabs_array = array();

		if ( is_wp_error( $taxs ) ) {
			return array();
		}

		if ( empty( $filters ) || '' === $filters ) {

            $tabs_array = $taxs;
            
		} else {

			foreach ( $taxs as $key => $value ) {

				if ( 'IN' === $filter_rule ) {

					if ( in_array( $value->slug, $filters, true ) ) {

						$tabs_array[] = $value;
					}
				} else {

					if ( ! in_array( $value->slug, $filters, true ) ) {

						$tabs_array[] = $value;
					}
				}
			}
		}
		
		return $tabs_array;
	}

    /*
     * Get Filter Tabs Markup
     * 
     * @since 3.11.2
     * @access protected
     */
    protected function get_filter_tabs_markup() {
        
        $settings = $this->get_settings();
        
        $filter_rule = $settings['filter_tabs_type'];
        
        $filters = $this->get_filter_array( $filter_rule );
        
        if( empty( $filters ) )
            return;
        
        ?>
        <div class="premium-blog-filter">
            <ul class="premium-blog-filters-container">
                <?php if( ! empty( $settings['premium_blog_tab_label'] ) ) : ?>
                    <li>
                        <a href="javascript:;" class="category active" data-filter="*">
                            <span><?php echo esc_html( $settings['premium_blog_tab_label'] ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php foreach( $filters as $index => $filter ) {
                        $key = 'blog_category_' . $index;

                        // $name = $filter;
                        // if( 'tags' === $filter_rule ) {
                        //     $name = ucfirst( $name );
                        // }
                        
                        // $name_filter = str_replace(' ', '-', $name );
                        // $name_lower = strtolower( $name_filter );

                        $this->add_render_attribute( $key, 'class', 'category' );

                        if( empty( $settings['premium_blog_tab_label'] ) && 0 === $index ) {
                            $this->add_render_attribute( $key, 'class', 'active' );
                        }
                    ?>
                        <li>
                            <a href="javascript:;" <?php echo $this->get_render_attribute_string( $key ); ?> data-filter="<?php echo esc_attr( $filter->slug ); ?>">
                                <span><?php echo $filter->name; ?></span>
                            </a>
                        </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }

    /**
	 * Render Blog output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
    protected function render() {
        
        $settings = $this->get_settings();

        $settings['widget_id'] = $this->get_id();

        // $offset = ! empty( $settings['premium_blog_offset'] ) ? $settings['premium_blog_offset'] : 0;
        
        // $post_per_page = ! empty( $settings['premium_blog_number_of_posts'] ) ? $settings['premium_blog_number_of_posts'] : 3;
        
        $blog_helper = Blog_Helper::getInstance();

        $blog_helper->set_widget_settings( $settings );

        $query = $blog_helper->get_query_posts();
        
        if( ! $query->have_posts() ) {

            $this->get_empty_query_message();
            return;
        }

        if ( $settings['premium_blog_paging'] === 'yes' ) {

            $total_pages = $query->max_num_pages;
            
            if ( !empty( $settings[ 'max_pages' ] ) ) {
				$total_pages = min( $settings[ 'max_pages' ], $total_pages );
			}

        }

        $carousel = 'yes' == $settings['premium_blog_carousel'] ? true : false; 

        $this->add_render_attribute( 'blog', 'class', 'premium-blog-wrap' );
        
        if( 'yes' === $settings['premium_blog_grid'] ) {

            $this->add_render_attribute('blog',
                [
                    'class' => 'premium-blog-' . $settings['premium_blog_layout'],
                    'data-layout' => $settings['premium_blog_layout'],
                    'data-equal'  => $settings['force_height']
                ]
            );

        } else {

            $this->add_render_attribute( 'blog', 'class', 'premium-blog-list' );

        }
        
        //Add page ID to be used later to get posts by AJAX
        $page_id = '';
        if ( null !== Plugin::$instance->documents->get_current() ) {
            $page_id = Plugin::$instance->documents->get_current()->get_main_id();
        }
        $this->add_render_attribute( 'blog', 'data-page', $page_id );
        
        
        if ( $settings['premium_blog_paging'] === 'yes' && $total_pages > 1 ) {

            $this->add_render_attribute('blog', 'data-pagination', 'true' );
                
        }
        
        if ( $carousel ) {
            
            $play   = 'yes' === $settings['premium_blog_carousel_play'] ? true : false;
            $fade   = 'yes' === $settings['premium_blog_carousel_fade'] ? 'true' : 'false';
            $arrows = 'yes' === $settings['premium_blog_carousel_arrows'] ? 'true' : 'false';
            $grid   = 'yes' === $settings['premium_blog_grid'] ? 'true' : 'false';
            $center_mode   = 'yes' === $settings['premium_blog_carousel_center'] ? 'true' : 'false';
            $spacing   = intval( $settings['premium_blog_carousel_spacing'] );
            $slides_scroll = $settings['slides_to_scroll'];
            
            $speed  = ! empty( $settings['premium_blog_carousel_autoplay_speed'] ) ? $settings['premium_blog_carousel_autoplay_speed'] : 5000;
            $dots   = 'yes' === $settings['premium_blog_carousel_dots'] ? 'true' : 'false';

            $columns = intval ( 100 / substr( $settings['premium_blog_columns_number'], 0, strpos( $settings['premium_blog_columns_number'], '%') ) );
            
            $columns_tablet = intval ( 100 / substr( $settings['premium_blog_columns_number_tablet'], 0, strpos( $settings['premium_blog_columns_number_tablet'], '%') ) );

            $columns_mobile = intval ( 100 / substr( $settings['premium_blog_columns_number_mobile'], 0, strpos( $settings['premium_blog_columns_number_mobile'], '%') ) );

            $carousel_settings = [
                'data-carousel' => $carousel,
                'data-grid' => $grid,
                'data-fade' => $fade,
                'data-play' => $play,
                'data-center' => $center_mode,
                'data-slides-spacing' => $spacing,
                'data-speed' => $speed,
                'data-col' => $columns,
                'data-col-tablet' => $columns_tablet,
                'data-col-mobile' => $columns_mobile,
                'data-arrows' => $arrows,
                'data-dots' => $dots,
                'data-scroll-slides' => $slides_scroll
            ];

            $this->add_render_attribute( 'blog', $carousel_settings );
        
            
        }
        
    ?>
    <div class="premium-blog">
        <?php if ( 'yes' === $settings['premium_blog_cat_tabs'] && 'yes' !== $settings['premium_blog_carousel'] ) : ?>
            <?php $this->get_filter_tabs_markup(); ?>
        <?php endif; ?>
        <div <?php echo $this->get_render_attribute_string('blog'); ?>>
            <?php
                $id = $this->get_id();
                $blog_helper->render_posts();
            ?>
        </div>
    </div>
    <?php if ( $settings['premium_blog_paging'] === 'yes' && $total_pages > 1 ) : ?>
        <div class="premium-blog-footer">
            <?php $blog_helper->render_pagination(); ?>
        </div>
    <?php
        endif;
        
        if ( Plugin::instance()->editor->is_edit_mode() ) {

            if( 'yes' === $settings['premium_blog_grid'] ) {
                if ( 'masonry' === $settings['premium_blog_layout'] && 'yes' !== $settings['premium_blog_carousel'] ) {
                    $this->render_editor_script();
                }
            }
        }

    }

    /**
	 * Render Editor Masonry Script.
	 *
	 * @since 3.12.3
	 * @access protected
	 */
	protected function render_editor_script() {

		?><script type="text/javascript">
			jQuery( document ).ready( function( $ ) {

				$( '.premium-blog-wrap' ).each( function() {

                    var $node_id 	= '<?php echo $this->get_id(); ?>',
                        scope 		= $( '[data-id="' + $node_id + '"]' ),
                        selector 	= $(this);
                    
					if ( selector.closest( scope ).length < 1 ) {
						return;
					}
					
                    var masonryArgs = {
                        itemSelector	: '.premium-blog-post-outer-container',
                        percentPosition : true,
                        layoutMode		: 'masonry',
                    };

                    var $isotopeObj = {};

                    selector.imagesLoaded( function() {

                        $isotopeObj = selector.isotope( masonryArgs );

                        $isotopeObj.imagesLoaded().progress(function() {
                            $isotopeObj.isotope("layout");
                        });

                        selector.find('.premium-blog-post-outer-container').resize( function() {
                            $isotopeObj.isotope( 'layout' );
                        });
                    });

				});
			});
		</script>
		<?php
    }

    /*
     * Get Empty Query Message
     * 
     * Written in PHP and used to generate the final HTML when the query is empty
     * 
     * @since 3.20.3
     * @access protected
     * 
     */
    protected function get_empty_query_message() {
        ?>
        <div class="premium-error-notice">
            <?php echo __('The current query has no posts. Please make sure you have published items matching your query.','premium-addons-for-elementor'); ?>
        </div>
        <?php
    }
}