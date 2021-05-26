<?php get_header(); ?>
				<div class="qodef-page-not-found">
					<?php
					$qodef_title_image_404 = prowess_select_options()->getOptionValue( '404_page_title_image' );
					$qodef_title_404       = prowess_select_options()->getOptionValue( '404_title' );
					$qodef_subtitle_404    = prowess_select_options()->getOptionValue( '404_subtitle' );
					$qodef_text_404        = prowess_select_options()->getOptionValue( '404_text' );
					$qodef_button_label    = prowess_select_options()->getOptionValue( '404_back_to_home' );
					$qodef_button_style    = prowess_select_options()->getOptionValue( '404_button_style' );

					if ( ! empty( $qodef_title_image_404 ) ) { ?>
						<div class="qodef-404-title-image">
							<img src="<?php echo esc_url( $qodef_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'prowess' ); ?>" />
						</div>
					<?php } ?>

					<h1 class="qodef-404-title">
						<?php if ( ! empty( $qodef_title_404 ) ) {
							echo esc_html( $qodef_title_404 );
						} else {
							esc_html_e( '404', 'prowess' );
						} ?>
					</h1>

					<h3 class="qodef-404-subtitle">
						<?php if ( ! empty( $qodef_subtitle_404 ) ) {
							echo esc_html( $qodef_subtitle_404 );
						} else {
							esc_html_e( 'How Did You Get Here?', 'prowess' );
						} ?>
					</h3>
					<?php if ( ! empty( $qodef_text_404 ) ) { ?>
					<p class="qodef-404-text">
						<?php echo esc_html( $qodef_text_404 ); ?>
					</p>
					<?php } ?>

					<?php get_search_form(); ?>

					<?php
						$button_params = array(
							'link' => esc_url( home_url( '/' ) ),
							'text' => ! empty( $qodef_button_label ) ? $qodef_button_label : esc_html__( 'Back to home', 'prowess' ),
						);

						if ( $qodef_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'qodef-btn-light-style';
						}

						echo prowess_select_return_button_html( $button_params );
						?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>