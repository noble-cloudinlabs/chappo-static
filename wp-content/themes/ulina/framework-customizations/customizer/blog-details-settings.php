<?php
$bloks = array(
    'post_type'     => 'blocks',
    'post_status'   => 'publish',
    'posts_per_page'  => -1,
    'orderby'        => 'title',
    'order'          => 'ASC'
);
$all_bloks = array(
    'none' => esc_html__('None', 'ulina')
);
$blok = new WP_Query($bloks);
if($blok->have_posts()):
    while($blok->have_posts()):
    $blok->the_post();
    $all_bloks[get_the_ID()] = get_the_title();
    endwhile;
endif;
wp_reset_postdata();

$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'blog_single_custom_01',
	'label'       => FALSE,
	'section'     => 'blog_single_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
    'type'    => 'switch',
	'settings'    => 'blog_single_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'blog_single_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'blog_single_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you single post page banner BG.', 'ulina' ),
	'section'     => 'blog_single_settings',
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
			'element' => '.pageBannerSection.sb_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_single_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'blog_single_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.sb_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_single_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'blog_single_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'blog_single_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'blog_single_settings',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.sb_banner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'blog_single_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'blog_single_settings',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.sb_banner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'blog_single_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_single_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Content Settings', 'ulina').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'blog_single_sidebar',
        'label'       => esc_html__( 'Sidebar Position', 'ulina' ),
        'section'     => 'blog_single_settings',
        'default'     => '3',
        'choices'     => array(
                '1'      => esc_html__('None','ulina'),
                '2'      => esc_html__('Left','ulina'),
                '3'      => esc_html__('Right','ulina'),
        ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'blog_single_is_tag',
        'label'       => esc_html__( 'Is Tags?', 'ulina' ),
        'section'     => 'blog_single_settings',
        'default'     => '1',
        'choices'     => array(
            'on'  => esc_html__( 'Show', 'ulina' ),
            'off' => esc_html__( 'Hide', 'ulina' ),
        ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'blog_single_is_share',
        'label'       => esc_html__( 'Is Social Share?', 'ulina' ),
        'section'     => 'blog_single_settings',
        'default'     => '2',
        'choices'     => array(
            'on'  => esc_html__( 'Show', 'ulina' ),
            'off' => esc_html__( 'Hide', 'ulina' ),
        ),
);
$fields[]= array(
        'type'        => 'multicheck',
        'settings'    => 'blog_single_socials',
        'label'       => esc_html__( 'Select Social Media', 'ulina' ),
        'section'     => 'blog_single_settings',
        'default'     => array(1, 2, 3, 4),
        'choices'     => [
                '1'   => esc_html__( 'Facebook', 'ulina' ),
                '2'   => esc_html__( 'Twitter', 'ulina' ),
                '3'   => esc_html__( 'Email', 'ulina' ),
                '4'   => esc_html__( 'LinkedIn', 'ulina' ),
                '5'   => esc_html__( 'Pinterest', 'ulina' ),
                '6'   => esc_html__( 'Whatsapp', 'ulina' ),
                '7'   => esc_html__( 'Digg', 'ulina' ),
                '8'   => esc_html__( 'Tumblr', 'ulina' ),
                '9'   => esc_html__( 'Reddit', 'ulina' ),
        ],
        'active_callback' => [
                [
                        'setting'  => 'blog_single_is_share',
                        'operator' => '==',
                        'value'    => '1',
                ]
        ],
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'blog_single_is_pagination',
    'label'       => esc_html__( 'Is Post Pagination?', 'ulina' ),
    'section'     => 'blog_single_settings',
    'default'     => '2',
    'choices'     => array(
        'on'  => esc_html__( 'Show', 'ulina' ),
        'off' => esc_html__( 'Hide', 'ulina' ),
    ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'blog_single_is_author_box',
    'label'       => esc_html__( 'Is Author Info?', 'ulina' ),
    'section'     => 'blog_single_settings',
    'default'     => '2',
    'choices'     => array(
        'on'      => esc_html__( 'Show', 'ulina' ),
        'off'     => esc_html__( 'Hide', 'ulina' ),
    ),
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_single_custom_03',
	'label'       => FALSE,
	'section'     => 'blog_single_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Blocks Settings', 'ulina').'</div>',
);
$fields[] = array(
    'type'              => 'repeater',
	'label'         => esc_html__( 'Add Blocks', 'ulina' ),
	'section'       => 'blog_single_settings',
	'settings'      => 'blog_single_bloks',
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__('Block', 'ulina' ),
	],
	'button_label' => esc_html__('Add New Block', 'ulina' ),
	'default'      => [],
	'fields' => [
		'block_ids' => [
			'type'        => 'select',
                        'label'       => esc_html__( 'Block', 'ulina' ),
                        'default'     => 'none',
                        'choices'     => $all_bloks
		]
	]
);
