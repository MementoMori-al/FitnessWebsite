<?php

foreach ( glob( QODE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'prowess_select_map_blog_meta' ) ) {
	function prowess_select_map_blog_meta() {
		$qode_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$qode_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'prowess' ),
				'name'  => 'blog_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'prowess' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'prowess' ),
				'parent'      => $blog_meta_box,
				'options'     => $qode_blog_categories
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'prowess' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'prowess' ),
				'parent'      => $blog_meta_box,
				'options'     => $qode_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'prowess' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'prowess' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'prowess' ),
					'in-grid'    => esc_html__( 'In Grid', 'prowess' ),
					'full-width' => esc_html__( 'Full Width', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'prowess' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'prowess' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'prowess' ),
					'two'   => esc_html__( '2 Columns', 'prowess' ),
					'three' => esc_html__( '3 Columns', 'prowess' ),
					'four'  => esc_html__( '4 Columns', 'prowess' ),
					'five'  => esc_html__( '5 Columns', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'prowess' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'prowess' ),
				'options'     => prowess_select_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'prowess' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'prowess' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'prowess' ),
					'fixed'    => esc_html__( 'Fixed', 'prowess' ),
					'original' => esc_html__( 'Original', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'prowess' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'prowess' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'prowess' ),
					'standard'        => esc_html__( 'Standard', 'prowess' ),
					'load-more'       => esc_html__( 'Load More', 'prowess' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'prowess' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'qodef_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'prowess' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'prowess' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_blog_meta', 30 );
}