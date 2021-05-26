<?php

if ( prowess_select_visual_composer_installed() ) {
	if ( ! function_exists( 'prowess_select_ttsingle_hours_vc_map' ) ) {
		function prowess_select_ttsingle_hours_vc_map() {
			vc_map(
				array(
					'name'                      => esc_html__( 'Timetable Event Hours', 'prowess' ),
					'base'                      => 'tt_event_hours',
					'category'                  => esc_html__( 'By Select', 'prowess' ),
					'icon'                      => 'icon-a-wpb-timetable-events-hours extended-custom-icon',
					'allowed_container_element' => 'vc_row'
				)
			);
		}
		
		add_action( 'vc_before_init', 'prowess_select_ttsingle_hours_vc_map' );
	}
	
	if ( ! function_exists( 'prowess_select_ttsingle_info_holder' ) ) {
		function prowess_select_ttsingle_info_holder() {
			vc_map(
				array(
					"name"            => esc_html__( 'Timetable Event Info Holder', 'prowess' ),
					'base'            => 'tt_items_list',
					'category'        => esc_html__( 'By Select', 'prowess' ),
					'as_parent'       => array( 'only' => 'tt_item' ),
					'icon'            => 'icon-wpb-a-timetable-event-info-holder extended-custom-icon',
					'content_element' => true,
					'js_view'         => 'VcColumnView'
				)
			);
		}
		
		add_action( 'vc_before_init', 'prowess_select_ttsingle_info_holder', 10 );
	}
	
	if ( ! function_exists( 'prowess_select_ttsingle_info_table_item' ) ) {
		function prowess_select_ttsingle_info_table_item() {
			vc_map(
				array(
					'name'      => esc_html__( 'Timetable Event Info Table Item', 'prowess' ),
					'base'      => 'tt_item',
					'as_child'  => array( 'only' => 'tt_items_list' ),
					'as_parent' => array( 'except' => 'vc_row, vc_accordion' ),
					'icon'      => 'icon-wpb-a-timetable-event-info-table-item extended-custom-icon',
					'category'  => esc_html__( 'By Select', 'prowess' ),
					'params'    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Label', 'prowess' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'value',
							'heading'    => esc_html__( 'Value', 'prowess' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'prowess' ),
							'value'       => array(
								esc_html__( 'Table', 'prowess' ) => 'info'
							),
							'save_always' => true
						)
					)
				)
			);
		}
		
		add_action( 'vc_before_init', 'prowess_select_ttsingle_info_table_item', 11 );
	}
	
	class WPBakeryShortCode_Tt_Items_List extends WPBakeryShortCodesContainer {}
}