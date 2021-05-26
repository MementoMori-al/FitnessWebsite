<?php

if ( ! function_exists( 'prowess_select_centered_title_type_options_meta_boxes' ) ) {
	function prowess_select_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'prowess' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'prowess' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'prowess_select_additional_title_area_meta_boxes', 'prowess_select_centered_title_type_options_meta_boxes', 5 );
}