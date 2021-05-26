<?php

if ( ! function_exists( 'prowess_select_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function prowess_select_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'prowess' );

        return $search_type_options;
    }

    add_filter( 'prowess_select_search_type_global_option', 'prowess_select_set_search_slide_from_hb_global_option' );
}