<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(prowess_select_core_plugin_installed() &&prowess_select_options()->getOptionValue('enable_social_share') === 'yes' && prowess_select_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="qodef-blog-share">
        <?php  echo esc_html( 'Share:' ); echo prowess_select_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>