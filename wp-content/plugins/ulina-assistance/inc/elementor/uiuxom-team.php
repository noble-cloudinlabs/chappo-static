<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Team_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-team';
    }

    public function get_title() {
        return esc_html__( 'Team', 'uiuxom' );
    }

    public function get_icon() {
        return ' eicon-person';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Team Member', 'uiuxom' ),
            ]
        );
                $this->add_control( 'mem_view_mode', [
                                'label'     => esc_html__( 'View Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Standalone', 'uiuxom' ),
                                        2       => esc_html__( 'Slider', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'client_slide_autoplay', [
                                'label'             => esc_html__( 'Is Autoplay?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to make this slider auto play?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'client_slide_loop', [
                                'label'             => esc_html__( 'Is Loop?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to make this slider item loop?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'client_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'cat_nav_position', [
                        'label'     => esc_html__('Category Style', 'uiuxom'),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 2,
                        'options'   => [
                            1       => esc_html__('Top Left', 'uiuxom'),
                            2       => esc_html__('Top Right', 'uiuxom'),
                            3       => esc_html__('Middle Expanded', 'uiuxom'),
                            4       => esc_html__('Bottom Left', 'uiuxom'),
                            5       => esc_html__('Bottom Center', 'uiuxom'),
                            6       => esc_html__('Bottom Right', 'uiuxom'),
                        ],
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'mem_view_mode',
                                    'operator' => '==',
                                    'value' => '2',
                                ],
                                [
                                    'name' => 'client_slide_nav',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control( 'client_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'items_number_xl', [
                                'label' => esc_html__( 'Column XL Device', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 1,
                                'max' => 60,
                                'step' => 1,
                                'default' => 4,
                                'description'       => esc_html__('How many logo item you want to show large device.', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'items_number_lg', [
                                'label' => esc_html__( 'Column LG Device', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 1,
                                'max' => 60,
                                'step' => 1,
                                'default' => 3,
                                'description'       => esc_html__('How many logo item you want to show large device.', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'items_number_md', [
                                'label' => esc_html__( 'Column MD Device', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 1,
                                'max' => 60,
                                'step' => 1,
                                'default' => 2,
                                'description'       => esc_html__('How many logo item you want to show medium device.', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'items_number_sm', [
                                'label' => esc_html__( 'Column SM Device', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 1,
                                'max' => 60,
                                'step' => 1,
                                'default' => 2,
                                'description'       => esc_html__('How many logo item you want to show small device.', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'items_gapping', [
                                'label' => esc_html__( 'Items Gapping', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 60,
                                'step' => 1,
                                'default' => 24,
                                'description'       => esc_html__('Insert items gapping if you want.', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'mem_image', [
                                        'label'         => esc_html__( 'Member Photo', 'uiuxom' ),
                                        'type'          => Controls_Manager::MEDIA,
                                        'description'   => esc_html__('Image size should be 314x362px or 13:15 ratio.', 'uiuxom'),
                                ]
                        );
                        $repeater->add_control( 'mem_name', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Member Name', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => esc_html__('Mr. Senior Member', 'uiuxom'),
                                ]
                        );
                        $repeater->add_control( 'mem_designation', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Member Designation', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => esc_html__('Sr. Developer', 'uiuxom'),
                                ]
                        );
                        $repeater->add_control( 'mem_url', [
                                    'label'             => esc_html__( 'Details Page URL', 'uiuxom' ),
                                    'type'              => Controls_Manager::URL,
                                    'input_type'        => 'url',
                                    'placeholder'       => esc_html__( 'https://your-link.com', 'uiuxom' ),
                                    'show_external'     => true,
                                    'default'           => [
                                            'url'            => '',
                                            'is_external'    => true,
                                            'nofollow'       => true,
                                    ]
                                ]
                        );
                        $repeater->add_control( 'mem_social_devider', [
                                        'label' => esc_html__( 'Member Social Profiles: 5 Max.', 'uiuxom' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                        );
                        $repeater->add_control( 'mem_fac', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Facbook', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_twi', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Twitter', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_lin', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Linkedin', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_dri', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Dribbble', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_ins', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Instagram', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_beh', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Behance', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_you', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Youtube', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_git', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Github', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_tum', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Tumblr', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_tik', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Tiktok', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                        $repeater->add_control( 'mem_vim', [
                                        'label_block'   => TRUE,
                                        'label'         => esc_html__( 'Vimeo', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                ]
                        );
                $this->add_control( 'list', [
                            'label'   => esc_html__( 'Client Logo', 'uiuxom' ),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeater->get_controls(),
                            'default' => [
                                    [
                                            'mem_image'        => array(),
                                            'mem_name'  => '',
                                            'mem_designation'         => '',
                                            'mem_url'         => array(),
                                            'mem_fac'         => '',
                                            'mem_twi'         => '',
                                            'mem_lin'         => '',
                                            'mem_dri'         => '',
                                            'mem_ins'         => '',
                                            'mem_beh'         => '',
                                            'mem_you'         => '',
                                            'mem_git'         => '',
                                            'mem_tum'         => '',
                                            'mem_tik'         => '',
                                            'mem_vim'         => '',

                                    ],
                            ],
                            'title_field' => '{{{ mem_name }}}',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_mode',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ],
                    ]
                );
                
                $this->add_control( 'mem_image', [
                                'label'         => esc_html__( 'Member Photo', 'uiuxom' ),
                                'type'          => Controls_Manager::MEDIA,
                                'description'   => esc_html__('Image size should be 314x362px or 13:15 ratio.', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_name', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Member Name', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Mr. Senior Member', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_designation', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Member Designation', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Sr. Developer', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_url', [
                            'label'             => esc_html__( 'Details Page URL', 'uiuxom' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com', 'uiuxom' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => true,
                                    'nofollow'       => true,
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_mode',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                        ]
                );
                $this->add_control( 'mem_social_devider', [
				'label' => esc_html__( 'Member Social Profiles: 5 Max.', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
			]
		);
                $this->add_control( 'mem_fac', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Facbook', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_twi', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Twitter', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_lin', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Linkedin', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_dri', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Dribbble', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_ins', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Instagram', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_beh', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Behance', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_you', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Youtube', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_git', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Github', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_tum', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Tumblr', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_tik', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Tiktok', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'mem_vim', [
                                'label_block'   => TRUE,
                                'label'         => esc_html__( 'Vimeo', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_01', [
                'label' =>esc_html__( 'Area & Thumb Style', 'uiuxom' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'ot_item_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .teamMember01'
                        ]
                );
                $this->add_responsive_control( 'ot_image_opacity', [
                                'label' => esc_html__( 'Hover IMG Opacity', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1,
                                'step' => .01,
                                'default' => '',
                                'selectors' => [
                                        '{{WRAPPER}} .teamMember01:hover img' => 'opacity: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'ot_items_radius', [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .teamMember01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control( 'ot_items_margins', [
                                'label'      => esc_html__( 'Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .teamMember01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_02', [
                'label' =>esc_html__( 'Top Info Style', 'uiuxom' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_control( 'mem_info_devider_1', [
				'label' => esc_html__( 'Member Name Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'ot_name_typo',
                                'label'     => esc_html__( 'Name Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .tm01Info h3',
                        ]
                );
                $this->add_responsive_control('ot_name_color',[
                                'label'     => esc_html__( 'Name Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .tm01Info h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('ot_name_color_hover',[
                                'label'     => esc_html__( 'Name Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .tm01Info h3 a:hover' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'ot_name_margin', [
                                'label'      => esc_html__( 'Name Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'mem_info_devider_2', [
				'label' => esc_html__( 'Member Designation Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'ot_desig_typo',
                                'label'     => esc_html__( 'Designation Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .tm01Info span',
                        ]
                );
                $this->add_responsive_control('ot_desig_color',[
                                'label'     => esc_html__( 'Designation Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .tm01Info span' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ot_desig_margin', [
                                'label'      => esc_html__( 'Designation Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Info span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'mem_info_devider_3', [
				'label' => esc_html__( 'Area Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'ot_area_padding', [
                                'label'      => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ot_area_margin', [
                                'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section( 'section_tab_04', [
                'label' =>esc_html__( 'Social Style', 'uiuxom' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'ot_soc_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .tm01Social',
                        ]
                );
                $this->add_responsive_control('ot_soc_color',[
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .tm01Social' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('ot_soc_color_hov',[
                                'label'     => esc_html__( 'Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .tm01Social a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ot_soc_item_margin', [
                                'label'      => esc_html__( 'Item Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['right'],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Social a' => 'margin-right: {{RIGHT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ot_soc_area_padding', [
                                'label'      => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Social' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ot_soc_area_margin', [
                                'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .tm01Social' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_nav', [
                    'label'             => esc_html__('Nav Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'mem_view_mode',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ],
                            [
                                    'name'      => 'client_slide_nav',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'abi_counter_box_with', [
                                'label' => esc_html__( 'Nav BTN Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'abi_counter_box_height', [
                                'label' => esc_html__( 'Nav BTN Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'folioSlider_nav_padding', [
                            'label'      => esc_html__( 'Nav Buttons Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'area_nav_margin', [
                            'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_dots', [
                    'label'             => esc_html__('Dots Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'mem_view_mode',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ],
                            [
                                    'name'      => 'client_slide_dots',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'dots_width', [
                                'label' => esc_html__( 'Dots Width', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_height', [
                                'label' => esc_html__( 'Dots Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_inner_width', [
                                'label' => esc_html__( 'Dots Inner Width', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_inner_height', [
                                'label' => esc_html__( 'Dots Inner Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'dot_styling_tab' );
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'fs_dot_bg_color', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'fls_dot_bg_inner_color', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'fsl_dot_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_dot_bg_color_hov', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'bl_dot_bg_inner_color_hov', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_dot_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover, {{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('bl_dot_radius', [
                                'label' => esc_html__( 'Dots  Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dot_margin', [
                                'label' => esc_html__( 'Dots  Gapping', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings      = $this->get_settings_for_display();
        $mem_view_mode = (isset($settings['mem_view_mode']) && $settings['mem_view_mode'] > 0 ? $settings['mem_view_mode'] : 1);
        
        if($mem_view_mode == 2):
            $autoplay = (isset($settings['client_slide_autoplay']) && $settings['client_slide_autoplay'] != '' ? $settings['client_slide_autoplay'] : 'no');
            $loop = (isset($settings['client_slide_loop']) && $settings['client_slide_loop'] != '' ? $settings['client_slide_loop'] : 'no');
            $nav = (isset($settings['client_slide_nav']) && $settings['client_slide_nav'] != '' ? $settings['client_slide_nav'] : 'no');
            $dots = (isset($settings['client_slide_dots']) && $settings['client_slide_dots'] != '' ? $settings['client_slide_dots'] : 'no');

            $items_number_xl   = (isset($settings['items_number_xl']) && $settings['items_number_xl'] > 0 ? $settings['items_number_xl'] : 4);
            $items_number_lg  = (isset($settings['items_number_lg']) && $settings['items_number_lg'] > 0 ? $settings['items_number_lg'] : 3);
            $items_number_md  = (isset($settings['items_number_md']) && $settings['items_number_md'] > 0 ? $settings['items_number_md'] : 2);
            $items_number_sm  = (isset($settings['items_number_sm']) && $settings['items_number_sm'] > 0 ? $settings['items_number_sm'] : 2);
            $gapping        = (isset($settings['items_gapping']) && $settings['items_gapping'] > 0 ? $settings['items_gapping'] : 24);
            
            $cat_nav_position        = (isset($settings['cat_nav_position']) && $settings['cat_nav_position'] > 0 ? $settings['cat_nav_position'] : 0);

            $members         = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
            if(!empty($members)): ?>
                <div class="teamSliderWrap sliderNavPosition_<?php echo $cat_nav_position; ?>" 
                     data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
                     data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
                     data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
                     data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
                     data-itemxl="<?php echo esc_attr($items_number_xl); ?>"
                     data-itemlg="<?php echo esc_attr($items_number_lg); ?>"
                     data-itemmd="<?php echo esc_attr($items_number_md); ?>"
                     data-itemsm="<?php echo esc_attr($items_number_sm); ?>"
                     data-gapping="<?php echo esc_attr($gapping); ?>"
                     >
                    <div class="teamCarousel owl-carousel">
                        <?php
                            foreach($members as $item):
                                $mem_image = (isset($item['mem_image']['url']) && !empty($item['mem_image']['url']) ? $item['mem_image']['url'] : 'https://via.placeholder.com/314x362.png?text=Orbito');
                                $mem_name = (isset($item['mem_name']) && !empty($item['mem_name']) ? $item['mem_name'] : '');
                                $mem_designation = (isset($item['mem_designation']) && !empty($item['mem_designation']) ? $item['mem_designation'] : '');

                                $mem_fac = (isset($item['mem_fac']) && !empty($item['mem_fac']) ? $item['mem_fac'] : '');
                                $mem_twi = (isset($item['mem_twi']) && !empty($item['mem_twi']) ? $item['mem_twi'] : '');
                                $mem_lin = (isset($item['mem_lin']) && !empty($item['mem_lin']) ? $item['mem_lin'] : '');
                                $mem_dri = (isset($item['mem_dri']) && !empty($item['mem_dri']) ? $item['mem_dri'] : '');
                                $mem_ins = (isset($item['mem_ins']) && !empty($item['mem_ins']) ? $item['mem_ins'] : '');
                                $mem_beh = (isset($item['mem_beh']) && !empty($item['mem_beh']) ? $item['mem_beh'] : '');
                                $mem_you = (isset($item['mem_you']) && !empty($item['mem_you']) ? $item['mem_you'] : '');
                                $mem_git = (isset($item['mem_git']) && !empty($item['mem_git']) ? $item['mem_git'] : '');
                                $mem_tum = (isset($item['mem_tum']) && !empty($item['mem_tum']) ? $item['mem_tum'] : '');
                                $mem_tik = (isset($item['mem_tik']) && !empty($item['mem_tik']) ? $item['mem_tik'] : '');
                                $mem_vim = (isset($item['mem_vim']) && !empty($item['mem_vim']) ? $item['mem_vim'] : '');

                                $url        = (isset($item['mem_url']['url'])) ? $item['mem_url']['url'] : '';
                                $target     = (isset($item['mem_url']['is_external'])) ? ' target="_blank"' : '' ;
                                $nofollow   = (isset($item['mem_url']['nofollow'])) ? ' rel="nofollow"' : '' ;

                                $team = 0;
                                ?>
                                <div class="teamMember01">
                                    <img src="<?php echo esc_url($mem_image) ?>" alt="<?php echo esc_attr($mem_name); ?>">
                                    <div class="tm01Info">
                                        <h3><?php echo (!empty($url) ? '<a '.  esc_attr($target.$nofollow).' href="'.esc_url($url).'">' : '') ?><?php echo esc_html($mem_name); ?><?php echo (!empty($url) ? '</a>' : '') ?></h3>
                                        <?php if(!empty($mem_designation)): ?>
                                            <span><?php echo esc_html($mem_designation); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="tm01Social">
                                        <?php if(!empty($mem_fac) && $team < 5): ?><a href="<?php echo esc_url($mem_fac); $team++; ?>"><i class="ulina-facebook-f"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_twi) && $team < 5): ?><a href="<?php echo esc_url($mem_twi); $team++; ?>"><i class="ulina-twitter"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_lin) && $team < 5): ?><a href="<?php echo esc_url($mem_lin); $team++; ?>"><i class="ulina-linkedin-in"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_dri) && $team < 5): ?><a href="<?php echo esc_url($mem_dri); $team++; ?>"><i class="ulina-dribbble"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_ins) && $team < 5): ?><a href="<?php echo esc_url($mem_ins); $team++; ?>"><i class="ulina-instagram"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_beh) && $team < 5): ?><a href="<?php echo esc_url($mem_beh); $team++; ?>"><i class="ulina-behance"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_you) && $team < 5): ?><a href="<?php echo esc_url($mem_you); $team++; ?>"><i class="ulina-youtube"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_git) && $team < 5): ?><a href="<?php echo esc_url($mem_git); $team++; ?>"><i class="ulina-github"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_tum) && $team < 5): ?><a href="<?php echo esc_url($mem_tum); $team++; ?>"><i class="ulina-tumblr"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_tik) && $team < 5): ?><a href="<?php echo esc_url($mem_tik); $team++; ?>"><i class="ulina-tiktok"></i></a><?php endif; ?>
                                        <?php if(!empty($mem_vim) && $team < 5): ?><a href="<?php echo esc_url($mem_vim); $team++; ?>"><i class="ulina-vimeo-v"></i></a><?php endif; ?>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            <?php endif;
        else:
            $mem_image = (isset($settings['mem_image']['url']) && !empty($settings['mem_image']['url']) ? $settings['mem_image']['url'] : 'https://via.placeholder.com/314x362.png?text=Orbito');
            $mem_name = (isset($settings['mem_name']) && !empty($settings['mem_name']) ? $settings['mem_name'] : '');
            $mem_designation = (isset($settings['mem_designation']) && !empty($settings['mem_designation']) ? $settings['mem_designation'] : '');

            $mem_fac = (isset($settings['mem_fac']) && !empty($settings['mem_fac']) ? $settings['mem_fac'] : '');
            $mem_twi = (isset($settings['mem_twi']) && !empty($settings['mem_twi']) ? $settings['mem_twi'] : '');
            $mem_lin = (isset($settings['mem_lin']) && !empty($settings['mem_lin']) ? $settings['mem_lin'] : '');
            $mem_dri = (isset($settings['mem_dri']) && !empty($settings['mem_dri']) ? $settings['mem_dri'] : '');
            $mem_ins = (isset($settings['mem_ins']) && !empty($settings['mem_ins']) ? $settings['mem_ins'] : '');
            $mem_beh = (isset($settings['mem_beh']) && !empty($settings['mem_beh']) ? $settings['mem_beh'] : '');
            $mem_you = (isset($settings['mem_you']) && !empty($settings['mem_you']) ? $settings['mem_you'] : '');
            $mem_git = (isset($settings['mem_git']) && !empty($settings['mem_git']) ? $settings['mem_git'] : '');
            $mem_tum = (isset($settings['mem_tum']) && !empty($settings['mem_tum']) ? $settings['mem_tum'] : '');
            $mem_tik = (isset($settings['mem_tik']) && !empty($settings['mem_tik']) ? $settings['mem_tik'] : '');
            $mem_vim = (isset($settings['mem_vim']) && !empty($settings['mem_vim']) ? $settings['mem_vim'] : '');

            $url        = (isset($settings['mem_url']['url'])) ? $settings['mem_url']['url'] : '';
            $target     = (isset($settings['mem_url']['is_external'])) ? ' target="_blank"' : '' ;
            $nofollow   = (isset($settings['mem_url']['nofollow'])) ? ' rel="nofollow"' : '' ;

            $team = 0;
            ?>
            <div class="teamMember01">
                <img src="<?php echo esc_url($mem_image) ?>" alt="<?php echo esc_attr($mem_name); ?>">
                <div class="tm01Info">
                    <h3><?php echo (!empty($url) ? '<a '.  esc_attr($target.$nofollow).' href="'.esc_url($url).'">' : '') ?><?php echo esc_html($mem_name); ?><?php echo (!empty($url) ? '</a>' : '') ?></h3>
                    <?php if(!empty($mem_designation)): ?>
                        <span><?php echo esc_html($mem_designation); ?></span>
                    <?php endif; ?>
                </div>
                <div class="tm01Social">
                    <?php if(!empty($mem_fac) && $team < 5): ?><a href="<?php echo esc_url($mem_fac); $team++; ?>"><i class="ulina-facebook-f"></i></a><?php endif; ?>
                    <?php if(!empty($mem_twi) && $team < 5): ?><a href="<?php echo esc_url($mem_twi); $team++; ?>"><i class="ulina-twitter"></i></a><?php endif; ?>
                    <?php if(!empty($mem_lin) && $team < 5): ?><a href="<?php echo esc_url($mem_lin); $team++; ?>"><i class="ulina-linkedin-in"></i></a><?php endif; ?>
                    <?php if(!empty($mem_dri) && $team < 5): ?><a href="<?php echo esc_url($mem_dri); $team++; ?>"><i class="ulina-dribbble"></i></a><?php endif; ?>
                    <?php if(!empty($mem_ins) && $team < 5): ?><a href="<?php echo esc_url($mem_ins); $team++; ?>"><i class="ulina-instagram"></i></a><?php endif; ?>
                    <?php if(!empty($mem_beh) && $team < 5): ?><a href="<?php echo esc_url($mem_beh); $team++; ?>"><i class="ulina-behance"></i></a><?php endif; ?>
                    <?php if(!empty($mem_you) && $team < 5): ?><a href="<?php echo esc_url($mem_you); $team++; ?>"><i class="ulina-youtube"></i></a><?php endif; ?>
                    <?php if(!empty($mem_git) && $team < 5): ?><a href="<?php echo esc_url($mem_git); $team++; ?>"><i class="ulina-github"></i></a><?php endif; ?>
                    <?php if(!empty($mem_tum) && $team < 5): ?><a href="<?php echo esc_url($mem_tum); $team++; ?>"><i class="ulina-tumblr"></i></a><?php endif; ?>
                    <?php if(!empty($mem_tik) && $team < 5): ?><a href="<?php echo esc_url($mem_tik); $team++; ?>"><i class="ulina-tiktok"></i></a><?php endif; ?>
                    <?php if(!empty($mem_vim) && $team < 5): ?><a href="<?php echo esc_url($mem_vim); $team++; ?>"><i class="ulina-vimeo-v"></i></a><?php endif; ?>
                </div>
            </div>
        <?php endif;
    }
    
    protected function content_template() {}
}