<?php
/* main header Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_03',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label">'.esc_html__('Header Styling', 'ulina').'</div>',
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_header_bg_color',
	'label'       => esc_html__( 'Header BG', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header01',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_header_bg_sticky',
	'label'       => esc_html__( 'Sticky Header BG', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header01.fixedHeader',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);

/* Menu Bar Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_05',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Menu Item Styling', 'ulina').'</div>',
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml1_color',
	'label'       => esc_html__( 'Menu Level-1 Color', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.mainMenu ul li a',
            'property' => 'color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml1_h_color',
	'label'       => esc_html__( 'Menu Level-1 Hover Color', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.mainMenu ul li:hover > a, .mainMenu ul li.current-menu-item > a',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_bg_color',
	'label'       => esc_html__( 'Menu Level-2 BG Color', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.mainMenu ul li .sub-menu',
            'property' => 'background'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_txt_color',
	'label'       => esc_html__( 'Menu Level-2 Item Color', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.mainMenu ul li .sub-menu li a',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_txt_h_color',
	'label'       => esc_html__( 'Menu Level-2 Item Hover Color', 'ulina' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.mainMenu ul li .sub-menu li.current-menu-item > a, .mainMenu ul li .sub-menu li:hover > a',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);