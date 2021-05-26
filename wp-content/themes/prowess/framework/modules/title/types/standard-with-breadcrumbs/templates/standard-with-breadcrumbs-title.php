<?php do_action('prowess_select_before_page_title'); ?>

<div class="qodef-title-holder <?php echo esc_attr($holder_classes); ?>" <?php prowess_select_inline_style($holder_styles); ?> <?php echo prowess_select_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="qodef-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="qodef-title-wrapper" <?php prowess_select_inline_style($wrapper_styles); ?>>
		<div class="qodef-title-inner">
			<div class="qodef-grid">
				<div class="qodef-title-info">
					<?php if(!empty($title)) { ?>
						<<?php echo esc_attr($title_tag); ?> class="qodef-page-title entry-title" <?php prowess_select_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
					<?php } ?>
					<?php if(!empty($subtitle)){ ?>
						<<?php echo esc_attr($subtitle_tag); ?> class="qodef-page-subtitle" <?php prowess_select_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
					<?php } ?>
				</div>
				<div class="qodef-breadcrumbs-info">
					<?php prowess_select_custom_breadcrumbs(); ?>
				</div>
			</div>
	    </div>
	</div>
</div>

<?php do_action('prowess_select_after_page_title'); ?>
