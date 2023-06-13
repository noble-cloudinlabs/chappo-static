<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_About_Widgets extends Widget_Base {
    public function get_name() {
        return 'uiuxom-about';
    }

    public function get_title() {
        return esc_html__('About Us', 'uiuxom');
    }

    public function get_icon() {
        return 'eicon-wordart';
    }

    public function get_categories() {
        return ['uiuxom-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'About Us', 'uiuxom' ),
            ]
        );
        $this->add_control(
                'logo_images',
                [
                        'label'         => esc_html__( 'About Logo Image', 'uiuxom' ),
                        'label_block'   => TRUE,
                        'type'          => Controls_Manager::MEDIA,
                ]
        );
        $this->add_control( 'content', 
                [
                        'label'         => esc_html__( 'About Content', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'label_block'   => true,
                ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
                's_icons',
                [
                        'label'         => esc_html__( 'Social Icon', 'uiuxom' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $repeaters->add_control(
                's_url', [
                    'label'             => esc_html__( 'Social Url', 'uiuxom' ),
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
        $this->add_control(
            's_list',[
                    'label'         => esc_html__( 'Social Item', 'uiuxom' ),
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeaters->get_controls(),
                    'default'       => [
                            [
                                    's_icons'            => '',
                                    's_url'              => '',
                            ],
                    ],
                    'title_field' => '{{{ s_icons }}}',
            ]
        );
        $this->add_responsive_control(
                'st_alignment', [
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
                        'prefix_class'              => 'about_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab__logo', [
                'label'         => esc_html__( 'Logo Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'logo_box_height',
                [
                        'label'      => esc_html__( 'Height', 'uiuxom' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => 'px',
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .footerLogo img' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'logo_box_width',
                [
                        'label'      => esc_html__( 'Width', 'uiuxom' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => 'px',
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .footerLogo img' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'logo_margin',
                [
                        'label' => esc_html__( 'Marigns', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .footerLogo img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__( 'Content Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'mt_color', [
                        'label'		 => esc_html__( 'Color', 'uiuxom' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .aboutWidContent' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'mt_typography',
                        'label'     => esc_html__( 'Typography', 'uiuxom' ),
                        'selector'  => '{{WRAPPER}} .aboutWidContent',
                ]
        );
        $this->add_responsive_control(
                'mt_padding',
                [
                        'label' => esc_html__( 'Paddings', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .aboutWidContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'mt_margin',
                [
                        'label' => esc_html__( 'Marigns', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .aboutWidContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Social Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                's_area_margin',
                [
                        'label' => esc_html__( 'Area Marigns', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .footerSocial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_border_radius',
                [
                        'label'         => esc_html__( 'Border Radius', 'uiuxom' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', '%', 'em' ],
                        'selectors'     => [
                            '{{WRAPPER}} .footerSocial a'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_height',
                [
                        'label'      => esc_html__( 'Height', 'uiuxom' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => 'px',
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .footerSocial a' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_width',
                [
                        'label'      => esc_html__( 'Width', 'uiuxom' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => 'px',
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .footerSocial a' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'          => 'icon_typography',
                        'label'         => esc_html__( 'Icon Typography', 'uiuxom' ),
                        'selector'      => '{{WRAPPER}} .footerSocial a',
                ]
        );
        $this->add_responsive_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'uiuxom' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .footerSocial a'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_margin',
                [
                        'label' => esc_html__( 'Margins', 'uiuxom' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .footerSocial a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'social_styling_tab' );
            $this->start_controls_tab(
                    'social_tab_normal',
                    [
                            'label' => esc_html__( 'Normal', 'uiuxom' ),
                    ]
            );
            $this->add_responsive_control(
                    'social_icon_color',
                    [
                            'label'     => esc_html__( 'Color', 'uiuxom' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .footerSocial a'    => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'social_bg',
                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .footerSocial a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 's_border',
                            'label'     => esc_html__( 'Border', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .footerSocial a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 's_box_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .footerSocial a',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'social_tab_hover',
                    [
                            'label' => esc_html__( 'Hover', 'uiuxom' ),
                    ]
            );
            $this->add_responsive_control(
                    'social_icon_hover_color',
                    [
                            'label'     => esc_html__( 'Color', 'uiuxom' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .footerSocial a:hover'    => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'social_hover_bg',
                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .footerSocial a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 's_hover_border',
                            'label'     => esc_html__( 'Border', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .footerSocial a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 's_hover_box_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .footerSocial a:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $logo_images        = (isset($settings['logo_images']['url']) && $settings['logo_images']['url'] != '') ? $settings['logo_images']['url'] : '';
        $content            = (isset($settings['content']) && $settings['content'] != '') ? $settings['content'] : '';
        $s_list             = (isset($settings['s_list']) && !empty($settings['s_list'])) ? $settings['s_list'] : array();
        
        
        ?>
        <aside class="widget aboutWidget">
                <?php if($logo_images != ''): ?>
                <div class="footerLogo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo_images); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
                </div>
                <?php endif; ?>
                <?php if($content != ''): ?>
                <div class="aboutWidContent"><?php echo wp_kses_post($content); ?></div>
                <?php endif; ?>
                <?php if(!empty($s_list)): ?>
                <div class="footerSocial clearfix"><?php
                    foreach($s_list as $sl):
                        $s_icons      = (isset($sl['s_icons']) ? $sl['s_icons'] : '');
                        $s_url        = (isset($sl['s_url']['url']) ? $sl['s_url']['url'] : '');
                        $target       = isset($sl['s_url']['is_external']) ? ' target="_blank"' : '' ;
                        $nofollow     = isset($sl['s_url']['nofollow']) ? ' rel="nofollow"' : '' ;
                        
                        if($s_icons != ''):
                        ?>
                        <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $s_url; ?>"><i class="<?php echo esc_attr($s_icons); ?>"></i></a>
                        <?php
                        endif;
                    endforeach;
                    ?>
                </div>
                <?php endif; ?>
        </aside>
        <?php

    }
    
    protected function content_template() {}
}