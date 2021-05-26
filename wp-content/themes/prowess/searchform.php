<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'prowess' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'prowess' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'prowess' ); ?>"/>
		<button type="submit" class="qodef-search-submit"><?php echo prowess_select_icon_collections()->renderIcon( 'ion-android-search', 'ion_icons' ); ?></button>
	</div>
</form>