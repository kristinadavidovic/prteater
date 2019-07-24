<?php
/**
 * Add custom post types
 *
 * Currently added:
 * - Section
 * - Program
 * - Organizers
 * - Sponsors
 *
 * @package prteater
 */


 /*
 * Custom post type SECTION
 */

 function custom_post_type_section() {
// Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Page sections', 'Post Type General Name', 'prteater' ),
    'singular_name'       => _x( 'Page section', 'Post Type Singular Name', 'prteater' ),
    'menu_name'           => __( 'Page sections', 'prteater' ),
    'all_items'           => __( 'All sections', 'prteater' ),
    'view_item'           => __( 'View section', 'prteater' ),
    'add_new_item'        => __( 'Add New Page section', 'prteater' ),
    'add_new'             => __( 'Add New', 'prteater' ),
    'edit_item'           => __( 'Edit Page section', 'prteater' ),
    'update_item'         => __( 'Update Page section', 'prteater' ),
    'search_items'        => __( 'Search Page section', 'prteater' ),
    'not_found'           => __( 'Not Found', 'prteater' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'prteater' ),
  );

  // Set other options for Custom Post Type
  $args = array(
    'label'               => __( 'page-section', 'prteater' ),
    'description'         => __( 'Page sections on the frontpage', 'prteater' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),

    'taxonomies'          => array( 'year' ),

    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 9,
    'menu_icon'           => 'dashicons-editor-kitchensink',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  register_post_type( 'page-sections', $args );
}

add_action( 'init', 'custom_post_type_section', 0 );

/*
* Custom post type PROGRAM
*/

function custom_post_type_program() {
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Program', 'Post Type General Name', 'prteater' ),
    'singular_name'       => _x( 'Program', 'Post Type Singular Name', 'prteater' ),
    'menu_name'           => __( 'Program', 'prteater' ),
    'all_items'           => __( 'All program', 'prteater' ),
    'view_item'           => __( 'View program', 'prteater' ),
    'add_new_item'        => __( 'Add New Program', 'prteater' ),
    'add_new'             => __( 'Add New', 'prteater' ),
    'edit_item'           => __( 'Edit Program', 'prteater' ),
    'update_item'         => __( 'Update Program', 'prteater' ),
    'search_items'        => __( 'Search Program', 'prteater' ),
    'not_found'           => __( 'Not Found', 'prteater' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'prteater' ),
  );

  // Set other options for Custom Post Type
  $args = array(
    'label'               => __( 'program', 'prteater' ),
    'description'         => __( 'Program at a confrence', 'prteater' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
    'taxonomies'          => array( 'part-of-program' ),

    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-welcome-widgets-menus',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  register_post_type( 'program', $args );
}

add_action( 'init', 'custom_post_type_program', 0 );

/*
* Custom post type ORGANIZERS
*/

function custom_post_type_organizers() {
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Organizers', 'Post Type General Name', 'prteater' ),
    'singular_name'       => _x( 'Organizer', 'Post Type Singular Name', 'prteater' ),
    'menu_name'           => __( 'Organizers', 'prteater' ),
    'all_items'           => __( 'All organizers', 'prteater' ),
    'view_item'           => __( 'View organizer', 'prteater' ),
    'add_new_item'        => __( 'Add New Organizer', 'prteater' ),
    'add_new'             => __( 'Add New', 'prteater' ),
    'edit_item'           => __( 'Edit Organizer', 'prteater' ),
    'update_item'         => __( 'Update Organizer', 'prteater' ),
    'search_items'        => __( 'Search Organizer', 'prteater' ),
    'not_found'           => __( 'Not Found', 'prteater' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'prteater' ),
  );

  // Set other options for Custom Post Type
  $args = array(
    'label'               => __( 'organizers', 'prteater' ),
    'description'         => __( 'Organizers at a confrence', 'prteater' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', 'custom-fields', ),

    'taxonomies'          => array( 'position' ),

    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-groups',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  register_post_type( 'organizers', $args );
}

add_action( 'init', 'custom_post_type_organizers', 0 );

/*
* Custom post type SPONSORS
*/

function custom_post_type_sponsors() {
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Sponsors', 'Post Type General Name', 'prteater' ),
    'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'prteater' ),
    'menu_name'           => __( 'Sponsors', 'prteater' ),
    'all_items'           => __( 'All sponsors', 'prteater' ),
    'view_item'           => __( 'View Sponsor', 'prteater' ),
    'add_new_item'        => __( 'Add New Sponsors', 'prteater' ),
    'add_new'             => __( 'Add New', 'prteater' ),
    'edit_item'           => __( 'Edit Sponsor', 'prteater' ),
    'update_item'         => __( 'Update Sponsor', 'prteater' ),
    'search_items'        => __( 'Search Sponsor', 'prteater' ),
    'not_found'           => __( 'Not Found', 'prteater' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'prteater' ),
  );

  // Set other options for Custom Post Type
  $args = array(
    'label'               => __( 'sponsors', 'prteater' ),
    'description'         => __( 'Sponsors for the confrence', 'prteater' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
    'taxonomies'          => array( '' ),

    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-format-gallery',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  register_post_type( 'sponsors', $args );
}

add_action( 'init', 'custom_post_type_sponsors', 0 );
