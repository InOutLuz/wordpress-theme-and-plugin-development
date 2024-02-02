<?php

/**
 * Add the top level menu page.
 */
function custom_theme_options_page() {
	add_menu_page(
		'Custom Theme Options',
		'Custom Theme Options',
		'manage_options',
		'customtheme',
		'custom_theme_options_page_html',
		'dashicons-smiley',
		1
	);
}


/**
 * Register our wporg_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'custom_theme_options_page' );


/**
 * Top level menu callback function
 */
function custom_theme_options_page_html() {
	// Check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Retrieve current option values
	$options = get_option( 'custom_hero_titles' );
	if ( ! is_array( $options ) ) {
		$options = array(
			'custom_title'       => '',
			'custom_subtitle'    => '',
			'custom_description' => '',
		);
	}

	// Handle form submission
	if ( ! empty( $_POST['title_save'] ) ) {
		// Sanitize and update options
		$options['custom_title']       = isset( $_POST['custom_title'] ) ? sanitize_text_field( $_POST['custom_title'] ) : '';
		$options['custom_subtitle']    = isset( $_POST['custom_subtitle'] ) ? sanitize_text_field( $_POST['custom_subtitle'] ) : '';
		$options['custom_description'] = isset( $_POST['custom_description'] ) ? sanitize_text_field( $_POST['custom_description'] ) : '';

		update_option( 'custom_hero_titles', $options );
	}

	// Assign values for display
	$custom_title       = $options['custom_title'];
	$custom_subtitle    = $options['custom_subtitle'];
	$custom_description = $options['custom_description'];
	?>
	
	<div class="settings-wrap">
		<h1>
		<?php echo esc_html( get_admin_page_title() ); ?>
		</h1>
		<br><br>
		<hr>
		
		<div class="option-item">
			<p>Import the required pages to use the theme templates.</p>
			<p class="important-note">NOTE: Please make sure you don't have any pages named Home, Blog, Contact, Related Games, Related Posts or change their names first otherwise this function won't work.</p>
			<button id="import-pages-button" class="button button-secondary">Import Required Pages</button>
		</div>
		<hr>
		<br>
		<h2>Hero section custom titles</h2>
		<p>Leave empty for default titles</p>
		<hr>
		<br>
		<form action="" method="post">
			<div class="option-item">
				<label for="custom_title">Custom Title</label>
				<input type="text" id="custom_title" name="custom_title" value="<?php echo esc_attr( $custom_title ); ?>">
			</div>
			<div class="option-item">
				<label for="custom_subtitle">Custom Subtitle</label>
				<input type="text" id="custom_subtitle" name="custom_subtitle" value="<?php echo esc_attr( $custom_subtitle ); ?>">
			</div>
			<div class="option-item">
				<label for="custom_description">Custom Description</label>
				<textarea id="custom_description" name="custom_description"><?php echo esc_textarea( $custom_description ); ?></textarea>
			</div>
			<div class="option-item">
				<input type="submit" class="button button-primary" value="Update Titles">
			</div>
			<input type="hidden" name="title_save" value="1">
		</form>
	</div>




	<?php
}



/**
 *  Add the ajax actions
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
