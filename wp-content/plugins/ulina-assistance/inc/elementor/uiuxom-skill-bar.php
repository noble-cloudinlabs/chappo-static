<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Skill_Bar_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-skill-bar';
    }
    
    public function get_title() {
        return esc_html__( 'Skills Bar', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__( 'Skills', 'uiuxom' ),
            ]
        );
                $this->add_control( 'sk_title', [
                                'label'         => esc_html__( 'Skill Title', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'label_block'   => TRUE,
                                'default'       => esc_html__('Business Analysis', 'uiuxom')
                        ]
                );
                $this->add_control( 'sk_percent', [
                                'label'         => esc_html__( 'Percent', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => 88
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Skill Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_control( 'sk_area_padding', [
                                'label'      => esc_html__( 'Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .singleSkill' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'sk_area_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .singleSkill' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        
        $this->start_controls_section(
                'section_tab_5',[
                    'label'     => esc_html__('Title and Number Style', 'uiuxom'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_control( 'sk_title_color',[
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singleSkill h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'sk_title_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .singleSkill h3',
                        ]
                );
                $this->add_control( 'sk_title_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .singleSkill h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'count_precent_style', [
                        'label'     => esc_html__( 'Percent Number Style', 'uiuxom' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_control( 'percent_color',[
                                    'label'     => esc_html__( 'Color', 'uiuxom' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .singleSkill span' => 'color: {{VALUE}}',
                                    ],
                            ]
                  );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'percent_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .singleSkill span',
                        ]
                );
                $this->add_control( 'percent_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .singleSkill span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_7', [
                    'label'         => esc_html__('Skill Bar Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
                $this->add_control( 'width', [
                            'label' => __( 'Bar Width', 'uiuxom' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ '%' ],
                            'range' => [
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .skillWrap' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'height', [
                                'label' => __( 'Bar Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .skillWrap' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_10' );
                    $this->start_controls_tab( 's_5_style_normal', ['label' => esc_html__( 'Normal Color', 'uiuxom' )] );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name'      => 'bar_normal_background',
                                        'label'     => esc_html__( 'Background', 'uiuxom' ),
                                        'types'     => [ 'classic', 'gradient'],
                                        'selector'  => '{{WRAPPER}} .skillWrap',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'sk_border',
                                        'label' => esc_html__( 'Border', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .skillWrap',
                                ]
                        );
                        $this->add_control( 'sk_radius', [
                                        'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .skillWrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'sk_box_shadow',
                                        'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .skillWrap',
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('s_5_style_hover',['label' => esc_html__( 'Foreground Color', 'uiuxom' )]);
                        $this->add_group_control(
                                Group_Control_Background::get_type(), [
                                        'name'      => 'bar_forground_background',
                                        'label'     => esc_html__( 'Background', 'uiuxom' ),
                                        'types'     => [ 'classic', 'gradient'],
                                        'selector'  => '{{WRAPPER}} .skill',
                                ]
                        );
                        $this->add_group_control(
                                Group_Control_Border::get_type(), [
                                        'name' => 'sk_f_border',
                                        'label' => esc_html__( 'Border', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .skill',
                                ]
                        );
                        $this->add_control( 'sk_f_radius', [
                                        'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .skill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                        $this->add_group_control(
                                Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'sk_f_box_shadow',
                                        'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .skill',
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $sk_title       = (isset($settings['sk_title']) && $settings['sk_title'] != '') ? $settings['sk_title'] : esc_html__('Success Rate', 'uiuxom');
        $sk_percent        = (isset($settings['sk_percent']) && $settings['sk_percent'] != '') ? $settings['sk_percent'] : '88';
        ?>
        <div class="singleSkill" data-skill="<?php echo $sk_percent; ?>">
            <h3><?php echo $sk_title; ?></h3>
            <span><?php echo $sk_percent; ?>%</span>
            <div class="skillWrap">
                <div class="skill"></div>
            </div>
        </div>
        <?php
    }
    
    protected function content_template() {

    }
}