<?php
/**
 * Register custom post types.
 */
function artzy_post_types() {
    register_post_type("project", array(
        "supports" => array("title", "editor", "excerpt", "thumbnail"),
        "rewrite" => array("slug" => "projects"),
        "has_archive" => true,
        "public" => true,
        "show_in_rest" => true,
        "taxonomies" => array("category", "post_tag"),
        "labels" => array(
            "name" => "Projects",
            "add_new_item" => "Add Project",
            "edit_item" => "Edit Project",
            "all_items" => "All Projects",
            "singular_name" => "Project"
        ),
        "menu_icon" => "dashicons-welcome-widgets-menus"
    ));

    register_post_type("quote", array(
        "supports" => array("title", "editor"),
        "rewrite" => array("slug" => "quotes"),
        "has_archive" => true,
        "public" => true,
        "show_in_rest" => true,
        "labels" => array(
            "name" => "Quotes",
            "add_new_item" => "Add Quote",
            "edit_item" => "Edit Quote",
            "all_items" => "All Quotes",
            "singular_name" => "Quote"
        ),
        "menu_icon" => "dashicons-format-quote"
    ));

    register_post_type("service", array(
        "supports" => array("title", "editor", "page-attributes"),
        "rewrite" => array("slug" => "services"),
        "has_archive" => true,
        "public" => true,
        "show_in_rest" => true,
        "labels" => array(
            "name" => "Services",
            "add_new_item" => "Add Service",
            "edit_item" => "Edit Service",
            "all_items" => "All Services",
            "singular_name" => "Service"
        ),
        "menu_icon" => "dashicons-excerpt-view"
    ));
}
add_action("init", "artzy_post_types");