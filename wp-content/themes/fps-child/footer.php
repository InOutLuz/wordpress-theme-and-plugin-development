<footer>
	<div class="container">
		<?php
		if ( is_active_sidebar( 'copyright' ) ) {
			get_sidebar( 'copyright' );
		}
		?>
	</div>
		
	<?php
	if ( is_active_sidebar( 'under-copyright' ) ) {
		get_sidebar( 'under-copyright' );
	}
	?>
		
</footer>

<?php wp_footer(); ?>

</body>

</html>
