<?php

if ( ! function_exists( 'prowess_select_map_post_video_meta' ) ) {
	function prowess_select_map_post_video_meta() {
		$video_post_format_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'prowess' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'prowess' ),
				'description'   => esc_html__( 'Choose video type', 'prowess' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'prowess' ),
					'self'            => esc_html__( 'Self Hosted', 'prowess' )
				)
			)
		);
		
		$qodef_video_embedded_container = prowess_select_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'qodef_video_embedded_container'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'prowess' ),
				'description' => esc_html__( 'Enter Video URL', 'prowess' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'prowess' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'prowess' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'prowess' ),
				'description' => esc_html__( 'Enter video image', 'prowess' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_post_video_meta', 22 );
}