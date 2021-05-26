<div class="qodef-grid-row">
	<div <?php echo prowess_select_get_content_sidebar_class(); ?>>
		<div class="qodef-search-page-holder">
			<?php prowess_select_get_search_page_layout(); ?>
		</div>
		<?php do_action( 'prowess_select_page_after_content' ); ?>
	</div>
	<?php if ( $sidebar_layout !== 'no-sidebar' ) { ?>
		<div <?php echo prowess_select_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>