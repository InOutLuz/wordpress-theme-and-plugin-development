<?php get_header(); ?>

<div class="page-heading header-text">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3><?php the_archive_title(); ?></h3>
				<span class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> > Games</span>
			</div>
		</div>
	</div>
</div>

<div class="section most-played games-page">
	<div class="container">
		<div class="row">
		<?php
		$count = 0;
		if ( have_posts() ) :
			?>
			<?php
			while ( have_posts() && $count < 6 ) :
				the_post();
				?>
				<?php
				get_template_part( 'template-parts/games-cards', 'games-cards' );
				++$count;

				endwhile;
			?>
			<?php else : ?>
				<h1>Sorry, there aren't any games yet.</h1>
			<?php endif; ?>
		</div>
	</div>
	<button class="load-more-button" data-page="2" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">Load More</button>
</div>
<?php get_footer(); ?>
