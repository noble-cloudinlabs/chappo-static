<?php
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'general_custom_01',
	'label'       => FALSE,
	'section'     => 'general_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Global Site Settings', 'ulina').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'show_preloader',
        'label'       => esc_html__( 'Show Preloader', 'ulina' ),
        'section'     => 'general_section',
        'default'     => '2',
        'choices'     => array(
                'on'    => esc_html__( 'Enable', 'ulina' ),
                'off'   => esc_html__( 'Disable', 'ulina' ),
        ),
);
$fields[]= array(
    'type'         => 'radio-image',
	'settings'     => 'proloader',
	'label'        => esc_html__( 'Preloader', 'ulina' ),
	'section'      => 'general_section',
	'default'      => '0',
	'choices'      => [
		'0'    => ULINA_ASSETS_IMAGES_URL . '/options/0.jpg',
        '1'    => ULINA_ASSETS_IMAGES_URL . '/options/1.jpg',
		'2'    => ULINA_ASSETS_IMAGES_URL . '/options/2.jpg',
		'3'    => ULINA_ASSETS_IMAGES_URL . '/options/3.jpg',
		'4'    => ULINA_ASSETS_IMAGES_URL . '/options/4.jpg',
		'5'    => ULINA_ASSETS_IMAGES_URL . '/options/5.jpg',
		'6'    => ULINA_ASSETS_IMAGES_URL . '/options/6.jpg',
		'7'    => ULINA_ASSETS_IMAGES_URL . '/options/7.jpg',
		'8'    => ULINA_ASSETS_IMAGES_URL . '/options/8.jpg',
		'9'    => ULINA_ASSETS_IMAGES_URL . '/options/9.jpg',
		'10'   => ULINA_ASSETS_IMAGES_URL . '/options/10.jpg',
		'11'   => ULINA_ASSETS_IMAGES_URL . '/options/11.jpg',
		'12'   => ULINA_ASSETS_IMAGES_URL . '/options/12.jpg',
		'13'   => ULINA_ASSETS_IMAGES_URL . '/options/13.jpg',
		'14'   => ULINA_ASSETS_IMAGES_URL . '/options/14.jpg',
		'15'   => ULINA_ASSETS_IMAGES_URL . '/options/15.jpg',
		'16'   => ULINA_ASSETS_IMAGES_URL . '/options/16.jpg',
		'17'   => ULINA_ASSETS_IMAGES_URL . '/options/17.jpg',
		'18'   => ULINA_ASSETS_IMAGES_URL . '/options/18.jpg',
		'19'   => ULINA_ASSETS_IMAGES_URL . '/options/19.jpg',
		'20'   => ULINA_ASSETS_IMAGES_URL . '/options/20.jpg',
	],
    'required'      => array(
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'loader_bg_color',
	'label'       => esc_html__( 'Loader BG Color', 'ulina' ),
	'description' => esc_html__( 'Insert your site loader backgourd color', 'ulina' ),
	'section'     => 'general_section',
	'default'     => '',
        'choices'     => [
		'alpha' => true,
	],
    'transport'   => 'auto',
	'output'      => [
            [
                    'element'  => '.preloader',
                    'property' => 'background',
            ]
    ],
    'required'      => array(
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'loader_anim_color',
	'label'       => esc_html__( 'Loader Animation Color', 'ulina' ),
	'description' => esc_html__( 'Insert your site loader animation color.', 'ulina' ),
	'section'     => 'general_section',
	'default'     => '',
        'choices'     => [
		'alpha' => true,
	],
    'transport'   => 'auto',
	'output'      => [
            [
                    'element'  => '.la-ball-scale-multiple, .la-ball-circus, .la-ball-climbing-dot, .la-ball-clip-rotate, .la-ball-clip-rotate-multiple, 
                    .la-ball-clip-rotate-pulse, .la-ball-newton-cradle, .la-ball-rotate, .la-ball-scale-ripple-multiple, .la-ball-zig-zag, .la-fire, .la-line-scale, 
                    .la-line-scale-party, .la-line-scale-pulse-out, .la-line-spin-clockwise-fade-rotating, .la-square-jelly-box, .la-square-spin, .la-pacman, .la-timer',
                    'property' => 'color',
            ],
            [
                    'element'  => '.sk-folding-cube .sk-cube:before',
                    'property' => 'background-color',
            ],
            [
                    'element'  => '.spinner-eff.spinner-eff-1 .bar-top',
                    'property' => 'border-top-color',
            ],
            [
                    'element'  => '.spinner-eff.spinner-eff-1 .bar-right',
                    'property' => 'border-right-color',
            ],
            [
                    'element'  => '.spinner-eff.spinner-eff-1 .bar-bottom',
                    'property' => 'border-bottom-color',
            ],
            [
                    'element'  => '.spinner-eff.spinner-eff-1 .bar-left',
                    'property' => 'border-left-color',
            ]
    ],
    'required'      => array(
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[]= array(
        'type'        => 'text',
        'settings'    => 'map_api',
        'label'       => esc_html__( 'Google Map API Key', 'ulina' ),
        'section'     => 'general_section',
        'default'     =>  '',
);




