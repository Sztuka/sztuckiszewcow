<?php
/**
 * Meta Boxes for Project post type.
 *
 * Dodaje metabox "Featured Project" dla postów typu "project".
 */

// Dodaj metabox do postów typu project
function artzy_add_featured_metabox() {
    add_meta_box(
        'artzy_featured_metabox',               // ID metaboxa
        __('Featured Project', 'ArTheme'),      // Tytuł metaboxa
        'artzy_featured_metabox_callback',      // Funkcja wyświetlająca zawartość metaboxa
        'project',                              // Typ postu
        'side',                                 // Pozycja (side, normal, advanced)
        'default'
    );
}
add_action('add_meta_boxes', 'artzy_add_featured_metabox');

// Callback metaboxa – wyświetlanie checkboxa
function artzy_featured_metabox_callback($post) {
    // Pobierz istniejącą wartość (1 lub 0)
    $value = get_post_meta($post->ID, '_artzy_featured', true);
    // Dodaj nonce dla bezpieczeństwa
    wp_nonce_field('artzy_featured_metabox_nonce', 'artzy_featured_metabox_nonce_field');
    ?>
    <p>
        <label for="artzy_featured_checkbox">
            <input type="checkbox" id="artzy_featured_checkbox" name="artzy_featured_checkbox" value="1" <?php checked($value, '1'); ?>>
            <?php _e('Mark as Featured', 'ArTheme'); ?>
        </label>
    </p>
    <?php
}

// Zapis metabox danych
function artzy_save_featured_metabox_data($post_id) {
    // Sprawdź, czy nonce jest ustawiony i poprawny
    if (!isset($_POST['artzy_featured_metabox_nonce_field']) ||
        !wp_verify_nonce($_POST['artzy_featured_metabox_nonce_field'], 'artzy_featured_metabox_nonce')) {
        return;
    }
    // Zapobiegaj autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Sprawdź uprawnienia użytkownika
    if (isset($_POST['post_type']) && 'project' === $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    // Zapisz wartość checkboxa
    if (isset($_POST['artzy_featured_checkbox'])) {
        update_post_meta($post_id, '_artzy_featured', '1');
    } else {
        delete_post_meta($post_id, '_artzy_featured');
    }
}
add_action('save_post', 'artzy_save_featured_metabox_data');
