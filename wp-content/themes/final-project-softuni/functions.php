<?php

/**
 * adding dynamic version to the scripts
 */
function get_file_version( $file_path ) {
	return filemtime( $file_path );
}

/**
 * Loading all scripts scripts
 */
function final_project_softuni_assets( $hook ) {
	$args = array(
		'in_footer' => true,
		'strategy'  => 'defer',
	);

	$script_files = array(
		'jquery.min.js'    => '/vendor/jquery/jquery.min.js',
		'bootstrap.min.js' => '/vendor/bootstrap/js/bootstrap.min.js',
		'isotope.min.js'   => '/assets/js/isotope.min.js',
		'owl-carousel.js'  => '/assets/js/owl-carousel.js',
		'counter.js'       => '/assets/js/counter.js',
		'custom.js'        => '/assets/js/custom.js',
	);

	$style_files = array(
		'bootstrap.min.css' => '/vendor/bootstrap/css/bootstrap.min.css',
		'fontawesome.css'   => '/assets/css/fontawesome.css',
		'main.css'          => '/assets/css/templatemo-lugx-gaming.css',
		'owl.css'           => '/assets/css/owl.css',
		'animate.css'       => '/assets/css/animate.css',
		'swiper-bundle.css' => 'https://unpkg.com/swiper@7/swiper-bundle.min.css',
	);

	foreach ( $script_files as $handle => $file_path ) {
		$version = get_file_version( get_template_directory() . $file_path );
		wp_enqueue_script( $handle, get_template_directory_uri() . $file_path, array(), $version, $args );
	}

	foreach ( $style_files as $handle => $file_path ) {
		if ( strpos( $file_path, 'http' ) === 0 || strpos( $file_path, 'https' ) === 0 ) {
			// For external stylesheets, use wp_register_style and wp_enqueue_style
			wp_register_style( $handle, $file_path, false, '1.0.0' );
			wp_enqueue_style( $handle );
		} else {
			// For local stylesheets, use filemtime to dynamically generate version
			$version = get_file_version( get_template_directory() . $file_path );
			wp_enqueue_style( $handle, get_template_directory_uri() . $file_path, false, $version );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'final_project_softuni_assets' );

/**
 * Include the file containing custom theme options
 */
require_once get_template_directory() . '/custom-theme-options.php';

/**
 * adding theme support for featured image
 */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 999, true ); // default Featured Image dimensions (cropped)
}


/**
 * adding link to all featured images
 */
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
function my_post_image_html( $html, $post_id, $post_image_id ) {

	$html = '<a href="' . get_permalink( $post_id ) . '">' . $html . '</a>';
	return $html;
}

/**
 * adding menu support to the theme
 */
function final_project_menu_register() {
	register_nav_menus(
		array(
			'primary_menu' => __( 'Primary Menu', 'softuni' ),
		)
	);
}
add_action( 'after_setup_theme', 'final_project_menu_register' );


/**
 * add class to the active anchor of the menu
 */
