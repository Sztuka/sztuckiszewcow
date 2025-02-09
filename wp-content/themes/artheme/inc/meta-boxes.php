<?php
/**
 * Meta Boxes for Project post type.
 *
 * Dodaje meta box "Project Details" dla postów typu "project" oraz zapisuje dane z pól Overview, Challenge i Impact.
 */

// Dodaj meta boxy do postów typu project
function artzy_add_project_meta_boxes() {
    add_meta_box(
        'artzy_project_details',            // ID meta boxa
        __('Project Details', 'ArTheme'),   // Tytuł meta boxa
        'artzy_project_meta_box_callback',    // Funkcja wyświetlająca zawartość meta boxa
        'project',                          // Typ postu, dla którego meta box ma się pojawiać
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'artzy_add_project_meta_boxes');

/**
 * Callback meta boxa – wyświetlanie pól
 *
 * @param WP_Post $post
 */
function artzy_project_meta_box_callback( $post ) {
    // Pobierz istniejące wartości (jeśli istnieją)
    $overview  = get_post_meta( $post->ID, 'overview', true );
    $challenge = get_post_meta( $post->ID, 'challenge', true );
    $impact    = get_post_meta( $post->ID, 'impact', true );

    // Dodaj nonce dla bezpieczeństwa
    wp_nonce_field( 'artzy_project_save_meta_box_data', 'artzy_project_meta_box_nonce' );
    ?>
    <p>
        <label for="overview"><?php _e( 'Overview:', 'ArTheme' ); ?></label>
        <textarea id="overview" name="overview" rows="4" style="width:100%;"><?php echo esc_textarea( $overview ); ?></textarea>
    </p>
    <p>
        <label for="challenge"><?php _e( 'Challenge:', 'ArTheme' ); ?></label>
        <textarea id="challenge" name="challenge" rows="4" style="width:100%;"><?php echo esc_textarea( $challenge ); ?></textarea>
    </p>
    <p>
        <label for="impact"><?php _e( 'Impact:', 'ArTheme' ); ?></label>
        <textarea id="impact" name="impact" rows="4" style="width:100%;"><?php echo esc_textarea( $impact ); ?></textarea>
    </p>
    <?php
}

/**
 * Zapis meta box danych przy zapisie posta.
 *
 * @param int $post_id
 */
function artzy_save_project_meta_box_data( $post_id ) {
    // Sprawdź, czy nonce jest ustawiony.
    if ( ! isset( $_POST['artzy_project_meta_box_nonce'] ) ) {
        return;
    }
    // Zweryfikuj nonce.
    if ( ! wp_verify_nonce( $_POST['artzy_project_meta_box_nonce'], 'artzy_project_save_meta_box_data' ) ) {
        return;
    }
    // Zabezpiecz przed autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Sprawdź uprawnienia użytkownika
    if ( isset( $_POST['post_type'] ) && 'project' === $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    // Zapisz dane
    if ( isset( $_POST['overview'] ) ) {
        update_post_meta( $post_id, 'overview', sanitize_textarea_field( $_POST['overview'] ) );
    }
    if ( isset( $_POST['challenge'] ) ) {
        update_post_meta( $post_id, 'challenge', sanitize_textarea_field( $_POST['challenge'] ) );
    }
    if ( isset( $_POST['impact'] ) ) {
        update_post_meta( $post_id, 'impact', sanitize_textarea_field( $_POST['impact'] ) );
    }
}
add_action( 'save_post', 'artzy_save_project_meta_box_data' );
