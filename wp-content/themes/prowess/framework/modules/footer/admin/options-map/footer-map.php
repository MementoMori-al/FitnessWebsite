<?php

if ( ! function_exists( 'prowess_select_footer_options_map' ) ) {
	function prowess_select_footer_options_map() {

		prowess_select_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'prowess' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = prowess_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'prowess' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		prowess_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'prowess' ),
				'parent'        => $footer_panel
			)
		);

        prowess_select_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'prowess' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'prowess' ),
                'parent'        => $footer_panel,
            )
        );

		prowess_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'prowess' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = prowess_select_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'prowess' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'prowess' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'prowess' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'prowess' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'prowess' ),
					'left'   => esc_html__( 'Left', 'prowess' ),
					'center' => esc_html__( 'Center', 'prowess' ),
					'right'  => esc_html__( 'Right', 'prowess' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		prowess_select_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'prowess' ),
				'description' => esc_html__( 'Set background color for top footer area', 'prowess' ),
				'parent'      => $show_footer_top_container
			)
		);

		prowess_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'prowess' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = prowess_select_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		prowess_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'prowess' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'prowess' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		prowess_select_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'prowess' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'prowess' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'prowess_select_options_map', 'prowess_select_footer_options_map', 11 );
}