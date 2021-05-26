<?php

if ( ! function_exists('prowess_select_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function prowess_select_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'prowess'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'prowess') => 'default',
				esc_html__('Custom Style 1', 'prowess') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'prowess') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'prowess') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Prowess Options > Contact Form 7', 'prowess')
		));
	}
	
	add_action('vc_after_init', 'prowess_select_contact_form_map');
}