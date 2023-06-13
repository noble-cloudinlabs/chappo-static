<?php
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'color_custom_01',
	'label'       => FALSE,
	'section'     => 'colorpreset_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Primary Color', 'ulina').'</div>',
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'cp_primary_color_hex',
	'label'       => esc_html__( 'Primary Color', 'ulina' ),
	'description' => esc_html__( 'Insert your site primary color HEX code. this color option work all over the site.', 'ulina' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--theme-color'
		],
	],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'color_custom_02',
	'label'       => FALSE,
	'section'     => 'colorpreset_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Secondary Color', 'ulina').'</div>',
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'cp_secondary_color_hex',
	'label'       => esc_html__( 'Secondary Color', 'ulina' ),
	'description' => esc_html__( 'Insert your site secondary color HEX code. this color option work all over the site.', 'ulina' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--secondary-color'
		],
	],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'color_custom_03',
	'label'       => FALSE,
	'section'     => 'colorpreset_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Body Color', 'ulina').'</div>',
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'cp_body_color_hex',
	'label'       => esc_html__( 'Body Color', 'ulina' ),
	'description' => esc_html__( 'Insert your site body color HEX code. this color option work all over the site.', 'ulina' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--body-color'
		],
	],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'color_custom_04',
	'label'       => FALSE,
	'section'     => 'colorpreset_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Headings Color', 'ulina').'</div>',
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'cp_heading_color_hex',
	'label'       => esc_html__( 'Headings Color', 'ulina' ),
	'description' => esc_html__( 'Insert your site headings color HEX code. this color option work all over the site.', 'ulina' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--heading-color'
		],
	],
);