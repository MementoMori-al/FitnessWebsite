<?php
include_once get_template_directory() . '/theme-includes.php';

if ( !function_exists('prowess_select_styles') ) {
	/**
	 * Function that includes theme's core styles
	 */
	function prowess_select_styles() {
		
		$modules_css_deps_array = apply_filters('prowess_select_modules_css_deps', array());
		
		//include theme's core styles
		wp_enqueue_style('prowess-select-default-style', QODE_ROOT . '/style.css');
		wp_enqueue_style('prowess-select-modules', QODE_ASSETS_ROOT . '/css/modules.min.css', $modules_css_deps_array);
		
		prowess_select_icon_collections()->enqueueStyles();
		
		wp_enqueue_style('wp-mediaelement');
		
		do_action('prowess_select_enqueue_third_party_styles');
		
		//is woocommerce installed?
		if ( prowess_select_is_woocommerce_installed() && prowess_select_load_woo_assets() ) {
			//include theme's woocommerce styles
			wp_enqueue_style('prowess-select-woo', QODE_ASSETS_ROOT . '/css/woocommerce.min.css');
		}
		
		if ( prowess_select_dashboard_page() ) {
			wp_enqueue_style('prowess-select-dashboard', QODE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/qodef-dashboard.css');
		}
		
		//define files after which style dynamic needs to be included. It should be included last so it can override other files
		$style_dynamic_deps_array = apply_filters('prowess_select_style_dynamic_deps', array());
		
		if ( file_exists(QODE_ROOT_DIR . '/assets/css/style_dynamic.css') && prowess_select_is_css_folder_writable() && !is_multisite() ) {
			wp_enqueue_style('prowess-select-style-dynamic', QODE_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(QODE_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
		} else if ( file_exists(QODE_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . prowess_select_get_multisite_blog_id() . '.css') && prowess_select_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style('prowess-select-style-dynamic', QODE_ASSETS_ROOT . '/css/style_dynamic_ms_id_' . prowess_select_get_multisite_blog_id() . '.css', $style_dynamic_deps_array, filemtime(QODE_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . prowess_select_get_multisite_blog_id() . '.css')); //it must be included after woocommerce styles so it can override it
		}
		
		//is responsive option turned on?
		if ( prowess_select_is_responsive_on() ) {
			wp_enqueue_style('prowess-select-modules-responsive', QODE_ASSETS_ROOT . '/css/modules-responsive.min.css');
			
			//is woocommerce installed?
			if ( prowess_select_is_woocommerce_installed() && prowess_select_load_woo_assets() ) {
				//include theme's woocommerce responsive styles
				wp_enqueue_style('prowess-select-woo-responsive', QODE_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
			}
			
			//include proper styles
			if ( file_exists(QODE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && prowess_select_is_css_folder_writable() && !is_multisite() ) {
				wp_enqueue_style('prowess-select-style-dynamic-responsive', QODE_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(QODE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
			} else if ( file_exists(QODE_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . prowess_select_get_multisite_blog_id() . '.css') && prowess_select_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style('prowess-select-style-dynamic-responsive', QODE_ASSETS_ROOT . '/css/style_dynamic_responsive_ms_id_' . prowess_select_get_multisite_blog_id() . '.css', array(), filemtime(QODE_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . prowess_select_get_multisite_blog_id() . '.css'));
			}
		}
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_styles');
}

if ( !function_exists('prowess_select_google_fonts_styles') ) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function prowess_select_google_fonts_styles() {
		$font_simple_field_array = prowess_select_options()->getOptionsByType('fontsimple');
		if ( !(is_array($font_simple_field_array) && count($font_simple_field_array) > 0) ) {
			$font_simple_field_array = array();
		}
		
		$font_field_array = prowess_select_options()->getOptionsByType('font');
		if ( !(is_array($font_field_array) && count($font_field_array) > 0) ) {
			$font_field_array = array();
		}
		
		$available_font_options = array_merge($font_simple_field_array, $font_field_array);
		
		$google_font_weight_array = prowess_select_options()->getOptionValue('google_font_weight');
		if ( !empty($google_font_weight_array) ) {
			$google_font_weight_array = array_slice(prowess_select_options()->getOptionValue('google_font_weight'), 1);
		}
		
		$font_weight_str = '300,400,500,600,700';
		if ( !empty($google_font_weight_array) && $google_font_weight_array !== '' ) {
			$font_weight_str = implode(',', $google_font_weight_array);
		}
		
		$google_font_subset_array = prowess_select_options()->getOptionValue('google_font_subset');
		if ( !empty($google_font_subset_array) ) {
			$google_font_subset_array = array_slice(prowess_select_options()->getOptionValue('google_font_subset'), 1);
		}
		
		$font_subset_str = 'latin-ext';
		if ( !empty($google_font_subset_array) && $google_font_subset_array !== '' ) {
			$font_subset_str = implode(',', $google_font_subset_array);
		}
		
		//default fonts
		$default_font_family = array(
			'Ubuntu',
			'Teko'
		);
		
		$modified_default_font_family = array();
		foreach ( $default_font_family as $default_font ) {
			$modified_default_font_family[] = $default_font . ':' . $font_weight_str;
		}
		
		$default_font_string = implode('|', $modified_default_font_family);
		
		//define available font options array
		$fonts_array = array();
		foreach ( $available_font_options as $font_option ) {
			//is font set and not set to default and not empty?
			$font_option_value = prowess_select_options()->getOptionValue($font_option);
			
			if ( prowess_select_is_font_option_valid($font_option_value) && !prowess_select_is_native_font($font_option_value) ) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				
				if ( !in_array(str_replace('+', ' ', $font_option_value), $default_font_family) && !in_array($font_option_string, $fonts_array) ) {
					$fonts_array[] = $font_option_string;
				}
			}
		}
		
		$fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
		$google_fonts_string = implode('|', $fonts_array);
		
		$protocol = is_ssl() ? 'https:' : 'http:';
		
		//is google font option checked anywhere in theme?
		if ( count($fonts_array) > 0 ) {
			
			//include all checked fonts
			$fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
			$fonts_full_list_args = array(
				'family' => urlencode($fonts_full_list),
				'subset' => urlencode($font_subset_str),
			);
			
			$prowess_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('prowess-select-google-fonts', esc_url_raw($prowess_fonts), array(), '1.0.0');
			
		} else {
			//include default google font that theme is using
			$default_fonts_args = array(
				'family' => urlencode($default_font_string),
				'subset' => urlencode($font_subset_str),
			);
			$prowess_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('prowess-select-google-fonts', esc_url_raw($prowess_fonts), array(), '1.0.0');
		}
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_google_fonts_styles');
}

if ( !function_exists('prowess_select_scripts') ) {
	/**
	 * Function that includes all necessary scripts
	 */
	function prowess_select_scripts() {
		global $wp_scripts;
		
		//init theme core scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('wp-mediaelement');
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script('appear', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array('jquery'), false, true);
		wp_enqueue_script('modernizr', QODE_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array('jquery'), false, true);
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script('jquery-plugin', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array('jquery'), false, true);
		wp_enqueue_script('owl-carousel', QODE_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array('jquery'), false, true);
		wp_enqueue_script('waypoints', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array('jquery'), false, true);
		wp_enqueue_script('fluidvids', QODE_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array('jquery'), false, true);
		wp_enqueue_script('prettyphoto', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array('jquery'), false, true);
		wp_enqueue_script('perfect-scrollbar', QODE_ASSETS_ROOT . '/js/modules/plugins/perfect-scrollbar.jquery.min.js', array('jquery'), false, true);
		wp_enqueue_script('ScrollToPlugin', QODE_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array('jquery'), false, true);
		wp_enqueue_script('parallax', QODE_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array('jquery'), false, true);
		wp_enqueue_script('parallaxScroll', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.parallax-scroll.js', array('jquery'), false, true);
		wp_enqueue_script('waitforimages', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-easing-1.3', QODE_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array('jquery'), false, true);
		wp_enqueue_script('isotope', QODE_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array('jquery'), false, true);
		wp_enqueue_script('packery', QODE_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array('jquery'), false, true);
		
		do_action('prowess_select_enqueue_third_party_scripts');
		
		if ( prowess_select_is_woocommerce_installed() ) {
			wp_enqueue_script('select2');
		}
		
		if ( prowess_select_is_page_smooth_scroll_enabled() ) {
			wp_enqueue_script('tweenLite', QODE_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array('jquery'), false, true);
			wp_enqueue_script('smoothPageScroll', QODE_ASSETS_ROOT . '/js/modules/plugins/smoothPageScroll.js', array('jquery'), false, true);
		}
		
		//include google map api script
		$google_maps_api_key = prowess_select_options()->getOptionValue('google_maps_api_key');
		$google_maps_extensions = '';
		$google_maps_extensions_array = apply_filters('prowess_select_google_maps_extensions_array', array());
		
		if ( !empty($google_maps_extensions_array) ) {
			$google_maps_extensions .= '&libraries=';
			$google_maps_extensions .= implode(',', $google_maps_extensions_array);
		}
		
		if ( !empty($google_maps_api_key) ) {
			wp_enqueue_script('prowess-select-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr($google_maps_api_key) . $google_maps_extensions, array(), false, true);
		}
		
		wp_enqueue_script('prowess-select-modules', QODE_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);
		
		if ( prowess_select_dashboard_page() ) {
			
			$dash_array_deps = array(
				'jquery-ui-datepicker',
				'jquery-ui-sortable'
			);
			
			wp_enqueue_script('prowess-select-dashboard', QODE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/js/qodef-dashboard.js', $dash_array_deps, false, true);
			
			wp_enqueue_script('wp-util');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script(
				'iris',
				admin_url('js/iris.min.js'),
				array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'),
				false,
				1
			);
			wp_enqueue_script(
				'wp-color-picker',
				admin_url('js/color-picker.min.js'),
				array('iris'),
				false,
				1
			);
			$colorpicker_l10n = array(
				'clear'         => esc_html__('Clear', 'prowess'),
				'defaultString' => esc_html__('Default', 'prowess'),
				'pick'          => esc_html__('Select Color', 'prowess'),
				'current'       => esc_html__('Current Color', 'prowess'),
			);
			wp_localize_script('wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n);
		}
		
		//include comment reply script
		$wp_scripts->add_data('comment-reply', 'group', 1);
		if ( is_singular() && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script('comment-reply');
		}
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_scripts');
}

if ( !function_exists('prowess_select_theme_setup') ) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function prowess_select_theme_setup() {
		//add support for feed links
		add_theme_support('automatic-feed-links');
		
		//add support for post formats
		add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
		
		//add theme support for post thumbnails
		add_theme_support('post-thumbnails');
		
		//add theme support for title tag
		add_theme_support('title-tag');
		
		//add theme support for editor style
		add_editor_style('framework/admin/assets/css/editor-style.css');
		
		//defined content width variable
		$GLOBALS['content_width'] = apply_filters('prowess_select_set_content_width', 1100);
		
		//define thumbnail sizes
		add_image_size('prowess_select_square', 550, 550, true);
		add_image_size('prowess_select_landscape', 1100, 550, true);
		add_image_size('prowess_select_portrait', 550, 1100, true);
		add_image_size('prowess_select_huge', 1100, 1100, true);
		
		load_theme_textdomain('prowess', get_template_directory() . '/languages');
	}
	
	add_action('after_setup_theme', 'prowess_select_theme_setup');
}

if ( ! function_exists( 'prowess_select_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function prowess_select_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'prowess-select-style-modules-admin-styles', QODE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/qodef-modules-admin.css' );
		wp_enqueue_style( 'prowess-select-style-handle-editor-customizer-styles', QODE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}
	
	// add google font
	add_action( 'enqueue_block_editor_assets', 'prowess_select_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'prowess_select_enqueue_editor_customizer_styles' );
}

if ( !function_exists('prowess_select_is_responsive_on') ) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function prowess_select_is_responsive_on() {
		return prowess_select_options()->getOptionValue('responsiveness') !== 'no';
	}
}

if ( !function_exists('prowess_select_rgba_color') ) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function prowess_select_rgba_color($color, $transparency) {
		if ( $color !== '' && $transparency !== '' ) {
			$rgba_color = '';
			
			$rgb_color_array = prowess_select_hex2rgb($color);
			$rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';
			
			return $rgba_color;
		}
	}
}

if ( !function_exists('prowess_select_header_meta') ) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function prowess_select_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if ( is_singular() && pings_open(get_queried_object()) ) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>
	
	<?php }
	
	add_action('prowess_select_header_meta', 'prowess_select_header_meta');
}

if ( !function_exists('prowess_select_user_scalable_meta') ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to prowess_select_header_meta action
	 */
	function prowess_select_user_scalable_meta() {
		//is responsiveness option is chosen?
		if ( prowess_select_is_responsive_on() ) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
		<?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}
	
	add_action('prowess_select_header_meta', 'prowess_select_user_scalable_meta');
}

if ( !function_exists('prowess_select_smooth_page_transitions') ) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to prowess_select_after_body_tag action
	 */
	function prowess_select_smooth_page_transitions() {
		$id = prowess_select_get_page_id();
		
		if ( prowess_select_get_meta_field_intersect('smooth_page_transitions', $id) === 'yes' && prowess_select_get_meta_field_intersect('page_transition_preloader', $id) === 'yes' ) { ?>
            <div class="qodef-smooth-transition-loader qodef-mimic-ajax">
                <div class="qodef-st-loader">
                    <div class="qodef-st-loader1">
						<?php prowess_select_loading_spinners(); ?>
                    </div>
                </div>
            </div>
		<?php }
	}
	
	add_action('prowess_select_after_body_tag', 'prowess_select_smooth_page_transitions', 10);
}

if ( !function_exists('prowess_select_back_to_top_button') ) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to prowess_select_after_wrapper_inner action
	 */
	function prowess_select_back_to_top_button() {
		if ( prowess_select_options()->getOptionValue('show_back_button') == 'yes' ) { ?>
            <a id='qodef-back-to-top' href='#'>
                <span class="qodef-icon-stack">
                    <?php prowess_select_icon_collections()->getBackToTopIcon('ion_icons'); ?>
                </span>
                <span class="qodef-icon-stack">
                    <?php prowess_select_icon_collections()->getBackToTopIcon('ion_icons'); ?>
                </span>
            </a>
		<?php }
	}
	
	add_action('prowess_select_after_wrapper_inner', 'prowess_select_back_to_top_button', 30);
}

if ( !function_exists('prowess_select_get_page_id') ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see prowess_select_is_woocommerce_installed()
	 * @see prowess_select_is_woocommerce_shop()
	 */
	function prowess_select_get_page_id() {
		if ( prowess_select_is_woocommerce_installed() && prowess_select_is_woocommerce_shop() ) {
			return prowess_select_get_woo_shop_page_id();
		}
		
		if ( prowess_select_is_default_wp_template() ) {
			return -1;
		}
		
		return get_queried_object_id();
	}
}

if ( !function_exists('prowess_select_get_multisite_blog_id') ) {
	/**
	 * Check is multisite and return blog id
	 *
	 * @return int
	 */
	function prowess_select_get_multisite_blog_id() {
		if ( is_multisite() ) {
			return get_blog_details()->blog_id;
		}
	}
}

if ( !function_exists('prowess_select_is_default_wp_template') ) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function prowess_select_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
	}
}

if ( !function_exists('prowess_select_has_shortcode') ) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function prowess_select_has_shortcode($shortcode, $content = '') {
		$has_shortcode = false;
		
		if ( $shortcode ) {
			//if content variable isn't past
			if ( $content == '' ) {
				//take content from current post
				$page_id = prowess_select_get_page_id();
				if ( !empty($page_id) ) {
					$current_post = get_post($page_id);
					
					if ( is_object($current_post) && property_exists($current_post, 'post_content') ) {
						$content = $current_post->post_content;
					}
				}
			}
			
			//does content has shortcode added?
			if ( has_shortcode($content, $shortcode) ) {
				$has_shortcode = true;
			}
		}
		
		return $has_shortcode;
	}
}

if ( !function_exists('prowess_select_get_unique_page_class') ) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * $params int $id is page id
	 * $params bool $allowSingleProductOption
	 * @return string
	 */
	function prowess_select_get_unique_page_class($id, $allowSingleProductOption = false) {
		$page_class = '';
		
		if ( prowess_select_is_woocommerce_installed() && $allowSingleProductOption ) {
			
			if ( is_product() ) {
				$id = get_the_ID();
			}
		}
		
		if ( is_single() ) {
			$page_class = '.postid-' . $id;
		} elseif ( is_home() ) {
			$page_class .= '.home';
		} elseif ( is_archive() || $id === prowess_select_get_woo_shop_page_id() ) {
			$page_class .= '.archive';
		} elseif ( is_search() ) {
			$page_class .= '.search';
		} elseif ( is_404() ) {
			$page_class .= '.error404';
		} else {
			$page_class .= '.page-id-' . $id;
		}
		
		return $page_class;
	}
}

if ( !function_exists('prowess_select_page_custom_style') ) {
	/**
	 * Function that print custom page style
	 */
	function prowess_select_page_custom_style() {
		$style = apply_filters('prowess_select_add_page_custom_style', $style = '');
		
		if ( $style !== '' ) {
			
			if ( prowess_select_is_woocommerce_installed() && prowess_select_load_woo_assets() ) {
				wp_add_inline_style('prowess-select-woo', $style);
			} else {
				wp_add_inline_style('prowess-select-modules', $style);
			}
		}
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_page_custom_style');
}

if ( !function_exists('prowess_select_container_style') ) {
	/**
	 * Function that return container style
	 */
	function prowess_select_container_style($style) {
		$page_id = prowess_select_get_page_id();
		$class_prefix = prowess_select_get_unique_page_class($page_id, true);
		
		$container_selector = array(
			$class_prefix . ' .qodef-content',
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-container',
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-full-width'
		);
		
		$container_class = array();
		$page_backgorund_color = get_post_meta($page_id, 'qodef_page_background_color_meta', true);
		
		if ( $page_backgorund_color ) {
			$container_class['background-color'] = $page_backgorund_color;
		}
		
		$page_background_pattern_image = get_post_meta($page_id, 'qodef_page_background_image_meta', true);
		if ( !empty($page_background_pattern_image) ) {
			$container_class['background-image'] = 'url(' . esc_url($page_background_pattern_image) . ')';
			$container_class['background-position'] = '0px 0px';
			$container_class['background-repeat'] = 'repeat';
		}
		
		$current_style = prowess_select_dynamic_css($container_selector, $container_class);
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter('prowess_select_add_page_custom_style', 'prowess_select_container_style');
}

if ( !function_exists('prowess_select_content_padding') ) {
	/**
	 * Function that return padding for content
	 */
	function prowess_select_content_padding($style) {
		$page_id = prowess_select_get_page_id();
		$class_prefix = prowess_select_get_unique_page_class($page_id, true);
		
		$return_style = '';
		$current_style_string = '';
		$current_mobile_style_string = '';
		
		$content_selector = array(
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner',
		);
		
		// general padding
		$content_style = array();
		
		$page_padding = get_post_meta($page_id, 'qodef_page_content_padding', true);
		
		if ( $page_padding !== '' ) {
			
			$content_style['padding'] = $page_padding;
			$current_style_string .= prowess_select_dynamic_css($content_selector, $content_style);
		}
		
		// mobile padding
		$content_mobile_style = array();
		
		$page_mobile_padding = get_post_meta($page_id, 'qodef_page_content_padding_mobile', true);
		
		if ( $page_mobile_padding !== '' ) {
			$content_mobile_style['padding'] = $page_mobile_padding;
			$current_mobile_style_string .= prowess_select_dynamic_css($content_selector, $content_mobile_style);
		}
		
		// print
		
		if ( $current_style_string != '' ) {
			$return_style .= $current_style_string;
		}
		
		if ( $current_mobile_style_string != '' ) {
			$return_style .= '@media only screen and (max-width: 1024px) {' . $current_mobile_style_string . '}';
		}
		
		$return_style .= $return_style . $style;
		
		return $return_style;
	}
	
	add_filter('prowess_select_add_page_custom_style', 'prowess_select_content_padding');
}

if ( !function_exists('prowess_select_print_custom_js') ) {
	/**
	 * Prints out custom css from theme options
	 */
	function prowess_select_print_custom_js() {
		$custom_js = prowess_select_options()->getOptionValue('custom_js');
		
		if ( !empty($custom_js) ) {
			wp_add_inline_script('prowess-select-modules', $custom_js);
		}
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_print_custom_js');
}

if ( !function_exists('prowess_select_get_global_variables') ) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function prowess_select_get_global_variables() {
		$global_variables = array();
		
		$global_variables['qodefAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
		$global_variables['qodefElementAppearAmount'] = -100;
		$global_variables['qodefAjaxUrl'] = esc_url(admin_url('admin-ajax.php'));
		
		$global_variables = apply_filters('prowess_select_js_global_variables', $global_variables);
		
		wp_localize_script('prowess-select-modules', 'qodefGlobalVars', array(
			'vars' => $global_variables
		));
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_get_global_variables');
}

if ( !function_exists('prowess_select_per_page_js_variables') ) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function prowess_select_per_page_js_variables() {
		$per_page_js_vars = apply_filters('prowess_select_per_page_js_vars', array());
		
		wp_localize_script('prowess-select-modules', 'qodefPerPageVars', array(
			'vars' => $per_page_js_vars
		));
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_per_page_js_variables');
}

if ( !function_exists('prowess_select_content_elem_style_attr') ) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function prowess_select_content_elem_style_attr() {
		$styles = apply_filters('prowess_select_content_elem_style_attr', array());
		
		prowess_select_inline_style($styles);
	}
}

if ( !function_exists('prowess_select_core_plugin_installed') ) {
	/**
	 * Function that checks if Qode Core plugin installed
	 * @return bool
	 */
	function prowess_select_core_plugin_installed() {
		return defined('PROWESS_CORE_VERSION');
	}
}

if ( !function_exists('prowess_select_is_woocommerce_installed') ) {
	/**
	 * Function that checks if Woocommerce plugin installed
	 * @return bool
	 */
	function prowess_select_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if ( !function_exists('prowess_select_visual_composer_installed') ) {
	/**
	 * Function that checks if Visual Composer plugin installed
	 * @return bool
	 */
	function prowess_select_visual_composer_installed() {
		return class_exists('WPBakeryVisualComposerAbstract');
	}
}

if ( !function_exists('prowess_select_revolution_slider_installed') ) {
	/**
	 * Function that checks if Revolution Slider plugin installed
	 * @return bool
	 */
	function prowess_select_revolution_slider_installed() {
		return class_exists('RevSliderFront');
	}
}

if ( !function_exists('prowess_select_contact_form_7_installed') ) {
	/**
	 * Function that checks if Contact Form 7 plugin installed
	 * @return bool
	 */
	function prowess_select_contact_form_7_installed() {
		return defined('WPCF7_VERSION');
	}
}

if ( !function_exists('prowess_select_is_wpml_installed') ) {
	/**
	 * Function that checks if WPML plugin installed
	 * @return bool
	 */
	function prowess_select_is_wpml_installed() {
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if ( !function_exists('prowess_select_is_timetable_schedule_installed') ) {
	/**
	 * Function that checks if Timetable Responsive Schedule plugin is installed
	 * @return bool
	 */
	function prowess_select_is_timetable_schedule_installed() {
		//checking for this dummy function because plugin doesn't have constant or class
		//that we can hook to. Poorly coded plugin
		return function_exists('timetable_load_textdomain');
	}
}

if ( !function_exists('prowess_select_max_image_width_srcset') ) {
	/**m
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function prowess_select_max_image_width_srcset() {
		return 1920;
	}
	
	add_filter('max_srcset_image_width', 'prowess_select_max_image_width_srcset');
}

if ( !function_exists('prowess_select_get_module_part') ) {
	function prowess_select_get_module_part($module) {
		return $module;
	}
}


if ( ! function_exists( 'prowess_select_is_gutenberg_installed' ) ) {
	/**
	 * Function that checks if Gutenberg plugin installed
	 * @return bool
	 */
	function prowess_select_is_gutenberg_installed() {
		return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
	}
}

if ( ! function_exists( 'prowess_select_is_wp_gutenberg_installed' ) ) {
	/**
	 * Function that checks if WordPress 5.x with Gutenberg editor installed
	 * @return bool
	 */
	function prowess_select_is_wp_gutenberg_installed() {
		return class_exists( 'WP_Block_Type' );
	}
}
