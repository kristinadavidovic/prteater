<?php
/**
 * Add custom taxonomies
 *
 * Currently added:
 * - Positions (for Organizers)
 * - Part of program (for Program)
 * -
 * -
 *
 * @package prteater
 */

 /*
 * Custom taxonomy Positions
 * Linked to Organizers
 */

 add_action( 'init', 'create_positions_hierarchical_taxonomy', 0 );

function create_positions_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Positions', 'taxonomy general name' ),
    'singular_name' => _x( 'Position', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Positions' ),
    'all_items' => __( 'All positions' ),
    'parent_item' => __( 'Parent Position' ),
    'parent_item_colon' => __( 'Parent Position:' ),
    'edit_item' => __( 'Edit Position' ),
    'update_item' => __( 'Update Position' ),
    'add_new_item' => __( 'Add New Position' ),
    'new_item_name' => __( 'New Topic Position' ),
    'menu_name' => __( 'Positions' ),
  );

  // Now register the taxonomy
  register_taxonomy('position', array('organizers'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'position' ),
  ));
}

/*
* Custom taxonomy Part of Program
* Linked to Program
*/

add_action( 'init', 'create_partof_program_hierarchical_taxonomy', 0 );

function create_partof_program_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Part of program', 'taxonomy general name' ),
    'singular_name' => _x( 'Part of program', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Part of program' ),
    'all_items' => __( 'All parts' ),
    'parent_item' => __( 'Parent Part of program' ),
    'parent_item_colon' => __( 'Parent Part of program:' ),
    'edit_item' => __( 'Edit Part of program' ),
    'update_item' => __( 'Update Part of program' ),
    'add_new_item' => __( 'Add New Part of program' ),
    'new_item_name' => __( 'New Topic Part of program' ),
    'menu_name' => __( 'Part of program' ),
  );

  // Now register the taxonomy
  register_taxonomy('part-of-program', array('program'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'part-of-program' ),
  ));
}
