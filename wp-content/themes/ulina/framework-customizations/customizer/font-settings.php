<?php
$fields[] = array(
    'type'        => 'typography',
	'settings'    => 'primary_fonts',
	'label'       => esc_html__( 'Primary Typography', 'ulina' ),
	'section'     => 'font_section',
	'default'     => [
        'font-family'    => '',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body, .blogDetailscontent blockquote cite strong, .blogDetailscontent blockquote.wp-block-quote cite strong',
		],
	],
    'description'   => esc_html__('Primary typography by default effect on each element under body excepts some special elements those are under Secondary Typography.', 'ulina')
);
$fields[] = array(
    'type'               => 'typography',
	'settings'           => 'secondary_fonts',
	'label'              => esc_html__( 'Secondary Typography', 'ulina' ),
	'section'            => 'font_section',
	'default'            => [
        'font-family'    => '',
	],
	'transport'         => 'auto',
	'output'            => [
        [
            'element'  => 'h1, h2, h3, h4, h5, h6, .jost, .ulinaLink, .ulinaBTN, .ulinaBTN2, .menuToggler, .mainMenu, .cartWidgetProduct a, .cartWidgetProduct .cartProductPrice, .totalPrice, 
			.cartWidgetBTN a, .popup_search_form input[type="search"], .pi01Price, .ulinaCountDown, .productTabs ul.productTabsNav, .filterUL li, .pcCategory, .productStock, 
			.pcVariation > span, .singleVariation label, .pcMeta p span, .productDetailsTab, .productDetailsTab.productDetailsTabMode_2 button, .additionalContentArea table tr th, 
			.woocommerce .additionalContentArea table.shop_attributes tr th, .reviewStar label, .comment-form-rating label, .woocommerce .shop_table.cart_table thead tr th, 
			.woocommerce table.shop_table.wishlist_table thead tr th, .woocommerce .shop_table.cart_table tbody tr td.product-name a, 
			.woocommerce table.shop_table.wishlist_table tbody tr td.product-name a, .woocommerce .shop_table.cart_table tbody tr td.product-name dl dt, 
			.woocommerce table.shop_table.wishlist_table tbody tr td.product-name dl dt, .woocommerce table.shop_table.wishlist_table tbody tr td.product-stock-status, 
			.woocommerce table.shop_table.wishlist_table tbody tr td.product-add-to-cart span.dateadded, .woocommerce table.shop_table.wishlist_table tbody tr td.product-add-to-cart a.add_to_cart, 
			.woocommerce .cartCoupon button.button, .shippingFormElements label, .cart_totals table tr th, .woocommerce-cart .cart-collaterals .cart_totals table th, 
			.cart_totals table tr td .pi01Price, .woocommerce-cart .cart-collaterals .cart_totals table td .amount, .loginLinks p, .woocommerce-page form .form-row label.checkbox span, 
			.checkoutForm h3#ship-to-different-address label span, .shippingAddress label, .orderReview table thead tr th, .woocommerce table.shop_table.woocommerce-checkout-review-order-table thead tr th, 
			.orderReview table tbody tr td, .woocommerce table.shop_table.woocommerce-checkout-review-order-table tbody tr td, .orderReview table tfoot tr td .pi01Price, 
			.woocommerce table.shop_table.woocommerce-checkout-review-order-table tfoot tr td .amount, .wc_payment_methods li label, .placeOrderBTN.ulinaBTN, .woocommerce #payment #place_order, 
			.woocommerce-page #payment #place_order, .bi04Share span, .rpCats, .sidebar .widget ul li a, .blogDetailscontent blockquote cite, .blogDetailscontent blockquote.wp-block-quote cite, 
			.comment-reply-link, .ulinaFAQTab li button, .contactForm input[type="submit"], .wcboost-variation-swatches--has-tooltip .wcboost-variation-swatches__item:before, 
			.woocommerce ul.product_list_widget li .cartWidgetProduct a, .woocommerce .shopSidebar .widget_shopping_cart .total, .shopSidebar .woocommerce.widget_shopping_cart .total, 
			.woocommerce-mini-cart__buttons.buttons a, .woocommerce ul.product_list_widget li .reviewer, .shopAjaxPagination a, .woocommerce div.product.productContainerWrap form.cart .variations .variationItem .label, 
			.woocommerce div.product.productContainerWrap button.button.ulinaBTN, .woocommerce div.product.productContainerWrap .woocommerce-variation-price .price, .woocommerce div.product.productContainerWrap p.stock, 
			.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button, .woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button, 
			.woocommerce ul#shipping_method li label, .woocommerce-cart .cart-collaterals .cart_totals .woocommerce-shipping-destination strong, .woocommerce-cart .cart-collaterals .shipping-calculator-button, 
			.woocommerce .woocommerce-shipping-calculator button.button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce .woocommerce-form-login .woocommerce-form-login__rememberme span, 
			.woocommerce .ulinaThankuPage ul.order_details li strong, .woocommerce .ulinaThankuPage table.shop_table.order_details thead tr th, .woocommerce .woocommerce-MyAccount-content table.shop_table.order_details tr th, 
			.woocommerce .ulinaThankuPage table.shop_table.order_details tbody tr td, .woocommerce .woocommerce-MyAccount-content table.shop_table.order_details tr td, .woocommerce .ulinaThankuPage table.shop_table.order_details tfoot tr th, 
			.woocommerce .woocommerce-MyAccount-content table.shop_table.order_details tfoot tr th, .woocommerce .ulinaThankuPage table.shop_table.order_details tfoot tr td  .amount, 
			.woocommerce .woocommerce-MyAccount-content table.shop_table.order_details tfoot tr td .amount, .myAccountNavigation ul li a, .myAccountPages p strong, .myAccountPages p a, 
			.woocommerce table.my_account_orders th, .woocommerce table.woocommerce-table--order-downloads th, .woocommerce table.my_account_orders .button.view, .woocommerce table.woocommerce-table--order-downloads td .button, 
			.woocommerce-account .addresses .title .edit, .woocommerce form.editAddressForm .form-row  label, .woocommerce form.edit-account .form-row  label, .order-again a.button, 
			.woocommerce div.product.productContainerWrap .groupdThumbTitle a, .woocommerce .return-to-shop .button',
            'property' => 'font-family'
        ],
	],
    'description'      => esc_html__('This typography settings only for those special elements and Its only used Font Family from options.', 'ulina')
);