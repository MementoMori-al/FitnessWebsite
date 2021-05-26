<?php

if ( ! function_exists( 'prowess_select_map_footer_meta' ) ) {
	function prowess_select_map_footer_meta() {
		
		$footer_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => apply_filters( 'prowess_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'prowess' ),
				'name'  => 'footer_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'prowess' ),
				'options'       => prowess_select_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = prowess_select_add_admin_container(
			array(
				'name'       => 'qodef_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			prowess_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'prowess' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'prowess' ),
					'options'       => prowess_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			prowess_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'prowess' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'prowess' ),
					'options'       => prowess_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

        prowess_select_create_meta_box_field(
            array(
                'name'          => 'qodef_footer_in_grid_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Footer in Grid', 'prowess' ),
                'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'prowess' ),
                'options'       => prowess_select_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'qodef_show_footer_top_meta' => array('', 'no'),
                        'qodef_show_footer_bottom_meta' => array('', 'no')
                    )
                ),
                'parent'        => $show_footer_meta_container
            )
        );

        prowess_select_create_meta_box_field(
            array(
                'name'          => 'qodef_uncovering_footer_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Uncovering Footer', 'prowess' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'prowess' ),
                'options'       => prowess_select_get_yes_no_select_array(),
                'parent'        => $show_footer_meta_container,
            )
        );
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_footer_meta', 70 );
}