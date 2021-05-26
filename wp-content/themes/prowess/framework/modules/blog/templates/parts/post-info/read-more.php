<?php if ( ! prowess_select_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="qodef-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'prowess' ),
				'size'         => 'small',
				'custom_class' => 'qodef-blog-list-button',
				'icon_pack' => 'ion_icons',
				'ion_icon' => 'ion-arrow-right-c'
			);

			echo prowess_select_return_button_html( $button_params );
		?>
	</div>
<?php } ?>