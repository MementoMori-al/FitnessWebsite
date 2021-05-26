<?php

if ( ! function_exists( 'prowess_select_map_general_meta' ) ) {
	function prowess_select_map_general_meta() {
		
		$general_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => apply_filters( 'prowess_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'prowess' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'prowess' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'prowess' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'prowess' ),
				'parent'        => $general_meta_box
			)
		);
		
		$qodef_content_padding_group = prowess_select_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'prowess' ),
				'description' => esc_html__( 'Define styles for Content area', 'prowess' ),
				'parent'      => $general_meta_box
			)
		);
		
			$qodef_content_padding_row = prowess_select_add_admin_row(
				array(
					'name'   => 'qodef_content_padding_row',
					'next'   => true,
					'parent' => $qodef_content_padding_group
				)
			);
		
				prowess_select_create_meta_box_field(
					array(
						'name'   => 'qodef_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'prowess' ),
						'parent' => $qodef_content_padding_row,
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'    => 'qodef_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'prowess' ),
						'parent'  => $qodef_content_padding_row,
					)
				);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'prowess' ),
				'description' => esc_html__( 'Choose background color for page content', 'prowess' ),
				'parent'      => $general_meta_box
			)
		);

		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern Image', 'prowess' ),
				'description' => esc_html__( 'Choose an pattern image to be displayed in background', 'prowess' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'    => 'qodef_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'prowess' ),
				'parent'  => $general_meta_box,
				'options' => prowess_select_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = prowess_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'prowess' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'prowess' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'prowess' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'prowess' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'prowess' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'prowess' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'          => 'qodef_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'prowess' ),
						'description'   => esc_html__( 'Choose background image attachment', 'prowess' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'prowess' ),
							'fixed'  => esc_html__( 'Fixed', 'prowess' ),
							'scroll' => esc_html__( 'Scroll', 'prowess' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'prowess' ),
				'parent'        => $general_meta_box,
				'options'       => prowess_select_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = prowess_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'qodef_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'prowess' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'prowess' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'prowess' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'prowess' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'prowess' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'prowess' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				prowess_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'prowess' ),
						'options'       => prowess_select_get_yes_no_select_array(),
					)
				);
		
				prowess_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'prowess' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'prowess' ),
						'options'       => prowess_select_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'prowess' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'prowess' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'prowess' ),
					'qodef-grid-1100' => esc_html__( '1100px', 'prowess' ),
					'qodef-grid-1300' => esc_html__( '1300px', 'prowess' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'prowess' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'prowess' ),
					'qodef-grid-800'  => esc_html__( '800px', 'prowess' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'prowess' ),
				'parent'        => $general_meta_box,
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = prowess_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				prowess_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'prowess' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'prowess' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => prowess_select_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = prowess_select_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'qodef_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					prowess_select_create_meta_box_field(
						array(
							'name'   => 'qodef_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'prowess' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = prowess_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'prowess' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'prowess' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = prowess_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					prowess_select_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'qodef_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'prowess' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'prowess' ),
								'prowess_loader'		=> esc_html__( 'Prowess Loader', 'prowess' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'prowess' ),
								'pulse'                 => esc_html__( 'Pulse', 'prowess' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'prowess' ),
								'cube'                  => esc_html__( 'Cube', 'prowess' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'prowess' ),
								'stripes'               => esc_html__( 'Stripes', 'prowess' ),
								'wave'                  => esc_html__( 'Wave', 'prowess' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'prowess' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'prowess' ),
								'atom'                  => esc_html__( 'Atom', 'prowess' ),
								'clock'                 => esc_html__( 'Clock', 'prowess' ),
								'mitosis'               => esc_html__( 'Mitosis', 'prowess' ),
								'lines'                 => esc_html__( 'Lines', 'prowess' ),
								'fussion'               => esc_html__( 'Fussion', 'prowess' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'prowess' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'prowess' )
							)
						)
					);
					
					prowess_select_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'qodef_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'prowess' ),
							'parent' => $row_pt_spinner_animation_meta,
							'dependency' => array(
			                    'hide' => array(
			                        'smooth_pt_spinner_type' => 'prowess_loader'
			                    )
			                )
						)
					);

					prowess_select_create_meta_box_field(
						array(
							'type'        	=> 'textarea',
							'name'          => 'qodef_smooth_pt_spinner_text_meta',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Text', 'prowess' ),
							'parent'        => $page_transition_preloader_container_meta,
							'dependency' => array(
			                    'show' => array(
			                        'smooth_pt_spinner_type' => 'prowess_loader'
			                    )
			                )
						)
					);
					
					prowess_select_create_meta_box_field(
						array(
							'name'        => 'qodef_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'prowess' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'prowess' ),
							'options'     => prowess_select_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'prowess' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'prowess' ),
				'parent'      => $general_meta_box,
				'options'     => prowess_select_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_general_meta', 10 );
}