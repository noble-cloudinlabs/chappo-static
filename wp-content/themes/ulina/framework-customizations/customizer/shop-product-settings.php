<?php

$fields[] = array(
    'type' => 'custom',
    'settings' => 'shop_product_custom_01',
    'label' => FALSE,
    'section' => 'shop_product_settings',
    'default' => '<div class="customizer_label">' . esc_html__('Banner Settings', 'ulina') . '</div>',
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_banner',
    'label' => esc_html__('Is Banner?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '1',
    'choices' => [
        'on' => esc_html__('Enable ', 'ulina'),
        'off' => esc_html__('Disable ', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'background',
    'settings' => 'shop_product_banner_bg',
    'label' => esc_html__('Banner Background', 'ulina'),
    'description' => esc_html__('Setup you shop details page banner BG.', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => [
        'background-color' => '',
        'background-image' => '',
        'background-repeat' => 'no-repeat',
        'background-position' => 'center center',
        'background-size' => 'cover',
        'background-attachment' => 'scroll',
    ],
    'transport' => 'auto',
    'output' => [
        [
            'element' => '.pageBannerSection.shopProductPageBanner',
        ]
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'text',
    'settings' => 'shop_product_banner_title',
    'label' => esc_html__('Banner Title', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => esc_html__('Shop', 'ulina'),
    'transport' => 'postMessage',
    'js_vars' => array(
        array(
            'element' => '.pageBannerSection.shopProductPageBanner .pageBannerContent h2',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_breadcrumb',
    'label' => esc_html__('Is Breadcrumb?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '1',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'radio-buttonset',
    'settings' => 'shop_product_banner_alignment',
    'label' => esc_html__('Choose your banner text alignment.', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'center',
    'choices' => [
        'left' => esc_html__('Left', 'ulina'),
        'center' => esc_html__('Center', 'ulina'),
        'right' => esc_html__('Right', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'dimensions',
    'settings' => 'shop_product_banner_padding',
    'label' => esc_html__('Banner Paddings', 'ulina'),
    'description' => esc_html__('Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina'),
    'section' => 'shop_product_settings',
    'transport' => 'auto',
    'output' => [
        [
            'element' => '.pageBannerSection.shopProductPageBanner .pageBannerContent',
        ],
    ],
    'default' => [
        'padding-top' => '',
        'padding-bottom' => '',
    ],
);
$fields[] = array(
    'type' => 'color',
    'settings' => 'shop_product_banner_title_color',
    'label' => esc_html__('Banner Title Color', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '',
    'transport' => 'auto',
    'output' => [
        [
            'element' => '.pageBannerSection.shopProductPageBanner .pageBannerContent h2',
            'property' => 'color'
        ],
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'color',
    'settings' => 'shop_product_banner_breadcrumb_color',
    'label' => esc_html__('Bredcrumb Color', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '',
    'transport' => 'auto',
    'output' => [
        [
            'element' => '.pageBannerSection.shopProductPageBanner .pageBannerContent .pageBannerPath',
            'property' => 'color'
        ],
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'color',
    'settings' => 'shop_product_banner_breadcrumb_link_color_hover',
    'label' => esc_html__('Bredcrumb Link Hover Color', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '',
    'transport' => 'auto',
    'output' => [
        [
            'element' => '.pageBannerSection.shopProductPageBanner .pageBannerContent .pageBannerPath a:hover',
            'property' => 'color'
        ],
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_banner',
            'operator' => '==',
            'value' => true,
        ]
    ],
);

$fields[] = array(
    'type' => 'custom',
    'settings' => 'shop_product_custom_02',
    'label' => FALSE,
    'section' => 'shop_product_settings',
    'default' => '<div class="customizer_label">' . esc_html__('Content Settings', 'ulina') . '</div>',
);
$fields[] = array(
    'type' => 'select',
    'settings' => 'shop_product_gallery_style',
    'label' => esc_html__('Gallery Style', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '1',
    'choices' => [
        '1' => esc_html__('Thumbnail In Bottom', 'ulina'),
        '2' => esc_html__('Thumbnail In Left', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_zoom',
    'label' => esc_html__('Is Gallery Image Zoom?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_flashlabel',
    'label' => esc_html__('Is Flash Labels?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_cat',
    'label' => esc_html__('Is Category?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_review',
    'label' => esc_html__('Is Show Rating?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_stock',
    'label' => esc_html__('Is Stock?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'text',
    'settings' => 'shop_product_stock_label',
    'label' => esc_html__('Stock Label', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => esc_html__('Available: ', 'ulina'),
    'active_callback' => [
        [
            'setting' => 'shop_product_is_stock',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'select',
    'settings' => 'shop_product_variation_alignment',
    'label' => esc_html__('Variation Alignment', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '1',
    'choices' => [
        '1' => esc_html__('Vertical Alignment', 'ulina'),
        '2' => esc_html__('Horizontal Alignment', 'ulina'),
    ],
);
$fields[] = array(
    'settings' => 'shop_product_desc_lingth',
    'label' => esc_html__('Short Desc Length', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 224,
    'choices' => [
        'min' => 0,
        'max' => 10000,
        'step' => 5,
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_wishlist',
    'label' => esc_html__('Is Wishlist?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_sku',
    'label' => esc_html__('Is SKU?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_tag',
    'label' => esc_html__('Is Tag?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_social',
    'label' => esc_html__('Is Social?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'multicheck',
    'settings' => 'shop_product_social',
    'label' => esc_html__('Select Social Media', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => array('1', '2', '4', '5'),
    'choices' => [
        '1' => esc_html__('Facebook', 'ulina'),
        '2' => esc_html__('Twitter', 'ulina'),
        '3' => esc_html__('Email', 'ulina'),
        '4' => esc_html__('LinkedIn', 'ulina'),
        '5' => esc_html__('Pinterest', 'ulina'),
        '6' => esc_html__('Whatsapp', 'ulina'),
        '7' => esc_html__('Digg', 'ulina'),
        '8' => esc_html__('Tumblr', 'ulina'),
        '9' => esc_html__('Reddit', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_social',
            'operator' => '==',
            'value' => true,
        ]
    ],
);

$fields[] = array(
    'type' => 'custom',
    'settings' => 'shop_product_custom_04',
    'label' => FALSE,
    'section' => 'shop_product_settings',
    'default' => '<div class="customizer_label">' . esc_html__('Product Tab Settings', 'ulina') . '</div>',
);
$fields[] = array(
    'type' => 'select',
    'settings' => 'shop_product_tab_style',
    'label' => esc_html__('Tab Style', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => '1',
    'choices' => [
        '1' => esc_html__('Link Style Tab', 'ulina'),
        '2' => esc_html__('Pill / Button Style Tab', 'ulina'),
        '3' => esc_html__('Expanded View', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'select',
    'settings' => 'shop_product_tab_align',
    'label' => esc_html__('Tab Menu Align', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'center',
    'choices' => [
        'left' => esc_html__('Left Align', 'ulina'),
        'center' => esc_html__('Center Align', 'ulina'),
        'right' => esc_html__('Right Align', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_tab_style',
            'operator' => 'in',
            'value' => ['1', '2'],
        ]
    ],
);

$fields[] = array(
    'type' => 'custom',
    'settings' => 'shop_product_custom_03',
    'label' => FALSE,
    'section' => 'shop_product_settings',
    'default' => '<div class="customizer_label">' . esc_html__('Related Product Settings', 'ulina') . '</div>',
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_related',
    'label' => esc_html__('Is Related Products?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'text',
    'settings' => 'shop_product_area_title',
    'label' => esc_html__('Related Area Title', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => esc_html__('More Products Like This', 'ulina'),
    'active_callback' => [
        [
            'setting' => 'shop_product_is_related',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_related_is_flashlabels',
    'label' => esc_html__('Is Flash Lebels?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_related',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_related_is_wishlist',
    'label' => esc_html__('Is Wishlist?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_related',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_related_is_quickview',
    'label' => esc_html__('Is Quick View?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
    'active_callback' => [
        [
            'setting' => 'shop_product_is_related',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'shop_product_is_rating_count',
    'label' => esc_html__('Is Rating Count?', 'ulina'),
    'description' => esc_html__('Dow you want to show product rating counts?', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'text',
    'settings' => 'shop_product_review_label',
    'label' => esc_html__('Rating Label', 'ulina'),
    'section' => 'shop_product_settings',
    'default' => esc_html__('Reviews', 'ulina'),
    'active_callback' => [
        [
            'setting' => 'shop_product_is_rating_count',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
