<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$all_header = array(
    '0' => esc_html__('Default Header', 'ulina')
);
global $wpdb; 
$table = $wpdb->prefix.'posts';

$sql = $wpdb->prepare("SELECT * FROM $table WHERE post_type = %s and post_status = %s order by post_title ASC", array('uiux-header-builder', 'publish'));
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
    foreach ($results as $rs):
        $all_header[$rs['ID']] = $rs['post_title'];
    endforeach;
endif;

$all_footer = array(
    '0' => esc_html__('Default Footer', 'ulina')
);
global $wpdb; 
$table = $wpdb->prefix.'posts';

$sql = $wpdb->prepare("SELECT * FROM $table WHERE post_type = %s and post_status = %s order by post_title ASC", array('uiux-footer-builder', 'publish'));
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
    foreach ($results as $rs):
        $all_footer[$rs['ID']] = $rs['post_title'];
    endforeach;
endif;

$options = array(
	'mains' => array(
		'title'   => esc_html__( 'Page Settings Box', 'ulina' ),
		'type'    => 'box',
		'options' => array( 
                        'pageheadersettings' => array(
                                'title'   => esc_html__( 'Custom Header Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_header_enabled'     => array(
                                                'type'  => 'switch',
                                                'value' => '2',
                                                'label' => esc_html__('Enable Setting', 'ulina'),
                                                'desc'  => esc_html__('Do you want to enable custom header settings for this page?', 'ulina'),
                                                'right-choice' => array(
                                                    'value' => '1',
                                                    'label' => esc_html__('Yes', 'ulina'),
                                                ),
                                                'left-choice' => array(
                                                    'value' => '2',
                                                    'label' => esc_html__('No', 'ulina'),
                                                ),
                                        ),
                                        'page_header_style'         => array(
                                                'type'    => 'select',
                                                'value'   => '0',
                                                'label'   => esc_html__('Select Header Style', 'ulina'),
                                                'desc'    => esc_html__('Select page header for this page.', 'ulina'),
                                                'choices' => $all_header
                                        ),
                                )
                        ),
                        'footersettings'  => array(
                                'title'   => esc_html__( 'Custom Footer Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                    'page_footer_enabled'   => array(
                                            'type'          => 'switch',
                                            'value'         => '2',
                                            'label'         => esc_html__('Enable Setting', 'ulina'),
                                            'desc'          => esc_html__('Do you want to enable custom footer settings for this page?', 'ulina'),
                                            'right-choice'  => array(
                                                'value'     => '1',
                                                'label'     => esc_html__('Yes', 'ulina'),
                                            ),
                                            'left-choice'   => array(
                                                'value'     => '2',
                                                'label'     => esc_html__('No', 'ulina'),
                                            ),
                                    ),
                                    'page_footer_style' => array(
                                            'label'     => esc_html__( 'Select Footer Style', 'ulina' ),
                                            'type'      => 'select',
                                            'value'     => '0',
                                            'choices'   => $all_footer
                                    ),
                            ),
                        ),
                        'bannersettings' => array(
                                'title'   => esc_html__( 'Banner Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_is_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Settings', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'ulina' )
                                                ),
                                                'value'        => '2',
                                                'desc'         => esc_html__('Enable bellow settings for this page banner.', 'ulina'),
                                        ),
                                        'page_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner only for this page? Then please turn it to Hide.', 'ulina'),
                                        ),
                                        'page_banner_bg' => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'ulina' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image and this only work for dark version.', 'ulina' ),
                                        ),
                                        'page_banner_bg_color'	=> array(
                                                'type'          => 'rgba-color-picker',
                                                'value'         => '',
                                                'palettes'      => array(),
                                                'label'         => esc_html__('Banner BG Color', 'ulina'),
                                                'desc'          => esc_html__('Insert your page banner bg color here.', 'ulina'),
                                        ),
                                        'page_banner_title'	 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'ulina' ),
                                                'desc'		 => esc_html__( 'Insert your page banner custom title.', 'ulina' ),
                                        ),
                                        'page_is_breadcrumb'   => array(
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
                                                'desc'         => esc_html__('Do you want to show breadcrumb on page banner?', 'ulina'),
                                        ),
                                        'page_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Content Alignment', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left'         => esc_html__( 'Left', 'ulina' ),
                                                        'center'       => esc_html__( 'Center', 'ulina' ),
                                                        'right'        => esc_html__( 'Right', 'ulina' ),
                                                ),
                                        ),
                                )   
                        ),
                        'pagesettings' => array(
                                'title'   => esc_html__( 'Page Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_is_con_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Content Settings', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'ulina' )
                                                ),
                                                'value'        => '2',
                                                'desc'         => esc_html__('Enable bellow settings for this page content are.', 'ulina'),
                                        ),
                                        'page_sidebar'              => array(
                                                'label'   => esc_html__( 'Sidebar Template', 'ulina' ),
                                                'type'    => 'select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your page template. This option only work for this page.', 'ulina' ),
                                                'choices' => array(
                                                        '1'         => esc_html__( 'No Sidebar', 'ulina' ),
                                                        '2'         => esc_html__( 'Left Sidebar', 'ulina' ),
                                                        '3'         => esc_html__( 'Right Sidebar', 'ulina' )
                                                ),
                                        ),
                                )
                        ),
                        
                        
		),
	),
);
