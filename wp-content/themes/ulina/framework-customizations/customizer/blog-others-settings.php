<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_src_custom_01',
	'label'       => FALSE,
	'section'     => 'blog_others_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Search Result Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'blog_src_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'blog_src_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you search page banner BG.', 'ulina' ),
	'section'     => 'blog_others_settings',
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
			'element' => '.pageBannerSection.blog_search_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'blog_src_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'blog_others_settings',
	'default'       => esc_html__('Page Title', 'ulina'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.blog_search_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_src_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_src_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
        [
                'setting'  => 'blog_src_is_banner',
                'operator' => '==',
                'value'    => true,
        ],
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'blog_src_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'blog_others_settings',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_search_banner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_src_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_search_banner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_src_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_search_banner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_src_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_search_banner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_arch_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_others_settings',
	'default'     => '<br/><br/><br/><div class="customizer_label">'.esc_html__('Archive Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_arch_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'blog_arch_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you blog archive page banner BG.', 'ulina' ),
	'section'     => 'blog_others_settings',
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
			'element' => '.pageBannerSection.blog_archive_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'blog_arch_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'blog_others_settings',
	'default'       => esc_html__('Page Title', 'ulina'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.blog_archive_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_arch_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_arch_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
        [
                'setting'  => 'blog_arch_is_banner',
                'operator' => '==',
                'value'    => true,
        ],
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'blog_arch_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'blog_others_settings',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_archive_banner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_arch_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_archive_banner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_arch_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_archive_banner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_arch_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_archive_banner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_cats_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_others_settings',
	'default'     => '<br/><br/><br/><div class="customizer_label">'.esc_html__('Category Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_cats_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'blog_cats_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you blog Category page banner BG.', 'ulina' ),
	'section'     => 'blog_others_settings',
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
			'element' => '.pageBannerSection.blog_cate_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_cats_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'blog_others_settings',
	'default'       => esc_html__('Page Title', 'ulina'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.blog_cate_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_cats_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_cats_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'blog_cats_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'blog_others_settings',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_cate_banner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_cats_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_cate_banner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_cats_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_cate_banner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_cats_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'blog_others_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.blog_cate_banner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);