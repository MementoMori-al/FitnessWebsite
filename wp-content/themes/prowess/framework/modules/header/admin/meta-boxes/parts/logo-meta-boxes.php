<?php

if ( ! function_exists( 'prowess_select_logo_meta_box_map' ) ) {
	function prowess_select_logo_meta_box_map() {
		
		$logo_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => apply_filters( 'prowess_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'prowess' ),
				'name'  => 'logo_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'prowess' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'prowess' ),
				'parent'      => $logo_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'prowess' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'prowess' ),
				'parent'      => $logo_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'prowess' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'prowess' ),
				'parent'      => $logo_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'prowess' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'prowess' ),
				'parent'      => $logo_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'prowess' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'prowess' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_logo_meta_box_map', 47 );
}