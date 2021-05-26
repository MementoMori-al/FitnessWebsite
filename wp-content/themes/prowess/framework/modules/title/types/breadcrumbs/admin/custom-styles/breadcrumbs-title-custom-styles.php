<?php

if ( ! function_exists( 'prowess_select_breadcrumbs_title_area_typography_style' ) ) {
	function prowess_select_breadcrumbs_title_area_typography_style() {
		
		$item_styles = prowess_select_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-breadcrumbs'
		);
		
		echo prowess_select_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = prowess_select_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-breadcrumbs a:hover'
		);
		
		echo prowess_select_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_breadcrumbs_title_area_typography_style' );
}