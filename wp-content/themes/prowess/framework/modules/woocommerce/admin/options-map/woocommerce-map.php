<?php

if ( ! function_exists( 'prowess_select_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function prowess_select_woocommerce_options_map() {
		
		prowess_select_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'prowess' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = prowess_select_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'prowess' ),
				'default_value' => 'qodef-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'prowess' ),
				'options'       => array(
					'qodef-woocommerce-columns-3' => esc_html__( '3 Columns', 'prowess' ),
					'qodef-woocommerce-columns-4' => esc_html__( '4 Columns', 'prowess' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'prowess' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'prowess' ),
				'default_value' => 'normal',
				'options'       => prowess_select_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'prowess' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'prowess' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'prowess' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'prowess' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'qodef_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'prowess' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'prowess' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'prowess' ),
				'default_value' => 'h5',
				'options'       => prowess_select_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = prowess_select_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'prowess' ),
				'parent'        => $panel_single_product,
				'options'       => prowess_select_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'prowess' ),
				'options'       => prowess_select_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'prowess' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'prowess' ),
					'3' => esc_html__( 'Three', 'prowess' ),
					'2' => esc_html__( 'Two', 'prowess' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'on-left-side',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'prowess' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'prowess' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'prowess' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'prowess' ),
				'parent'        => $panel_single_product,
				'options'       => prowess_select_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'prowess' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'prowess' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'prowess' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'prowess' ),
				'default_value' => 'qodef-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'prowess' ),
				'options'       => array(
					'qodef-woocommerce-columns-3' => esc_html__( '3 Columns', 'prowess' ),
					'qodef-woocommerce-columns-4' => esc_html__( '4 Columns', 'prowess' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('prowess_select_woocommerce_additional_options_map');
	}
	
	add_action( 'prowess_select_options_map', 'prowess_select_woocommerce_options_map', 21 );
}