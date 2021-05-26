<div class="qodef-post-info-author">
    <div class="qodef-post-info-author-image"> <?php echo prowess_select_kses_img( get_avatar( get_the_author_meta( 'ID' ), 40 ) ); ?> </div>
    <span class="qodef-post-info-author-text">
        <?php esc_html_e('By', 'prowess'); ?>
    </span>
    <a itemprop="author" class="qodef-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <?php the_author_meta('display_name'); ?>
    </a>
</div>