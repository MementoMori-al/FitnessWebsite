<?php

if (!function_exists('prowess_select_sidearea_options_map')) {
    function prowess_select_sidearea_options_map() {

        prowess_select_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'prowess'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = prowess_select_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'prowess'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'prowess'),
                'description'   => esc_html__('Choose a type of Side Area', 'prowess'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'prowess'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'prowess'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'prowess'),
                ),
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'prowess'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'prowess'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = prowess_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'prowess'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'prowess'),
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'prowess'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'prowess'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'prowess'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'prowess'),
                'options'       => prowess_select_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = prowess_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'ion_icons',
                'label'         => esc_html__('Side Area Icon Pack', 'prowess'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'prowess'),
                'options'       => prowess_select_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = prowess_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'prowess'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'prowess'),
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'prowess'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'prowess'),
            )
        );

        $side_area_icon_style_group = prowess_select_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'prowess'),
                'description' => esc_html__('Define styles for Side Area icon', 'prowess')
            )
        );

        $side_area_icon_style_row1 = prowess_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'prowess')
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'prowess')
            )
        );

        $side_area_icon_style_row2 = prowess_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'prowess')
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'prowess')
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'prowess'),
                'description' => esc_html__('Choose a background color for Side Area', 'prowess')
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'prowess'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'prowess'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        prowess_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'prowess'),
                'description'   => esc_html__('Choose text alignment for side area', 'prowess'),
                'options'       => array(
                    ''       => esc_html__('Default', 'prowess'),
                    'left'   => esc_html__('Left', 'prowess'),
                    'center' => esc_html__('Center', 'prowess'),
                    'right'  => esc_html__('Right', 'prowess')
                )
            )
        );
    }

    add_action('prowess_select_options_map', 'prowess_select_sidearea_options_map', 15);
}