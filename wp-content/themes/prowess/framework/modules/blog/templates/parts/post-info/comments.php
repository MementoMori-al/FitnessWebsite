<?php if(comments_open()) { ?>
	<div class="qodef-post-info-comments-holder">
		<a itemprop="url" class="qodef-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<?php comments_number('0 ' . esc_html__('','prowess'), '1 '.esc_html__('','prowess'), '% '.esc_html__('','prowess') ); ?>
		</a>
	</div>
<?php } ?>