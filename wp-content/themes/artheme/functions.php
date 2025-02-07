<?php
/**
 * Functions and definitions for the ArTheme theme.
 */

/* =============================================================================
   1. Ładowanie skryptów i stylów
   ============================================================================= */
function artzy_files() {
    wp_enqueue_script(
        'artzy-bootstrap-js',
        get_theme_file_uri('/assets/js/bootstrap.js'),
        array(),
        '5.3.1',
        true
    );
    wp_enqueue_script(
        'artzy-animation-js',
        get_theme_file_uri('/assets/js/animation.js'),
        array('jquery'),
        '1.0',
        true
    );
    wp_enqueue_script(
        'artzy-main-js',
        get_theme_file_uri('/assets/js/main.js'),
        array('jquery'),
        '1.0',
        true
    );
    wp_enqueue_style(
        'custom-google-fonts-1',
        '//fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900'
    );
    wp_enqueue_style(
        'font-awesome',
        '//use.fontawesome.com/releases/v5.6.3/css/all.css'
    );
    wp_enqueue_style(
        'artzy-bootstrap',
        get_theme_file_uri('/assets/css/bootstrap.css')
    );
    wp_enqueue_style(
        'artzy-index',
        get_theme_file_uri('/assets/css/index.css')
    );
    wp_enqueue_style(
        'artzy-main',
        get_theme_file_uri('/assets/css/main.css')
    );
}
add_action('wp_enqueue_scripts', 'artzy_files');


/* =============================================================================
   2. Wsparcie motywu oraz rejestracja menu
   ============================================================================= */
function artzy_features() {
    // Wsparcie dla wbudowanego Custom Logo
    add_theme_support('custom-logo');

    // Inne wsparcia
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    // Rejestracja menu
    register_nav_menu('header-menu', __('Header Menu', 'ArTheme'));
    register_nav_menu('footerLocationOne', __('Footer Location One', 'ArTheme'));
    register_nav_menu('footerLocationTwo', __('Footer Location Two', 'ArTheme'));
    
    // Rejestracja menu Social – dla ikon społecznościowych
    register_nav_menu('social-menu', __('Social Menu', 'ArTheme'));
}
add_action('after_setup_theme', 'artzy_features');


/* =============================================================================
   3. Usuwanie niepotrzebnych elementów z panelu administracyjnego
   ============================================================================= */
function remove_menus() {
    remove_menu_page('edit.php');         // Ukrywa menu "Wpisy"
    remove_menu_page('edit-comments.php');  // Ukrywa menu "Komentarze"
}
add_action('admin_menu', 'remove_menus');


/* =============================================================================
   4. Ustawienia w Customizerze – Dekoracyjne obrazy
   ============================================================================= */
function artzy_customize_register_decorative_images( $wp_customize ) {
    // Dodajemy sekcję do ustawień dekoracyjnych obrazów
    $wp_customize->add_section('decorative_images_section', array(
        'title'       => __('Decorative Images', 'ArTheme'),
        'priority'    => 160,
    ));

    // Ustawienie: Testimonial Decorative Image
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

    // Ustawienie: Services Background Image
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
    
    // Możesz dodać kolejne ustawienia dla dekoracyjnych obrazów tutaj...
}
add_action('customize_register', 'artzy_customize_register_decorative_images');
