<?php
/**
 * Register widget areas.
 */
function artheme_register_widget_areas() {
    register_sidebar( array(
        'name'          => __( 'Social Icons Widget Area', 'ArTheme' ),
        'id'            => 'social-icons-widget',
        'before_widget' => '<div class="widget social-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'artheme_register_widget_areas' );
