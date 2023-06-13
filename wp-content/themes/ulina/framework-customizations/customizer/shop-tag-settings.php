<?php
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'shop_tag_custom_01',
	'label'       => FALSE,
	'section'     => 'shop_tag_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_tag_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'shop_tag_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you shop tag page banner BG.', 'ulina' ),
	'section'     => 'shop_tag_settings',
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
			'element' => '.pageBannerSection.shopTagPageBanner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'shop_tag_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'shop_tag_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.shopTagPageBanner .pageBannerContent h2',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_tag_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'shop_tag_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'shop_tag_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopTagPageBanner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_tag_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopTagPageBanner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_tag_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopTagPageBanner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_tag_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'shop_tag_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopTagPageBanner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);

$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'shop_tag_custom_02',
		'label'       => FALSE,
		'section'     => 'shop_tag_settings',
		'default'     => '<div class="customizer_label">'.esc_html__('Content Settings', 'ulina').'</div>', 
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_tag_sidebar',
        'label'       => esc_html__( 'Shop Sidebar Position', 'ulina' ),
        'section'     => 'shop_tag_settings',
        'default'     => '3',
        'choices'     => array(
                '1'      => esc_html__('No Sidebar','ulina'),
                '2'      => esc_html__('Left Sidebar','ulina'),
                '3'      => esc_html__('Right Sidebar','ulina'),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_tag_col_xl',
        'label'       => esc_html__( 'Shop product column for xl device.', 'ulina' ),
        'section'     => 'shop_tag_settings',
        'default'     => '4',
        'choices'     => array(
                '2'      => esc_html__('Col XL 2','ulina'),
                '3'      => esc_html__('Col XL 3','ulina'),
                '4'      => esc_html__('Col XL 4','ulina'),
                '6'      => esc_html__('Col XL 6','ulina'),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_tag_col_lg',
        'label'       => esc_html__( 'Shop product column for lg device.', 'ulina' ),
        'section'     => 'shop_tag_settings',
        'default'     => '4',
        'choices'     => array(
                '2'      => esc_html__('Col LG 2','ulina'),
                '3'      => esc_html__('Col LG 3','ulina'),
                '4'      => esc_html__('Col LG 4','ulina'),
                '6'      => esc_html__('Col LG 6','ulina'),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_tag_col_md',
        'label'       => esc_html__( 'Shop product column for md device.', 'ulina' ),
        'section'     => 'shop_tag_settings',
        'default'     => '2',
        'choices'     => array(
                '2'      => esc_html__('Col MD 2','ulina'),
                '3'      => esc_html__('Col MD 3','ulina'),
                '4'      => esc_html__('Col MD 4','ulina'),
                '6'      => esc_html__('Col MD 6','ulina'),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_tag_col_sm',
        'label'       => esc_html__( 'Shop product column for sm device.', 'ulina' ),
        'section'     => 'shop_tag_settings',
        'default'     => '2',
        'choices'     => array(
                '2'      => esc_html__('Col SM 2','ulina'),
                '3'      => esc_html__('Col SM 3','ulina'),
                '4'      => esc_html__('Col SM 4','ulina'),
                '6'      => esc_html__('Col SM 6','ulina'),
        ),
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_tag_is_count',
		'label'       => esc_html__( 'Show Product Count?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'on',
		'choices'     => [
				'on'     => esc_html__( 'Show', 'ulina' ),
				'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_tag_is_sort',
		'label'       => esc_html__( 'Is Sort?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'on',
		'choices'     => [
				'on'     => esc_html__( 'Show', 'ulina' ),
				'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_tag_is_view_toggler',
		'label'       => esc_html__( 'Is View Toggler?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[] = array(
		'type'        => 'select',
		'settings'    => 'shop_tag_default_view',
		'label'       => esc_html__( 'Default View', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '1',
		'choices'     => array(
				'1'      => esc_html__('Grid View','ulina'),
				'2'      => esc_html__('List View','ulina')
		),
		'active_callback' => [
				[
						'setting'  => 'shop_tag_is_view_toggler',
						'operator' => '==',
						'value'    => true,
				]
		],
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_tag_thumb_width',
		'label'       => esc_html__( 'Grid Thumbnail Width', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_tag_thumb_height',
		'label'       => esc_html__( 'Grid Thumbnail Height', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_tag_list_thumb_width',
		'label'       => esc_html__( 'List Thumbnail Width', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_tag_list_thumb_height',
		'label'       => esc_html__( 'List Thumbnail Height', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_tag_is_flashlabels',
		'label'       => esc_html__( 'Is Flash Lebels?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'on',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_tag_is_wishlist',
		'label'       => esc_html__( 'Is Wishlist?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
        'type'        => 'switch',
		'settings'    => 'shop_tag_is_quickview',
		'label'       => esc_html__( 'Is Quick View?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
        'type'        => 'switch',
		'settings'    => 'shop_tag_is_rating_count',
		'label'       => esc_html__( 'Is Rating Count?', 'ulina' ),
		'description' => esc_html__( 'Dow you want to show product rating counts?', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_tag_review_label',
	'label'         => esc_html__('Rating Label', 'ulina'),
	'section'       => 'shop_tag_settings',
	'default'       => esc_html__('Reviews', 'ulina'),
        'active_callback' => [
                [
                        'setting'  => 'shop_tag_is_rating_count',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
		'type'        => 'select',
		'settings'    => 'shop_tag_pagination_type',
		'label'       => esc_html__( 'Pagination Type', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '1',
		'choices'     => array(
				'1'      => esc_html__('Default Pagination','ulina'),
				'2'      => esc_html__('Ajax Pagination','ulina')
		),
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_tag_ajax_btn_label',
	'label'         => esc_html__('Ajax Label', 'ulina'),
	'section'       => 'shop_tag_settings',
	'default'       => esc_html__('Load More', 'ulina'),
        'active_callback' => [
                [
                        'setting'  => 'shop_tag_pagination_type',
                        'operator' => '==',
                        'value'    => '2',
                ]
        ],
);
$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'shop_tag_pagi_align',
		'label'       => esc_html__( 'Pagination Alignment', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => 'left',
		'choices'     => array(
				'left'      => esc_html__('Left','ulina'),
				'center'    => esc_html__('Center','ulina'),
				'right'     => esc_html__('Right','ulina'),
		)
);
$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'shop_tag_paging_margin',
		'label'       => esc_html__( 'Pagination Gapping', 'ulina' ),
		'section'     => 'shop_tag_settings',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element'  => '.shopPaginationRow',
				'property' => 'padding-top',
				'suffix'   => 'px'
			]        
		],
);

$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'shop_tag_custom_03',
		'label'       => FALSE,
		'section'     => 'shop_tag_settings',
		'default'     => '<div class="customizer_label mt40">'.esc_html__('Top / Bottom Blocks Settings', 'ulina').'</div>',
);
$fields[] = array(
	'type'              => 'repeater',
	'label'         => esc_html__( 'Add Top Blocks', 'ulina' ),
	'section'       => 'shop_tag_settings',
	'settings'      => 'shop_tag_top_bloks',
	'row_label'     => [
			'type'  => 'text',
			'value' => esc_html__('Top Block', 'ulina' ),
	],
	'button_label' => esc_html__('Add Top Block', 'ulina' ),
	'default'      => [],
	'fields' => [
			'top_block_ids' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Block', 'ulina' ),
					'default'     => 'none',
					'choices'     => ulina_post_array('blocks', esc_html__('All Blocks', 'ulina'))
			]
	]
);
$fields[] = array(
		'type'              => 'repeater',
		'label'         => esc_html__( 'Add Bottom Blocks', 'ulina' ),
		'section'       => 'shop_tag_settings',
		'settings'      => 'shop_tag_bottom_bloks',
		'row_label'     => [
			'type'  => 'text',
			'value' => esc_html__('Bottom Block', 'ulina' ),
		],
		'button_label' => esc_html__('Add Bottom Block', 'ulina' ),
		'default'      => [],
		'fields' => [
				'bottom_block_ids' => [
						'type'        => 'select',
						'label'       => esc_html__( 'Block', 'ulina' ),
						'default'     => 'none',
						'choices'     => ulina_post_array('blocks', esc_html__('All Blocks', 'ulina'))
				]
		]
);