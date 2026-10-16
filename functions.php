<?php
function register_doctors_custom_post_type() {
    $args = array(
        'labels'      => array('name' => 'Doctors', 'singular_name' => 'Doctor'),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-businessman',
        'supports'    => array('title', 'editor', 'thumbnail'),
        'rewrite'     => array('slug' => 'doctors'), 
        'show_in_rest' => true,
    );
    register_post_type('doctor', $args);
}
add_action('init', 'register_doctors_custom_post_type');
function clinicflow_enqueue_styles() {
    wp_enqueue_style('clinicflow-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'clinicflow_enqueue_styles');