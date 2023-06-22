<?php
function create_business_post_type()
{
    $labels = array(
        'name' => 'Businesses',
        'singular_name' => 'Business',
        'menu_name' => 'Businesses',
        'name_admin_bar' => 'Business',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Business',
        'new_item' => 'New Business',
        'edit_item' => 'Edit Business',
        'view_item' => 'View Business',
        'all_items' => 'All Businesses',
        'search_items' => 'Search Businesses',
        'parent_item_colon' => 'Parent Businesses:',
        'not_found' => 'No businesses found.',
        'not_found_in_trash' => 'No businesses found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'business'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'excerpt'), // Removed 'editor' from the supports array
        'taxonomies' => array('category')
    );

    register_post_type('business', $args);
}
add_action('init', 'create_business_post_type');





function theme_setup()
{
    register_nav_menu('primary', 'Primary Menu');
}
add_action('after_setup_theme', 'theme_setup');

function modify_search_query($query)
{
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('post', 'business'));
    }
    return $query;
}
add_filter('pre_get_posts', 'modify_search_query');

add_theme_support('custom-logo');


function my_theme_enqueue_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
  
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.5.0', true);
  }
  
  add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


  





?>