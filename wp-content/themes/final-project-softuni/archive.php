<?php get_header(); ?>

<div class="page-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<h3><?php the_archive_title(); ?></h3>
		<span class="breadcrumb"><a href="<?php echo get_home_url( '/' ); ?>">Home</a> > <?php the_archive_title(); ?></span>
		</div>
	</div>
	</div>
</div>




<div class="section trending">
	<div class="container">
	<div class="row">
		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part( 'template-parts/post-content', 'post-content' ); ?>

		<?php endwhile; ?>

		<?php else : ?>

		<h1> Sorry, there aren't any pages yet. </h1>

		<?php endif; ?>

	</div>
	</div>
</div>

<div class="blog-pagination">
	<?php
	the_posts_pagination(
		array(
			'mid_size'  => 2,
			'prev_text' => __( 'Previous', 'softuni' ),
			'next_text' => __( 'Next', 'softuni' ),
		)
	);
	?>
</div>


<?php get_footer(); ?>
