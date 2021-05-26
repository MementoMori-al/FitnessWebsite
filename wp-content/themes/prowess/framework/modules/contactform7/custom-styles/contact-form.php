<?php

if ( ! function_exists( 'prowess_select_contact_form7_text_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function prowess_select_contact_form7_text_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = prowess_select_get_typography_styles( 'cf7_style_1_text' );
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_border_color' );
		$border_opacity = 1;
		if ( $border_color !== '' ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = prowess_select_options()->getOptionValue( 'cf7_style_1_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = prowess_select_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = prowess_select_options()->getOptionValue( 'cf7_style_1_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = prowess_select_filter_px( $border_radius ) . 'px';
		}
		
		$padding_top = prowess_select_options()->getOptionValue( 'cf7_style_1_padding_top' );
		if ( $padding_top !== '' ) {
			$styles['padding-top'] = prowess_select_filter_px( $padding_top ) . 'px';
		}
		
		$padding_right = prowess_select_options()->getOptionValue( 'cf7_style_1_padding_right' );
		if ( $padding_right !== '' ) {
			$styles['padding-right'] = prowess_select_filter_px( $padding_right ) . 'px';
		}
		
		$padding_bottom = prowess_select_options()->getOptionValue( 'cf7_style_1_padding_bottom' );
		if ( $padding_bottom !== '' ) {
			$styles['padding-bottom'] = prowess_select_filter_px( $padding_bottom ) . 'px';
		}
		
		$padding_left = prowess_select_options()->getOptionValue( 'cf7_style_1_padding_left' );
		if ( $padding_left !== '' ) {
			$styles['padding-left'] = prowess_select_filter_px( $padding_left ) . 'px';
		}
		
		$margin_top = prowess_select_options()->getOptionValue( 'cf7_style_1_margin_top' );
		if ( $margin_top !== '' ) {
			$styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		
		$margin_bottom = prowess_select_options()->getOptionValue( 'cf7_style_1_margin_bottom' );
		if ( $margin_bottom !== '' ) {
			$styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$textarea_height = prowess_select_options()->getOptionValue( 'cf7_style_1_textarea_height' );
		if ( ! empty( $textarea_height ) ) {
			echo prowess_select_dynamic_css( '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
				array( 'height' => prowess_select_filter_px( $textarea_height ) . 'px' )
			);
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_text_styles_1' );
}

if ( ! function_exists( 'prowess_select_contact_form7_focus_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function prowess_select_contact_form7_focus_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles   = array();
		
		$color = prowess_select_options()->getOptionValue( 'cf7_style_1_focus_text_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_focus_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_focus_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_focus_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_focus_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_focus_styles_1' );
}

if ( ! function_exists( 'prowess_select_contact_form7_label_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function prowess_select_contact_form7_label_styles_1() {
		$item_styles = prowess_select_get_typography_styles( 'cf7_style_1_label' );
		
		$item_selector = array(
			'.cf7_custom_style_1 p'
		);
		
		echo prowess_select_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_label_styles_1' );
}

if ( ! function_exists( 'prowess_select_contact_form7_button_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function prowess_select_contact_form7_button_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = prowess_select_get_typography_styles( 'cf7_style_1_button' );
		
		$height = prowess_select_options()->getOptionValue( 'cf7_style_1_button_height' );
		if ( $height !== '' ) {
			$styles['padding-top']    = '0';
			$styles['padding-bottom'] = '0';
			$styles['height']         = prowess_select_filter_px( $height ) . 'px';
			$styles['line-height']    = prowess_select_filter_px( $height ) . 'px';
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_button_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_button_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_button_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = prowess_select_options()->getOptionValue( 'cf7_style_1_button_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = prowess_select_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = prowess_select_options()->getOptionValue( 'cf7_style_1_button_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = prowess_select_filter_px( $border_radius ) . 'px';
		}
		
		$padding_left_right = prowess_select_options()->getOptionValue( 'cf7_style_1_button_padding' );
		if ( $padding_left_right !== '' ) {
			$styles['padding-left']  = prowess_select_filter_px( $padding_left_right ) . 'px';
			$styles['padding-right'] = prowess_select_filter_px( $padding_left_right ) . 'px';
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_button_styles_1' );
}

if ( ! function_exists( 'prowess_select_contact_form7_button_hover_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function prowess_select_contact_form7_button_hover_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles   = array();
		
		$color = prowess_select_options()->getOptionValue( 'cf7_style_1_button_hover_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_button_hover_bckg_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_button_hover_bckg_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_1_button_hover_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_1_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_button_hover_styles_1' );
}

if ( ! function_exists( 'prowess_select_contact_form7_text_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function prowess_select_contact_form7_text_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = prowess_select_get_typography_styles( 'cf7_style_2_text' );
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_border_color' );
		$border_opacity = 1;
		if ( $border_color !== '' ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = prowess_select_options()->getOptionValue( 'cf7_style_2_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = prowess_select_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = prowess_select_options()->getOptionValue( 'cf7_style_2_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = prowess_select_filter_px( $border_radius ) . 'px';
		}
		
		$padding_top = prowess_select_options()->getOptionValue( 'cf7_style_2_padding_top' );
		if ( $padding_top !== '' ) {
			$styles['padding-top'] = prowess_select_filter_px( $padding_top ) . 'px';
		}
		
		$padding_right = prowess_select_options()->getOptionValue( 'cf7_style_2_padding_right' );
		if ( $padding_right !== '' ) {
			$styles['padding-right'] = prowess_select_filter_px( $padding_right ) . 'px';
		}
		
		$padding_bottom = prowess_select_options()->getOptionValue( 'cf7_style_2_padding_bottom' );
		if ( $padding_bottom !== '' ) {
			$styles['padding-bottom'] = prowess_select_filter_px( $padding_bottom ) . 'px';
		}
		
		$padding_left = prowess_select_options()->getOptionValue( 'cf7_style_2_padding_left' );
		if ( $padding_left !== '' ) {
			$styles['padding-left'] = prowess_select_filter_px( $padding_left ) . 'px';
		}
		
		$margin_top = prowess_select_options()->getOptionValue( 'cf7_style_2_margin_top' );
		if ( $margin_top !== '' ) {
			$styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		
		$margin_bottom = prowess_select_options()->getOptionValue( 'cf7_style_2_margin_bottom' );
		if ( $margin_bottom !== '' ) {
			$styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$textarea_height = prowess_select_options()->getOptionValue( 'cf7_style_2_textarea_height' );
		if ( ! empty( $textarea_height ) ) {
			echo prowess_select_dynamic_css( '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
				array( 'height' => prowess_select_filter_px( $textarea_height ) . 'px' )
			);
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_text_styles_2' );
}

if ( ! function_exists( 'prowess_select_contact_form7_focus_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function prowess_select_contact_form7_focus_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles   = array();
		
		$color = prowess_select_options()->getOptionValue( 'cf7_style_2_focus_text_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_focus_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_focus_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_focus_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_focus_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_focus_styles_2' );
}

if ( ! function_exists( 'prowess_select_contact_form7_label_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function prowess_select_contact_form7_label_styles_2() {
		$item_styles = prowess_select_get_typography_styles( 'cf7_style_2_label' );
		
		$item_selector = array(
			'.cf7_custom_style_2 p'
		);
		
		echo prowess_select_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_label_styles_2' );
}

if ( ! function_exists( 'prowess_select_contact_form7_button_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function prowess_select_contact_form7_button_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = prowess_select_get_typography_styles( 'cf7_style_2_button' );
		
		$height = prowess_select_options()->getOptionValue( 'cf7_style_2_button_height' );
		if ( $height !== '' ) {
			$styles['padding-top']    = '0';
			$styles['padding-bottom'] = '0';
			$styles['height']         = prowess_select_filter_px( $height ) . 'px';
			$styles['line-height']    = prowess_select_filter_px( $height ) . 'px';
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_button_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_button_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_button_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = prowess_select_options()->getOptionValue( 'cf7_style_2_button_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = prowess_select_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = prowess_select_options()->getOptionValue( 'cf7_style_2_button_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = prowess_select_filter_px( $border_radius ) . 'px';
		}
		
		$padding_left_right = prowess_select_options()->getOptionValue( 'cf7_style_2_button_padding' );
		if ( $padding_left_right !== '' ) {
			$styles['padding-left']  = prowess_select_filter_px( $padding_left_right ) . 'px';
			$styles['padding-right'] = prowess_select_filter_px( $padding_left_right ) . 'px';
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_button_styles_2' );
}

if ( ! function_exists( 'prowess_select_contact_form7_button_hover_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function prowess_select_contact_form7_button_hover_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles   = array();
		
		$color = prowess_select_options()->getOptionValue( 'cf7_style_2_button_hover_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_button_hover_bckg_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_button_hover_bckg_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_2_button_hover_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_2_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_button_hover_styles_2' );
}

if ( ! function_exists( 'prowess_select_contact_form7_text_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function prowess_select_contact_form7_text_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = prowess_select_get_typography_styles( 'cf7_style_3_text' );
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_border_color' );
		$border_opacity = 1;
		if ( $border_color !== '' ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = prowess_select_options()->getOptionValue( 'cf7_style_3_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = prowess_select_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = prowess_select_options()->getOptionValue( 'cf7_style_3_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = prowess_select_filter_px( $border_radius ) . 'px';
		}
		
		$padding_top = prowess_select_options()->getOptionValue( 'cf7_style_3_padding_top' );
		if ( $padding_top !== '' ) {
			$styles['padding-top'] = prowess_select_filter_px( $padding_top ) . 'px';
		}
		
		$padding_right = prowess_select_options()->getOptionValue( 'cf7_style_3_padding_right' );
		if ( $padding_right !== '' ) {
			$styles['padding-right'] = prowess_select_filter_px( $padding_right ) . 'px';
		}
		
		$padding_bottom = prowess_select_options()->getOptionValue( 'cf7_style_3_padding_bottom' );
		if ( $padding_bottom !== '' ) {
			$styles['padding-bottom'] = prowess_select_filter_px( $padding_bottom ) . 'px';
		}
		
		$padding_left = prowess_select_options()->getOptionValue( 'cf7_style_3_padding_left' );
		if ( $padding_left !== '' ) {
			$styles['padding-left'] = prowess_select_filter_px( $padding_left ) . 'px';
		}
		
		$margin_top = prowess_select_options()->getOptionValue( 'cf7_style_3_margin_top' );
		if ( $margin_top !== '' ) {
			$styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		
		$margin_bottom = prowess_select_options()->getOptionValue( 'cf7_style_3_margin_bottom' );
		if ( $margin_bottom !== '' ) {
			$styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$textarea_height = prowess_select_options()->getOptionValue( 'cf7_style_3_textarea_height' );
		if ( ! empty( $textarea_height ) ) {
			echo prowess_select_dynamic_css( '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
				array( 'height' => prowess_select_filter_px( $textarea_height ) . 'px' )
			);
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_text_styles_3' );
}

if ( ! function_exists( 'prowess_select_contact_form7_focus_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function prowess_select_contact_form7_focus_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles   = array();
		
		$color = prowess_select_options()->getOptionValue( 'cf7_style_3_focus_text_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_focus_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_focus_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_focus_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_focus_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_focus_styles_3' );
}

if ( ! function_exists( 'prowess_select_contact_form7_label_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function prowess_select_contact_form7_label_styles_3() {
		$item_styles = prowess_select_get_typography_styles( 'cf7_style_3_label' );
		
		$item_selector = array(
			'.cf7_custom_style_3 p'
		);
		
		echo prowess_select_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_label_styles_3' );
}

if ( ! function_exists( 'prowess_select_contact_form7_button_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function prowess_select_contact_form7_button_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = prowess_select_get_typography_styles( 'cf7_style_3_button' );
		
		$height = prowess_select_options()->getOptionValue( 'cf7_style_3_button_height' );
		if ( $height !== '' ) {
			$styles['padding-top']    = '0';
			$styles['padding-bottom'] = '0';
			$styles['height']         = prowess_select_filter_px( $height ) . 'px';
			$styles['line-height']    = prowess_select_filter_px( $height ) . 'px';
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_button_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_button_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_button_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = prowess_select_options()->getOptionValue( 'cf7_style_3_button_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = prowess_select_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = prowess_select_options()->getOptionValue( 'cf7_style_3_button_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = prowess_select_filter_px( $border_radius ) . 'px';
		}
		
		$padding_left_right = prowess_select_options()->getOptionValue( 'cf7_style_3_button_padding' );
		if ( $padding_left_right !== '' ) {
			$styles['padding-left']  = prowess_select_filter_px( $padding_left_right ) . 'px';
			$styles['padding-right'] = prowess_select_filter_px( $padding_left_right ) . 'px';
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_button_styles_3' );
}

if ( ! function_exists( 'prowess_select_contact_form7_button_hover_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function prowess_select_contact_form7_button_hover_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles   = array();
		
		$color = prowess_select_options()->getOptionValue( 'cf7_style_3_button_hover_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_button_hover_bckg_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_button_hover_bckg_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = prowess_select_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = prowess_select_options()->getOptionValue( 'cf7_style_3_button_hover_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = prowess_select_options()->getOptionValue( 'cf7_style_3_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = prowess_select_rgba_color( $border_color, $border_opacity );
		}
		
		echo prowess_select_dynamic_css( $selector, $styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_contact_form7_button_hover_styles_3' );
}