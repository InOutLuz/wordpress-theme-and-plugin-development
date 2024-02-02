<?php
		// Get the custom text from the options page
		$custom_text = get_option( 'custom_plugin_text' );

		// Check if the custom text is empty or not defined
if ( empty( $custom_text ) ) {
	$custom_text = 'Awaiting Image'; // Set default text if not defined
}
?>
 
		<!-- Background -->
		<rect width="100%" height="100%" fill="#3498db"></rect>
		
		<!-- Text -->
		<text x="50%" y="50%" fill="#ffffff" dominant-baseline="middle" text-anchor="middle" font-size="0.89rem" font-family="Arial"><?php echo esc_html( $custom_text ); ?></text>
