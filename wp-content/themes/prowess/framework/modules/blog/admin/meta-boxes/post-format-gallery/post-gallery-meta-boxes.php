<?php

if ( ! function_exists( 'prowess_select_map_post_gallery_meta' ) ) {
	
	function prowess_select_map_post_gallery_meta() {
		$gallery_post_format_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'prowess' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		prowess_select_add_multiple_images_field(
			array(
				'name'        => 'qodef_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'prowess' ),
				'description' => esc_html__( 'Choose your gallery images', 'prowess' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_post_gallery_meta', 21 );
}
