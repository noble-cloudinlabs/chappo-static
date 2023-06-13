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
	'settings'    => 'fof_custom_01',
	'label'       => FALSE,
	'section'     => 'fof_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'ulina').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'fof_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'ulina' ),
		'off'     => esc_html__( 'Disable ', 'ulina' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'fof_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'ulina' ),
	'description' => esc_html__( 'Setup you 404 page banner BG.', 'ulina' ),
	'section'     => '',
	'default'     => [
		'background-color'      => '',
		'background-image'      => '',
		'background-repeat'     => 'fof_sectionno-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.pageBannerSection.fof_page_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'fof_banner_title',
	'label'         => esc_html__('Banner Title', 'ulina'),
	'section'       => 'fof_section',
	'default'       => esc_html__('Page Not Found', 'ulina'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.pageBannerSection.fof_page_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'fof_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'ulina' ),
		'off'     => esc_html__( 'Hide', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'fof_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'ulina' ),
		'center' => esc_html__( 'Center', 'ulina' ),
		'right'  => esc_html__( 'Right', 'ulina' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
	'type'		  => 'dimensions',
	'settings'    => 'fof_banner_padding',
	'label'       => esc_html__( 'Banner Paddings', 'ulina' ),
	'description' => esc_html__( 'Setup your banner paddings like 100px. Do not forget to insert unit.', 'ulina' ),
	'section'     => 'fof_section',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.fof_page_banner .pageBannerContent',
		],
	],
	'default'     => [
			'padding-top'    => '',
			'padding-bottom' => '',
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_banner_title_color',
	'label'       => esc_html__( 'Banner Title Color', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.fof_page_banner .pageBannerContent h2',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_banner_breadcrumb_color',
	'label'       => esc_html__( 'Bredcrumb Color', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.fof_page_banner .pageBannerContent .pageBannerPath',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_banner_breadcrumb_link_color_hover',
	'label'       => esc_html__( 'Bredcrumb Link Hover Color', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.fof_page_banner .pageBannerContent .pageBannerPath a:hover',
			'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'fof_custom_02',
	'label'       => FALSE,
	'section'     => 'fof_section',
	'default'     => '<div class="customizer_label">'.esc_html__('404 Content Settings', 'ulina').'</div>',
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'fof_titles',
	'label'         => esc_html__('404 Title', 'ulina'),
	'section'       => 'fof_section',
    'default'       => esc_html__('404', 'ulina'),
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'fof_sub_title',
	'label'         => esc_html__('404 Sub Title', 'ulina'),
	'section'       => 'fof_section',
	'default'       => esc_html__('Oops! Page not found.', 'ulina'),
);
$fields[] = array(
    'type'          => 'textarea',
	'settings'      => 'fof_contents',
	'label'         => esc_html__('404 Contents', 'ulina'),
	'section'       => 'fof_section',
	'default'       => esc_html__('The page you are looking for was moved removed, renamed or never existed', 'ulina'),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'fof_is_homes',
        'label'       => esc_html__( 'Is Home BTN?', 'ulina' ),
        'section'     => 'fof_section',
        'default'     => '1',
        'choices'     => array(
                'on'    => esc_html__( 'Enable', 'ulina' ),
                'off'   => esc_html__( 'Disable', 'ulina' ),
        ),
);
$fields[] = array(
    'type'        => 'text',
	'settings'    => 'fof_hbtn_label',
	'label'       => esc_html__( 'Home Btn Label', 'ulina' ),
	'section'     => 'fof_section',
	'default'     => esc_html__('Back To Home', 'ulina'),
    'required'      => array( 
        array( 
            'setting'   => 'is_homes',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'fof_custom_03',
	'label'       => FALSE,
	'section'     => 'fof_section',
	'default'     => '<div class="customizer_label">'.esc_html__('404 Content Style', 'ulina').'</div>',
);
$fields[]= array(
    'type'        => 'background',
    'settings'    => 'sec_404_setting',
    'label'       => esc_html__( 'Section Background', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => [
        'background-color'      => '',
        'background-image'      => '',
        'background-repeat'     => '',
        'background-position'   => '',
        'background-size'       => '',
        'background-attachment' => '',
    ],
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '.section_404',
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_title_color',
    'label'       => esc_html__( '404 Title Color', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent h2',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_sub_title_color',
    'label'       => esc_html__( '404 Sub Title Color', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent h3',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_desc_color',
    'label'       => esc_html__( '404 Content Color', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent p',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_color',
    'label'       => esc_html__( 'Home Btn Color', 'ulina' ),
    'description' => esc_html__( 'Insert your home btn Text color.', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent .ulinaBTN',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_bg',
    'label'       => esc_html__( 'Home Btn BG Color', 'ulina' ),
    'description' => esc_html__( 'Insert your home btn BG color.', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent .ulinaBTN::after',
            'property' => 'background'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_hover_color',
    'label'       => esc_html__( 'Home Btn Hover Color', 'ulina' ),
    'description' => esc_html__( 'Insert your home btn Text color.', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent .ulinaBTN:hover',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_hover_bg',
    'label'       => esc_html__( 'Home Btn Hover BG Color', 'ulina' ),
    'description' => esc_html__( 'Insert your home btn BG color.', 'ulina' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.fofContent .ulinaBTN:before',
            'property' => 'background'
        ],
    ],
);