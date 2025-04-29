<?php
if (!defined('ABSPATH'))
    exit;

function register_artist_post_type()
{
    $labels = array(
        'name' => ('Artisti'),
        'singular_name' => ('Artista'),
        'menu_name' => 'Artisti',
        'add_new_item' => 'Aggiungi Nuova Artista',
        'edit_item' => 'Modifica Artista',
        'new_item' => 'Nuova Artista',
        'view_items' => 'Visualizza Artisti'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Visualizzare, aggiungere, modificare, eliminare artisti',
        'public' => true,
        'menu_position' => 6,
        'has_archive' => true,
        'rewrite' => ['slug' => 'artisti'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'autosave'],
        'menu_icon' => 'dashicons-art',
        'show-in-rest' => true,
    );
    register_post_type('artist', $args);
}
add_action('init', 'register_artist_post_type');
