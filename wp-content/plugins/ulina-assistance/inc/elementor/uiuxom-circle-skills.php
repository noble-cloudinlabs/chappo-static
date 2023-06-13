<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Circle_Skills_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-circle-skills';
    }
    
    public function get_title() {
        return esc_html__( 'Circle Skills', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-counter-circle';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__( 'Circle Skills', 'uiuxom' ),
            ]
        );
                $this->add_control( 'sk_style', [
                                'label'     => esc_html__( 'Skills Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Only Progress', 'uiuxom' ),
                                        2       => esc_html__( 'With Description', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control('sk_description', [
                                'label'     => esc_html__( 'Description', 'uiuxom' ),
                                'type'      => Controls_Manager::TEXTAREA,
                                'label_block'   => TRUE,
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'sk_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('sk_percent', [
                                'label'         => esc_html__('Precent', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => 75,
                                'placeholder'   => esc_html__('Precent', 'uiuxom')
                        ]
                );
                $this->add_control( 'skill_size', [
                                'label'         => esc_html__( 'Skill Size', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => 96,
                        ]
                );
                $this->add_control( 'border_thikness', [
                                'label'         => esc_html__( 'Border Thikness', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => 6,
                        ]
                );
                $this->add_control( 'border_linecap', [
                                'label'     => esc_html__( 'LineCap Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 'square',
                                'options'   => [
                                        'square'       => esc_html__( 'Square', 'uiuxom' ),
                                        'round'       => esc_html__( 'Round', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'empty_fill', [
                                'label'     => esc_html__( 'Empty Fill Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                        ]
                );   
                $this->add_control('fill_color', [
                                'label'     => esc_html__( 'Fill Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Skill Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name'      => 'bar_normal_background',
                                'label'     => esc_html__( 'Background', 'uiuxom' ),
                                'types'     => [ 'classic', 'gradient'],
                                'selector'  => '{{WRAPPER}} .circleProgressWrap',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'sk_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .circleProgressWrap',
                        ]
                );
                $this->add_control(
                        'sk_radius', [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .circleProgressWrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'sk_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .circleProgressWrap',
                        ]
                );
                $this->add_responsive_control('sk_padding', [
                                'label'      => esc_html__( 'Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .circleProgressWrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'sk_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .circleProgressWrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5',[
                    'label'     => esc_html__('Count Style', 'uiuxom'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'sk_title_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .circleProgressWrap h3',
                        ]
                );
                $this->add_responsive_control( 'sk_title_color',[
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .circleProgressWrap h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'sk_title_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .circleProgressWrap h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_6',[
                    'label'     => esc_html__('Description Style', 'uiuxom'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'sk_style',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'sk_para_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .abcCounters p',
                        ]
                );
                $this->add_responsive_control( 'sk_para_color',[
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .abcCounters p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'sk_para_margin', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .abcCounters p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $sk_style       = (isset($settings['sk_style']) && $settings['sk_style'] > 0) ? $settings['sk_style'] : 1;
        $sk_percent       = (isset($settings['sk_percent']) && $settings['sk_percent'] > 0) ? $settings['sk_percent'] : 75;
        $sk_description       = (isset($settings['sk_description']) && $settings['sk_description'] != '') ? $settings['sk_description'] : '';
        $skill_size       = (isset($settings['skill_size']) && $settings['skill_size'] > 0) ? $settings['skill_size'] : 96;
        $border_thikness       = (isset($settings['border_thikness']) && $settings['border_thikness'] > 0) ? $settings['border_thikness'] : 6;
        $border_linecap       = (isset($settings['border_linecap']) && $settings['border_linecap'] != '') ? $settings['border_linecap'] : 'square';
        $empty_fill       = (isset($settings['empty_fill']) && $settings['empty_fill'] != '') ? $settings['empty_fill'] : '#d8dbe6';
        $fill_color       = (isset($settings['fill_color']) && $settings['fill_color'] != '') ? $settings['fill_color'] : '#00c0ff';
        $sk_percent_decimal = round(($sk_percent / 100), 2);
        
        $style = ($skill_size > 0 ? 'width: '.$skill_size.'px; height: '.$skill_size.'px;' : '');
        if($sk_style == 2): ?>
        <div class="abcCounters">
            <div class="circleProgressWrap cpwStyle_2" style="<?php echo esc_attr($style); ?>">
                <div class="circleProgress inline-block" 
                     data-skills="<?php echo $sk_percent_decimal; ?>" 
                     data-emptyfill="<?php echo $empty_fill; ?>" 
                     data-fills="<?php echo $fill_color; ?>" 
                     data-caps="<?php echo $border_linecap; ?>"
                     data-borders="<?php echo $border_thikness; ?>"
                     data-size="<?php echo $skill_size; ?>"
                     >
                    <h3><?php echo $sk_percent; ?>%</h3>
                </div>
            </div>
            <?php if(!empty($sk_description)): ?>
                <p><?php echo $sk_description; ?></p>
            <?php endif; ?>
        </div>
        <?php else: ?>
            <div class="circleProgressWrap cpwStyle_1 inline-block" style="<?php echo esc_attr($style); ?>">
                <div class="circleProgress"
                     data-skills="<?php echo $sk_percent_decimal; ?>" 
                     data-emptyfill="<?php echo $empty_fill; ?>" 
                     data-fills="<?php echo $fill_color; ?>" 
                     data-caps="<?php echo $border_linecap; ?>"
                     data-borders="<?php echo $border_thikness; ?>"
                     data-size="<?php echo $skill_size; ?>"
                     >
                    <h3><?php echo $sk_percent; ?>%</h3>
                </div>
            </div>
            <?php
        endif;
    }
    
    protected function content_template() {

    }
}