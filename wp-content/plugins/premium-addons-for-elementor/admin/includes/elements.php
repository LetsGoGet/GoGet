<?php 

use PremiumAddons\Includes\Helper_Functions;

$elements = [
    'cat-1'  => [
        'icon' => 'all',
        'title' => __('All Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            // [
            //     'key'   => 'premium-woo-products',
            //     'title' => sprintf( '%1$s %2$s', $prefix, __('Products', 'premium-addons-for-elementor') ),
            //     'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-lottie-animations-widget/', 'settings-page', 'wp-dash', 'dashboard'),
            //     'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/lottie-animations-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            //     'tutorial' => 'https://www.youtube.com/watch?v=0QWzUpF57dw',
            // ],
            [
                'key'   => 'premium-lottie-widget',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Lottie Animations', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-lottie-animations-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/lottie-animations-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=0QWzUpF57dw',
            ],
            [
                'key'   => 'premium-carousel',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Carousel', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/carousel-widget-for-elementor-page-builder', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/carousel/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=ZMgprLKvq24',
            ],
            [
                'key'   => 'premium-blog',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Blog', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/blog-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/blog-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-maps',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Google Maps', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/google-maps-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/google-maps/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=z4taEeCY77Q',
            ],
            [
                'key'   => 'premium-person',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Team Members', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/persons-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/persons-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-tabs',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Tabs', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-tabs-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/tabs-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-content-toggle',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Content Switcher', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/content-switcher-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-content-switcher/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-fancytext',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Fancy Text', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/fancy-text-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/fancy-text-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-title',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Heading', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/heading-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/heading-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-dual-header',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Dual Heading', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/dual-header-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/dual-heading-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-divider',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Divider', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/divider-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/divider-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-grid',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Media Grid', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/grid-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/grid/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-image-scroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-image-scroll-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-scroll-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-image-separator',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Separator', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-separator-widget-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-separator-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-image-comparison',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Comparison', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-comparison-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-image-comparison-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-image-hotspots',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Hotspots', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-hotspots-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-hotspots-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-img-layers',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Layers', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-layers-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/image-layers/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=D3INxWw_jKI',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-image-accordion',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Accordion', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-image-accordion-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-accordion-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-videobox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Video Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/video-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/video-box/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-hscroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Horizontal Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-horizontal-scroll-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/horizontal-scroll/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=4HqT_3s-ZXg',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-vscroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Vertical Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/vertical-scroll-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/vertical-scroll-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=MuLaIn1QXfQ',
            ],
            [
                'key'   => 'premium-color-transition',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Background Transition', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-background-transition-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/background-transition-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-multi-scroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Multi Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/multi-scroll-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/multi-scroll-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=IzYnD6oDYXw',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-lottie',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Lottie Animations', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-lottie-animations-section-addon/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/lottie-background/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=KVrenWNEdkY',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-parallax',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Parallax', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/parallax-section-addon-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/parallax-section-addon-tutorial-2/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=hkMNjxLoZ2w',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-particles',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Particles', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/particles-section-addon-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/particles/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=bPmWKv4VWrI',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-gradient',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Animated Gradient', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/animated-section-gradients-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/animated-gradient-section-addon-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=IL4USvwR6K4',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-kenburns',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Animated Ken Burns', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/ken-burns-section-addon-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/ken-burns-section-addon-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=DUNFjWphZfs',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-modalbox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Modal Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/modal-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/modal-box/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=3lLxSyf2nyk',
            ],
            [
                'key'   => 'premium-notbar',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Alert Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/alert-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/alert-box-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-magic-section',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Magic Section', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/magic-section-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/magic-section-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-prev-img',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Preview Window', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/preview-window-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/preview-window-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=EmptjFjrc4E',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-testimonials',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Testimonials', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/testimonials-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/testimonials-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-facebook-reviews',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Facebook Reviews', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/facebook-reviews-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/facebook-reviews/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=zl-OFo3IFd8',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-google-reviews',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Google Reviews', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/google-reviews-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/google-reviews/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=Z0EeGyD34Zk',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-yelp-reviews',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Yelp Reviews', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-yelp-reviews-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/yelp-reviews/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=5T-MveVFvns',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-countdown',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Countdown', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/countdown-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/countdown-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-banner',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Banner', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/banner-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-banner-widget/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-button',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Button', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/button-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/button/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=w4NuCUkCIV4',
            ],
            [
                'key'   => 'premium-image-button',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Button', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-button-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/image-button/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-flipbox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Hover Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/flip-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/flip-box-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-iconbox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Icon Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/icon-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/icon-box-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-ihover',
                'title' => sprintf( '%1$s %2$s', $prefix, __('iHover', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/ihover-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-ihover-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-unfold',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Unfold', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/unfold-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-unfold-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-icon-list',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Bullet List', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-bullet-list-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/bullet-list-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://youtube.com/',
            ],
            [
                'key'   => 'premium-facebook-feed',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Facebook Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-facebook-feed-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/facebook-feed-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-twitter-feed',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Twitter Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/twitter-feed-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/twitter-feed-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=wsurRDuR6pg',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-instagram-feed',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Instagram Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/instagram-feed-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/instagram-feed/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-behance',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Behance Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/behance-feed-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/behance-feed-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=AXATK3oIXl0',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-progressbar',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Progress Bar', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/progress-bar-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-progress-bar-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=Y7xqwhgDQJg',
            ],
            [
                'key'   => 'premium-pricing-table',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Pricing Table', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/pricing-table-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/pricing-table-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-charts',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Charts', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/charts-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/charts-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=lZZvslQ2UYU',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-tables',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Table', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/table-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/table-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-counter',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Counter', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/counter-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/counter-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-contactform',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Contact Form 7', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/contact-form-7-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/contact-form-7-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-fb-chat',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Facebook Messenger Chat', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/facebook-messenger-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/facebook-messenger/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-whatsapp-chat',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Whatsapp Chat', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/whatsapp-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/whatsapp-chat-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
        ]
    ],
    'cat-2' => [
        'icon' => 'content',
        'title' => __('Content Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-carousel',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Carousel', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/carousel-widget-for-elementor-page-builder', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/carousel/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=ZMgprLKvq24',
            ],
            [
                'key'   => 'premium-blog',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Blog', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/blog-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/blog-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-maps',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Google Maps', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/google-maps-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/google-maps/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=z4taEeCY77Q',
            ],
            [
                'key'   => 'premium-person',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Team Members', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/persons-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/persons-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-tabs',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Tabs', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-tabs-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/tabs-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-content-toggle',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Content Switcher', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/content-switcher-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-content-switcher/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-fancytext',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Fancy Text', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/fancy-text-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/fancy-text-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-title',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Heading', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/heading-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/heading-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-dual-header',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Dual Heading', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/dual-header-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/dual-heading-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-divider',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Divider', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/divider-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/divider-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
        ]
    ],
    'cat-3' => [
        'icon' => 'images',
        'title' => __('Image & Video Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-grid',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Media Grid', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/grid-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/grid-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-image-scroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-image-scroll-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-scroll-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-image-separator',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Separator', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-separator-widget-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-separator-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-image-comparison',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Comparison', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-comparison-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-image-comparison-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-image-hotspots',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Hotspots', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-hotspots-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-hotspots-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-img-layers',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Layers', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/image-layers-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/image-layers/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=D3INxWw_jKI',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-image-accordion',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Accordion', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-image-accordion-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-accordion-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-videobox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Video Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/video-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/video-box/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
        ]
    ],
    'cat-4' => [
        'icon' => 'section',
        'title' => __('Section Addons & Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-hscroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Horizontal Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-horizontal-scroll-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/horizontal-scroll/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=4HqT_3s-ZXg',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-vscroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Vertical Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/vertical-scroll-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/vertical-scroll-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=MuLaIn1QXfQ',
            ],
            [
                'key'   => 'premium-color-transition',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Background Transition', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-background-transition-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/background-transition-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-multi-scroll',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Multi Scroll', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/multi-scroll-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/multi-scroll-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=IzYnD6oDYXw',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-lottie',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Lottie Animations', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-lottie-animations-section-addon/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/lottie-background/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=KVrenWNEdkY',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-parallax',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Parallax', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/parallax-section-addon-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/parallax-section-addon-tutorial-2/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=hkMNjxLoZ2w',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-particles',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Particles', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/particles-section-addon-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/particles/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=bPmWKv4VWrI',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-gradient',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Animated Gradient', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/animated-section-gradients-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/animated-gradient-section-addon-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=IL4USvwR6K4',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-kenburns',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Animated Ken Burns', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/ken-burns-section-addon-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/ken-burns-section-addon-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=DUNFjWphZfs',
                'is_pro' => true
            ],
        ]
    ],
    'cat-5'   => [
        'icon' => 'off-grid',
        'title' => __('Off-Grid Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-modalbox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Modal Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/modal-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/modal-box/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=3lLxSyf2nyk',
            ],
            [
                'key'   => 'premium-notbar',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Alert Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/alert-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/alert-box-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-magic-section',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Magic Section', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/magic-section-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/magic-section-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-prev-img',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Preview Window', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/preview-window-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/preview-window-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=EmptjFjrc4E',
                'is_pro' => true
            ],
        ]
    ],
    'cat-6'   => [
        'icon' => 'social',
        'title' => __('Reviews & Testimonials Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-testimonials',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Testimonials', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/testimonials-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/testimonials-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-facebook-reviews',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Facebook Reviews', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/facebook-reviews-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/facebook-reviews/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=zl-OFo3IFd8',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-google-reviews',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Google Reviews', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/google-reviews-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/google-reviews/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=Z0EeGyD34Zk',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-yelp-reviews',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Yelp Reviews', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-yelp-reviews-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/yelp-reviews/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=5T-MveVFvns',
                'is_pro' => true
            ],
        ]
    ],
    'cat-7'   => [
        'icon' => 'blurbs',
        'title' => __('Blurbs & CTA Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-countdown',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Countdown', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/countdown-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/countdown-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-banner',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Banner', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/banner-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-banner-widget/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-button',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Button', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/button-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/button/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=w4NuCUkCIV4',
            ],
            [
                'key'   => 'premium-image-button',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Image Button', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/image-button-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/image-button/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-flipbox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Hover Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/flip-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/flip-box-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-iconbox',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Icon Box', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/icon-box-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/icon-box-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-ihover',
                'title' => sprintf( '%1$s %2$s', $prefix, __('iHover', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/ihover-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-ihover-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-unfold',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Unfold', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/unfold-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-unfold-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-icon-list',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Bullet List', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-bullet-list-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/bullet-list-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://youtube.com/',
            ],
        ]
    ],
    'cat-8'   => [
        'icon' => 'feed',
        'title' => __('Social Feed Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-facebook-feed',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Facebook Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/elementor-facebook-feed-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/facebook-feed-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-twitter-feed',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Twitter Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/twitter-feed-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/twitter-feed-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=wsurRDuR6pg',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-instagram-feed',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Instagram Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/instagram-feed-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/instagram-feed/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-behance',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Behance Feed', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/behance-feed-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/behance-feed-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=AXATK3oIXl0',
                'is_pro' => true
            ],
        ]
    ],
    'cat-9'   => [
        'icon' => 'data',
        'title' => __('Tables, Charts & Anything Data Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-progressbar',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Progress Bar', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/progress-bar-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/premium-progress-bar-widget/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=Y7xqwhgDQJg',
            ],
            [
                'key'   => 'premium-pricing-table',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Pricing Table', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/pricing-table-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/pricing-table-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-charts',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Charts', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/charts-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/charts-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'tutorial' => 'https://www.youtube.com/watch?v=lZZvslQ2UYU',
                'is_pro' => true
            ],
            [
                'key'   => 'premium-tables',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Table', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/table-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/table-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-counter',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Counter', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/counter-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/counter-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
        ],
    ],
    'cat-10'   => [
        'icon' => 'contact',
        'title' => __('Contact Widgets', 'premium-addons-for-elementor'),
        'elements'  => [
            [
                'key'   => 'premium-contactform',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Contact Form 7', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/contact-form-7-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/contact-form-7-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
            ],
            [
                'key'   => 'premium-fb-chat',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Facebook Messenger Chat', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/facebook-messenger-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs-category/using-widgets/facebook-messenger/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
            [
                'key'   => 'premium-whatsapp-chat',
                'title' => sprintf( '%1$s %2$s', $prefix, __('Whatsapp Chat', 'premium-addons-for-elementor') ),
                'demo' => Helper_Functions::get_campaign_link('https://premiumaddons.com/whatsapp-widget-for-elementor-page-builder/', 'settings-page', 'wp-dash', 'dashboard'),
                'doc' => Helper_Functions::get_campaign_link('https://premiumaddons.com/docs/whatsapp-chat-widget-tutorial/', 'settings-page', 'wp-dash', 'dashboard'),
                'is_pro' => true
            ],
        ],
    ],
    'cat-11'   => [
        'icon' => 'extensions',
        'elements'  => [
            [
                'key'   => 'premium-templates',
            ],
            [
                'key'   => 'premium-cross-domain',
            ],
            [
                'key'   => 'premium-duplicator',
            ],
        ],
    ],
];

return $elements;