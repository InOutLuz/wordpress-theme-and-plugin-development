<?php

/**
 * register sidebar for under copyright
 */
function register_under_copyright_sidebar() {
	register_sidebar(
		array(
			'id'            => 'under-copyright',
			'name'          => __( 'Under Copyright' ),
			'description'   => __( 'This is the sidebar under the copyright' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'register_under_copyright_sidebar' );
