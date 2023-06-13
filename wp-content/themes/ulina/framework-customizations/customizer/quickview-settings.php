<?php
$fields[] = array(
        'type' => 'custom',
        'settings' => 'qv_custom_01',
        'label' => FALSE,
        'section' => 'quickview_settings',
        'priority' => 1,
        'default' => '<div class="customizer_label">' . esc_html__('Quick View Settings', 'ulina') . '</div>',
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_flashlabel',
    'label' => esc_html__('Is Flash Labels?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_cat',
    'label' => esc_html__('Is Category?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_review',
    'label' => esc_html__('Is Show Rating?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_stock',
    'label' => esc_html__('Is Stock?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'text',
    'settings' => 'qv_stock_label',
    'label' => esc_html__('Stock Label', 'ulina'),
    'section' => 'quickview_settings',
    'default' => esc_html__('Available: ', 'ulina'),
    'active_callback' => [
        [
            'setting' => 'qv_is_stock',
            'operator' => '==',
            'value' => true,
        ]
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_wishlist',
    'label' => esc_html__('Is Wishlist?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'off',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_sku',
    'label' => esc_html__('Is SKU?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[] = array(
    'type' => 'switch',
    'settings' => 'qv_is_tag',
    'label' => esc_html__('Is Tag?', 'ulina'),
    'section' => 'quickview_settings',
    'default' => 'on',
    'choices' => [
        'on' => esc_html__('Show', 'ulina'),
        'off' => esc_html__('Hide', 'ulina'),
    ],
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'qv_is_social',
        'label'       => esc_html__( 'Is Social?', 'ulina' ),
        'section'     => 'quickview_settings',
        'default'     => 'off',
        'choices'     => [
                'on'     => esc_html__( 'Show', 'ulina' ),
                'off'    => esc_html__( 'Hide', 'ulina' ),
        ],
);
$fields[]= array(
        'type'        => 'multicheck',
        'settings'    => 'qv_product_social',
        'label'       => esc_html__( 'Select Social Media', 'ulina' ),
        'section'     => 'quickview_settings',
        'default'     => array('1', '2', '4', '5'),
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
                    'setting'  => 'qv_is_social',
                    'operator' => '==',
                    'value'    => true,
                ]
        ],
);