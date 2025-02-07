<?php
/*
Plugin Name: Remove Dashboard Widgets
Description: A must-use plugin to remove specific dashboard widgets.
Version: 1.0
Author: Piotr Sztucki-Szewców
*/

function hide_dashboard_widgets() {
    // Remove "Quick Draft"
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');

    // Remove "WordPress Events and News"
    remove_meta_box('dashboard_primary', 'dashboard', 'side');

    // Remove "At a Glance"
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
}

add_action('wp_dashboard_setup', 'hide_dashboard_widgets');