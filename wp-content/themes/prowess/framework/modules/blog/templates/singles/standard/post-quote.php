<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-main">
                    <div class="qodef-post-mark">
                        <span class="Ionicons ion-quote"></span>
                    </div>
                    <?php prowess_select_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
        <div class="qodef-post-info-top">
            <?php prowess_select_get_module_template_part('templates/parts/post-info/author-image', 'blog', '', $part_params); ?>
            <?php prowess_select_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
            <?php prowess_select_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
            <?php prowess_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
    </div>
    <div class="qodef-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="qodef-post-info-bottom clearfix">
        <div class="qodef-post-info-bottom-left">
            <?php prowess_select_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
        </div>
        <div class="qodef-post-info-bottom-right">
            <?php prowess_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>