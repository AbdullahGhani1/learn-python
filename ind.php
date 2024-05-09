<?php

// Register Custom Post Type Sponsor
function create_sponsor_cpt()
{

    $labels = array(
        'name' => _x('Sponsors', 'Post Type General Name', 'helo-elementor'),
        'singular_name' => _x('Sponsor', 'Post Type Singular Name', 'helo-elementor'),
        'menu_name' => _x('Sponsors', 'Admin Menu text', 'helo-elementor'),
        'name_admin_bar' => _x('Sponsor', 'Add New on Toolbar', 'helo-elementor'),
        'archives' => __('Sponsor Archives', 'helo-elementor'),
        'attributes' => __('Sponsor Attributes', 'helo-elementor'),
        'parent_item_colon' => __('Parent Sponsor:', 'helo-elementor'),
        'all_items' => __('All Sponsors', 'helo-elementor'),
        'add_new_item' => __('Add New Sponsor', 'helo-elementor'),
        'add_new' => __('Add New', 'helo-elementor'),
        'new_item' => __('New Sponsor', 'helo-elementor'),
        'edit_item' => __('Edit Sponsor', 'helo-elementor'),
        'update_item' => __('Update Sponsor', 'helo-elementor'),
        'view_item' => __('View Sponsor', 'helo-elementor'),
        'view_items' => __('View Sponsors', 'helo-elementor'),
        'search_items' => __('Search Sponsor', 'helo-elementor'),
        'not_found' => __('Not found', 'helo-elementor'),
        'not_found_in_trash' => __('Not found in Trash', 'helo-elementor'),
        'featured_image' => __('Featured Image', 'helo-elementor'),
        'set_featured_image' => __('Set featured image', 'helo-elementor'),
        'remove_featured_image' => __('Remove featured image', 'helo-elementor'),
        'use_featured_image' => __('Use as featured image', 'helo-elementor'),
        'insert_into_item' => __('Insert into Sponsor', 'helo-elementor'),
        'uploaded_to_this_item' => __('Uploaded to this Sponsor', 'helo-elementor'),
        'items_list' => __('Sponsors list', 'helo-elementor'),
        'items_list_navigation' => __('Sponsors list navigation', 'helo-elementor'),
        'filter_items_list' => __('Filter Sponsors list', 'helo-elementor'),


    );
    $args = array(

        'label' => __('Sponsor', 'helo-elementor'),
        'description' => __('Custom Post Type for Sponsors', 'helo-elementor'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('sponsor_category', 'tag'), // Change to your custom taxonomy
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('sponsor', $args);
}
add_action('init', 'create_sponsor_cpt', 0);

// Add a meta box for the sponsor URL
function add_sponsor_url_meta_box()
{
    add_meta_box(
        'sponsor_url_meta_box', // ID
        'Sponsor URL', // Title
        'sponsor_url_meta_box_callback', // Callback function
        'sponsor', // Post type
        'side', // Context
        'default' // Priority
    );
}
add_action('add_meta_boxes', 'add_sponsor_url_meta_box');

function sponsor_url_meta_box_callback($post)
{
    // Use nonce for verification
    wp_nonce_field('sponsor_url_meta_box', 'sponsor_url_meta_box_nonce');
    // Get the current value if it exists
    $value = get_post_meta($post->ID, '_sponsor_url', true);
    // Echo out the field
    echo '<label for="sponsor_url_field">URL:</label>';
    echo '<input type="text" id="sponsor_url_field" name="sponsor_url_field" value="' . esc_attr($value) . '" size="25" />';
}

// Save the meta box data
function save_sponsor_url_meta_box_data($post_id)
{
    // Check if nonce is set and verify that the nonce is valid
    if (!isset($_POST['sponsor_url_meta_box_nonce']) || !wp_verify_nonce($_POST['sponsor_url_meta_box_nonce'], 'sponsor_url_meta_box')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions
    if (isset($_POST['post_type']) && 'sponsor' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    } else {
        return;
    }

    // Make sure that it is set
    if (!isset($_POST['sponsor_url_field'])) {
        return;
    }

    // Sanitize and save the input
    $my_data = sanitize_text_field($_POST['sponsor_url_field']);
    update_post_meta($post_id, '_sponsor_url', $my_data);
}
add_action('save_post', 'save_sponsor_url_meta_box_data');

// Optionally, handle the redirection or custom link output in your theme or a template file

function create_sponsor_taxonomy()
{
    $labels = array(
        'name' => _x('Sponsor Categories', 'taxonomy general name'),
        'singular_name' => _x('Sponsor Category', 'taxonomy singular name'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('sponsor_category', array('sponsor'), $args);
}
add_action('init', 'create_sponsor_taxonomy');
