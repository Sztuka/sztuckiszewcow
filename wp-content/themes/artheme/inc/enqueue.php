<?php
/**
 * Enqueue scripts and styles.
 */
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
