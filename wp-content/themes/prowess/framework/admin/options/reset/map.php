<?php

if ( ! function_exists( 'prowess_select_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function prowess_select_reset_options_map() {
		
		prowess_select_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'prowess' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = prowess_select_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'prowess' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'prowess' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'prowess_select_options_map', 'prowess_select_reset_options_map', 100 );
}