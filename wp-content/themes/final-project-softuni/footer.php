<footer>
	<div class="container">
		<?php
		if ( is_active_sidebar( 'copyright' ) ) {
			get_sidebar( 'copyright' );
		}
		?>
	</div>
	<div class="container github"><?php echo do_shortcode( '[github]' ); ?></div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
