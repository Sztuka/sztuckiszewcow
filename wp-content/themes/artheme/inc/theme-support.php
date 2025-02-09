<?php
/**
 * Theme support and menu registration.
 */
function artzy_features() {
    // Wsparcie dla Custom Logo
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
