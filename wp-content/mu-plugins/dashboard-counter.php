<?php
/*
Plugin Name: Dashboard Counter
Description: A must-use plugin to add a custom counter widget to the dashboard.
Version: 1.0
Author: Piotr Sztucki-Szewców
*/

function add_custom_dashboard_widget() {
    wp_add_dashboard_widget('custom_counter_widget', 'Counter', 'custom_counter_widget_display');
}

add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

function custom_counter_widget_display() {
    $pages_count = wp_count_posts('page')->publish;
    $quotes_count = wp_count_posts('quote')->publish;
    $projects_count = wp_count_posts('project')->publish;
    $services_count = wp_count_posts('service')->publish;

    echo '<ul>';
    // The _n() function in WordPress is used to handle the correct form of pluralization.
    // It takes three parameters: the singular form, the plural form, and the number.
    // Based on the number provided, it returns the appropriate form.
    echo '<li><span class="dashicons dashicons-admin-page" style="color: #646970;"></span><a href="edit.php?post_type=page"> ' . $pages_count . ' ' . _n('Page', 'Pages', $pages_count) . ' </a></li>';
    echo '<li><span class="dashicons dashicons-format-quote" style="color: #646970;"></span><a href="edit.php?post_type=quote"> ' . $quotes_count . ' ' . _n('Quote', 'Quotes', $quotes_count) . ' </a></li>';
    echo '<li><span class="dashicons dashicons-welcome-widgets-menus" style="color: #646970;"></span><a href="edit.php?post_type=project"> ' . $projects_count . ' ' . _n('Project', 'Projects', $projects_count) . ' </a></li>';
    echo '<li><span class="dashicons dashicons-excerpt-view" style="color: #646970;"></span><a href="edit.php?post_type=service"> ' . $services_count . ' ' . _n('Service', 'Services', $services_count) . ' </a></li>';
    echo '</ul>';
}

