<?php
/**
 * Dashboard Counter
 * Add a custom counter widget to the dashboard.
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
    echo '<li><span class="dashicons dashicons-admin-page" style="color: #646970;"></span><a href="edit.php?post_type=page"> ' . $pages_count . ' ' . _n('Page', 'Pages', $pages_count, 'ArTheme') . ' </a></li>';
    echo '<li><span class="dashicons dashicons-format-quote" style="color: #646970;"></span><a href="edit.php?post_type=quote"> ' . $quotes_count . ' ' . _n('Quote', 'Quotes', $quotes_count, 'ArTheme') . ' </a></li>';
    echo '<li><span class="dashicons dashicons-welcome-widgets-menus" style="color: #646970;"></span><a href="edit.php?post_type=project"> ' . $projects_count . ' ' . _n('Project', 'Projects', $projects_count, 'ArTheme') . ' </a></li>';
    echo '<li><span class="dashicons dashicons-excerpt-view" style="color: #646970;"></span><a href="edit.php?post_type=service"> ' . $services_count . ' ' . _n('Service', 'Services', $services_count, 'ArTheme') . ' </a></li>';
    echo '</ul>';
}
