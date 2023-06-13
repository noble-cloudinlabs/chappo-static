<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'uiuxom-text';
    }

    public function get_title() {
        return esc_html__( 'Text Editor', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-text';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__('Editor Content', 'uiuxom'),
            ]
        );
                $this->add_control( 'editor_content', [
                                'label' => esc_html__( 'Description', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::WYSIWYG
                        ]
                );  
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_222', [
                'label'	 => esc_html__( 'Global Styling', 'uiuxom' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'global_typography',
                                'label'     => esc_html__( 'Glogal Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor',
                        ]
                );
                $this->add_responsive_control( 'global_color', [
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxom_editor' => 'color: {{VALUE}}'
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'	 => esc_html__( 'Pagraph Styling', 'uiuxom' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'para_color', [
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxom_editor p' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'para_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor p',
                        ]
                );
                $this->add_responsive_control( 'para_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .uiuxom_editor p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_3', [
                'label'  => esc_html__( 'Link Styling', 'uiuxom' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'icon_label_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor a'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_label_hover_color', [
                            'label' => esc_html__( 'Hover Color', 'uiuxom' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .uiuxom_editor a:hover'   => 'color: {{VALUE}}'
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'link_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor a',
                        ]
                );
                $this->add_responsive_control( 'link_text_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'  => esc_html__( 'Hadings Styling', 'uiuxom' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_control( 'area_label_1', [
				'label' => esc_html__( 'H1 Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_responsive_control( 'te_h1_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor h1'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h1_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor h1',
                        ]
                );
                $this->add_responsive_control( 'te_h1_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_2', [
				'label' => esc_html__( 'H2 Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'te_h2_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor h2'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h2_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor h2',
                        ]
                );
                $this->add_responsive_control( 'te_h2_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_3', [
				'label' => esc_html__( 'H3 Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'te_h3_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor h3'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h3_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor h3',
                        ]
                );
                $this->add_responsive_control( 'te_h3_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_4', [
				'label' => esc_html__( 'H4 Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'te_h4_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor h4'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h4_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor h4',
                        ]
                );
                $this->add_responsive_control( 'te_h4_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_5', [
				'label' => esc_html__( 'H5 Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'te_h5_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor h5'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h5_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor h5',
                        ]
                );
                $this->add_responsive_control( 'te_h5_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_6', [
				'label' => esc_html__( 'H5 Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'te_h6_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor h6'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h6_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor h6',
                        ]
                );
                $this->add_responsive_control( 'te_h6_margin', [
                            'label'      => esc_html__( 'Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_5', [
                'label'  => esc_html__( 'UL Styling', 'uiuxom' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'te_ul_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor ul li'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_ul_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor ul',
                        ]
                );
                $this->add_responsive_control( 'te_li_sign_width', [
                                'label' => __( 'Sign Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .uiuxom_editor ul li:after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'te_li_sign_height', [
                                'label' => __( 'Sign Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .uiuxom_editor ul li:after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'te_ul_li_sign_color', [
                                'label' => esc_html__( 'Sign BG Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor ul li:after'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'te_ul_li_sign_radius', [
                            'label'      => esc_html__( 'Sign Radius', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ul li:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_li_sign_margin', [
                            'label'      => esc_html__( 'Sign Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ul li:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_li_padding', [
                            'label'      => esc_html__( 'LI Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_li_margin', [
                            'label'      => esc_html__( 'LI Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_padding', [
                            'label'      => esc_html__( 'UL Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_margin', [
                            'label'      => esc_html__( 'UL Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_6', [
                'label'  => esc_html__( 'OL Styling', 'uiuxom' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'te_ol_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .uiuxom_editor ol li'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_ol_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxom_editor ol',
                        ]
                );
                $this->add_responsive_control( 'te_ol_li_padding', [
                            'label'      => esc_html__( 'LI Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ol li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ol_li_margin', [
                            'label'      => esc_html__( 'LI Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ol li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ol_padding', [
                            'label'      => esc_html__( 'OL Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ol' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ol_margin', [
                            'label'      => esc_html__( 'OL Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .uiuxom_editor ol' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
        $editor_content          = (isset($settings['editor_content']) && $settings['editor_content'] != '') ? $settings['editor_content'] : '';
        

        if(!empty($editor_content)): ?><div class="uiuxom_editor"><?php echo do_shortcode($editor_content); ?></div><?php endif;
    }

    protected function content_template() {

    }
}

