<div class="qodef-pl-holder <?php echo esc_attr( $holder_classes ) ?>">
	<div class="qodef-pl-outer qodef-outer-space">
		<?php if ( $query_result->have_posts() ): while ( $query_result->have_posts() ) : $query_result->the_post();
			echo prowess_select_get_woo_shortcode_module_template_part( 'templates/parts/' . $hover_type, 'product-list', '', $params );
		endwhile;
		else:
			prowess_select_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>