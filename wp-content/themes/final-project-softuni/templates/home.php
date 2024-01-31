<?php

/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<div class="main-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 align-self-center">
				<div class="caption header-text">
					<?php
					if ( get_option( 'custom_hero_titles' )['custom_subtitle'] == '' ) {
						// If the option is not set, display the default subtitle
						echo '<h6>Welcome to lugx</h6>';
					} else {
						// If the option is set, display the custom subtitle
						echo '<h6>' . esc_html( get_option( 'custom_hero_titles' )['custom_subtitle'] ) . '</h6>';
					}
					?>

					<?php
					if ( get_option( 'custom_hero_titles' )['custom_title'] == '' ) {
						// If the option is not set, display the default subtitle
						echo '<h2>BEST GAMING SITE EVER!</h2>';
					} else {
						// If the option is set, display the custom subtitle
						echo '<h2>' . esc_html( get_option( 'custom_hero_titles' )['custom_title'] ) . '</h2>';
					}
					?>

					<?php
					if ( get_option( 'custom_hero_titles' )['custom_description'] == '' ) {
						// If the option is not set, display the default subtitle
						echo '<p>LUGX Gaming is free Bootstrap 5 HTML CSS website template for your gaming websites. You can
                        download and use this layout for commercial purposes. Please tell your friends about
                        TemplateMo.</p>';
					} else {
						// If the option is set, display the custom subtitle
						echo '<p>' . esc_html( get_option( 'custom_hero_titles' )['custom_description'] ) . '</p>';
					}
					?>

					<div class="search-input">
						<form id="search" action="#">
							<input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
							<button role="button">Search Now</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4 offset-lg-2">
				<div class="right-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image.jpg" alt="">
					<span class="price">$22</span>
					<span class="offer">-40%</span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="#">
					<div class="item">
						<div class="image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-01.png" alt="" style="max-width: 44px;">
						</div>
						<h4>Free Storage</h4>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="#">
					<div class="item">
						<div class="image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-02.png" alt="" style="max-width: 44px;">
						</div>
						<h4>User More</h4>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="#">
					<div class="item">
						<div class="image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-03.png" alt="" style="max-width: 44px;">
						</div>
						<h4>Reply Ready</h4>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="#">
					<div class="item">
						<div class="image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-04.png" alt="" style="max-width: 44px;">
						</div>
						<h4>Easy Layout</h4>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="section trending">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-heading">
					<h6>Latest</h6>
					<h2>Latest Posts</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="main-button">
					<a href="shop.html">View All</a>
				</div>
			</div>

			<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 8,
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/post-content', 'post-content' );
				endwhile;
				wp_reset_postdata(); // Reset the post data
			else :
				echo '<h1>Sorry, there aren\'t any posts yet.</h1>';
			endif;
			?>

		</div>
	</div>
</div>

<div class="section most-played">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-heading">
					<h6>TOP GAMES</h6>
					<h2>Most Played</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="main-button">
					<a href="shop.html">View All</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="item">
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-game-01.jpg" alt=""></a>
					</div>
					<div class="down-content">
						<span class="category">Adventure</span>
						<h4>Assasin Creed</h4>
						<a href="product-details.html">Explore</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="item">
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-game-02.jpg" alt=""></a>
					</div>
					<div class="down-content">
						<span class="category">Adventure</span>
						<h4>Assasin Creed</h4>
						<a href="product-details.html">Explore</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="item">
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-game-03.jpg" alt=""></a>
					</div>
					<div class="down-content">
						<span class="category">Adventure</span>
						<h4>Assasin Creed</h4>
						<a href="product-details.html">Explore</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="item">
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-game-04.jpg" alt=""></a>
					</div>
					<div class="down-content">
						<span class="category">Adventure</span>
						<h4>Assasin Creed</h4>
						<a href="product-details.html">Explore</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="item">
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-game-05.jpg" alt=""></a>
					</div>
					<div class="down-content">
						<span class="category">Adventure</span>
						<h4>Assasin Creed</h4>
						<a href="product-details.html">Explore</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="item">
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-game-06.jpg" alt=""></a>
					</div>
					<div class="down-content">
						<span class="category">Adventure</span>
						<h4>Assasin Creed</h4>
						<a href="product-details.html">Explore</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section categories">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-heading">
					<h6>Categories</h6>
					<h2>Top Categories</h2>
				</div>
			</div>
			<div class="col-lg col-sm-6 col-xs-12">
				<div class="item">
					<h4>Action</h4>
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories-01.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="col-lg col-sm-6 col-xs-12">
				<div class="item">
					<h4>Action</h4>
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories-05.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="col-lg col-sm-6 col-xs-12">
				<div class="item">
					<h4>Action</h4>
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories-03.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="col-lg col-sm-6 col-xs-12">
				<div class="item">
					<h4>Action</h4>
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories-04.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="col-lg col-sm-6 col-xs-12">
				<div class="item">
					<h4>Action</h4>
					<div class="thumb">
						<a href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories-05.jpg" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section cta">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="shop">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-heading">
								<h6>Our Shop</h6>
								<h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
							</div>
							<p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
							<div class="main-button">
								<a href="shop.html">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-2 align-self-end">
				<div class="subscribe">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-heading">
								<h6>NEWSLETTER</h6>
								<h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
							</div>
							<div class="search-input">
								<form id="subscribe" action="#">
									<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
									<button type="submit">Subscribe Now</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
