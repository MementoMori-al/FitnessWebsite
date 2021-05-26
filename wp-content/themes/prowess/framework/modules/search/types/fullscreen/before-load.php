<?php

if ( ! function_exists( 'prowess_select_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function prowess_select_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'prowess' );

        return $search_type_options;
    }

    add_filter( 'prowess_select_search_type_global_option', 'prowess_select_set_search_fullscreen_global_option' );
}