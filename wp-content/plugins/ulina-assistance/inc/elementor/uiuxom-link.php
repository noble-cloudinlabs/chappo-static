<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Uiuxom_Link_Widget extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-link';
    }
    public function get_title() {
        return esc_html__( 'Ulina Link', 'uiuxom' );
    }
    public function get_icon() {
        return 'eicon-link';
    }
    public function get_categories() {
        return ['uiuxom-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab', [
                    'label'     => esc_html__('Link Label', 'uiuxom')
                ]
        );   
        $this->add_control( 'btn_type', [
                        'label'   => esc_html__( 'Link Type', 'uiuxom' ),
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
                    'label'             => esc_html__('Link Label', 'uiuxom'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => true,
                    'default'           => esc_html__('Read More', 'uiuxom'),
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
                        'default' => 'in_left',
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
                        'prefix_class'              => 'ulina_link_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__('Link Style', 'uiuxom'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_1_typography',
                            'label' => esc_html__( 'Link Typography', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .ulinaLink',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                    $this->start_controls_tab('btn_1_button_style_normal', [ 'label' => esc_html__( 'Normal', 'uiuxom' ), ]);
                            $this->add_responsive_control( 'btn_1_label_color', [
                                            'label' => esc_html__( 'Color', 'uiuxom' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaLink'   => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_1_button_style_hover', [ 'label' => esc_html__( 'Hover', 'uiuxom' ), ]);
                            $this->add_responsive_control( 'btn_1_label_color_hover', [
                                            'label' => esc_html__( 'Color', 'uiuxom' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaLink:hover'   => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'btn_1_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ulinaLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_3', [
                'label'         => esc_html__('Link Icon Style', 'uiuxom'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_icon_typography',
                            'label' => esc_html__( 'Icon Typography', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .ulinaLink i',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('btn_2_button_style_normal', [ 'label' => esc_html__( 'Normal', 'uiuxom' ), ]);
                            $this->add_responsive_control( 'btn_icon_label_color', [
                                            'label' => esc_html__( 'Icon Color', 'uiuxom' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaLink i'   => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_2_button_style_hover', [ 'label' => esc_html__( 'Hover', 'uiuxom' ), ]);
                            $this->add_responsive_control( 'btn_icon_label_color_hover', [
                                            'label' => esc_html__( 'Icon Color', 'uiuxom' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaLink:hover i'   => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'btn_icon_positioning', [
                                'label' => esc_html__( 'Icon Position', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaLink i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_icon_margin', [
                            'label' => esc_html__( 'Icon Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['left', 'right'],
                            'selectors' => [
                                    '{{WRAPPER}} .ulinaLink i' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $btn_type       = (isset($settings['btn_type']) && $settings['btn_type'] > 0 ? $settings['btn_type'] : 1);
        $btn_label      = (isset($settings['btn_label']) && $settings['btn_label'] != '') ? $settings['btn_label'] : esc_html__('Read More', 'uiuxom');
        $icons          = (isset($settings['btn_icons']) && $settings['btn_icons'] != '') ? '<i class="'.$settings['btn_icons'].'"></i>' : '';
        
        $target         = isset($settings['btn_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($settings['btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
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
        endif; ?>
            <a class="ulinaLink <?php echo esc_attr($icon_position); ?> <?php echo ($btn_type == 2 ? 'linkPopup' : ($btn_type == 3 ? 'linkScrollTo' : '')); ?>"  <?php echo esc_attr($attributs); ?> <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>"><?php echo ulina_kses($btn_html) ?></a>
        <?php
    }
    
    protected function content_template() {
        
    }
            
}