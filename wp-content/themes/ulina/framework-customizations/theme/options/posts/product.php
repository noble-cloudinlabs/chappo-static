<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
        'mains' => array(
		'title'   => esc_html__( 'Product Settings Box', 'ulina' ),
		'type'    => 'box',
		'options' => array(
                        'bannersettings' => array(
                                'title'   => esc_html__( 'Banner Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'shop_products_is_settings'                    => array(
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
                                                'desc'         => esc_html__('Enable bellow settings for this page banner.', 'ulina'),
                                        ),
                                        'shop_products_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner only for this page? Then please turn it to Hide.', 'ulina'),
                                        ),
                                        'shop_products_banner_bg' => array( 
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'ulina' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image and this only work for dark version.', 'ulina' ),
                                        ),
                                        'shop_products_banner_bg_color'	=> array(
                                                'type'          => 'rgba-color-picker',
                                                'value'         => '',
                                                'palettes'      => array(),
                                                'label'         => esc_html__('Banner BG Color', 'ulina'),
                                                'desc'          => esc_html__('Insert your page banner bg color here.', 'ulina'),
                                        ),
                                        'shop_products_banner_title'	 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'ulina' ),
                                                'desc'		 => esc_html__( 'Insert your page banner custom title.', 'ulina' ),
                                        ),
                                        'shop_products_is_breadcrumb'   => array(
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
                                                'desc'         => esc_html__('Do you want to show breadcrumb on page banner?', 'ulina'),
                                        ),
                                        'shop_products_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Content Alignment', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left'         => esc_html__( 'Left', 'ulina' ),
                                                        'center'       => esc_html__( 'Center', 'ulina' ),
                                                        'right'        => esc_html__( 'Right', 'ulina' ),
                                                ),
                                        ),
                                ),
                        ),
                        'contentSettings' => array(
                                'title'   => esc_html__( 'Content Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'shop_products_enable_content_setting'   => array(
                                                'label'        => esc_html__( 'Enabled Settings?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'        => '2',
                                        ),
                                        'shop_products_gallery_style'              => array(
                                                'label'   => esc_html__( 'Gallery Style', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'choices' => array(
                                                        '1' => esc_html__('Thumbnail In Bottom', 'ulina'),
                                                        '2' => esc_html__('Thumbnail In Left', 'ulina'),
                                                ),
                                        ),
                                        'shop_products_is_zoom'   => array(
                                                'label'        => esc_html__( 'Is Zoom?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'        => '2',
                                        ),
                                        'shop_products_is_flashlabel'   => array(
                                                'label'        => esc_html__( 'Is Flashlabel?', 'ulina' ),
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
                                        ),
                                        'shop_products_is_cat'   => array(
                                                'label'        => esc_html__( 'Is Category?', 'ulina' ),
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
                                        'shop_products_is_review'   => array(
                                                'label'        => esc_html__( 'Is Ratings?', 'ulina' ),
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
                                        'shop_products_is_stock'   => array(
                                                'label'        => esc_html__( 'Is Stock?', 'ulina' ),
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
                                        'shop_products_stock_label'   => array(
                                                'label'        => esc_html__( 'Stock Count Label', 'ulina' ),
                                                'type'         => 'text',
                                                'value'        => ''
                                        ),
                                        'shop_products_variation_alignment'              => array(
                                                'label'   => esc_html__( 'Gallery Style', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'choices' => array(
                                                        '1' => esc_html__('Vertical Alignment', 'ulina'),
                                                        '2' => esc_html__('Horizontal Alignment', 'ulina'),
                                                ),
                                        ),
                                        'shop_products_desc_lingth'   => array(
                                                'type'  => 'slider',
                                                'value' => '',
                                                'properties' => array(
                                                    'min' => 0,
                                                    'max' => 10000,
                                                    'step' => 5,
                                                ),
                                                'label' => esc_html__('Short Desc Length', 'ulina')
                                        ),
                                        'shop_products_is_wishlist'   => array(
                                                'label'        => esc_html__( 'Is wishlist?', 'ulina' ),
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
                                        'shop_products_is_sku'   => array(
                                                'label'        => esc_html__( 'Is SKU?', 'ulina' ),
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
                                        'shop_products_is_tag'   => array(
                                                'label'        => esc_html__( 'Is Tag?', 'ulina' ),
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
                                        'shop_products_is_social'   => array(
                                                'label'        => esc_html__( 'Is Social?', 'ulina' ),
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
                                        'shop_products_social'   => array(
                                                'type'  => 'checkboxes',
                                                'value' => array(
                                                        '1' => true,
                                                        '2' => true,
                                                        '4' => true,
                                                        '5' => true,
                                                ),
                                                'label' => esc_html__('Select Social Media', 'ulina'),
                                                'choices' => array(
                                                        '1'   => esc_html__( 'Facebook', 'ulina' ),
                                                        '2'   => esc_html__( 'Twitter', 'ulina' ),
                                                        '3'   => esc_html__( 'Email', 'ulina' ),
                                                        '4'   => esc_html__( 'LinkedIn', 'ulina' ),
                                                        '5'   => esc_html__( 'Pinterest', 'ulina' ),
                                                        '6'   => esc_html__( 'Whatsapp', 'ulina' ),
                                                        '7'   => esc_html__( 'Digg', 'ulina' ),
                                                        '8'   => esc_html__( 'Tumblr', 'ulina' ),
                                                        '9'   => esc_html__( 'Reddit', 'ulina' ),
                                                ),
                                                'inline' => false,
                                        ),
                                        'shop_products_tagsettings'   => array(
                                                'type'  => 'html',
                                                'value' => '',
                                                'label' => ' ',
                                                'html'  => '<div class="customizer_label">'.esc_html__('Product Tab Settings', 'ulina').'</div>',
                                        ),
                                        'shop_products_tab_style'              => array(
                                                'label'   => esc_html__( 'Gallery Style', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'choices' => array(
                                                        '1' => esc_html__('Link Style Tab', 'ulina'),
                                                        '2' => esc_html__('Pill / Button Style Tab', 'ulina'),
                                                        '3' => esc_html__('Expanded View', 'ulina'),
                                                ),
                                        ),
                                        'shop_products_tab_align'              => array(
                                                'label'   => esc_html__( 'Product Tab Alignment', 'ulina' ),
                                                'type'    => 'short-select',
                                                'desc'    => esc_html__( 'This option will only work for "Link Style Tab" and "Pill / Button Style Tab"', 'ulina' ),
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left' => esc_html__('Left Align', 'ulina'),
                                                        'center' => esc_html__('Center Align', 'ulina'),
                                                        'right' => esc_html__('Right Align', 'ulina'),
                                                ),
                                        ),
                                    
                                        'shop_products_relatedSettings'   => array(
                                                'type'  => 'html',
                                                'value' => '',
                                                'label' => ' ',
                                                'html'  => '<div class="customizer_label">'.esc_html__('Related Product Settings', 'ulina').'</div>',
                                        ),
                                        'shop_products_is_related'   => array(
                                                'label'        => esc_html__( 'Is Related Product?', 'ulina' ),
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
                                        'shop_products_area_title'   => array(
                                                'label'        => esc_html__( 'Related Area Title', 'ulina' ),
                                                'type'         => 'text',
                                                'value'        => esc_html__( 'More Products Like This', 'ulina' ),
                                        ),
                                        'shop_products_related_is_flashlabels'   => array(
                                                'label'        => esc_html__( 'Is Flash Label?', 'ulina' ),
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
                                        'shop_products_related_is_wishlist'   => array(
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
                                        'shop_products_related_is_quickview'   => array(
                                                'label'        => esc_html__( 'Is Quickview?', 'ulina' ),
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
                                        'shop_products_is_rating_count'   => array( 
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
                                        'shop_products_review_label'   => array( 
                                                'label'        => esc_html__( 'Rating Count Label', 'ulina' ),
                                                'type'         => 'text',
                                                'value'        => '' 
                                        ),
                                )
                        ),
                        'contentExtra' => array(
                                'title'   => esc_html__( 'Tab Content Settings', 'ulina' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'shop_products_details_area_label'   => array( 
                                                'label'        => esc_html__( 'Features Details Area Label', 'ulina' ),
                                                'type'         => 'text',
                                                'value'        => esc_html__('Product Details', 'ulina') 
                                        ),
                                        'shop_products_feature_area_label'   => array( 
                                                'label'        => esc_html__( 'Features Area Label', 'ulina' ),
                                                'type'         => 'text',
                                                'value'        => esc_html__('Product Features', 'ulina') 
                                        ),
                                        'shop_products_features'                    => array(
                                                'type'  => 'addable-box',
                                                'value' => array(),
                                                'label' => esc_html__( 'Product Features', 'ulina' ),
                                                'box-options' => array(
                                                        'desc' => array( 
                                                                'label' => esc_html__( 'Feature', 'ulina' ),
                                                                'type' => 'textarea' ,
                                                                'value' => '',
                                                        ),
                                                ),
                                                'template' => 'Notes - {{- desc }}',
                                                'box-controls' => array(),
                                                'add-button-text' => esc_html__('Add Feature', 'ulina' ),
                                                'sortable' => true,
                                        ),
                                        'shop_products_addinfo_area_label'   => array( 
                                                'label'        => esc_html__( 'Additional Info Area Label', 'ulina' ),
                                                'type'         => 'text',
                                                'value'        => esc_html__('Additional Information', 'ulina') 
                                        ),
                                )
                        ),
                )
        ),
        '_product_meta_1' => array(
                'title'          => esc_html__( 'Product Settings', 'ulina' ),
                'type'           => 'box',
                'priority'       => 'high',
                'context'        => 'side',
                'options'        => array(
                        '_is_top'                    => array(
                                'label'        => esc_html__( 'Is Top Prodcut?', 'ulina' ),
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
                                'desc'         => esc_html__('If you want to show TOP label then please turn it to Yes.', 'ulina'),
                        ),
                        '_is_hot'                    => array( 
                                'label'        => esc_html__( 'Is Hot Prodcut?', 'ulina' ),
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
                                'desc'         => esc_html__('If you want to show HOT label then please turn it to Yes.', 'ulina'),
                        ),
                        '_features' => array(
                                'type'  => 'addable-option',
                                'value' => array(),
                                'label' => esc_html__('List Features', 'ulina'),
                                'desc'  => esc_html__('Add some highlighted features for product list view. Leave blank to show product short descripton.', 'ulina'),
                                'option' => array( 'type' => 'text' ),
                                'add-button-text' => esc_html__('Add Feature', 'ulina'),
                                'sortable' => true,
                        )
                ),
        ),
        '_product_meta_2' => array(
                'title'          => esc_html__( 'Product Image 02', 'ulina' ),
                'type'           => 'box',
                'priority'       => 'low',
                'context'        => 'side',
                'options'        => array(
                        '_product_img_2' => array(
                                'type'	 => 'upload',
                                'label'	 => false,
                                'desc'	 => esc_html__( 'Upload secondary featured image for this product.', 'ulina' ),
                        ),
                ),
        ),
);
