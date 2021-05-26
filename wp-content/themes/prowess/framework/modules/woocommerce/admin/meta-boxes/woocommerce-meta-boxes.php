<?php

if ( ! function_exists( 'prowess_select_map_woocommerce_meta' ) ) {
	function prowess_select_map_woocommerce_meta() {
		
		$woocommerce_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'prowess' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'prowess' ),
				'description' => esc_html__( 'Choose image layout when it appears in Product List - Masonry layout shortcode', 'prowess' ),
				'options'     => array(
					''                                   => esc_html__( 'Default', 'prowess' ),
					'qodef-woo-image-small'              => esc_html__( 'Small', 'prowess' ),
					'qodef-woo-image-large-width'        => esc_html__( 'Large Width', 'prowess' ),
					'qodef-woo-image-large-height'       => esc_html__( 'Large Height', 'prowess' ),
					'qodef-woo-image-large-width-height' => esc_html__( 'Large Width Height', 'prowess' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'prowess' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'prowess' ),
				'options'       => prowess_select_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'prowess' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_woocommerce_meta', 99 );
}