<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Contact_Info_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-contact-info';
    }
    
    public function get_title() {
        return esc_html__( 'Contact Info', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Icon Box', 'uiuxom' ),
            ]
        );
                $this->add_control( 'icon_or_image', [
                                'label'     => esc_html__( 'Icon Or Image', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Icon', 'uiuxom' ),
                                        2       => esc_html__( 'Image', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'icons', [
                                'label'     => esc_html__( 'Icon', 'uiuxom' ),
                                'type'      => Controls_Manager::ICON,
                                'label_block'   => TRUE,
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'icon_or_image',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'images', [
                                'label' => esc_html__( 'Choose Image', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default' => [],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'icon_or_image',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('box_title', [
                                'label'         => esc_html__( 'Box Title', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Location', 'uiuxom'),
                                'label_block'   => TRUE,
                        ]
                );
                $this->add_control( 'box_desc', [
                                'label'         => esc_html__( 'Box Content', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXTAREA,
                                'default'       => esc_html__('20 Bordeshi, New York, Usa.', 'uiuxom'),
                        ]
                );
                $this->add_responsive_control( 'box_alignment', [
                                'label'                     =>esc_html__( 'Box Alignment', 'uiuxom' ),
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
                                'prefix_class'              => 'conInfo_holder elementor%s-align-',
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Box Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'box_border',
                                'label' => esc_html__( 'Box Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactItem',
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Icon Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_or_image',
                                    'operator'  => '!in',
                                    'value'     => ['2'],
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .contactItem span'
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_color',[
                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem span' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_color_hov',[
                                'label'     => esc_html__( 'Hover Icon Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem:hover span' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_bg_color',[
                                'label'     => esc_html__( 'Icon BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem span' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_bg_color_hover',[
                                'label'     => esc_html__( 'Hover Icon BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem:hover span' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .contactItem span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .contactItem span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_img',[
                    'label'         => esc_html__('Image Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_or_image',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'icon_box_img_width', [
                                'label' => esc_html__( 'Image Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .contactItem span img' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_img_height', [
                                'label' => esc_html__( 'Image Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .contactItem span img' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_img_bg_color',[
                                'label'     => esc_html__( 'Image BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem span.ciImage' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_img_bg_color_hover',[
                                'label'     => esc_html__( 'Hover Image BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem:hover span.ciImage' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_img_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .contactItem span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control(
                        'icon_box_img_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'selector'  => '{{WRAPPER}} .contactItem h5',
                        ]
                );
                $this->add_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem h5' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_padding', [
                                'label'      => esc_html__( 'Title Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .contactItem h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .contactItem h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'selector'  => '{{WRAPPER}} .contactItem p',
                        ]
                );
                $this->add_control( 'icon_box_content_color',[
                                'label'     => esc_html__( 'Content Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_link_color',[
                                'label'     => esc_html__( 'Content Link Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem p a' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_link_color_hover',[
                                'label'     => esc_html__( 'Content Link Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactItem p a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_padding', [
                                'label'      => esc_html__( 'Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .contactItem p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_margin', [
                                'label'      => esc_html__( 'Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .contactItem p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();
        
        $icon_or_image   = (isset($settings['icon_or_image']) && $settings['icon_or_image'] > 0 ) ? $settings['icon_or_image'] : 1;
        $icons          = (isset($settings['icons']) && $settings['icons'] != '') ? $settings['icons'] : 'ulina-location-dot';
        $images         = (isset($settings['images']['url']) && $settings['images']['url'] != '') ? $settings['images']['url'] : '';
        
        $box_title      = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Location', 'uiuxom');
        $desc           = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';
        
        
        ?>
        <div class="contactItem">
            <?php if($icon_or_image == 2 && !empty($images)): ?>
                <span class="ciImage">
                    <img src="<?php echo esc_url($images) ?>" alt="<?php echo esc_attr($box_title); ?>"/>
                </span>
            <?php elseif($icon_or_image == 1 && !empty($icons)): ?>
                <span>
                    <i class="<?php echo esc_attr($icons); ?>"></i>
                </span>
            <?php endif; ?>
            <h5><?php echo ulina_kses($box_title); ?></h5>
            <?php if(!empty($desc)): ?>
            <p>
                <?php echo ulina_kses($desc); ?>
            </p>
            <?php endif; ?>
        </div>
        <?php
        
    }
    
    protected function content_template() {

    }
    
    
}