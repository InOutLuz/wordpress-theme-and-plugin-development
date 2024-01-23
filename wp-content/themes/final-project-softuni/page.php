<?php get_header(); ?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3><?php the_title(); ?></h3>
        <span class="breadcrumb"><a href="<?php echo get_home_url('/'); ?>">Home</a> > <?php the_title(); ?></span>
      </div>
    </div>
  </div>
</div>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <div class="single-product section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 align-self-center">
            <h4><?php the_title(); ?></h4>
            <?php the_content(); ?>
          </div>
          <div class="col-lg-12">
            <div class="sep"></div>
          </div>
        </div>
      </div>

    <?php endwhile; ?>

  <?php else : ?>

    <h1> Sorry, there aren't any pages yet. </h1>

  <?php endif; ?>
    </div>





    <?php get_footer(); ?>