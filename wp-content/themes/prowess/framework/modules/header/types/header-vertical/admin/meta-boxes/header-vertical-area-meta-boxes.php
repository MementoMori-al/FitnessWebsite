<?php

if ( ! function_exists( 'prowess_select_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function prowess_select_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'prowess_select_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'prowess_select_header_vertical_area_meta_options_map' ) ) {
	function prowess_select_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = prowess_select_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = prowess_select_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		prowess_select_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'prowess' )
			)
		);
		
		$prowess_custom_sidebars = prowess_select_get_custom_sidebars();
		if ( count( $prowess_custom_sidebars ) > 0 ) {
			prowess_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'prowess' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'prowess' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $prowess_custom_sidebars
				)
			);
		}
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'prowess' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'prowess' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'prowess' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'prowess' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'prowess' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'prowess' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'prowess' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'prowess' ),
				'description'   => esc_html__( 'Set border on vertical area', 'prowess' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = prowess_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'qodef_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'prowess' ),
				'description' => esc_html__( 'Choose color of border', 'prowess' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'prowess' ),
				'description'   => esc_html__( 'Set content in vertical center', 'prowess' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'prowess_select_additional_header_area_meta_boxes_map', 'prowess_select_header_vertical_area_meta_options_map', 10, 1 );
}