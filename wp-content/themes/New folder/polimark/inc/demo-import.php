<?php
function polimark_demo_import()
{
    return array(
        array(
            'import_file_name'             => 'Polimark Demo Import',
            'categories'                   => array('polimark'),
            'local_import_file'            => trailingslashit(get_template_directory()) . 'inc/demo-data/sample-data.xml',
            'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'inc/demo-data/widgets.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-data/customizer.dat',
            'import_preview_image_url'     => 'http://www.your_domain.com/ocdi/preview_import_image1.jpg',
            'import_notice'                => __('Please keep patients while importing sample data.', 'polimark'),
            'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
        ),
    );
}
add_filter('pt-ocdi/import_files', 'polimark_demo_import');

function polimark_after_import_setup()
{
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'menu-1' => $main_menu->term_id
    ));

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home One');
    $blog_page_id  = get_page_by_title('News');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}
add_action('pt-ocdi/after_import', 'polimark_after_import_setup');
add_filter('pt-ocdi/disable_pt_branding', '__return_true');
