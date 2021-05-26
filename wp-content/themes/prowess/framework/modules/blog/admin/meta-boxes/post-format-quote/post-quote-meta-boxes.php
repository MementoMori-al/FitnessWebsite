<?php

if ( ! function_exists( 'prowess_select_map_post_quote_meta' ) ) {
	function prowess_select_map_post_quote_meta() {
		$quote_post_format_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'prowess' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'prowess' ),
				'description' => esc_html__( 'Enter Quote text', 'prowess' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'prowess' ),
				'description' => esc_html__( 'Enter Quote author', 'prowess' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_post_quote_meta', 25 );
}