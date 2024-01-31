<?php

/**
 * Register a custom post type called "game".
 *
 * @see get_post_type_labels() for label keys.
 */
function mp_game_cpt() {
	$labels = array(
		'name'                  => _x( 'Games', 'Post type general name', 'softuni' ),
		'singular_name'         => _x( 'Game', 'Post type singular name', 'softuni' ),
		'menu_name'             => _x( 'Games', 'Admin Menu text', 'softuni' ),
		'name_admin_bar'        => _x( 'Game', 'Add New on Toolbar', 'softuni' ),
		'add_new'               => __( 'Add New', 'softuni' ),
		'add_new_item'          => __( 'Add New Game', 'softuni' ),
		'new_item'              => __( 'New Game', 'softuni' ),
		'edit_item'             => __( 'Edit Game', 'softuni' ),
		'view_item'             => __( 'View Game', 'softuni' ),
		'all_items'             => __( 'All Games', 'softuni' ),
		'search_items'          => __( 'Search Games', 'softuni' ),
		'parent_item_colon'     => __( 'Parent Games:', 'softuni' ),
		'not_found'             => __( 'No Games found.', 'softuni' ),
		'not_found_in_trash'    => __( 'No Games found in Trash.', 'softuni' ),
		'featured_image'        => _x( 'Game Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'softuni' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'softuni' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'softuni' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'softuni' ),
		'archives'              => _x( 'Game archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'softuni' ),
		'insert_into_item'      => _x( 'Insert into Game', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'softuni' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this game', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'softuni' ),
		'filter_items_list'     => _x( 'Filter games list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'softuni' ),
		'items_list_navigation' => _x( 'Games list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'softuni' ),
		'items_list'            => _x( 'Games list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'softuni' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'game' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 2,
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-games',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions' ),
	);

	register_post_type( 'game', $args );
}

add_action( 'init', 'mp_game_cpt' );



/**
 * Register a 'genre' taxonomy for post type 'games'.
 */
function mp_game_genre_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Genres', 'textdomain' ),
		'popular_items'              => __( 'Popular Genres', 'textdomain' ),
		'all_items'                  => __( 'All Genres', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Genre', 'textdomain' ),
		'update_item'                => __( 'Update Genre', 'textdomain' ),
		'add_new_item'               => __( 'Add New Genre', 'textdomain' ),
		'new_item_name'              => __( 'New Genre Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate genres with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove genres', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used genres', 'textdomain' ),
		'not_found'                  => __( 'No genres found.', 'textdomain' ),
		'menu_name'                  => __( 'Genres', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => true,
		'show_in_rest'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', 'game', $args );
}
add_action( 'init', 'mp_game_genre_taxonomy', 0 );
