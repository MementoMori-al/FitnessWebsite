<?php

/*** Post Settings ***/

if ( ! function_exists( 'prowess_select_map_post_meta' ) ) {
	function prowess_select_map_post_meta() {
		
		$post_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'prowess' ),
				'name'  => 'post-meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'prowess' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'prowess' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => prowess_select_get_custom_sidebars_options( true )
			)
		);
		
		$prowess_custom_sidebars = prowess_select_get_custom_sidebars();
		if ( count( $prowess_custom_sidebars ) > 0 ) {
			prowess_select_create_meta_box_field( array(
				'name'        => 'qodef_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'prowess' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'prowess' ),
				'parent'      => $post_meta_box,
				'options'     => prowess_select_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'prowess' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'prowess' ),
				'parent'      => $post_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'prowess' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'prowess' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'prowess' ),
					'large-width'        => esc_html__( 'Large Width', 'prowess' ),
					'large-height'       => esc_html__( 'Large Height', 'prowess' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'prowess' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'prowess' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'prowess' ),
					'large-width' => esc_html__( 'Large Width', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'prowess' ),
				'parent'        => $post_meta_box,
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);

		do_action('prowess_select_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_post_meta', 20 );
}
