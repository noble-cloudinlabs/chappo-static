<?php
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

$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'footer_custom_01',
    'label'       => FALSE,
    'section'     => 'footer_settings',
    'default'     => '<div class="customizer_label">'.esc_html__('Footer Settings', 'ulina').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'footer_style',
        'label'       => esc_html__( 'Select Footer Style', 'ulina' ),
        'section'     => 'footer_settings',
        'default'     => '0',
        'choices'     => $all_footer
);
$fields[] = array(
        'type'        => 'custom',
    'settings'    => 'footer_custom_03',
    'label'       => FALSE,
    'section'     => 'footer_settings',
    'default'     => '<div class="customizer_label mt40">'.esc_html__('Copyright Settings', 'ulina').'</div>',
        'active_callback' => array(
            array(
                'setting'   => 'footer_style',
                'operator'  => 'in',
                'value'     => ['0']
            )
        ),
);
$fields[] = array(
        'type'        => 'editor',
        'settings'    => 'copy_site_info',
        'label'       => esc_html__( 'Copyright Info', 'ulina' ),
        'section'     => 'footer_settings',
        'default'     => date('Y').' '.get_bloginfo('name').'. '.esc_html__(' All rights reserved.', 'ulina'),
        'active_callback' => array(
            array(
                'setting'   => 'footer_style',
                'operator'  => 'in',
                'value'     => ['0']
            )
        ),
);