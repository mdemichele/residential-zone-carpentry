<?php

// Create 'Completion Date' metabox
function rzc_create_completion_meta_box() {
	add_meta_box( 'rzc_completion_metabox', 'Completion Date', 'rzc_create_completion_metabox', 'projects', 'normal', 'high');
}

function rzc_completion_metabox($post) {
	echo 'This is where the completion date will be input';
}

function rzc_create_completion_metabox( $post ) {
	?>
	<form action="" method="post">
	<?php // add nonce for security
	wp_nonce_field( 'rzc_metabox_nonce', 'rzc_nonce' );
	// retrieve the metadata values if they exist 
	$rzc_completion_date = get_post_meta( $post->ID, 'Completion Date', true ); ?>
	<label for "rzc_completion_date">Completion Date</label>
	<input type="text" name="rzc_completion_date" value="<?php echo esc_attr( $rzc_completion_date ); ?>" />
	<?php
}

function rzc_save_completion_meta( $post_id ) {
	// if nonce isn't verified, prevent saving 
	if( !isset( $POST['rzc_nonce'] )  || 
		!wp_verify_nonce( $_POST['rzc_nonce'],
		'rzc_metabox_nonce' ) ) return;
	if ( isset( $POST['rzc_completion_date'] ) ) {
		$new_completion_value = ( $POST['rzc_completion_date'] );
		update_post_meta( $post_id , 'Completion Date', $new_completion_value );
	}
}

add_action( 'save_post', 'rzc_save_completion_meta' );
add_action( 'add_meta_boxes', 'rzc_create_completion_meta_box' );

// Register Custom Post Type
function rzc_projects() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Project', 'text_domain' ),
		'archives'              => __( 'Project Archives', 'text_domain' ),
		'attributes'            => __( 'Project Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Projects', 'text_domain' ),
		'add_new_item'          => __( 'Add New Project', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Project', 'text_domain' ),
		'edit_item'             => __( 'Edit Project', 'text_domain' ),
		'update_item'           => __( 'Update Project', 'text_domain' ),
		'view_item'             => __( 'View Project', 'text_domain' ),
		'view_items'            => __( 'View Projects', 'text_domain' ),
		'search_items'          => __( 'Search Project', 'text_domain' ),
		'not_found'             => __( 'Project Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Project Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Project', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'text_domain' ),
		'items_list'            => __( 'Projects list', 'text_domain' ),
		'items_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Projects list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'description'           => __( 'Projects', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'							=> 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'projects',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'rzc_projects', 0 );
