<?php

if(!function_exists('prowess_select_design_styles')) {
    /**
     * Generates general custom styles
     */
    function prowess_select_design_styles() {
	    $font_family = prowess_select_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && prowess_select_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo prowess_select_dynamic_css( $font_family_selector, array( 'font-family' => prowess_select_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = prowess_select_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
	            'a:hover',
	            'h1 a:hover',
	            'h2 a:hover',
	            'h3 a:hover',
	            'h4 a:hover',
	            'h5 a:hover',
	            'h6 a:hover',
	            'p a:hover',
	            '.qodef-prowess-loader .qodef-prowess-loader-char',
	            '.qodef-comment-holder .qodef-comment-text .comment-edit-link:hover',
	            '.qodef-comment-holder .qodef-comment-text .comment-reply-link:hover',
	            '.qodef-comment-holder .qodef-comment-text .replay:hover',
	            '.qodef-comment-holder .qodef-comment-text #cancel-comment-reply-link',
	            '.error404 .qodef-page-not-found form .qodef-search-submit',
	            '.qodef-fullscreen-sidebar .widget ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_archive ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_categories ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_meta ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_nav_menu ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_pages ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_recent_entries ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
	            '.qodef-side-menu .widget ul li a:hover',
	            '.qodef-side-menu .widget.widget_archive ul li a:hover',
	            '.qodef-side-menu .widget.widget_categories ul li a:hover',
	            '.qodef-side-menu .widget.widget_meta ul li a:hover',
	            '.qodef-side-menu .widget.widget_nav_menu ul li a:hover',
	            '.qodef-side-menu .widget.widget_pages ul li a:hover',
	            '.qodef-side-menu .widget.widget_recent_entries ul li a:hover',
	            '.qodef-side-menu .widget #wp-calendar tfoot a:hover',
	            '.qodef-side-menu .widget.widget_search .input-holder button:hover',
	            '.qodef-side-menu .widget.widget_tag_cloud a:hover',
	            '.wpb_widgetised_column .widget ul li a:hover',
	            'aside.qodef-sidebar .widget ul li a:hover',
	            '.wpb_widgetised_column .widget.widget_archive ul li a:hover',
	            '.wpb_widgetised_column .widget.widget_categories ul li a:hover',
	            '.wpb_widgetised_column .widget.widget_meta ul li a:hover',
	            '.wpb_widgetised_column .widget.widget_nav_menu ul li a:hover',
	            '.wpb_widgetised_column .widget.widget_pages ul li a:hover',
	            '.wpb_widgetised_column .widget.widget_recent_entries ul li a:hover',
	            'aside.qodef-sidebar .widget.widget_archive ul li a:hover',
	            'aside.qodef-sidebar .widget.widget_categories ul li a:hover',
	            'aside.qodef-sidebar .widget.widget_meta ul li a:hover',
	            'aside.qodef-sidebar .widget.widget_nav_menu ul li a:hover',
	            'aside.qodef-sidebar .widget.widget_pages ul li a:hover',
	            'aside.qodef-sidebar .widget.widget_recent_entries ul li a:hover',
	            '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
	            'aside.qodef-sidebar .widget #wp-calendar tfoot a:hover',
	            '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
	            'aside.qodef-sidebar .widget.widget_search .input-holder button:hover',
	            '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
	            'aside.qodef-sidebar .widget.widget_tag_cloud a:hover',
	            '.widget.widget_rss .qodef-widget-title .rsswidget:hover',
	            '.widget.widget_search button:hover',
	            '.widget.widget_tag_cloud .tagcloud a:hover',
	            '.qodef-page-footer .widget.widget_rss .qodef-footer-widget-title .rsswidget:hover',
	            '.qodef-side-menu .widget.widget_rss .qodef-footer-widget-title .rsswidget:hover',
	            '.qodef-page-footer .widget.widget_search button:hover',
	            '.qodef-side-menu .widget.widget_search button:hover',
	            '.qodef-page-footer .widget.widget_tag_cloud a:hover',
	            '.qodef-side-menu .widget.widget_tag_cloud a:hover',
	            '.qodef-top-bar a:hover',
	            '.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-twitter-icon i',
	            '.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-tweet-text a',
	            '.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-tweet-text span',
	            '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
	            '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
	            '.hidden-title-form a.hide-title-form',
	            '.wishlist-title a.show-title-form',
	            '.wishlist_manage_table a.create-new-wishlist',
	            '.wishlist_manage_table button.submit-wishlist-changes',
	            '.wishlist_table a.ask-an-estimate-button',
	            '.woocommerce .yith-wcwl-wishlist-new button',
	            '.yith-wcwl-add-button a.add_to_wishlist',
	            '.yith-wcwl-popup-button a.add_to_wishlist',
	            '.yith-wcwl-wishlist-search-form button.wishlist-search-button',
	            '.yith-wcwl-wishlistexistsbrowse a',
	            '.single-events .qodef-event-single-icon',
	            '.single-events .qodef-ttevents-single-subtitle',
	            '.single-events .tt_event_hours li h4:nth-of-type(1)',
	            '.single-events .tt_event_items_list li.type_info label',
	            '.single-events .tt_event_items_list li:not(.type_info):before',
	            '.qodef-blog-holder article.sticky .qodef-post-title a',
	            '.qodef-blog-holder article .qodef-post-info-top>div a:hover',
	            '.qodef-blog-holder article.format-link .qodef-post-mark .qodef-link-mark',
	            '.qodef-bl-standard-pagination ul li.qodef-bl-pag-active a',
	            '.qodef-blog-holder.qodef-blog-standard .qodef-post-info-bottom-left>div>a:hover',
	            '.qodef-blog-holder.qodef-blog-standard .qodef-post-read-more-button:hover',
	            '.qodef-author-description .qodef-author-description-text-holder .qodef-author-name a:hover',
	            '.qodef-author-description .qodef-author-description-text-holder .qodef-author-social-icons a:hover',
	            '.qodef-blog-single-navigation .qodef-blog-single-next:hover',
	            '.qodef-blog-single-navigation .qodef-blog-single-prev:hover',
	            '.qodef-related-posts-holder .qodef-related-post .qodef-post-info>div a:hover',
	            '.qodef-blog-holder.qodef-blog-single article .qodef-post-info-bottom .qodef-post-info-bottom-left .qodef-tags-holder .qodef-tags a:hover',
	            '.qodef-blog-holder.qodef-blog-single .qodef-ps-info-author a:hover',
	            '.qodef-blog-holder.qodef-blog-single article .qodef-post-info-bottom .qodef-post-info-bottom-right .qodef-blog-share .qodef-social-share-holder a:hover',
	            '.qodef-blog-list-holder .qodef-bli-info>div a:hover',
	            '.qodef-blog-list-holder.qodef-bl-minimal .qodef-post-info-date a:hover',
	            '.qodef-blog-list-holder.qodef-bl-simple .qodef-bli-content .qodef-post-info-date a:hover',
	            '.qodef-main-menu ul li a:hover',
	            '.qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li>a.current',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li>a:hover',
	            '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li>a.current',
	            '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li>a:hover',
	            '.qodef-drop-down .second .inner ul li a:hover',
	            '.qodef-drop-down .second .inner ul li.current-menu-ancestor>a',
	            '.qodef-drop-down .second .inner ul li.current-menu-item>a',
	            '.qodef-drop-down .wide .second .inner ul li a:hover',
	            '.qodef-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
	            '.qodef-drop-down .wide .second .inner>ul>li.current-menu-item>a',
	            'nav.qodef-fullscreen-menu ul li ul li.current-menu-ancestor>a',
	            'nav.qodef-fullscreen-menu ul li ul li.current-menu-item>a',
	            'nav.qodef-fullscreen-menu>ul>li.qodef-active-item>a',
	            '.qodef-fullscreen-menu-opener.qodef-fm-opened .qodef-fullscreen-menu-close-icon',
	            '.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.current-menu-ancestor>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.current-menu-item>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.current_page_item>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.qodef-active-item>a',
	            '.qodef-mobile-header .qodef-mobile-menu-opener.qodef-mobile-menu-opened a',
	            '.qodef-mobile-header .qodef-mobile-nav .qodef-grid>ul>li.qodef-active-item>a',
	            '.qodef-mobile-header .qodef-mobile-nav .qodef-grid>ul>li.qodef-active-item>h6',
	            '.qodef-mobile-header .qodef-mobile-nav ul li a:hover',
	            '.qodef-mobile-header .qodef-mobile-nav ul li h6:hover',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-ancestor>a',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-ancestor>h6',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-item>a',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-item>h6',
	            '.qodef-search-page-holder article.sticky .qodef-post-title a',
	            '.qodef-search-cover .qodef-search-close:hover',
	            '.qodef-fullscreen-search-holder .qodef-search-submit:hover',
	            '.qodef-fullscreen-search-holder .qodef-search-close',
	            '.qodef-side-menu a.qodef-close-side-menu.qodef-close-side-menu-icon-pack',
	            '.qodef-portfolio-single-holder .qodef-ps-info-holder .qodef-ps-info-item a:hover',
	            '.qodef-portfolio-single-holder .qodef-ps-info-holder .qodef-ps-info-author:hover .qodef-ps-info-author-link',
	            '.qodef-portfolio-single-holder .qodef-ps-info-holder .qodef-ps-info-author:hover .qodef-ps-info-author-text',
	            '.qodef-ps-navigation .qodef-ps-back-btn a:hover',
	            '.qodef-ps-navigation .qodef-ps-next a:hover',
	            '.qodef-ps-navigation .qodef-ps-prev a:hover',
	            '.qodef-pl-filter-holder ul li.qodef-pl-current span',
	            '.qodef-pl-filter-holder ul li:hover span',
	            '.qodef-pl-standard-pagination ul li.qodef-pl-pag-active a',
	            '.qodef-portfolio-list-holder.qodef-pl-gallery-overlay article .qodef-pli-text .qodef-pli-category-holder a:hover',
	            '.qodef-team.info-hover .qodef-team-inner .qodef-team-position-main-inner',
	            '.qodef-team.info-hover .qodef-icon-shortcode:hover .qodef-icon-element',
	            '.qodef-testimonials-holder.qodef-testimonials-image-pagination .qodef-testimonials-image-pagination-inner .qodef-testimonials-author-job',
	            '.qodef-testimonials-holder.qodef-testimonials-image-pagination.qodef-testimonials-light .owl-nav .owl-next:hover',
	            '.qodef-testimonials-holder.qodef-testimonials-image-pagination.qodef-testimonials-light .owl-nav .owl-prev:hover',
	            '.qodef-reviews-per-criteria .qodef-item-reviews-average-rating',
	            '.qodef-banner-holder .qodef-banner-price',
	            '.qodef-banner-holder .qodef-btn.qodef-btn-simple',
	            '.qodef-btn.qodef-btn-simple',
	            '.qodef-btn.qodef-btn-outline',
	            '.qodef-countdown.qodef-light-skin .countdown-row .countdown-section .countdown-amount',
	            '.qodef-counter-holder .qodef-counter',
	            '.qodef-event-list-holder .qodef-event-list-item-holder:nth-child(4n) .qodef-event-list-category-holder a',
	            '.qodef-event-list-holder .qodef-event-list-item-holder:nth-child(4n+1) .qodef-event-list-category-holder a',
	            '.qodef-event-list-holder.qodef-event-skin-light .qodef-event-list-item-holder .qodef-event-list-category-holder a',
	            '.qodef-event-list-holder.qodef-event-skin-light .qodef-event-list-item-holder .qodef-event-list-item-title a:hover',
	            '.qodef-iwt a:hover .qodef-iwt-title-text',
	            '.qodef-image-with-text-holder.qodef-image-behavior-custom-link:hover .qodef-iwt-title',
	            '.qodef-price-table .qodef-pt-inner ul li.qodef-pt-prices .qodef-pt-mark',
	            '.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown-opener:hover',
	            '.qodef-tabs.qodef-tabs-simple .qodef-tabs-nav li.ui-state-active a',
	            '.qodef-tabs.qodef-tabs-simple .qodef-tabs-nav li.ui-state-hover a',
	            '.qodef-tabs.qodef-tabs-vertical .qodef-tabs-nav li.ui-state-active a',
	            '.qodef-tabs.qodef-tabs-vertical .qodef-tabs-nav li.ui-state-hover a',
	            '.qodef-team-holder.qodef-team-info-on-image .qodef-team-position-main-inner',
	            '.qodef-team-holder.qodef-team-info-on-image .qodef-team-position:hover',
	            '.qodef-team-holder.qodef-team-info-on-image .qodef-team-social-holder .qodef-team-icon a:hover',
	            '.qodef-team-holder.qodef-team-info-below-image .qodef-team-position:hover',
	            '.qodef-team-holder.qodef-team-info-below-image .qodef-team-social-holder .qodef-team-icon a:hover',
	            '.qodef-twitter-list-holder .qodef-twitter-icon',
	            '.qodef-twitter-list-holder .qodef-tweet-text a:hover',
	            '.qodef-twitter-list-holder .qodef-twitter-profile a:hover',
	            '.qodef-blog-holder.qodef-blog-standard .qodef-post-info-bottom-right .qodef-tags-holder .qodef-tags a:hover',
	            '.qodef-blog-holder.qodef-blog-masonry article .qodef-post-read-more-button > a',
	            '.qodef-event-list-holder.qodef-event-skin-light .qodef-event-list-item-holder .qodef-event-list-read-more-button .qodef-btn',
	            '.qodef-event-list-holder.qodef-event-skin-light .qodef-event-list-item-holder .qodef-event-list-read-more-button .qodef-btn:hover',
            );

            $woo_color_selector = array();
            if(prowess_select_is_woocommerce_installed()) {
                $woo_color_selector = array(
	                '.qodef-woocommerce-page .woocommerce-info .showcoupon:hover',
	                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-minus:hover',
	                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-plus:hover',
	                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-minus:hover',
	                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-plus:hover',
	                'ul.products>.product .price',
	                'ul.products>.product .price ins',
	                'ul.products>.product .qodef-pl-text-wrapper .add_to_cart_button:hover',
	                'ul.products>.product .qodef-pl-text-wrapper .ajax_add_to_cart:hover',
	                '.qodef-woo-single-page .qodef-single-product-summary .price',
	                '.qodef-woo-single-page .qodef-single-product-summary .price ins',
	                '.qodef-woo-single-page .qodef-single-product-summary .product_meta>span .sku:hover',
	                '.qodef-woo-single-page .qodef-single-product-summary .product_meta>span a:hover',
	                '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-shopping-cart-holder .qodef-header-cart:hover',
	                '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-shopping-cart-holder .qodef-header-cart:hover',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a',
	                '.widget.woocommerce.widget_products ul li .amount',
	                '.widget.woocommerce.widget_recently_viewed_products ul li .amount',
	                '.widget.woocommerce.widget_top_rated_products ul li .amount',
	                '.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-price',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-price ins',
	                '.qodef-pls-holder .qodef-pls-text .qodef-pls-price',
	                '.qodef-pls-holder .qodef-pls-text .qodef-pls-price ins',
	                '.qodef-pl-holder .qodef-pli .qodef-pli-price',
	                '.qodef-pl-holder .qodef-pli .qodef-pli-price ins'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.woocommerce table.wishlist_table tbody td.product-add-to-cart',
		        '.qodef-blog-holder.qodef-blog-masonry article .qodef-post-read-more-button>a:hover',
		        '.qodef-blog-list-holder .qodef-bli-content .qodef-bli-excerpt .qodef-post-read-more-button a.qodef-btn:hover',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-search-opener:hover',
		        '.qodef-light-header .qodef-top-bar .qodef-search-opener:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-search-opener:hover',
		        '.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover',
		        '.qodef-btn.qodef-btn-simple:not(.qodef-btn-custom-hover-color):hover',
		        '.qodef-woocommerce-page .woocommerce-message a.wc-forward',
		        '.qodef-event-list-holder.qodef-event-skin-dark .qodef-event-list-item-holder .qodef-event-list-category-holder a'
	        );

            $background_color_selector = array(

	            '.vc_row .qodef-grid-line-center .qodef-grid-line-inner',
	            '.vc_row .qodef-grid-line-right .qodef-grid-line-inner',
	            '.qodef-st-loader .pulse',
	            '.qodef-st-loader .double_pulse .double-bounce1',
	            '.qodef-st-loader .double_pulse .double-bounce2',
	            '.qodef-st-loader .cube',
	            '.qodef-st-loader .rotating_cubes .cube1',
	            '.qodef-st-loader .rotating_cubes .cube2',
	            '.qodef-st-loader .stripes>div',
	            '.qodef-st-loader .wave>div',
	            '.qodef-st-loader .two_rotating_circles .dot1',
	            '.qodef-st-loader .two_rotating_circles .dot2',
	            '.qodef-st-loader .five_rotating_circles .container1>div',
	            '.qodef-st-loader .five_rotating_circles .container2>div',
	            '.qodef-st-loader .five_rotating_circles .container3>div',
	            '.qodef-st-loader .lines .line1',
	            '.qodef-st-loader .lines .line2',
	            '.qodef-st-loader .lines .line3',
	            '.qodef-st-loader .lines .line4',
	            '#submit_comment',
	            '.post-password-form input[type=submit]',
	            'input.wpcf7-form-control.wpcf7-submit',
	            '#qodef-back-to-top>span',
	            '.widget #wp-calendar td#today',
	            '.qodef-social-icons-group-widget.qodef-square-icons .qodef-social-icon-widget-holder:hover',
	            '.qodef-social-icons-group-widget.qodef-square-icons.qodef-light-skin .qodef-social-icon-widget-holder:hover',
	            '.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-standard li',
	            '.single-events .tt_event_items_list li.type_info label:after',
	            'table.tt_timetable .tt_tooltip_text .tt_tooltip_content',
	            '.tt_tabs .tt_tabs_navigation .ui-tabs-active a',
	            '.tt_tabs .tt_tabs_navigation li a:hover',
	            '.widget.tt_upcoming_events_widget .tt_upcoming_events .tt_upcoming_events_event_container:hover',
	            '.widget.tt_upcoming_events_widget .tt_upcoming_event_controls a:hover',
	            '.qodef-blog-holder article.format-quote .qodef-post-text',
	            '.qodef-blog-holder article.format-audio .qodef-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.qodef-blog-holder article.format-audio .qodef-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.qodef-blog-pagination ul li a.qodef-pag-active',
	            '.qodef-blog-pagination ul li a:hover',
	            '.qodef-search-fade .qodef-fullscreen-with-sidebar-search-holder .qodef-fullscreen-search-table',
	            '.qodef-side-menu-button-opener.opened .qodef-side-menu-icon',
	            '.qodef-side-menu-button-opener:hover .qodef-side-menu-icon',
	            '.qodef-accordion-holder.qodef-ac-boxed .qodef-accordion-title.ui-state-active',
	            '.qodef-accordion-holder.qodef-ac-boxed .qodef-accordion-title.ui-state-hover',
	            '.qodef-btn.qodef-btn-solid',
	            '.qodef-event-list-holder .qodef-event-list-item-holder:nth-child(4n+2)',
	            '.qodef-event-list-holder .qodef-event-list-item-holder:nth-child(4n+3)',
	            '.qodef-icon-shortcode.qodef-circle',
	            '.qodef-icon-shortcode.qodef-dropcaps.qodef-circle',
	            '.qodef-icon-shortcode.qodef-square',
	            '.qodef-progress-bar .qodef-pb-content-holder .qodef-pb-content',
	            '.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li.ui-state-active a',
	            '.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li.ui-state-hover a',
	            '.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li.ui-state-active a',
	            '.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li.ui-state-hover a',
	            '.qodef-tabs.qodef-tabs-vertical .qodef-tabs-nav li.qodef-tab-line',
	            '.qodef-fullscreen-menu-opener .qodef-fullscreen-menu-opener-icon'



            );

            $woo_background_color_selector = array();
            if(prowess_select_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.woocommerce-page .qodef-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                '.woocommerce-page .qodef-content a.checkout-button',
	                '.woocommerce-page .qodef-content a.woocommerce-Button',
	                '.woocommerce-page .qodef-content button[type=submit]:not(.qodef-woo-search-widget-button)',
	                '.woocommerce-page .qodef-content input[type=submit]',
	                'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                'div.woocommerce a.checkout-button',
	                'div.woocommerce a.woocommerce-Button',
	                'div.woocommerce button[type=submit]:not(.qodef-woo-search-widget-button)',
	                'div.woocommerce input[type=submit]',
	                '.woocommerce .qodef-onsale',
	                '.woocommerce-pagination .page-numbers li a.current',
	                '.woocommerce-pagination .page-numbers li a:hover',
	                '.woocommerce-pagination .page-numbers li span.current',
	                '.woocommerce-pagination .page-numbers li span:hover',
	                '.qodef-shopping-cart-holder .qodef-header-cart .qodef-cart-number',
	                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .qodef-view-cart',
	                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .qodef-view-checkout',
	                '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-image-outer .qodef-plc-image .qodef-plc-onsale',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .added_to_cart',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .button',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .added_to_cart:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .button:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .added_to_cart:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .button:hover',
	                '.qodef-pl-holder .qodef-pli-inner .qodef-pli-image .qodef-pli-onsale',
	                '.qodef-pl-holder.qodef-product-add-to-cart-over-image .qodef-pli-add-to-cart .added_to_cart',
	                '.qodef-pl-holder.qodef-product-add-to-cart-over-image .qodef-pli-add-to-cart .button',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

	        $background_color_important_selector = array(
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-side-menu-button-opener .qodef-side-menu-icon.opened',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-side-menu-button-opener .qodef-side-menu-icon:hover',
		        '.qodef-light-header .qodef-top-bar .qodef-side-menu-button-opener .qodef-side-menu-icon.opened',
		        '.qodef-light-header .qodef-top-bar .qodef-side-menu-button-opener .qodef-side-menu-icon:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-side-menu-button-opener .qodef-side-menu-icon.opened',
		        '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-side-menu-button-opener .qodef-side-menu-icon:hover',
		        '.qodef-dark-header .qodef-top-bar .qodef-side-menu-button-opener .qodef-side-menu-icon.opened',
		        '.qodef-dark-header .qodef-top-bar .qodef-side-menu-button-opener .qodef-side-menu-icon:hover',
	        );

            $border_color_selector = array(
	            '.qodef-st-loader .pulse_circles .ball',
	            '.qodef-owl-slider+.qodef-slider-thumbnail>.qodef-slider-thumbnail-item.active img',
	            '#qodef-back-to-top>span',
	            'table.tt_timetable .tt_tooltip_text .tt_tooltip_arrow',
	            '.widget.tt_upcoming_events_widget .tt_upcoming_event_controls a:hover',
	            '.qodef-btn.qodef-btn-outline',
	            '.qodef-price-table.qodef-pt-highlighted .qodef-pt-inner:before',
            );

	        $border_left_color_selector = array('blockquote');
	        $border_bottom_color_selector = array('.qodef-woo-single-page .woocommerce-tabs ul.tabs>li a:hover');

            echo prowess_select_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo prowess_select_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo prowess_select_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo prowess_select_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo prowess_select_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo prowess_select_dynamic_css($border_left_color_selector, array('border-left-color' => $first_main_color));
	        echo prowess_select_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => $first_main_color));
        }
	
	    $page_background_color = prowess_select_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.qodef-content'
		    );
		    echo prowess_select_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = prowess_select_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo prowess_select_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo prowess_select_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( prowess_select_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . prowess_select_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo prowess_select_dynamic_css( '.qodef-preload-background', $preload_background_styles );
    }

    add_action('prowess_select_style_dynamic', 'prowess_select_design_styles');
}

