<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	'_blocks_meta2' => array(
		'title'		 => false,
		'type'		 => 'box',
                'context'        => 'normal',
		'options'	 => array(
                        '_blocks_banner' => array(
                                'title'		 => esc_html__( 'Banner Settings', 'ulina' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'blocks_is_banner'                    => array(
                                                'label'        => esc_html__( 'Is Banner', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'        => '1',
                                                'desc'         => esc_html__('Do you want to hide banner only for this blocks details page?', 'ulina'),
                                        ),
                                        'blocks_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'ulina' ),
                                        ),
                                        'blocks_banner_bg_color'	 => array(
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'palettes' => array(),
                                                'label' => esc_html__('Banner BG Color', 'ulina'),
                                                'desc'  => esc_html__('Insert your blocks banner bg color here.', 'ulina'),
                                        ),
                                        'blocks_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'ulina' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'ulina' ),
                                        ),
                                        'blocks_is_breadcrumb'                    => array(
                                                'label'        => esc_html__( 'Is Breadcrumb?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'ulina' )
                                                ),
                                                'value'        => '1',
                                                'desc'         => esc_html__('Do you want to show breadcrumb on blocks banner?', 'ulina'),
                                        ),
                                        'blocks_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Content Alignment', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left'           => esc_html__( 'Left', 'ulina' ),
                                                        'center'         => esc_html__( 'Center', 'ulina' ),
                                                        'right'          => esc_html__( 'Right', 'ulina' ),
                                                ),
                                        ),
                                ),
                        )
		),
	),
);
