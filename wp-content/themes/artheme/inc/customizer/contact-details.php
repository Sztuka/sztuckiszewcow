<?php
/**
 * Customizer settings for Contact Details.
 */
function artzy_customize_register_contact_details( $wp_customize ) {
    $wp_customize->add_section('contact_details_section', array(
        'title'    => __('Contact Details', 'ArTheme'),
        'priority' => 170,
    ));

    // Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'    => __('Email', 'ArTheme'),
        'section'  => 'contact_details_section',
        'type'     => 'text',
    ));

    // Phone Number
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Phone Number', 'ArTheme'),
        'section'  => 'contact_details_section',
        'type'     => 'text',
    ));

    // WhatsApp
    $wp_customize->add_setting('contact_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_whatsapp', array(
        'label'    => __('WhatsApp', 'ArTheme'),
        'section'  => 'contact_details_section',
        'type'     => 'text',
    ));

    // Messenger
    $wp_customize->add_setting('contact_messenger', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_messenger', array(
        'label'    => __('Messenger', 'ArTheme'),
        'section'  => 'contact_details_section',
        'type'     => 'text',
    ));

    // LinkedIn
    $wp_customize->add_setting('contact_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_linkedin', array(
        'label'    => __('LinkedIn', 'ArTheme'),
        'section'  => 'contact_details_section',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('contact_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_instagram', array(
        'label'    => __('Instagram', 'ArTheme'),
        'section'  => 'contact_details_section',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'artzy_customize_register_contact_details');
