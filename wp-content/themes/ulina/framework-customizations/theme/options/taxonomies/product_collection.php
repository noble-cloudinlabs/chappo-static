<?php
$options = array(
        'shop_collections_sec_heading_01'                    => array(
                'type'  => 'html',
                'value' => 'h1',
                'label' => ' ',
                'html'  => '<div class="customizer_label">'.esc_html__('Collection Banner Settings', 'ulina').'</div>',
        ),
        'shop_collections_is_settings'                    => array(
                'label'        => esc_html__( 'Enable Settings', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Yes', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'No', 'ulina' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('Enable bellow settings for this collection banner.', 'ulina'),
        ),
        'shop_collections_is_banner'                    => array(
                'label'        => esc_html__( 'Is Banner', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '1',
                'desc'         => esc_html__('Do you want to hide banner only for this collection? Then please turn it to Hide.', 'ulina'),
        ),
        'shop_collections_banner_bg' => array(
                'type'	 => 'upload',
                'label'	 => esc_html__( 'Banner BG IMG', 'ulina' ),
                'desc'	 => esc_html__( 'Upload your page banner bg image.', 'ulina' ),
        ),
        'shop_collections_banner_bg_color'	=> array(
                'type'          => 'rgba-color-picker',
                'value'         => '',
                'palettes'      => array(),
                'label'         => esc_html__('Banner BG Color', 'ulina'),
                'desc'          => esc_html__('Insert your page banner bg color here.', 'ulina'),
        ),
        'shop_collections_banner_title'	 => array(
                'type'		 => 'text',
                'value'		 => '',
                'label'		 => esc_html__( 'Banner Title', 'ulina' ),
                'desc'		 => esc_html__( 'Insert your page banner custom title.', 'ulina' ),
        ),
        'shop_collections_is_breadcrumb'   => array(
                'label'        => esc_html__( 'Is Breadcrumb?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Yes', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'No', 'ulina' )
                ),
                'value'        => '1',
                'desc'         => esc_html__('Do you want to show breadcrumb on collection banner?', 'ulina'),
        ),
        'shop_collections_banner_alignment'              => array(
                'label'   => esc_html__( 'Banner Content Alignment', 'ulina' ),
                'type'    => 'short-select',
                'value'   => 'center',
                'choices' => array(
                        'left'         => esc_html__( 'Left', 'ulina' ),
                        'center'       => esc_html__( 'Center', 'ulina' ),
                        'right'        => esc_html__( 'Right', 'ulina' ),
                ),
        ),

        'shop_collections_sec_heading_02'                    => array(
                'type'  => 'html',
                'value' => 'h1',
                'label' => ' ',
                'html'  => '<div class="customizer_label">'.esc_html__('Collection Content Settings', 'ulina').'</div>',
        ),
        'shop_collections_is_content_settings'                    => array(
                'label'        => esc_html__( 'Enable Content Settings', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Yes', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'No', 'ulina' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('Enable bellow settings for this collection content.', 'ulina'),
        ),
        'shop_collections_sidebar'              => array(
                'label'   => esc_html__( 'Shop Sidebar Position', 'ulina' ),
                'type'    => 'select',
                'value'   => '3',
                'choices' => array(
                        '1'      => esc_html__('No Sidebar','ulina'),
                        '2'      => esc_html__('Left Sidebar','ulina'),
                        '3'      => esc_html__('Right Sidebar','ulina'),
                ),
        ),
        'shop_collections_col_xl'              => array(
                'label'   => esc_html__( 'Shop product column for xl device.', 'ulina' ),
                'type'    => 'select',
                'value'   => '4',
                'choices' => array(
                        '2'      => esc_html__('Col XL 2','ulina'),
                        '3'      => esc_html__('Col XL 3','ulina'),
                        '4'      => esc_html__('Col XL 4','ulina'),
                        '6'      => esc_html__('Col XL 6','ulina'),
                ),
        ),
        'shop_collections_col_lg'              => array(
                'label'   => esc_html__( 'Shop product column for lg device.', 'ulina' ),
                'type'    => 'select',
                'value'   => '4',
                'choices' => array(
                        '2'      => esc_html__('Col LG 2','ulina'),
                        '3'      => esc_html__('Col LG 3','ulina'),
                        '4'      => esc_html__('Col LG 4','ulina'),
                        '6'      => esc_html__('Col LG 6','ulina'),
                ),
        ),
        'shop_collections_col_md'              => array(
                'label'   => esc_html__( 'Shop product column for md device.', 'ulina' ),
                'type'    => 'select',
                'value'   => '2',
                'choices' => array(
                        '2'      => esc_html__('Col MD 2','ulina'),
                        '3'      => esc_html__('Col MD 3','ulina'),
                        '4'      => esc_html__('Col MD 4','ulina'),
                        '6'      => esc_html__('Col MD 6','ulina'),
                ),
        ),
        'shop_collections_col_sm'              => array(
                'label'   => esc_html__( 'Shop product column for sm device.', 'ulina' ),
                'type'    => 'select',
                'value'   => '2',
                'choices' => array(
                        '2'      => esc_html__('Col SM 2','ulina'),
                        '3'      => esc_html__('Col SM 3','ulina'),
                        '4'      => esc_html__('Col SM 4','ulina'),
                        '6'      => esc_html__('Col SM 6','ulina'),
                ),
        ),
        'shop_collections_is_count'                    => array(
                'label'        => esc_html__( 'Show Product Count?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '1'
        ),
        'shop_collections_is_sort'                    => array(
                'label'        => esc_html__( 'Is Sort?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '1'
        ),
        'shop_collections_is_view_toggler'                    => array(
                'label'        => esc_html__( 'Is View Toggler?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '2'
        ),
        'shop_collections_default_view'              => array(
                'label'   => esc_html__( 'Default View', 'ulina' ),
                'type'    => 'select',
                'value'   => '1',
                'choices' => array(
                        '1'      => esc_html__('Grid View','ulina'),
                        '2'      => esc_html__('List View','ulina')
                ),
        ),
        'shop_collections_thumb_width'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1
                ),
                'label' => esc_html__( 'Grid Thumbnail Width', 'ulina' )
        ),
        'shop_collections_thumb_height'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1
                ),
                'label' => esc_html__( 'Grid Thumbnail Height', 'ulina' )
        ),
        'shop_collections_list_thumb_width'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1
                ),
                'label' => esc_html__( 'List Thumbnail Width', 'ulina' )
        ),
        'shop_collections_list_thumb_height'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1
                ),
                'label' => esc_html__( 'List Thumbnail Height', 'ulina' ),
        ),
        'shop_collections_is_flashlabels'                    => array(
                'label'        => esc_html__( 'Is Flash Lebels?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '1'
        ),
        'shop_collections_is_wishlist'                    => array(
                'label'        => esc_html__( 'Is Wishlist?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '2'
        ),
        'shop_collections_is_quickview'                    => array(
                'label'        => esc_html__( 'Is Quick View?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '2'
        ),
        'shop_collections_is_rating_count'                    => array(
                'label'        => esc_html__( 'Is Rating Count?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '2'
        ),
        'shop_collections_review_label'	 => array(
                'type'		 => 'text',
                'value'		 => '',
                'label'		 => esc_html__( 'Rating Label', 'ulina' ),
        ),
        'shop_collections_pagination_type'              => array(
                'label'   => esc_html__( 'Pagination Type', 'ulina' ),
                'type'    => 'select',
                'value'   => '1',
                'choices' => array(
                        '1'      => esc_html__('Default Pagination','ulina'),
                        '2'      => esc_html__('Ajax Pagination','ulina')
                ),
        ),
        'shop_collections_ajax_btn_label'	 => array(
                'type'		 => 'text',
                'value'		 => '',
                'label'		 => esc_html__( 'Ajax BTN Label', 'ulina' ),
        ),
        'shop_collections_pagi_align'              => array(
                'label'   => esc_html__( 'Pagination Alignment', 'ulina' ),
                'type'    => 'select',
                'value'   => 'left',
                'choices' => array(
                        'left'         => esc_html__( 'Left', 'ulina' ),
                        'center'       => esc_html__( 'Center', 'ulina' ),
                        'right'        => esc_html__( 'Right', 'ulina' ),
                ),
        ),

        'shop_collections_sec_heading_03'                    => array(
                'type'  => 'html',
                'value' => 'h1',
                'label' => ' ',
                'html'  => '<div class="customizer_label">'.esc_html__('Top / Bottom Blocks Settings', 'ulina').'</div>',
        ),
        'shop_collections_top_bloks'                    => array(
                'type'  => 'addable-box',
                'value' => array(),
                'label' => esc_html__( 'Add Top Blocks', 'ulina' ),
                'box-options' => array(
                        'top_block_ids' => array( 
                                'label' => esc_html__( 'Top Block', 'ulina' ),
                                'type' => 'select' ,
                                'choices' => ulina_post_array('blocks', esc_html__('All Blocks', 'ulina')),
                        ),
                ),
                'template' => 'Top Block #{{- top_block_ids }}',
                'box-controls' => array(),
                'limit' => 3, 
                'add-button-text' => esc_html__('Add Top Block', 'ulina' ),
                'sortable' => true,
        ),
        'shop_collections_bottom_bloks'                    => array(
                'type'  => 'addable-box',
                'value' => array(),
                'label' => esc_html__( 'Add Bottom Blocks', 'ulina' ),
                'box-options' => array(
                        'bottom_block_ids' => array( 
                                'label' => esc_html__( 'Bottom Block', 'ulina' ),
                                'type' => 'select' ,
                                'choices' => ulina_post_array('blocks', esc_html__('All Blocks', 'ulina')),
                        ),
                ),
                'template' => 'Bottom Block #{{- bottom_block_ids }}',
                'box-controls' => array(),
                'limit' => 3, 
                'add-button-text' => esc_html__('Add Bottom Block', 'ulina' ),
                'sortable' => true,
        )

);