<div class="col-lg-2 col-md-6 col-sm-6">
	<div class="item">
		<div class="thumb">
			<?php
			// Display the post thumbnail if available, otherwise display the awaiting image photo
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} else { ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="190" height="200" viewBox="0 0 190 200">
					<?php get_template_part( 'template-parts/fallback-svg-content', 'fallback-svg-content' ); ?>
				</svg>
			<?php } ?>
		</div>
		<div class="down-content">
			<?php
			// Retrieve the terms of the 'genre' taxonomy for the current post
			$genres = get_the_terms( get_the_ID(), 'genre' );

			// Check if genres exist and are not empty
			if ( $genres && ! is_wp_error( $genres ) ) {
				// Loop through each genre term
				foreach ( $genres as $genre ) {
					echo '<span class="category"><a class="category" href="' . esc_url( get_term_link( $genre ) ) . '">' . esc_html( $genre->name ) . '</a></span>';
				}
			}
			?>
			<h4><?php the_title(); ?></h4>
			<a href="<?php the_permalink(); ?>">Explore</a>
		</div>
	</div>
</div>
