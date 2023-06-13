<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Uiuxom_Header_Widgets extends Widget_Base{
    public function get_name(){
        return 'uiuxom-header';
    }

    public function get_title(){
        return esc_html__('All Headers', 'uiuxom');
    }

    public function get_icon(){
        return 'eicon-heading';
    }

    public function get_categories(){
        return ['uiuxom-elements'];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'tw_content_tab',
            [
                'label' => esc_html__('Headers', 'uiuxom'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'header_style', [
                'label' => esc_html__('Select Header Style', 'uiuxom'),
                'type'  => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    1 => esc_html__('Style 01', 'uiuxom'),
                    2 => esc_html__('Style 02', 'uiuxom'),
                ],
            ]
        );
        $this->add_control(
            'is_topbar',
            [
                'label' => esc_html__('Is Topbar?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show header topbar?', 'uiuxom'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'info_icons',
            [
                'label' => esc_html__('Info Text Icon', 'uiuxom'),
                'type'  => Controls_Manager::ICON,
                'label_block' => TRUE,
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'tp_info', [
                'label'             => esc_html__( 'Topbar Info Content', 'uiuxom' ),
                'type'              => Controls_Manager::TEXTAREA,
                'label_block'       => true,
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'info_link_icons',
            [
                'label' => esc_html__('Info Link Text Icon', 'uiuxom'),
                'type'  => Controls_Manager::ICON,
                'label_block' => TRUE,
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'tp_link_info', [
                'label'             => esc_html__( 'Topbar Info Link Text', 'uiuxom' ),
                'type'              => Controls_Manager::TEXTAREA,
                'label_block'       => true,
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
                'info_url', [
                    'label'             => esc_html__( 'Info Link URL', 'uiuxom' ),
                    'type'              => Controls_Manager::URL,
                    'input_type'        => 'url',
                    'placeholder'       => esc_html__( 'https://your-link.com', 'uiuxom' ),
                    'show_external'     => true,
                    'default'           => [
                            'url'            => '',
                            'is_external'    => true,
                            'nofollow'       => true,
                    ],
                    'conditions' => [
                        'terms'  => [
                            [
                                'name'      => 'header_style',
                                'operator'  => '==',
                                'value'     => '2',
                            ],
                        ],
                    ],
                ]
        );
        $repeaters2 = new \Elementor\Repeater();
        $repeaters2->add_control(
            's2_icons',
            [
                'label' => esc_html__('Social Icon', 'uiuxom'),
                'type'  => Controls_Manager::ICON,
                'label_block' => TRUE,
            ]
        );
        $repeaters2->add_control(
            's2_url', [
                'label' => esc_html__('Social Url', 'uiuxom'),
                'type'  => Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'uiuxom'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeaters2->add_control(
                's2_color',
                [
                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                        'type'      => Controls_Manager::COLOR,
                        'description' => esc_html__('social icon color.', 'uiuxom'),
                ]
        );
        $this->add_control(
            's2_list', [
                'label'   => esc_html__('Social Item', 'uiuxom'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeaters2->get_controls(),
                'default' => [
                    [
                        's2_icons'   => '',
                        's2_url'     => '',
                        's2_color'   => '',
                    ],
                ],
                'title_field' => '{{{ s2_icons }}}',
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                        [
                            'name'      => 'is_topbar',
                            'operator'  => '',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_language',
            [
                'label' => esc_html__('Is Language?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show header topbar language switcher btn? Make sure you have installed WPML.', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_language_flag',
            [
                'label' => esc_html__('Show Language Flag?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show language flag with language switcher.', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_language',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_currency',
            [
                'label' => esc_html__('Is Currency?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show header topbar currency switcher btn? Make sure you have installed WPML.', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'uiuxom'),
                'type'  => Controls_Manager::MEDIA,
                'description' => esc_html__('Upload your site logo.', 'uiuxom'),
            ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
            's_icons',
            [
                'label' => esc_html__('Social Icon', 'uiuxom'),
                'type'  => Controls_Manager::ICON,
                'label_block' => TRUE,
            ]
        );
        $repeaters->add_control(
            's_url', [
                'label' => esc_html__('Social Url', 'uiuxom'),
                'type'  => Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'uiuxom'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeaters->add_control(
                's_color',
                [
                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                        'type'      => Controls_Manager::COLOR,
                        'description' => esc_html__('social icon color.', 'uiuxom'),
                ]
        );
        $this->add_control(
            's_list', [
                'label'   => esc_html__('Social Item', 'uiuxom'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeaters->get_controls(),
                'default' => [
                    [
                        's_icons' => '',
                        's_url'   => '',
                        's_color' => '',
                    ],
                ],
                'title_field' => '{{{ s_icons }}}',
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_language2',
            [
                'label' => esc_html__('Is Language?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show header topbar language btn?', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_language_flag2',
            [
                'label' => esc_html__('Show Language Flag?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show language flag with language switcher.', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                        [
                            'name' => 'is_language2',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_currency2',
            [
                'label' => esc_html__('Is Currency?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show header currency btn?', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_search_btn',
            [
                'label' => esc_html__('Is Search?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show header contact btn?', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'popup_logo',
            [
                'label' => esc_html__('Search Popup Logo', 'uiuxom'),
                'type'  => Controls_Manager::MEDIA,
                'description' => esc_html__('Upload your popup area search logo. logo size should be 42x42px.', 'uiuxom'),
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'is_search_btn',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'input_placeholder',
            [
                'label'       => esc_html__('Form Input Placeholder', 'uiuxom'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'default'     => esc_html__('Type Words and Hit Enter', 'uiuxom'),
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'is_search_btn',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_login2',
            [
                'label' => esc_html__('Is Login Btn?', 'uiuxom'),
                'type'  => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show login btn?', 'uiuxom'),
                'return_value' => 'yes',
                'default'    => 'no',
            ]
        );
        $this->add_control(
            'is_wishlist',
            [
                'label' => esc_html__('Is Wishlist Btn?', 'uiuxom'),
                'type'  => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show wishlist btn?', 'uiuxom'),
                'return_value' => 'yes',
                'default'    => 'no',
            ]
        );
        $this->add_control(
            'is_cart',
            [
                'label' => esc_html__('Is Cart Btn?', 'uiuxom'),
                'type'  => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show cart btn?', 'uiuxom'),
                'return_value' => 'yes',
                'default'    => 'no',
            ]
        );
        $this->add_control(
            'is_mini_cart',
            [
                'label' => esc_html__('Is Hover Mini Cart?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show cart btn hover mini cart?', 'uiuxom'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'is_cart',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_info_boxs',
            [
                'label' => esc_html__('Is Info Box?', 'uiuxom'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show info box in header?', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_iconss',
            [
                'label' => esc_html__('Info Icon', 'uiuxom'),
                'type' => Controls_Manager::ICON,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                        [
                            'name'      => 'is_info_boxs',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_labels',
            [
                'label' => esc_html__('Info Label', 'uiuxom'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                        [
                            'name'      => 'is_info_boxs',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_values',
            [
                'label' => esc_html__('Info Value', 'uiuxom'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                        [
                            'name'      => 'is_info_boxs',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_sticky',
            [
                'label' => esc_html__('Is Sticky Header?', 'uiuxom'),
                'type'  => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'uiuxom'),
                'label_off' => esc_html__('No', 'uiuxom'),
                'description' => esc_html__('Do you want to show sticky header?', 'uiuxom'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_2', [
                'label' => esc_html__('Topbar Style', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                        [
                            'name'      => 'is_topbar',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'topbar_background',
                'label' => esc_html__('Area Background', 'uiuxom'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .topbarSection',
            ]
        );
        $this->add_responsive_control(
            'top_area_radius',
            [
                'label' => esc_html__('Area Radius', 'uiuxom'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .topbarSection' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tp_border_color',
            [
                'label' => esc_html__('Border Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbBar' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'top_area_border',
                'label' => esc_html__('Border', 'uiuxom'),
                'selector' => '{{WRAPPER}} .topBarSection',
            ]
        );
        $this->add_responsive_control(
            'top_area_padding',
            [
                'label' => esc_html__('Area Padding', 'uiuxom'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .topbarSection' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_area_margin',
            [
                'label' => esc_html__('Area Margins', 'uiuxom'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .topbarSection' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label' => esc_html__('Info Style', 'uiuxom'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'info2_text_icon_color',
            [
                'label' => esc_html__('Info Text Icon Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbInfo > i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info2_text_color',
            [
                'label' => esc_html__('Info Text Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbInfo' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_link_text_icon_color',
            [
                'label' => esc_html__('Info Link Text Icon Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ulinaLink i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_link_hover_text_icon_color',
            [
                'label' => esc_html__('Info Link Text Hover Icon Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ulinaLink:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_link_text_color',
            [
                'label' => esc_html__('Info Link Text Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ulinaLink' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_link_hover_text_color',
            [
                'label' => esc_html__('Info Link Hover Text Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ulinaLink:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'heading_unsocial_one',
            [
                'label' => esc_html__('Social Icon Style', 'uiuxom'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'social_icon_color',
            [
                'label' => esc_html__('Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbAccessNav .anSocial a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_hover_color',
            [
                'label' => esc_html__('Hover Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbAccessNav .anSocial a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'heading_un_two',
            [
                'label' => esc_html__('Language and Currency Style', 'uiuxom'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'info_text_color',
            [
                'label' => esc_html__('Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dropDownDiv .anSelect .nice-select' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_text_icon_color',
            [
                'label' => esc_html__('Icon Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSelect .nice-select:after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_04', [
                'label' => esc_html__('Header Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'style_tabs_10' );
            $this->start_controls_tab(
                    's_5_style_normal',
                    [
                            'label' => esc_html__( 'Normal', 'uiuxom' ),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'      => 'bar_normal_background',
                            'label'     => esc_html__( 'Background', 'uiuxom' ),
                            'types'     => [ 'classic', 'gradient'],
                            'selector'  => '{{WRAPPER}} .header01',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'sk_border',
                            'label' => esc_html__( 'Border', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .header01',
                    ]
            );
            $this->add_control(
                    'sk_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .header01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'sk_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .header01',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    's_5_style_hover',
                    [
                            'label' => esc_html__( 'Sticky', 'uiuxom' ),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'      => 'bar_forground_background',
                            'label'     => esc_html__( 'Background', 'uiuxom' ),
                            'types'     => [ 'classic', 'gradient'],
                            'selector'  => '{{WRAPPER}} .fixedHeader, {{WRAPPER}} header.fixedHeader',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'sk_f_border',
                            'label' => esc_html__( 'Border', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .fixedHeader, {{WRAPPER}} header.fixedHeader',
                    ]
            );
            $this->add_control(
                    'sk_f_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .fixedHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} header.fixedHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'sk_f_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .fixedHeader, {{WRAPPER}} header.fixedHeader',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'header_padding',
            [
                'label' => esc_html__('Area Paddings', 'uiuxom'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__('Area Margins', 'uiuxom'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_logo', [
                'label' => esc_html__('Logo Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'logo_width', [
                'label' => esc_html__('Width', 'uiuxom'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_height', [
                'label' => esc_html__('Height', 'uiuxom'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img'    => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_padding', [
                'label' => esc_html__('Paddings', 'uiuxom'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .logo'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_menu', [
                'label' => esc_html__('Nav Menu Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_un_menu', [
                'label' => esc_html__('Menu Level 1 Style', 'uiuxom'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->start_controls_tabs('style_menu_01');
            $this->start_controls_tab(
                'menu_01_style_normal',
                [
                    'label' => esc_html__('Normal', 'uiuxom'),
                ]
            );
            $this->add_responsive_control(
                'menu_color',
                [
                    'label' => esc_html__('Menu Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu ul li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'menu_bg_color',
                [
                    'label' => esc_html__('Menu BG Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu ul li a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'menu_01_style_sticky',
                [
                    'label' => esc_html__('Hover', 'uiuxom'),
                ]
            );
            $this->add_responsive_control(
                'menu_hover_color',
                [
                    'label'     => esc_html__('Menu Color', 'uiuxom'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu ul li:hover > a' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .mainMenu ul li.current-menu-item > a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'menu_hover_bg_color',
                [
                    'label'     => esc_html__('Menu BG Color', 'uiuxom'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu ul li:hover > a' => 'background: {{VALUE}}',
                        '{{WRAPPER}} .mainMenu ul li.current-menu-item > a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'heading_un_menu02', [
                'label'     => esc_html__('Menu Level 2 Style', 'uiuxom'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'submenu_bg_color',
            [
                'label' => esc_html__('Sub Menu BG Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu > ul ul' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->start_controls_tabs('style_menu_02');
            $this->start_controls_tab(
                'menu_02_style_normal',
                [
                    'label' => esc_html__('Normal', 'uiuxom'),
                ]
            );
            $this->add_responsive_control(
                'submenu_color',
                [
                    'label' => esc_html__('Menu Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu ul ul li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'submenu_bg_item_color',
                [
                    'label' => esc_html__('Menu BG Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu ul li .sub-menu li a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'menu_02_style_sticky',
                [
                    'label' => esc_html__('Hover', 'uiuxom'),
                ]
            );
            $this->add_responsive_control(
                'submenu_hover_color',
                [
                    'label' => esc_html__('Menu Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu > ul > li > ul li.current-menu-item > a' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .mainMenu > ul > li > ul li:hover > a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'submenu_bg_hover_color',
                [
                    'label' => esc_html__('Menu BG Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mainMenu > ul > li > ul li.current-menu-item > a' => 'background: {{VALUE}}',
                        '{{WRAPPER}} .mainMenu > ul > li > ul li:hover > a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'hover_mneu_border_color', [
                    'label' => esc_html__('Hover Border Color', 'uiuxom'),
                    'type' => Controls_Manager::HEADING,
                    'separator'  => 'before',
                ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'hover_menu_border',
                            'label' => esc_html__( 'Background', 'uiuxom' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .mainMenu > ul > li > ul li:hover > a, {{WRAPPER}} .mainMenu > ul > li > ul li.current-menu-item > a',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_social', [
                'label' => esc_html__('Social Styling', 'uiuxom'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('style_socail_h5');
        $this->start_controls_tab(
            'socail_icon_h5_style_normal',
            [
                'label' => esc_html__('Normal', 'uiuxom'),
            ]
        );
        $this->add_responsive_control(
            'social2_icon_color',
            [
                'label' => esc_html__('Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSocial a' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'socail_icon_h5_style_hover',
            [
                'label' => esc_html__('Hover', 'uiuxom'),
            ]
        );
        $this->add_responsive_control(
            'social2_hover_icon_color',
            [
                'label' => esc_html__('Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSocial a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_search_btn', [
                'label' => esc_html__('Search Styling', 'uiuxom'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_un_search', [
                'label' => esc_html__('Search Btn Style', 'uiuxom'),
                'type' => Controls_Manager::HEADING,
                'separator'  => 'before',
            ]
        );
        $this->add_responsive_control(
            'search_btn_color',
            [
                'label' => esc_html__('Btn Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSearch a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .anSearch button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_btn_hover_color',
            [
                'label' => esc_html__('Btn Hover Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSearch a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .anSearch button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'heading_un_search_form', [
                'label' => esc_html__('Search Form Style', 'uiuxom'),
                'type' => Controls_Manager::HEADING,
                'separator'  => 'before',
            ]
        );
        $this->add_responsive_control(
            'search_form_bg_color',
            [
                'label' => esc_html__('From BG Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pop_search_background' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_form_overlay_bg_color',
            [
                'label' => esc_html__('From Overlay BG Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popup_search_overlay' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_form_input_color',
            [
                'label' => esc_html__('From Input Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popup_search_form input[type="search"]' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .popup_search_form input[type="search"]::-moz-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .popup_search_form input[type="search"]::-ms-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .popup_search_form input[type="search"]::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .headerSearch input[type="search"]' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .headerSearch input[type="search"]::-moz-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .headerSearch input[type="search"]::-ms-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .headerSearch input[type="search"]::-webkit-input-placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_form_border_color',
            [
                'label' => esc_html__('From Input Border Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popup_search_form:after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_form_a_border_color',
            [
                'label' => esc_html__('From Input Border Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .headerSearch input[type="search"]' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_login_btn', [
                'label' => esc_html__('Login Styling', 'uiuxom'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'login_btn_color',
            [
                'label' => esc_html__('Btn Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anUser a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'login_btn_hover_color',
            [
                'label' => esc_html__('Btn Hover Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anUser a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_wishlist_btn', [
                'label' => esc_html__('Wishlist Styling', 'uiuxom'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'wishlist_btn_color',
            [
                'label' => esc_html__('Btn Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anWish a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'wishlist_btn_hover_color',
            [
                'label' => esc_html__('Btn Hover Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anWish a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_cart_btn', [
                'label' => esc_html__('Cart Btn Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('style_wc');
            $this->start_controls_tab(
                'wc_style_normal',
                [
                    'label' => esc_html__('Normal', 'uiuxom'),
                ]
            );
            $this->add_responsive_control(
                'wc_label_color',
                [
                    'label' => esc_html__('Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .halCart' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'wc_count_number_color',
                [
                    'label' => esc_html__('Number Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .halCart span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'wc_count_number_bg',
                            'label' => esc_html__( 'Background', 'uiuxom' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .halCart span',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'wc_style_hover',
                [
                    'label' => esc_html__('Hover', 'uiuxom'),
                ]
            );
            $this->add_responsive_control(
                'wc_label_hover_color',
                [
                    'label' => esc_html__('Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .anCart:hover .halCart' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'wc_hover_count_number_color',
                [
                    'label' => esc_html__('Number Color', 'uiuxom'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .anCart:hover .halCart span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'wc_hover_count_number_bg',
                            'label' => esc_html__( 'Background', 'uiuxom' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .anCart:hover .halCart span',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_infoBox', [
                'label' => esc_html__('Info Box Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_icon_color',
            [
                'label' => esc_html__('Info Icon Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSupport i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_title_color',
            [
                'label' => esc_html__('Info Title Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSupport h3:first-of-type' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_value_color',
            [
                'label' => esc_html__('Info Value Color', 'uiuxom'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .anSupport h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render(){
        $settings       = $this->get_settings_for_display();

        $header_style   = (isset($settings['header_style']) && $settings['header_style'] > 0) ? $settings['header_style'] : 1;
        $is_topbar      = (isset($settings['is_topbar']) ? $settings['is_topbar'] : 'no');
        $is_wishlist    = (isset($settings['is_wishlist']) ? $settings['is_wishlist'] : 'no');
        $info_icons         = (isset($settings['info_icons']) && $settings['info_icons'] != '') ? $settings['info_icons'] : '';
        $tp_info   = (isset($settings['tp_info']) && $settings['tp_info'] != '') ? $settings['tp_info'] : '';
        $info_link_icons       = (isset($settings['info_link_icons']) && $settings['info_link_icons'] != '') ? $settings['info_link_icons'] : '';
        $tp_link_info       = (isset($settings['tp_link_info']) && $settings['tp_link_info'] != '') ? $settings['tp_link_info'] : '';
        $info_url  = (isset($settings['info_url']['url']) && $settings['info_url']['url'] != '') ? $settings['info_url']['url'] : '';
        
        $s2_list        = (isset($settings['s2_list']) && !empty($settings['s2_list'])) ? $settings['s2_list'] : array();
        $is_language    = (isset($settings['is_language']) ? $settings['is_language'] : 'no');
        $is_currency    = (isset($settings['is_currency']) ? $settings['is_currency'] : 'no');

        $logo           = (isset($settings['logo']['url']) && $settings['logo']['url'] != '') ? $settings['logo']['url'] : '';
        $s_list         = (isset($settings['s_list']) && !empty($settings['s_list'])) ? $settings['s_list'] : array();
        $is_currency2   = (isset($settings['is_currency2']) ? $settings['is_currency2'] : 'no');
        $is_language2   = (isset($settings['is_language2']) ? $settings['is_language2'] : 'no');
        $is_search_btn  = (isset($settings['is_search_btn']) ? $settings['is_search_btn'] : 'no');
        $input_placeholder  = (isset($settings['input_placeholder']) && $settings['input_placeholder'] != '') ? $settings['input_placeholder'] : '';
        $popup_logo     = (isset($settings['popup_logo']['url']) && $settings['popup_logo']['url'] != '') ? $settings['popup_logo']['url'] : '';
        $is_login2      = (isset($settings['is_login2']) ? $settings['is_login2'] : 'no');
        $is_wishlist    = (isset($settings['is_wishlist']) ? $settings['is_wishlist'] : 'no');
        $is_cart        = (isset($settings['is_cart']) ? $settings['is_cart'] : 'no');
        $is_mini_cart   = (isset($settings['is_mini_cart']) ? $settings['is_mini_cart'] : 'no');

        $is_info_boxs   = (isset($settings['is_info_boxs']) ? $settings['is_info_boxs'] : 'no');
        $i_iconss       = (isset($settings['i_iconss']) && $settings['i_iconss'] != '') ? $settings['i_iconss'] : '';
        $i_labels       = (isset($settings['i_labels']) && $settings['i_labels'] != '') ? $settings['i_labels'] : '';
        $i_values       = (isset($settings['i_values']) && $settings['i_values'] != '') ? $settings['i_values'] : '';

        $is_sticky      = (isset($settings['is_sticky']) ? $settings['is_sticky'] : 'no');
        
        $is_language_flag    = (isset($settings['is_language_flag']) ? $settings['is_language_flag'] : 'no');
        $is_language_flag = ($is_language_flag == 'yes' ? 1 : 0);
        
        $is_language_flag2    = (isset($settings['is_language_flag2']) ? $settings['is_language_flag2'] : 'no');
        $is_language_flag2 = ($is_language_flag2 == 'yes' ? 1 : 0);

        include dirname(__FILE__) . '/style/header/style' . $header_style . '.php';
    }
}