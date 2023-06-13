<?php
$header = array(
    'post_type'       => 'uiux-header-builder',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'orderby'         => 'title',
    'order'           => 'ASC'
);
$all_header = array(
    '0' => esc_html__('Default Header', 'ulina')
);
$headers = new WP_Query($header);
if($headers->have_posts()):
    while($headers->have_posts()):
    $headers->the_post();
    $all_header[get_the_ID()] = get_the_title();
    endwhile;
endif;
wp_reset_postdata();

$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_01',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Header Settings', 'ulina') . '</div>',
);
$fields[] = array(
    'type'      => 'select',
    'settings'  => 'header_style',
    'label'     => esc_html__('Header Style', 'ulina'),
    'section'   => 'header_settings',
    'default'   => '0',
    'choices'   => $all_header,
);
//Main Header Settings
$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_04',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Header Settings', 'ulina') . '</div>',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_sticky',
    'label'     => esc_html__('Is Sticky?', 'ulina'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'ulina'),
        'off'   => esc_html__('Disable ', 'ulina'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]           = array(
    'type'          => 'image',
    'settings'      => 'header_logo',
    'label'         => esc_html__('Logo', 'ulina'),
    'description'   => esc_html__('Upload your site logo. Default logo size 140x42px.', 'ulina'),
    'section'       => 'header_settings',
    'default'       => '',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);