function add_active_class_to_menu_link( $atts, $item ) {
	// Ensure the 'class' key exists in $atts
	if ( ! isset( $atts['class'] ) ) {
		$atts['class'] = '';
	}

	// Check if the current menu item is the active one
	if ( in_array( 'current-menu-item', $item->classes ) || in_array( 'current_page_item', $item->classes ) ) {
		// Add the 'active' class to the existing classes
		$atts['class'] .= ' active';
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_active_class_to_menu_link', 10, 3 );

/**
 * register sidebar for copyright
 */
function register_copyright_sidebar() {
	register_sidebar(
		array(
			'id'            => 'copyright',
			'name'          => __( 'Copyright' ),
			'description'   => __( 'This is the copyright sidebar' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'register_copyright_sidebar' );



/**
 *  Add the ajax actions for options page
 */
add_action( 'wp_ajax_import_required_pages', 'import_required_pages' );

/**
 * function that imports the required pages from the theme options
 */
function import_required_pages() {
	// Define an array of page data
	$pages = array(
		array(
			'title'    => 'Home', // Page title
			'template' => 'templates/home.php', // Template file name
		),
		array(
			'title'    => 'Contact',
			'template' => 'templates/contact.php',
		),
		array(
			'title'    => 'Blog',
			'template' => 'templates/blog.php',
		),
		array(
			'title'    => 'Related posts',
			'template' => 'templates/related-posts.php',
		),
		array(
			'title'    => 'Related games',
			'template' => 'templates/related-games.php',
		),
	);

	// Loop through each page and create it
	foreach ( $pages as $page ) {
		// Query to check if the page already exists
		$page_query = new WP_Query(
			array(
				'post_type'      => 'page',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
				'title'          => $page['title'],
			)
		);

		// Check if the page doesn't already exist
		if ( ! $page_query->have_posts() ) {
			// Insert the page
			$page_id = wp_insert_post(
				array(
					'post_title'  => $page['title'],
					'post_type'   => 'page',
					'post_status' => 'publish',
				)
			);

			// Assign the template to the page
			if ( $page_id && ! empty( $page['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page['template'] );
			}
		}

			// Reset the query
			wp_reset_postdata();
	}
}


function enqueue_import_page_ajax_script( $hook ) {
	// Load only on ?page=custom+theme
	if ( $hook != 'toplevel_page_customtheme' ) {
		return;
	}

	$script_url     = get_template_directory_uri() . '/assets/js/import-pages-ajax.js';
	$script_version = filemtime( get_template_directory() . '/assets/js/import-pages-ajax.js' ); // Get file modification time as version

	wp_enqueue_script( 'ajax-script', $script_url, array( 'jquery' ), $script_version, true );

	wp_localize_script(
		'ajax-script',
		'custom_ajax_object',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'import_required_pages_nonce' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'enqueue_import_page_ajax_script' );


/**
 * Add styling to the options page
 */
function load_custom_wp_admin_style( $hook ) {
	// Load only on ?page=custom+theme
	if ( $hook != 'toplevel_page_customtheme' ) {
		return;
	}

	$style_version = filemtime( get_template_directory() . '/assets/css/options-page.css' ); // Get file modification time as version

	wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/options-page.css', array(), $style_version );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );




/**
 * add the actions for load more function
 */
add_action( 'wp_ajax_load_more_games', 'load_more_games' );
add_action( 'wp_ajax_nopriv_load_more_games', 'load_more_games' );

/**
 * register the query for the ajax function
 */
function load_more_games() {
	$page = isset( $_POST['page'] ) ? $_POST['page'] : 1; // Get the current page number

	$args = array(
		'post_type'      => 'game',
		'posts_per_page' => 6,
		'paged'          => $page,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			get_template_part( 'template-parts/games-cards', 'games-cards' );
		endwhile;
		wp_reset_postdata();

		// Check if there are more pages
		$next_page  = $page + 1;
		$next_query = new WP_Query(
			array(
				'post_type'      => 'game',
				'posts_per_page' => 6,
				'paged'          => $next_page,
			)
		);

		if ( $next_query->have_posts() ) {
			// Set header indicating more posts
			header( 'Has-More-Posts: true' );
		} else {
			// Set header indicating no more posts
			header( 'Has-More-Posts: false' );
		}
	endif;

	wp_die();
}



/**
 * Enque the load more ajax script
 */
function enqueue_load_more_script() {
	$script_url     = get_template_directory() . '/assets/js/load-more.js';
	$script_version = filemtime( $script_url ); // Get file modification time as version

	wp_enqueue_script( 'load-more-script', get_template_directory_uri() . '/assets/js/load-more.js', array(), $script_version, true );
	wp_localize_script(
		'load-more-script',
		'load_more_data',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'enqueue_load_more_script' );