if ( ! function_exists( 'prowess_select_content_styles' ) ) {
	function prowess_select_content_styles() {
		$content_style = array();
		
		$padding = prowess_select_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner',
		);
		
		echo prowess_select_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = prowess_select_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
		);
		
		echo prowess_select_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_content_styles' );
}

if ( ! function_exists( 'prowess_select_h1_styles' ) ) {
	function prowess_select_h1_styles() {
		$margin_top    = prowess_select_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = prowess_select_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = prowess_select_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_h1_styles' );
}

if ( ! function_exists( 'prowess_select_h2_styles' ) ) {
	function prowess_select_h2_styles() {
		$margin_top    = prowess_select_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = prowess_select_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = prowess_select_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_h2_styles' );
}

if ( ! function_exists( 'prowess_select_h3_styles' ) ) {
	function prowess_select_h3_styles() {
		$margin_top    = prowess_select_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = prowess_select_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = prowess_select_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_h3_styles' );
}

if ( ! function_exists( 'prowess_select_h4_styles' ) ) {
	function prowess_select_h4_styles() {
		$margin_top    = prowess_select_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = prowess_select_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = prowess_select_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_h4_styles' );
}

if ( ! function_exists( 'prowess_select_h5_styles' ) ) {
	function prowess_select_h5_styles() {
		$margin_top    = prowess_select_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = prowess_select_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = prowess_select_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_h5_styles' );
}

if ( ! function_exists( 'prowess_select_h6_styles' ) ) {
	function prowess_select_h6_styles() {
		$margin_top    = prowess_select_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = prowess_select_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = prowess_select_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = prowess_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = prowess_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_h6_styles' );
}

if ( ! function_exists( 'prowess_select_text_styles' ) ) {
	function prowess_select_text_styles() {
		$item_styles = prowess_select_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo prowess_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_text_styles' );
}

if ( ! function_exists( 'prowess_select_link_styles' ) ) {
	function prowess_select_link_styles() {
		$link_styles      = array();
		$link_color       = prowess_select_options()->getOptionValue( 'link_color' );
		$link_font_style  = prowess_select_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = prowess_select_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = prowess_select_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo prowess_select_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_link_styles' );
}

if ( ! function_exists( 'prowess_select_link_hover_styles' ) ) {
	function prowess_select_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = prowess_select_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = prowess_select_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo prowess_select_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo prowess_select_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'prowess_select_style_dynamic', 'prowess_select_link_hover_styles' );
}

if ( ! function_exists( 'prowess_select_smooth_page_transition_styles' ) ) {
	function prowess_select_smooth_page_transition_styles( $style ) {
		$id            = prowess_select_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = prowess_select_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.qodef-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= prowess_select_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = prowess_select_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.qodef-st-loader .qodef-rotate-circles > div',
			'.qodef-st-loader .pulse',
			'.qodef-st-loader .double_pulse .double-bounce1',
			'.qodef-st-loader .double_pulse .double-bounce2',
			'.qodef-st-loader .cube',
			'.qodef-st-loader .rotating_cubes .cube1',
			'.qodef-st-loader .rotating_cubes .cube2',
			'.qodef-st-loader .stripes > div',
			'.qodef-st-loader .wave > div',
			'.qodef-st-loader .two_rotating_circles .dot1',
			'.qodef-st-loader .two_rotating_circles .dot2',
			'.qodef-st-loader .five_rotating_circles .container1 > div',
			'.qodef-st-loader .five_rotating_circles .container2 > div',
			'.qodef-st-loader .five_rotating_circles .container3 > div',
			'.qodef-st-loader .atom .ball-1:before',
			'.qodef-st-loader .atom .ball-2:before',
			'.qodef-st-loader .atom .ball-3:before',
			'.qodef-st-loader .atom .ball-4:before',
			'.qodef-st-loader .clock .ball:before',
			'.qodef-st-loader .mitosis .ball',
			'.qodef-st-loader .lines .line1',
			'.qodef-st-loader .lines .line2',
			'.qodef-st-loader .lines .line3',
			'.qodef-st-loader .lines .line4',
			'.qodef-st-loader .fussion .ball',
			'.qodef-st-loader .fussion .ball-1',
			'.qodef-st-loader .fussion .ball-2',
			'.qodef-st-loader .fussion .ball-3',
			'.qodef-st-loader .fussion .ball-4',
			'.qodef-st-loader .wave_circles .ball',
			'.qodef-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= prowess_select_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'prowess_select_add_page_custom_style', 'prowess_select_smooth_page_transition_styles' );
}