<?php
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'shop_src_custom_01',
	'label'       => FALSE,
	'section'     => 'shop_search_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_src_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'shop_src_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you shop search result page banner BG.', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => [
		'background-color'      => '',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopSearchPageBanner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'shop_src_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'shop_search_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.shopSearchPageBanner .pageBannerContent h2',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_src_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'shop_src_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'shop_src_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'shop_search_settings',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopSearchPageBanner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_src_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopSearchPageBanner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_src_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopSearchPageBanner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_src_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'shop_search_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopSearchPageBanner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);