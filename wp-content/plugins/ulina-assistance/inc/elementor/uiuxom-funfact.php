<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Funfact_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-fun-facts';
    }
    
    public function get_title() {
        return esc_html__( 'Fun Fact', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__( 'Fun Fact', 'uiuxom' ),
            ]
        );
        $this->add_control( 'ff_number', [
                        'label'         => esc_html__( 'Fact Amount', 'uiuxom' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => esc_html__('12', 'uiuxom')
                ]
        );
        $this->add_control( 'ff_suffix', [
                        'label'         => esc_html__( 'Number Suffix', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXT,
                        'description'   => esc_html__( 'Insert suffix for fact.', 'uiuxom' ),
                        'default'       => '',
                ]
        );
        $this->add_control( 'ff_title', [
                        'label'         => esc_html__( 'Fact Title', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => TRUE,
                        'default'       => esc_html__('Worldwide Customers', 'uiuxom')
                ]
        );
        $this->add_responsive_control( 'ff_align', [
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
                        'prefix_class'              => 'orbitoFactAlign-',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_box', [
                    'label'         => esc_html__('Box Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'icon_box_width', [
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
                                        '{{WRAPPER}} .singleCounter02' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_height', [
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
                                        '{{WRAPPER}} .singleCounter02' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'icon_box_img_bgcolor_hr',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .singleCounter02',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pfs_content_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .singleCounter02',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'rmbtn_bg_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .singleCounter02',
                        ]
                );
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .singleCounter02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .singleCounter02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .singleCounter02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Count Number Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
                $this->add_responsive_control( 'ff_num_color', [
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singleCounter02 h2' => 'color: {{VALUE}}',
                                ],
                        ]
                );    
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_num_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .singleCounter02 h2',
                        ]
                );
                $this->add_responsive_control( 'ff_num_margin', [
                                'label' => esc_html__( 'Marigns', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .singleCounter02 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'heading_un_one', [
                        'label'     => esc_html__( 'Number Suffix Style', 'uiuxom' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control(
                        'heading1_color', [
                                'label'      => esc_html__( 'Color', 'uiuxom' ),
                                'type'       => Controls_Manager::COLOR,
                                'selectors'  => [
                                    '{{WRAPPER}} .singleCounter h2 .numSuffix' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .timerSuffix' => 'color: {{VALUE}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'heading1_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .singleCounter h2 .numSuffix, {{WRAPPER}} .timerSuffix',
                        ]
                );
                $this->add_responsive_control( 'ff_sufix_position', [
                                'label' => esc_html__( 'Suffix Position', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}} .singleCounter h2 .numSuffix' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                        '{{WRAPPER}} .timerSuffix' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'mt_margin', [
                                'label' => esc_html__( 'Marign', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['left', 'right'],
                                'selectors' => [
                                        '{{WRAPPER}} .singleCounter h2 .numSuffix' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .timerSuffix' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Fact Title Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
                $this->add_control( 'ff_title_color', [
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singleCounter h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .singleCounter02 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .counterBox h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );    
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_title_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .singleCounter h3, {{WRAPPER}} .singleCounter02 h3, {{WRAPPER}} .counterBox h3',
                        ]
                );
                $this->add_control( 'ff_title_margin', [
                                'label' => esc_html__( 'Marigns', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .singleCounter h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .singleCounter02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .counterBox h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();

        $ff_number    = (isset($settings['ff_number']) && $settings['ff_number'] != '') ? $settings['ff_number'] : 12;
        $ff_suffix    = (isset($settings['ff_suffix']) && $settings['ff_suffix'] != '') ? $settings['ff_suffix'] : '';
        $ff_title     = (isset($settings['ff_title']) && $settings['ff_title'] != '') ? $settings['ff_title'] : esc_html__('Worldwide Customers', 'uiuxom');
        

        ?>
        <div class="singleCounter02">
            <h2><span class="timer" data-count="<?php echo $ff_number; ?>"><?php echo $ff_number; ?></span><?php if ($ff_suffix != ''): ?><span class="timerSuffix"><?php echo $ff_suffix; ?></span><?php endif; ?></h2>
            <h3><?php echo ulina_kses($ff_title) ?></h3>
        </div>
        <?php
    }
    
    protected function content_template() {}
}