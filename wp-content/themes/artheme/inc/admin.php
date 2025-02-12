<?php
/**
 * Remove unnecessary admin menu items.
 */
function remove_menus() {
    remove_menu_page('edit.php');         // Ukrywa menu "Wpisy"
    remove_menu_page('edit-comments.php');  // Ukrywa menu "Komentarze"
}
add_action('admin_menu', 'remove_menus');

/**
 * Remove specific dashboard widgets.
 */
function hide_dashboard_widgets() {
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'hide_dashboard_widgets');

function artzy_register_widget_area() {
    register_sidebar( array(
        'name'          => __( 'Social Icons', 'artzy' ),
        'id'            => 'social-icons',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'artzy_register_widget_area' );

