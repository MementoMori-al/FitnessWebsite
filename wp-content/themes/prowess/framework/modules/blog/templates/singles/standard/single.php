<?php

prowess_select_get_single_post_format_html($blog_single_type);

do_action('prowess_select_after_article_content');

prowess_select_get_module_template_part('templates/parts/single/author-info', 'blog');

prowess_select_get_module_template_part('templates/parts/single/single-navigation', 'blog');

prowess_select_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

prowess_select_get_module_template_part('templates/parts/single/comments', 'blog');