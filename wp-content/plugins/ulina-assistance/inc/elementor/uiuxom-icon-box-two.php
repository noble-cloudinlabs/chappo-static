<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Icon_Box_Two_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-icon-box-two';
    }
    
    public function get_title() {
        return esc_html__( 'Icon Box', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['uiuxom-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Icon Box', 'uiuxom' ),
            ]
        );
        $this->add_control( 'icons', [
                        'label'     => esc_html__( 'Icon', 'uiuxom' ),
                        'type'      => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $this->add_control('box_title', [
                        'label'         => esc_html__( 'Box Title', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => esc_html__('Box Title', 'uiuxom'),
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('Box Title', 'uiuxom')
                ]
        );
        $this->add_control( 'box_desc', [
                        'label'         => esc_html__( 'Box Content', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'default'       => esc_html__('Box content goes here.', 'uiuxom'),
                        'placeholder'   => esc_html__('Insert Content Here.', 'uiuxom'),
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Box Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .anSupport' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .anSupport' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .anSupport' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'ib_box_tot' );
                    $this->start_controls_tab( 'ib_box_nr', [ 'label' => esc_html__( 'Normal', 'uiuxom' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg',
                                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .anSupport',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .anSupport',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'box_border',
                                            'label' => esc_html__( 'Box Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .anSupport',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'uiuxom' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg_hr',
                                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .anSupport:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow_hr',
                                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .anSupport:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'box_border_hr',
                                            'label' => esc_html__( 'Box Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .anSupport:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Icon Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .anSupport > i'
                        ]
                );
                $this->start_controls_tabs( 'ib_icon_tot' );
                        $this->start_controls_tab( 'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'uiuxom' )] );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .anSupport > i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color',
                                                'label' => esc_html__( 'Icon Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .anSupport > i',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'ib_icon_hr', [ 'label' => esc_html__( 'Box Hover', 'uiuxom' )] );
                                $this->add_responsive_control( 'icon_box_i_color_hover',[
                                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .anSupport:hover > i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color_hover',
                                                'label' => esc_html__( 'Icon Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .anSupport:hover > i',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control( 'hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                $this->add_responsive_control( 'icon_box_i_width', [
                                'label' => __( 'Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .anSupport > i' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_height', [
                                'label' => __( 'Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .anSupport > i' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'icon_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .anSupport > i',
                        ]
                );
                $this->add_control( 'icon_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .anSupport > i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .anSupport > i',
                        ]
                );
                $this->add_control( 'icon_box_i_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .anSupport > i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'icon_box_i_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .anSupport > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3',[
                    'label'         => esc_html__('Title Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_title_typo',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .anSupport h3:first-of-type',
                        ]
                );
                $this->add_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .anSupport h3:first-of-type' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_padding', [
                                'label'      => esc_html__( 'Title Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .anSupport h3:first-of-type' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .anSupport h3:first-of-type' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Box Content Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_content_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .fibox.anSupport h3:last-of-type',
                        ]
                );
                $this->add_control( 'icon_box_content_color',[
                                'label'     => esc_html__( 'Content Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .fibox.anSupport h3:last-of-type' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_padding', [
                                'label'      => esc_html__( 'Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .fibox.anSupport h3:last-of-type' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_margin', [
                                'label'      => esc_html__( 'Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .fibox.anSupport h3:last-of-type' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();
        
        $icons          = (isset($settings['icons']) && $settings['icons'] != '') ? $settings['icons'] : 'ulina-headset';
        $box_title      = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Helpline', 'uiuxom');
        $desc           = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';
        
        ?>
        <div class="anSupport fibox">
                <?php if(!empty($icons)): ?>
                        <i class="<?php echo esc_attr($icons); ?>"></i>
                <?php endif; ?>
                        <h3><?php echo ulina_kses($box_title); ?></h3>
                <?php if(!empty($desc)): ?>
                        <h3><?php echo ulina_kses($desc); ?></h3>
                <?php endif; ?>
        </div>
        <?php
        
    }
    
    protected function content_template() {

    }
    
    
}