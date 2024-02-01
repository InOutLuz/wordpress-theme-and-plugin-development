<?php get_header(); ?>

<div class="page-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<h3><?php the_title(); ?></h3>
		<span class="breadcrumb"><a href="<?php echo get_home_url( '/' ); ?>">Home</a> > <a href="<?php echo esc_url( site_url( '/games/' ) ); ?>">Games</a> > <?php the_title(); ?></span>
		</div>
	</div>
	</div>
</div>

<div class="single-product section">
	<div class="container">
	<div class="row">
		<div class="col-lg-6">
		<div class="left-image">
		<?php
			// display the post thumbnail if there isn't one display the awaiting image svg
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large' );
		} else {
			?>
		<div class="svg-container">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
				<?php get_template_part( 'template-parts/fallback-svg-content', 'fallback-svg-content' ); ?>
				</svg>
		</div>
			<?php
		}
		?>
		</div>
		</div>
		<div class="col-lg-6 align-self-center">
		<h4><?php the_title(); ?></h4>
		<?php
		$price              = get_post_meta( get_the_ID(), '_game_price', true );
		$reduced_from_price = get_post_meta( get_the_ID(), '_game_reduced_from_price', true );
		?>
		<span class="price">
				<?php if ( ! empty( $reduced_from_price ) && ! empty( $price ) ) : ?>
					<em><?php echo '$' . $reduced_from_price; ?></em>
				<?php endif; ?>
				<?php if ( ! empty( $price ) ) : ?>
					<?php echo '$' . $price; ?>
				<?php endif; ?>
		</span>

		<p><?php the_content(); ?></p>
		<form id="qty" action="#">
			<input type="qty" class="form-control" id="1" aria-describedby="quantity" placeholder="1">
			<button type="submit"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
		</form>
		<ul>
			<li>
	<span>Genre:</span>
	<?php
	$genres = get_the_terms( get_the_ID(), 'genre' );

	if ( $genres && ! is_wp_error( $genres ) ) {
		$genre_links = array();

		foreach ( $genres as $genre ) {
			$genre_links[] = '<a href="' . esc_url( get_term_link( $genre ) ) . '">' . esc_html( $genre->name ) . '</a>';
		}

		echo implode( ', ', $genre_links );
	}
	?>
			</li>
		</ul>
		</div>
		<div class="col-lg-12">
		<div class="sep"></div>
		</div>
	</div>
	</div>
</div>


		   
				<?php
				// Get the value of the text area field from ACF
				$text_area_value = get_field( 'description' );

				// Check if the field has a value and display the additional information if it does
				if ( $text_area_value ) {
					?>
				  
					<div class="more-info">
					<div class="container">
					<div class="row">
						<div class="col-lg-12">
						<div class="tabs-content">
							<div class="row">
							<div class="nav-wrapper ">
								<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Additional information</button>
								</li>
								</ul>
							</div>
							<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
					<?php
					// Output the value of the text area field
					echo '<div class="text-area-value">' . $text_area_value . '</div>';
				}
				?>
				
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="section most-played">
	<div class="container">
	<div class="row">
		<div class="col-lg-6">
		<div class="section-heading">
		<?php
		$genres    = get_the_terms( get_the_ID(), 'genre' ); // Get terms of the 'genre' taxonomy for the current post
		$separator = ', ';
		$output    = '';
		if ( ! empty( $genres ) ) {
			foreach ( $genres as $genre ) {
				$output .= '<a class="single-post-category-link" href="' . esc_url( get_term_link( $genre ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'softuni' ), $genre->name ) ) . '">' . esc_html( $genre->name ) . '</a>' . $separator;
			}
			echo trim( $output, $separator );
		}
		?>
			<h2>Related Games</h2>
		</div>
		</div>
		<div class="col-lg-6">
			<div class="main-button">
		<?php
		$related_genres = get_the_terms( get_the_ID(), 'genre' ); // Get terms of the genre taxonomy for the current post
		$genre_ids      = array(); // Initialize an array to store genre IDs
		if ( ! empty( $related_genres ) ) {
			foreach ( $related_genres as $genre ) {
				$genre_ids[] = $genre->term_id;
			}
		}

		$related_categories_url = esc_url( add_query_arg( 'related_genres', implode( ',', $genre_ids ), site_url( '/related-games' ) ) );
		?>
		<a href="<?php echo $related_categories_url; ?>">View All</a>
			</div>
			</div>
		<?php

		// Query related games
		$args = array(
			'post_type'      => 'game',
			'posts_per_page' => 4,
			'tax_query'      => array(
				array(
					'taxonomy' => 'genre',
					'field'    => 'term_id',
					'terms'    => $genre_ids,
				),
			),
			'post__not_in'   => array( get_the_ID() ), // Exclude the current post from the related posts
		);

			$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				get_template_part( 'template-parts/games-cards', 'games-cards' );
				endwhile;
			wp_reset_postdata(); // Reset the post data
			else :
				echo '<h1>Sorry, there aren\'t any related posts yet.</h1>';
			endif;
			?>
			
	</div>
	</div>
</div>
</div>
</div>

<?php get_footer(); ?>
