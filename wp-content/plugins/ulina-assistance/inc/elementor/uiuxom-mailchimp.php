<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Mailchimp_Widgets extends Widget_Base {

    public function get_name() {
        return 'uiuxom-mailchimp';
    }

    public function get_title() {
        return esc_html__( 'Mailchimp From', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_categories() {
        return [ 'uiuxom-footer-elements' ];
    }

    protected function register_controls() {
        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="mc4wp-form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('Select', 'uiuxom'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Mail Form', 'uiuxom' ),
            ]
        );
        $this->add_control(
                'mail_form',
                [
                        'label'     => esc_html__( 'Select Form', 'uiuxom' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => '0',
                        'options'   => $shortcodes,
                ]
        );
        $this->add_responsive_control(
            'mail_align', [
                'label'			=> esc_html__( 'Alignment', 'uiuxom' ),
                'type'			=> Controls_Manager::CHOOSE,
                'options'            => [
                        'left'       => [
                                'title'  => esc_html__( 'Left', 'uiuxom' ),
                                'icon'   => 'eicon-text-align-left',
                        ],
                        'center'     => [
                                'title'  => esc_html__( 'Center', 'uiuxom' ),
                                'icon'   => 'eicon-text-align-center',
                        ],
                        'right'      => [
                                'title'  => esc_html__( 'Right', 'uiuxom' ),
                                'icon'   => 'eicon-text-align-right',
                        ]
                ],
                'default'		=> 'left',
                'prefix_class'          => 'mail_form elementor%s-align-',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'	 => esc_html__( 'Mail From Style', 'uiuxom' ),
                    'tab'	 => Controls_Manager::TAB_STYLE,
                ]
            );
                $this->add_responsive_control(
                        'input_color',
                        [
                                'label'     => esc_html__( 'Email Field Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .subscribForm form input[type=email]' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .subscribForm form input[type=email]::-moz-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .subscribForm form input[type=email]::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .subscribForm form input[type=email]::-ms-input-placeholder' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'input_opacity',
                        [
                                'label' => esc_html__( 'Placeholder Opacity', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1,
                                'step' => .10,
                                'default' => '',
                                'selectors' => [
                                        '{{WRAPPER}} .subscribForm form input[type=email]'       => 'opacity: {{VALUE}}',
                                        '{{WRAPPER}} .subscribForm form input[type=email]::-moz-placeholder'       => 'opacity: {{VALUE}}',
                                        '{{WRAPPER}} .subscribForm form input[type=email]::-ms-input-placeholder'  => 'opacity: {{VALUE}}',
                                        '{{WRAPPER}} .subscribForm form input[type=email]::-ms-input-placeholder'  => 'opacity: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'input_bg_color',
                        [
                                'label'     => esc_html__( 'Email Field BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .subscribForm form input[type="email"]' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name'      => 'input_border',
                                'label'     => esc_html__( 'Border', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .subscribForm form input[type="email"]',
                        ]
                );
                $this->add_responsive_control(
                        'input_border_radius',
                        [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribForm form input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'input_height',
                        [
                                'label' => esc_html__( 'Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribForm form input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                 $this->add_responsive_control(
                        'input_width',
                        [
                                'label' => esc_html__( 'Width', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribForm form input[type="email"]' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                                'name'      => 'input_typography',
                                'label'     => esc_html__( 'Input Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .subscribForm form input[type="email"]',
                        ]
                );
                $this->add_responsive_control(
                        'input_paddings',
                        [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribForm form input[type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'input_margins',
                        [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribForm form input[type="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control(
                    'input_align', [
                        'label'   => esc_html__( 'Alignment', 'uiuxom' ),
                        'type'    => Controls_Manager::CHOOSE,
                        'options'            => [
                                'left'       => [
                                        'title'  => esc_html__( 'Left', 'uiuxom' ),
                                        'icon'   => 'eicon-text-align-left',
                                ],
                                'center'     => [
                                        'title'  => esc_html__( 'Center', 'uiuxom' ),
                                        'icon'   => 'eicon-text-align-center',
                                ],
                                'right'      => [
                                        'title'  => esc_html__( 'Right', 'uiuxom' ),
                                        'icon'   => 'eicon-text-align-right',
                                ]
                        ],
                        'default'   => 'left',
                        'selectors' => [
                            '{{WRAPPER}} .subscribForm form input[type="email"]'   => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
            $this->end_controls_section();

            $this->start_controls_section(
                'section_tab_4',
                [
                    'label'         => esc_html__('Button Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'btn_typography',
                            'label'     => esc_html__( 'Typography', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .subscribForm form button',
                    ]
            );
            $this->add_responsive_control(
                    'btn_paddings',
                    [
                            'label'      => esc_html__( 'Paddings', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .subscribForm form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'btn_margins',
                    [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .subscribForm form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'btn_border_radius',
                    [
                            'label'      => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .subscribForm form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'btn_height',
                    [
                            'label' => esc_html__( 'Height', 'uiuxom' ),
                            'type'  => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range'      => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .subscribForm form button'  => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'btn_width',
                    [
                            'label'      => esc_html__( 'Width', 'uiuxom' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range'      => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .subscribForm form button'  => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->start_controls_tabs( 'style_tabs_sdf' );
                    $this->start_controls_tab(
                            'btn_2_button_style_normal',
                            [
                                    'label' => esc_html__( 'Normal', 'uiuxom' ),
                            ]
                    );
                    $this->add_responsive_control(
                            'btn_e_label_color',
                            [
                                    'label' => esc_html__( 'Label Color', 'uiuxom' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .subscribForm form button' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Background::get_type(),
                            [
                                'name' => 'btn_3_bg_color',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .subscribForm form button'
                            ]
                    );
                    $this->end_controls_tab();
                    $this->start_controls_tab(
                            'btn_2_button_style_hover',
                            [
                                    'label' => esc_html__( 'Hover', 'uiuxom' ),
                            ]
                    );
                    $this->add_responsive_control(
                            'btn_label_hover_color',
                            [
                                    'label' => esc_html__( 'Label Hover Color', 'uiuxom' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .subscribForm form button:hover'  => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Background::get_type(),
                            [
                                'name' => 'btn_1_bg_hover_color',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .subscribForm form button:hover'
                            ]
                    );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $mail_form      = (isset($settings['mail_form']) && $settings['mail_form'] != '') ? $settings['mail_form'] : 0;
        
        ?>
        <div class="subscribForm">
                <?php
                if($mail_form > 0){
                        echo do_shortcode('[mc4wp_form id="'.$mail_form.'"]');
                }else{
                        ?>
                        <div class="alert alert-warning" role="alert">
                        <?php echo esc_html__('Please Select Mail Chimp Form.', 'uiuxom'); ?>
                        </div>
                        <?php
                }
                ?>
        </div>
        <?php
        
    }

    protected function content_template() {}    
}