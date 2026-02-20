<?php
if (!defined('ABSPATH'))
    exit;

function register_event_post_type()
{
    $labels = array(
        'name' => ('Eventi'),
        'singular_name' => ('Evento'),
        'menu_name' => 'Eventi',
        'add_new_item' => 'Aggiungi Nuovo Evento',
        'edit_item' => 'Modifica Evento',
        'new_item' => 'Nuovo Evento',
        'view_items' => 'Visualizza Eventi'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Visualizzare, aggiungere, modificare, eliminare eventi',
        'public' => true,
        'menu_position' => 5,
        'has_archive' => false,
        'rewrite' => ['slug' => 'in-evidenza/evento'],
        // title > wp default; date + time > custom (not here); short desc > custom; long desc > default ('editor'); featured img > default ('thumbnail'); event link > custom (might not need)
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'autosave'], // added excerpt for short desc
        'menu_icon' => 'dashicons-calendar',
        'show_in_rest' => true
    );
    register_post_type('event', $args);
}

add_action('init', 'register_event_post_type');

function event_add_meta_boxes()
{
    add_meta_box(
        "event_details",
        'Dettagli sull\'evento',
        'event_meta_box_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'event_add_meta_boxes');


function event_meta_box_callback($post)
{
    wp_nonce_field('event_save_meta', 'event_meta_nonce');

    $date_from = get_post_meta($post->ID, '_event_date_from', true);
    $date_to = get_post_meta($post->ID, '_event_date_to', true);
    $time_from = get_post_meta($post->ID, '_event_time_from', true);
    $time_to = get_post_meta($post->ID, '_event_time_to', true);
    $tba = get_post_meta($post->ID, '_event_date_tba', true);
    $only_has_graphic = get_post_meta($post->ID, 'only_has_graphic', true);
    $in_evidenza = get_post_meta($post->ID, 'in_evidenza', true);
    ?>
    <!-- solo grafica = event only has a graphic for now (might have other content later) -->
    <p>
        <label>
            <input type="checkbox" name="only_has_graphic" value="1" <?php checked($only_has_graphic, 1); ?>>
            <strong>Solo grafica</strong>
        </label>
    </p>
    <p>
        <label>
            <input type="checkbox" name="in_evidenza" value="1" <?php checked($in_evidenza, 1); ?>>
            <strong>In evidenza</strong>
        </label>
    </p>
    <p>
        <label for="event_date_tba"><strong>Data da annunciare</strong></label>
        <input type="checkbox" name="event_date_tba" id="event_date_tba" value="1" <?php checked($tba, '1'); ?>>

    </p>
    <p>
        <label for="event_date_from"><strong>Da (o solo questa data): </strong></label><br>
        <input type="date" name="event_date_from" id="event_date_from" value="<?php echo esc_attr($date_from); ?>"
            style="width:100%">
    </p>
    <p>
        <label for="event_date_to"><strong>Fino a: </strong></label><br>
        <input type="date" name="event_date_to" id="event_date_to" value="<?php echo esc_attr($date_to); ?>"
            style="width:100%">
    </p>
    <p>
        <label for="event_time_from"><strong>Ora (da)</strong></label><br>
        <input type="time" name="event_time_from" id="event_time_from" value="<?php echo esc_attr($time_from); ?>"
            style="width:100%">
    </p>
    <p>
        <label for="event_time_to"><strong>Ora (fino a)</strong></label><br>
        <input type="time" name="event_time_to" id="event_time_to" value="<?php echo esc_attr($time_to); ?>"
            style="width:100%">
    </p>
    <?php
}

function event_save_meta_boxes($post_id)
{
    if (
        !isset($_POST['event_meta_nonce']) ||
        !wp_verify_nonce($_POST['event_meta_nonce'], 'event_save_meta')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (get_post_type($post_id) !== 'event') {
        return;
    }

    if (isset($_POST['only_has_graphic'])) {
        update_post_meta($post_id, 'only_has_graphic', '1');
    } else {
        update_post_meta($post_id, 'only_has_graphic', '0');
    }

    if (isset($_POST['in_evidenza'])) {
        update_post_meta($post_id, 'in_evidenza', 1);
    } else {
        update_post_meta($post_id, 'in_evidenza', 0);
    }

    if (isset($_POST['event_date_from'])) {
        update_post_meta($post_id, '_event_date_from', sanitize_text_field($_POST['event_date_from']));
    }

    if (isset($_POST['event_date_to'])) {
        update_post_meta($post_id, '_event_date_to', sanitize_text_field($_POST['event_date_to']));
    }

    if (isset($_POST['event_time_from'])) {
        update_post_meta($post_id, '_event_time_from', sanitize_text_field($_POST['event_time_from']));
    }

    if (isset($_POST['event_time_to'])) {
        update_post_meta($post_id, '_event_time_to', sanitize_text_field($_POST['event_time_to']));
    }

    if (isset($_POST['event_date_tba'])) {
        update_post_meta($post_id, '_event_date_tba', 1);
    } else {
        delete_post_meta($post_id, '_event_date_tba');
    }

}
add_action('save_post', 'event_save_meta_boxes');