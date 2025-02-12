<?php
/**
 * Functions and definitions for the ArTheme theme.
 */

// Ładowanie modułów
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/admin.php';

// Ładowanie funkcjonalności Customizera
require get_template_directory() . '/inc/customizer/decorative-images.php';
require get_template_directory() . '/inc/customizer/contact-details.php';

// Ładowanie dodatkowych funkcji (dashboard, post types, svg support)
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/dashboard-counter.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/svg-support.php';

// Ładowanie widgetów (rejestracja obszaru widgetów)
require get_template_directory() . '/inc/widget-areas.php';
