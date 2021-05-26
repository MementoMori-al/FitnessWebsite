<?php $post_classes[] = 'qodef-item-space'; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-main">
                    <div class="qodef-post-mark">
                        <span aria-hidden="true" class="qodef-icon-font-elegant icon_link qodef-icon-element"></span>
                    </div>
                    <?php prowess_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>


