<div class="qodef-ttevents-single">
    <?php if(has_post_thumbnail()) : ?>
        <div class="qodef-ttevents-single-image-holder">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>

    <div class="qodef-ttevents-single-holder">
        <?php if(!empty($subtitle)) : ?>
            <p class="qodef-ttevents-single-subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <h2 class="qodef-ttevents-single-title"><?php the_title(); ?></h2>

        <div class="qodef-ttevents-single-content">
            <?php the_content(); ?>
        </div>
    </div>
</div>
