<?php

if ( ! function_exists( 'prowess_select_logo_options_map' ) ) {
	function prowess_select_logo_options_map() {
		
		prowess_select_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'prowess' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = prowess_select_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'prowess' )
			)
		);
		
		$hide_logo_container = prowess_select_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'prowess' ),
				'parent'        => $hide_logo_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'prowess' ),
				'parent'        => $hide_logo_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'prowess' ),
				'parent'        => $hide_logo_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'prowess' ),
				'parent'        => $hide_logo_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'prowess' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'prowess_select_options_map', 'prowess_select_logo_options_map', 2 );
}