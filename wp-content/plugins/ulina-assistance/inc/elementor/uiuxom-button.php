<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Uiuxom_Button_Widget extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-button';
    }
    public function get_title() {
        return esc_html__( 'Ulina Button', 'uiuxom' );
    }
    public function get_icon() {
        return 'eicon-button';
    }
    public function get_categories() {
        return ['uiuxom-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab', [
                    'label'     => esc_html__('Button Label', 'uiuxom')
                ]
        );      
        $this->add_control( 'btn_style', [
                        'label'   => esc_html__( 'Button Style', 'uiuxom' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => '1',
                        'options' => [
                                '1'      => esc_html__( 'Style 01', 'uiuxom' ),
                                '2'      => esc_html__( 'Style 02', 'uiuxom' )
                        ]
                ]
        );
        $this->add_control( 'btn_type', [
                        'label'   => esc_html__( 'Button Type', 'uiuxom' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => '1',
                        'options' => [
                                '1'      => esc_html__( 'Normal', 'uiuxom' ),
                                '2'      => esc_html__( 'Popup', 'uiuxom' ),
                                '3'      => esc_html__( 'Scroll', 'uiuxom' ),
                        ]
                ]
        );
        $this->add_control('btn_label', [
                    'label'             => esc_html__('Button Label', 'uiuxom'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => true,
                    'default'           => esc_html__('Shop Now', 'uiuxom'),
                ]
        );
        $this->add_control('btn_icons', [
                        'label'         => esc_html__( 'Button Icon', 'uiuxom' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $this->add_control( 'btn_icon_position', [
                        'label'   => esc_html__( 'Icon Position', 'uiuxom' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'in_right',
                        'options' => [
                                'in_right'      => esc_html__( 'Right', 'uiuxom' ),
                                'in_left'       => esc_html__( 'Left', 'uiuxom' )
                        ]
                ]
        );
        $this->add_control( 'btn_url', [
                    'label'             => esc_html__( 'URL', 'uiuxom' ),
                    'type'              => Controls_Manager::URL,
                    'input_type'        => 'url',
                    'placeholder'       => esc_html__( 'https://your-link.com', 'uiuxom' ),
                    'show_external'     => true,
                    'default'           => [
                            'url'            => '',
                            'is_external'    => true,
                            'nofollow'       => true,
                    ],
                ]
        );
        $this->add_responsive_control( 'btn_align', [
                        'label'                     => esc_html__( 'Alignment', 'uiuxom' ),
                        'type'                      => Controls_Manager::CHOOSE,
                        'options'                   => [
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
                        'default'                   => 'left',
                        'prefix_class'              => 'ulina_btn_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__('Button Style', 'uiuxom'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'btn_1_typography',
                                'label' => esc_html__( 'Button Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaBTN, {{WRAPPER}} .ulinaBTN2',
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                    $this->start_controls_tab('btn_1_button_style_normal', [ 'label' => esc_html__( 'Normal', 'uiuxom' ), ]);
                        $this->add_responsive_control( 'btn_1_label_color', [
                                        'label' => esc_html__( 'Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .ulinaBTN'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .ulinaBTN2'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'btn_1_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaBTN:after, {{WRAPPER}} .ulinaBTN2',
                                ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'btn_border',
                                        'label' => esc_html__( 'Border', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .ulinaBTN, {{WRAPPER}} .ulinaBTN2',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'btn_box_shadow',
                                        'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .ulinaBTN, {{WRAPPER}} .ulinaBTN2',
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__( 'Hover', 'uiuxom' ),] );
                        $this->add_responsive_control( 'btn_1_label_color_hover', [
                                        'label' => esc_html__( 'Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .ulinaBTN:hover'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .ulinaBTN2:hover'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'btn_1_bg_hover',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaBTN:before, {{WRAPPER}} .ulinaBTN2:hover',
                                ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'btn_border_hover',
                                        'label' => esc_html__( 'Border', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .ulinaBTN:hover, {{WRAPPER}} .ulinaBTN2:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'btn_box_shadow_hover',
                                        'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .ulinaBTN:hover, {{WRAPPER}} .ulinaBTN2:hover',
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('btn_1_width', [
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
					'{{WRAPPER}} .ulinaBTN' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ulinaBTN2' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control('btn_1_height', [
				'label' => esc_html__( 'Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .ulinaBTN' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .ulinaBTN2' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control( 'border_radius', [
                            'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ulinaBTN' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .ulinaBTN2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaBTN' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaBTN2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ulinaBTN' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .ulinaBTN2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label'         => esc_html__('Icon Style', 'uiuxom'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'btn_icon_typography',
                                'label' => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaBTN i, {{WRAPPER}} .ulinaBTN2 i',
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('icon_button_style_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                        $this->add_responsive_control( 'icon_label_color', [
                                        'label' => esc_html__( 'Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .ulinaBTN i'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .ulinaBTN2 i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_1_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaBTN i, {{WRAPPER}} .ulinaBTN2 i',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_border',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .ulinaBTN i, {{WRAPPER}} .ulinaBTN2 i',
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_button_style_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                        $this->add_responsive_control( 'icon_label_hover_color', [
                                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .ulinaBTN:hover i'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .ulinaBTN2:hover i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_1_hover_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaBTN:hover i, {{WRAPPER}} .ulinaBTN2:hover i',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_hover_border',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .ulinaBTN:hover i, {{WRAPPER}} .ulinaBTN2:hover i',
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'icon_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ulinaBTN i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .ulinaBTN2 i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'icon_1_width', [
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
                                    '{{WRAPPER}} .ulinaBTN i' => 'width: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaBTN2 i' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control( 'icon_1_height', [
                                'label' => esc_html__( 'Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .ulinaBTN i' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .ulinaBTN2 i' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_icon_positioning', [
                                'label' => esc_html__( 'Icon Position', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaBTN i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                        '{{WRAPPER}} .ulinaBTN2 i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_icon_margin', [
                            'label' => esc_html__( 'Icon Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['left', 'right'],
                            'selectors' => [
                                    '{{WRAPPER}} .ulinaBTN i' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaBTN2 i' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $btn_style      = (isset($settings['btn_style']) && $settings['btn_style'] > 0 ? $settings['btn_style'] : 1);
        $btn_type       = (isset($settings['btn_type']) && $settings['btn_type'] > 0 ? $settings['btn_type'] : 1);
        $btn_label      = (isset($settings['btn_label']) && $settings['btn_label'] != '') ? $settings['btn_label'] : esc_html__('Read More', 'uiuxom');
        $icons          = (isset($settings['btn_icons']) && $settings['btn_icons'] != '') ? '<i class="'.$settings['btn_icons'].'"></i>' : '';
        
        $target         = isset($settings['btn_url']['is_external']) && !empty($settings['btn_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($settings['btn_url']['nofollow']) && !empty($settings['btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : 'javascript:void(0);';
        
        $icon_position  = (isset($settings['btn_icon_position']) && $settings['btn_icon_position'] != '' ? $settings['btn_icon_position'] : 'in_right');
        $btn_html       = ($icon_position == 'in_left' ? $icons : '');
        $btn_html      .= $btn_label;
        $btn_html      .= ($icon_position == 'in_right' ? $icons : '');
        
        $attributs = '';
        if(isset($settings['btn_url']['custom_attributes']) && !empty($settings['btn_url']['custom_attributes'])):
            $custom_attributes = explode(',', $settings['btn_url']['custom_attributes']);
            foreach($custom_attributes as $cas):
                $attribut = explode('|', $cas);
                $attributs .= (isset($attribut[0]) && !empty($attribut[0]) ? $attribut[0] : '').(isset($attribut[1]) && !empty($attribut[1]) ? '='.$attribut[1].' ' : ' ');
            endforeach;
        endif;

        if($btn_style == 2): ?>
                <a class="ulinaBTN2 <?php echo esc_attr($icon_position); ?> <?php echo ($btn_type == 2 ? 'btnPopup' : ($btn_type == 3 ? 'scrollTo' : '')); ?>"  <?php echo esc_attr($attributs); ?> <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>">
                    <span><?php echo ulina_kses($btn_html) ?></span>
                </a>
        <?php else: ?>
                <a class="ulinaBTN <?php echo esc_attr($icon_position); ?> <?php echo ($btn_type == 2 ? 'btnPopup' : ($btn_type == 3 ? 'scrollTo' : '')); ?>"  <?php echo esc_attr($attributs); ?> <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>">
                    <span><?php echo ulina_kses($btn_html) ?></span>
                </a>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
            
}