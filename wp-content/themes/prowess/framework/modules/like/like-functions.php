<?php

if ( ! function_exists( 'prowess_select_like' ) ) {
	/**
	 * Returns ProwessLike instance
	 *
	 * @return ProwessLike
	 */
	function prowess_select_like() {
		return ProwessLike::get_instance();
	}
}

function prowess_select_get_like() {
	
	echo wp_kses( prowess_select_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	));
}