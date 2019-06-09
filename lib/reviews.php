<?php

// Register Custom Post Type
function rzc_reviews() {

	$labels = array(
		'name'                  => _x( 'Reviews', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Reviews', 'text_domain' ),
		'name_admin_bar'        => __( 'Review', 'text_domain' ),
		'archives'              => __( 'Reviews Archives', 'text_domain' ),
		'attributes'            => __( 'Review Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Reviews', 'text_domain' ),
		'add_new_item'          => __( 'Add New Review', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Review', 'text_domain' ),
		'edit_item'             => __( 'Edit Review', 'text_domain' ),
		'update_item'           => __( 'Update Review', 'text_domain' ),
		'view_item'             => __( 'View Review', 'text_domain' ),
		'view_items'            => __( 'View Reviews', 'text_domain' ),
		'search_items'          => __( 'Search Reviews', 'text_domain' ),
		'not_found'             => __( 'Review Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Review Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Review', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Review', 'text_domain' ),
		'items_list'            => __( 'Reviews list', 'text_domain' ),
		'items_list_navigation' => __( 'Reviews list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Reviews list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Review', 'text_domain' ),
		'description'           => __( 'Reviews', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'							=> 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'reviews', $args );

}
add_action( 'init', 'rzc_reviews', 0 );
