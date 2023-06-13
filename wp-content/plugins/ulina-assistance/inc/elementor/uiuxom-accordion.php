<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Accordion_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-accordion';
    }
    
    public function get_title() {
        return esc_html__( 'Accordion', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Accordion', 'uiuxom' ),
            ]
        );
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'accr_title', [
                                    'label'         => esc_html__( 'Accordion Title', 'uiuxom' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => esc_html__('Accordion Title', 'uiuxom'),
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Insert accordion title', 'uiuxom')
                            ]
                    );
                    $repeater->add_control( 'is_expand', [
                                    'label'             => esc_html__( 'Is Expand?', 'uiuxom' ),
                                    'type'              => Controls_Manager::SWITCHER,
                                    'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                    'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                    'description'       => esc_html__('Do you want to make this item expand?', 'uiuxom'),
                                    'return_value'      => 'yes',
                                    'default'           => 'no',
                            ]
                    );
                    $repeater->add_control( 'accr_content', [
                                    'label'     => esc_html__( 'Content', 'uiuxom' ),
                                    'type'      => Controls_Manager::WYSIWYG,
                                    'default'   => esc_html__('Insert accordion content here.'),
                                    'placeholder'   => esc_html__('Insert accordion content', 'uiuxom')
                            ]
                    );
                $this->add_control('list', [
                                    'label'         => esc_html__( 'Accordion Item', 'uiuxom' ),
                                    'type'          => Controls_Manager::REPEATER,
                                    'fields'        => $repeater->get_controls(),
                                    'default'       => [
                                            [
                                                    'accr_title'       => esc_html__( '', 'uiuxom' ),
                                                    'is_expand'        => 'no',
                                                    'accr_content'     => esc_html__( '', 'uiuxom' ),

                                            ],
                                    ],
                                    'title_field' => '{{{ accr_title }}}',
                            ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2', [
                'label'     => esc_html__('Accordion Card Style', 'uiuxom'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'ac_card_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-item',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'ac_card_border',
                                'label' => esc_html__( 'Item Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-item',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'ac_card_shadow',
                                'label' => esc_html__( 'Item Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-item',
                        ]
                );
                $this->add_responsive_control( 'ac_card_border_radius', [
                            'label'      => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .ulinaAccordion .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('ac_card_margin', [
                                'label' => esc_html__( 'Item Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaAccordion .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ac_card_padding', [
                                'label' => esc_html__( 'Item Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaAccordion .accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label'     => esc_html__('Card Head Style', 'uiuxom'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ac_heading_typography',
                                'label'     => esc_html__( 'Card Heading Typo', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ulinaAccordion .accordion-header button',
                        ]
                );
                $this->start_controls_tabs( 'ac_headeing_tabs' );
                    $this->start_controls_tab('ac_head_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'ac_heading_bg_coolor',[
                                            'label'     => esc_html__( 'Heading BG Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaAccordion .accordion-header button.collapsed' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'ac_heading_coolor',[
                                            'label'     => esc_html__( 'Heading Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaAccordion .accordion-header button.collapsed' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ac_heading_border',
                                            'label' => esc_html__( 'Item Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-header button.collapsed',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_head_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'ac_heading_bg_coolor_hover',[
                                            'label'     => esc_html__( 'Heading BG Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaAccordion .accordion-header button:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control('ac_heading_coolor_hov',[
                                            'label'     => esc_html__( 'Heading Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button:hover' => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ac_heading_border_hover',
                                            'label' => esc_html__( 'Item Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-header button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_head_tab_active',['label' => esc_html__( 'Active', 'uiuxom' )]);
                            $this->add_responsive_control( 'ac_heading_bg_coolor_act',[
                                            'label'     => esc_html__( 'Heading BG Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaAccordion .accordion-header button:not(.collapsed)' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .ulinaAccordion .accordion-header button' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'ac_heading_coolor_act',[
                                            'label'     => esc_html__( 'Heading Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button:not(.collapsed)' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ac_heading_border_active',
                                            'label' => esc_html__( 'Item Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-header button:not(.collapsed), {{WRAPPER}} .ulinaAccordion .accordion-header button',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'ac_card_heading_radius', [
                            'label'      => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .ulinaAccordion .accordion-header button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_heading_padding', [
                                'label' => esc_html__( 'Card Heading Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaAccordion .accordion-header button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'plus_minus_options', [
				'label' => esc_html__( '+/- Styling', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'acc_sign_width', [
                                'label' => __( '+/- Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .ulinaAccordion .accordion-button::after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'acc_sign_height', [
                                'label' => __( '+/- Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .ulinaAccordion .accordion-button::after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ac_heading_sign_typography',
                                'label'     => esc_html__( 'Card +/- Typo', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ulinaAccordion .accordion-button::after',
                        ]
                );
                $this->start_controls_tabs( 'ac_sign_tabs' );
                    $this->start_controls_tab('ac_sign_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'ac_plus_bg_coolor',[
                                            'label'     => esc_html__( 'Card +/- BG Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button.collapsed:after'  => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'ac_plus_txt_coolor',[
                                            'label'     => esc_html__( 'Card +/- Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button.collapsed:after'  => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ac_plus_borders',
                                            'label' => esc_html__( '+/- Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-header button.collapsed:after',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_sign_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'ac_plus_bg_coolor_hov',[
                                            'label'     => esc_html__( 'Card +/- BG Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button:hover:after'  => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'ac_plus_txt_coolor_hover',[
                                            'label'     => esc_html__( 'Card +/- Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button:hover:after'  => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ac_plus_borders_hover',
                                            'label' => esc_html__( '+/- Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-header button:hover:after',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_sign_tab_active',['label' => esc_html__( 'Active', 'uiuxom' )]);
                            $this->add_responsive_control( 'ac_plus_bg_coolor_act',[
                                            'label'     => esc_html__( 'Card +/- BG Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button:not(.collapsed):after'  => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'ac_plus_txt_coolor_act',[
                                            'label'     => esc_html__( 'Card +/- Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .ulinaAccordion .accordion-header button:not(.collapsed):after'  => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ac_plus_borders_act',
                                            'label' => esc_html__( '+/- Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-header button:not(.collapsed):after',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'ac_sign_radius', [
                                'label' => esc_html__( '+/- Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaAccordion .accordion-button::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ac_sign_padding', [
                                'label' => esc_html__( '+/- Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaAccordion .accordion-button::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ac_sign_position', [
                                'label' => esc_html__( '+/- Position', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaAccordion .accordion-button::after' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_icon_margin', [
                            'label' => esc_html__( 'Card +/- Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['left', 'right'],
                            'selectors' => [
                                '{{WRAPPER}} .ulinaAccordion .accordion-button::after' => 'margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_4', [
                'label'     => esc_html__('Card Body Style', 'uiuxom'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ac_body_typography',
                                'label'     => esc_html__( 'Global Typo', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ulinaAccordion .accordion-body',
                        ]
                );
                $this->add_responsive_control( 'ac_body_color',[
                                'label'     => esc_html__( 'Global Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaAccordion .accordion-body' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'ac_body_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-body',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'ac_body_card_border',
                                'label' => esc_html__( 'Card Body Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaAccordion .accordion-body',
                        ]
                );
                $this->add_responsive_control( 'ac_card_body_padding', [
                                'label' => esc_html__( 'Card Body Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaAccordion .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $list           = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        $tabs_id        = uniqid('orbito-accordion-');
        
        ?>
        <div class="ulinaAccordion" id="<?php echo $tabs_id; ?>">
            <?php
            $i = 1;
            foreach ($list as $key => $item):
                $accr_title    = (isset($item['accr_title'])) ? $item['accr_title'] : '';
                $is_expand     = (isset($item['is_expand'])) ? $item['is_expand'] : 'no';
                $accr_content  = (isset($item['accr_content'])) ? $item['accr_content'] : '';

                if($accr_title != '' && $accr_content != ''):
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="orb_acc_hed_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
                        <button class="accordion-button <?php if($is_expand != 'yes'){ echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#orb_acc_col_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" data-aria-expanded="<?php if($is_expand == 'yes'){ echo 'true'; }else{ echo 'false'; } ?>" data-aria-controls="orb_acc_col_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
                            <?php echo wp_kses_post($accr_title); ?>
                        </button>
                    </h2>
                    <div id="orb_acc_col_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" class="accordion-collapse collapse <?php if($is_expand == 'yes'){ echo 'show'; } ?>" aria-labelledby="orb_acc_hed_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" data-bs-parent="#<?php echo $tabs_id; ?>">
                        <div class="accordion-body">
                            <?php echo do_shortcode($accr_content); ?>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
                endif;
            endforeach;
            ?>
        </div>
        <?php
    }
    
    protected function content_template() {}
}