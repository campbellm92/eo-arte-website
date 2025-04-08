<?php
if (!defined('ABSPATH'))
    exit;

function register_workshop_post_type()
{
    $labels = array(
        'name' => ('Workshop'),
        'singular_name' => ('Workshop'),
        'menu_name' => 'Workshop',
        'add_new_item' => 'Aggiungi Nuovo Workshop',
        'edit_item' => 'Modifica Workshop',
        'new_item' => 'Nuovo Workshop',
        'view_items' => 'Visualizza Workshop'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Visualizzare, aggiungere, modificare, eliminare workshop',
        'public' => true,
        'menu_position' => 2,
        'has_archive' => true,
        'rewrite' => ['slug' => 'workshops'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'autosave'],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_rest' => true
    );
    register_post_type('workshop', $args);
}

add_action('init', 'register_workshop_post_type');

function workshop_add_meta_boxes()
{
    add_meta_box(
        "workshop_details",
        'Dettagli sul workshop',
        'workshop_meta_box_callback',
        'workshop',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'workshop_add_meta_boxes');


function workshop_meta_box_callback($post)
{
    $date_from = get_post_meta($post->ID, '_workshop_date_from', true);
    $date_to = get_post_meta($post->ID, '_workshop_date_to', true);
    $time_from = get_post_meta($post->ID, '_workshop_time_from', true);
    $time_to = get_post_meta($post->ID, '_workshop_time_to', true);
    $tba = get_post_meta($post->ID, '_workshop_date_tba', true);
    $selected_days = get_post_meta($post->ID, '_workshop_days', true);
    if (!is_array($selected_days)) {
        $selected_days = [];
    }
    $days = ['lunedì', 'martedì', 'mercoledì', 'giovedì', 'venerdì', 'sabato', 'domenica'];
    ?>
    <p>
        <input type="checkbox" name="workshop_date_tba" id="workshop_date_tba" value="1" <?php checked($tba, '1'); ?>>
        <label for="workshop_date_tba"><strong>Data da annunciare (TBA)</strong></label>
    </p>
    <p>
        <label for="workshop_date_from"><strong>Da (o solo): </strong></label><br>
        <input type="date" name="workshop_date_from" id="workshop_date_from" value="<?php echo esc_attr($date_from); ?>"
            style="width:100%">
    </p>
    <p>
        <label for="workshop_date_to"><strong>Fino a: </strong></label><br>
        <input type="date" name="workshop_date_to" id="workshop_date_to" value="<?php echo esc_attr($date_to); ?>"
            style="width:100%">
    </p>
    <p>
        <label for="workshop_time_from"><strong>Ora (da)</strong></label><br>
        <input type="time" name="workshop_time_from" id="workshop_date_from" value="<?php echo esc_attr($time_from); ?>"
            style="width:100%">
    </p>
    <p>
        <label for="workshop_time_to"><strong>Ora (fino a)</strong></label><br>
        <input type="time" name="workshop_time_to" id="workshop_time_to" value="<?php echo esc_attr($time_to); ?>"
            style="width:100%">
    </p>
    <p><strong>Giorni di workshop</strong>
    <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
        <?php foreach ($days as $day): ?>
            <label>
                <input type="checkbox" name="workshop_days[]" value="<?php echo esc_attr($day); ?>" <?php checked(in_array($day, $selected_days)); ?>>
                <?php echo esc_html(ucfirst($day)); ?>
            </label>
        <?php endforeach; ?>
        </p>
        <?php
}

function workshop_save_meta_boxes($post_id)
{
    if (isset($_POST['workshop_date_from'])) {
        update_post_meta($post_id, '_workshop_date_from', sanitize_text_field($_POST['workshop_date_from']));
    }

    if (isset($_POST['workshop_date_to'])) {
        update_post_meta($post_id, '_workshop_date_to', sanitize_text_field($_POST['workshop_date_to']));
    }

    if (isset($_POST['workshop_time_from'])) {
        update_post_meta($post_id, '_workshop_time_from', sanitize_text_field($_POST['workshop_time_from']));
    }

    if (isset($_POST['workshop_time_to'])) {
        update_post_meta($post_id, '_workshop_time_to', sanitize_text_field($_POST['workshop_time_to']));
    }

    if (isset($_POST['workshop_date_tba'])) {
        update_post_meta($post_id, '_workshop_date_tba', 1);
    } else {
        delete_post_meta($post_id, '_workshop_date_tba');
    }
    if (isset($_POST['workshop_days']) && is_array($_POST['workshop_days'])) {
        $days = array_map('sanitize_text_field', $_POST['workshop_days']);
        update_post_meta($post_id, '_workshop_days', $days);
    } else {
        delete_post_meta($post_id, '_workshop_days');
    }

}
add_action('save_post', 'workshop_save_meta_boxes');
