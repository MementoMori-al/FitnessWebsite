<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = QODE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'prowess_select_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function prowess_select_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'prowess_select_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'prowess_select_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function prowess_select_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'prowess' ),
				'value'      => array(
					esc_html__( 'Full Width', 'prowess' ) => 'full-width',
					esc_html__( 'In Grid', 'prowess' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Anchor ID', 'prowess' ),
				'description' => esc_html__( 'For example "home"', 'prowess' ),
				'group'       => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Background Color', 'prowess' ),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Background Image', 'prowess' ),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'enable_grid_lines',
				'heading'     => esc_html__( 'Grid Lines Style ', 'prowess' ),
				'value'       => array(
					esc_html__( 'No grid Lines', 'prowess' )        	=> '',
					esc_html__( 'Parallax Grid Line Right', 'prowess' ) => 'grid_line_right',
					esc_html__( 'Parallax Grid Line Dual', 'prowess' ) 	=> 'grid_line_dual',
				),
				'save_always' => true,
				'group'       => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Disable Background Image', 'prowess' ),
				'value'       => array(
					esc_html__( 'Never', 'prowess' )        => '',
					esc_html__( 'Below 1280px', 'prowess' ) => '1280',
					esc_html__( 'Below 1024px', 'prowess' ) => '1024',
					esc_html__( 'Below 768px', 'prowess' )  => '768',
					esc_html__( 'Below 680px', 'prowess' )  => '680',
					esc_html__( 'Below 480px', 'prowess' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'prowess' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Parallax Background Image', 'prowess' ),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Parallax Speed', 'prowess' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'prowess' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Parallax Section Height (px)', 'prowess' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Content Aligment', 'prowess' ),
				'value'      => array(
					esc_html__( 'Default', 'prowess' ) => '',
					esc_html__( 'Left', 'prowess' )    => 'left',
					esc_html__( 'Center', 'prowess' )  => 'center',
					esc_html__( 'Right', 'prowess' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'prowess' ),
				'value'      => array(
					esc_html__( 'Full Width', 'prowess' ) => 'full-width',
					esc_html__( 'In Grid', 'prowess' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Background Color', 'prowess' ),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Background Image', 'prowess' ),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Disable Background Image', 'prowess' ),
				'value'       => array(
					esc_html__( 'Never', 'prowess' )        => '',
					esc_html__( 'Below 1280px', 'prowess' ) => '1280',
					esc_html__( 'Below 1024px', 'prowess' ) => '1024',
					esc_html__( 'Below 768px', 'prowess' )  => '768',
					esc_html__( 'Below 680px', 'prowess' )  => '680',
					esc_html__( 'Below 480px', 'prowess' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'prowess' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'enable_grid_lines',
				'heading'     => esc_html__( 'Grid Lines Style ', 'prowess' ),
				'value'       => array(
					esc_html__( 'No grid Lines', 'prowess' )        	=> '',
					esc_html__( 'Parallax Grid Line Right', 'prowess' ) => 'grid_line_right',
					esc_html__( 'Parallax Grid Line Dual', 'prowess' ) 	=> 'grid_line_dual',
				),
				'save_always' => true,
				'group'       => esc_html__( 'Select Settings', 'prowess' )
			)
		);

		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Content Aligment', 'prowess' ),
				'value'      => array(
					esc_html__( 'Default', 'prowess' ) => '',
					esc_html__( 'Left', 'prowess' )    => 'left',
					esc_html__( 'Center', 'prowess' )  => 'center',
					esc_html__( 'Right', 'prowess' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'prowess' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( prowess_select_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Enable Passepartout', 'prowess' ),
					'value'       => array_flip( prowess_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Select Settings', 'prowess' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Passepartout Size', 'prowess' ),
					'value'       => array(
						esc_html__( 'Tiny', 'prowess' )   => 'tiny',
						esc_html__( 'Small', 'prowess' )  => 'small',
						esc_html__( 'Normal', 'prowess' ) => 'normal',
						esc_html__( 'Large', 'prowess' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'prowess' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Disable Side Passepartout', 'prowess' ),
					'value'       => array_flip( prowess_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'prowess' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Disable Top Passepartout', 'prowess' ),
					'value'       => array_flip( prowess_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'prowess' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'prowess_select_vc_row_map' );
}