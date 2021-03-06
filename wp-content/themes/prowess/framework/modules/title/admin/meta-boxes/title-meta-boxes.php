<?php

if ( ! function_exists( 'prowess_select_get_title_types_meta_boxes' ) ) {
	function prowess_select_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'prowess_select_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'prowess' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( QODE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'prowess_select_map_title_meta' ) ) {
	function prowess_select_map_title_meta() {
		$title_type_meta_boxes = prowess_select_get_title_types_meta_boxes();
		
		$title_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => apply_filters( 'prowess_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'prowess' ),
				'name'  => 'title_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'prowess' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'prowess' ),
				'parent'        => $title_meta_box,
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = prowess_select_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'qodef_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'qodef_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'prowess' ),
						'description'   => esc_html__( 'Choose title type', 'prowess' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'prowess' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'prowess' ),
						'options'       => prowess_select_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'prowess' ),
						'description' => esc_html__( 'Set a height for Title Area', 'prowess' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'prowess' ),
						'description' => esc_html__( 'Choose a background color for title area', 'prowess' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'prowess' ),
						'description' => esc_html__( 'Choose an Image for title area', 'prowess' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'prowess' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'prowess' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'prowess' ),
							'hide'                => esc_html__( 'Hide Image', 'prowess' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'prowess' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'prowess' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'prowess' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'prowess' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'prowess' )
						)
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'prowess' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'prowess' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'prowess' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'prowess' ),
							'window-top'    => esc_html__( 'From Window Top', 'prowess' )
						)
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'prowess' ),
						'options'       => prowess_select_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'prowess' ),
						'description' => esc_html__( 'Choose a color for title text', 'prowess' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'prowess' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'prowess' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'prowess' ),
						'options'       => prowess_select_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'prowess' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'prowess' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'prowess_select_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_title_meta', 60 );
}