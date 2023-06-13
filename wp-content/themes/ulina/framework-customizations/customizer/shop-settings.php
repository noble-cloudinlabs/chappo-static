<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_custom_01',
	'label'       => FALSE,
	'section'     => 'shop_settings',
        'priority' 	  => 1,
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'shop_settings',
        'priority' 	  => 2,
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'shop_banner_bg',
        'priority' 	  => 3,
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you shop page banner BG.', 'ulina' ),
	'section'     => 'shop_settings',
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
			'element' => '.pageBannerSection.shopPageBanner',
		]
	],
        'active_callback' => [
                [
                        'setting'  => 'shop_is_banner',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'shop_settings',
	'default'       => esc_html__('Shop', 'ulina'),
        'priority' 	  => 5,
        'transport'     => 'postMessage',
        'js_vars'       => array(
            array(
                'element'  => '.pageBannerSection.shopPageBanner .pageBannerContent h2',
                'function' => 'html'
            ),
        ),
        'active_callback' => [
                [
                        'setting'  => 'shop_is_banner',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'shop_settings',
        'priority' 	  => 6,
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
        'active_callback' => [
                [
                        'setting'  => 'shop_is_banner',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'shop_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'shop_settings',
    'priority' 	  => 7,
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'shop_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'shop_settings',
    'priority' 	  => 8,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopPageBanner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'shop_settings',
    'priority' 	  => 9,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopPageBanner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'shop_settings',
    'priority' 	  => 10,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopPageBanner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'shop_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'shop_settings',
    'priority' 	  => 11,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.shopPageBanner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);

$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'shop_custom_02',
        'label'       => FALSE,
        'priority' 	  => 13,
        'section'     => 'shop_settings',
        'default'     => '<div class="customizer_label">'.esc_html__('Content Settings', 'ulina').'</div>', 
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_sidebar',
        'label'       => esc_html__( 'Shop Sidebar Position', 'ulina' ),
        'section'     => 'shop_settings',
    	'priority' 	  => 15,
        'default'     => '3',
        'choices'     => array(
                '1'      => esc_html__('No Sidebar','ulina'),
                '2'      => esc_html__('Left Sidebar','ulina'),
                '3'      => esc_html__('Right Sidebar','ulina'),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_col_xl',
        'label'       => esc_html__( 'Shop product column for XL device.', 'ulina' ),
        'section'     => 'shop_settings',
    	'priority' 	  => 16,
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
        'settings'    => 'shop_col_lg',
        'label'       => esc_html__( 'Shop product column for LG device.', 'ulina' ),
        'section'     => 'shop_settings',
    	'priority' 	  => 17,
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
        'settings'    => 'shop_col_md',
        'label'       => esc_html__( 'Shop product column for MD device.', 'ulina' ),
        'section'     => 'shop_settings',
    	'priority' 	  => 18,
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
        'settings'    => 'shop_col_sm',
        'label'       => esc_html__( 'Shop product column for SM device.', 'ulina' ),
        'section'     => 'shop_settings',
    	'priority' 	  => 18,
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
		'settings'    => 'shop_is_count',
		'label'       => esc_html__( 'Show Product Count?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 19,
		'default'     => 'on',
		'choices'     => [
				'on'     => esc_html__( 'Show', 'ulina' ),
				'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_is_sort',
		'label'       => esc_html__( 'Is Sort?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 20,
		'default'     => 'on',
		'choices'     => [
				'on'     => esc_html__( 'Show', 'ulina' ),
				'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_is_view_toggler',
		'label'       => esc_html__( 'Is View Toggler?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 21,
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[] = array(
		'type'        => 'select',
		'settings'    => 'shop_default_view',
		'label'       => esc_html__( 'Default View', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 22,
		'default'     => '1',
		'choices'     => array(
				'1'      => esc_html__('Grid View','ulina'),
				'2'      => esc_html__('List View','ulina')
		),
		'active_callback' => [
				[
						'setting'  => 'shop_is_view_toggler',
						'operator' => '==',
						'value'    => true,
				]
		],
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_thumb_width',
		'label'       => esc_html__( 'Grid Thumbnail Width', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 25,
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_thumb_height',
		'label'       => esc_html__( 'Grid Thumbnail Height', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 26,
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_list_thumb_width',
		'label'       => esc_html__( 'List Thumbnail Width', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 27,
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[] = array(
		'type'        => 'number',
		'settings'    => 'shop_list_thumb_height',
		'label'       => esc_html__( 'List Thumbnail Height', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 28,
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		]
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_is_flashlabels',
		'label'       => esc_html__( 'Is Flash Lebels?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 29,
		'default'     => 'on',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
		'type'        => 'switch',
		'settings'    => 'shop_is_wishlist',
		'label'       => esc_html__( 'Is Wishlist?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 30,
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
        'type'        => 'switch',
		'settings'    => 'shop_is_quickview',
		'label'       => esc_html__( 'Is Quick View?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 31,
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[]= array(
        'type'        => 'switch',
		'settings'    => 'shop_is_rating_count',
		'label'       => esc_html__( 'Is Rating Count?', 'ulina' ),
		'description' => esc_html__( 'Dow you want to show product rating counts?', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 32,
		'default'     => 'off',
		'choices'     => [
			'on'     => esc_html__( 'Show', 'ulina' ),
			'off'    => esc_html__( 'Hide', 'ulina' ),
		],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_review_label',
	'label'         => esc_html__('Rating Label', 'ulina'),
	'section'       => 'shop_settings',
	'default'       => esc_html__('Reviews', 'ulina'),
        'priority' 	  => 32,
        'active_callback' => [
                [
                        'setting'  => 'shop_is_rating_count',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'shop_numof_product',
		'label'       => esc_html__( 'Number Of Products', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 33,
		'default'     => 8,
		'choices'     => [
			'min'  => 1,
			'max'  => 1000,
			'step' => 1,
		],
);
$fields[] = array(
		'type'        => 'select',
		'settings'    => 'shop_pagination_type',
		'label'       => esc_html__( 'Pagination Type', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 33,
		'default'     => '1',
		'choices'     => array(
				'1'      => esc_html__('Default Pagination','ulina'),
				'2'      => esc_html__('Ajax Pagination','ulina')
		),
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_ajax_btn_label',
	'label'         => esc_html__('Ajax Label', 'ulina'),
	'section'       => 'shop_settings',
	'default'       => esc_html__('Load More', 'ulina'),
        'priority' 	  => 33,
        'active_callback' => [
                [
                        'setting'  => 'shop_pagination_type',
                        'operator' => '==',
                        'value'    => '2',
                ]
        ],
);
$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'shop_pagi_align',
		'label'       => esc_html__( 'Pagination Alignment', 'ulina' ),
		'section'     => 'shop_settings',
                'priority'    => 34,
		'default'     => 'left',
		'choices'     => array(
				'left'      => esc_html__('Left','ulina'),
				'center'    => esc_html__('Center','ulina'),
				'right'     => esc_html__('Right','ulina'),
		)
);
$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'shop_paging_margin',
		'label'       => esc_html__( 'Pagination Gapping', 'ulina' ),
		'section'     => 'shop_settings',
                'priority' 	  => 35,
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
		'settings'    => 'shop_custom_03',
		'label'       => FALSE,
		'section'     => 'shop_settings',
                'priority' 	  => 36,
		'default'     => '<div class="customizer_label mt40">'.esc_html__('Top / Bottom Blocks Settings', 'ulina').'</div>',
);
$fields[] = array(
	'type'              => 'repeater',
	'label'         => esc_html__( 'Add Top Blocks', 'ulina' ),
	'section'       => 'shop_settings',
        'priority' 	    => 37,
	'settings'      => 'shop_top_bloks',
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
		'section'       => 'shop_settings',
    	'priority' 	    => 38,
		'settings'      => 'shop_bottom_bloks',
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