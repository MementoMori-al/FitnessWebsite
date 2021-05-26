<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$text_wrapper_styles    = $this_object->getTextWrapperStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="qodef-pli qodef-item-space <?php echo esc_html( $item_classes ); ?>">
    <div class="qodef-pli-inner-holder">
        <div class="qodef-pli-inner">
            <div class="qodef-pli-image">
                <?php prowess_select_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
            </div>
            <div class="qodef-pli-text" <?php echo prowess_select_get_inline_style( $shader_styles ); ?>>
                <div class="qodef-pli-text-outer">
                    <div class="qodef-pli-text-inner">
	                    <?php prowess_select_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
                    </div>
                </div>
            </div>
            <a class="qodef-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
        </div>
        <div class="qodef-pli-text-wrapper" <?php echo prowess_select_get_inline_style( $text_wrapper_styles ); ?>>
            <?php prowess_select_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>

            <?php prowess_select_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>

            <?php prowess_select_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>

            <?php prowess_select_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>

            <?php prowess_select_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
        </div>
    </div>
</div>