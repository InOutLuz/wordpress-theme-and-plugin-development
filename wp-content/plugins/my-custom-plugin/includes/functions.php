<?php
/**
 * change the post archive title to Games instead of Archive: games
 */
function custom_game_archive_title( $title ) {
	if ( is_post_type_archive( 'game' ) ) {
		$title = 'Games';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'custom_game_archive_title' );

/**
 * register shortcode with the github link
 */
function github_link_shortcode() {
	return 'See WordPress implementation project on <a rel="nofollow" href="https://github.com/InOutLuz/wordpress-theme-and-plugin-development">Github</a>';
}
add_shortcode( 'github', 'github_link_shortcode' );

/**
 * register shortcode which accepts parameters which will be used for sale end date and displays a gif with hourglass
 */
function sale_end_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'month' => '',
			'day'   => '',
			'year'  => '',
		),
		$atts
	);

	// Accessing attributes
	$month = $atts['month'];
	$day   = $atts['day'];
	$year  = $atts['year'];
	// Generating output
	$output  = '<div class="sale-ends">';
	$output .= '<img class="time-is-running-img" src="' . esc_url( plugins_url( '../assets/images/time-waiting.gif', __FILE__ ) ) . '" alt="Time Is Running">';
	$output .= '<br>';
	$output .= "<p class='time-is-running-text'>The sale ends on: $day $month $year</p>";
	$output .= '</div>';

	return $output;
}
add_shortcode( 'sale-ends', 'sale_end_shortcode' );
