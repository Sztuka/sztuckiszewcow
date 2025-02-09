<?php
/**
 * Customizer settings for Decorative Images.
 */
function artzy_customize_register_decorative_images( $wp_customize ) {
    $wp_customize->add_section('decorative_images_section', array(
        'title'    => __('Decorative Images', 'ArTheme'),
        'priority' => 160,
    ));

    // Testimonial Decorative Image
    $wp_customize->add_setting('testimonial_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'testimonial_image', array(
        'label'    => __('Testimonial Decorative Image', 'ArTheme'),
        'section'  => 'decorative_images_section',
        'settings' => 'testimonial_image',
    )));

    // Services Background Image
    $wp_customize->add_setting('services_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'services_image', array(
        'label'    => __('Services Background Image', 'ArTheme'),
        'section'  => 'decorative_images_section',
        'settings' => 'services_image',
    )));
}
add_action('customize_register', 'artzy_customize_register_decorative_images');
