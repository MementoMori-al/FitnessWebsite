<?php if(prowess_select_core_plugin_installed()) { ?>
    <div class="qodef-blog-like">
        <?php if( function_exists('prowess_select_get_like') ) prowess_select_get_like(); ?>
    </div>
<?php } ?>