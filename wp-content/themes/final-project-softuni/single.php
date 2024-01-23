<?php get_header(); ?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3><?php the_title(); ?></h3>
        <span class="breadcrumb"><a href="<?php echo get_home_url('/'); ?>">Home</a> > <a href="#">Blog</a> > <?php the_title(); ?></span>
      </div>
    </div>
  </div>
</div>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <div class="single-product section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="left-image">
              <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('medium_large'); // Medium-large resolution (default 768px x no height limit max)
              }
              ?>
            </div>
          </div>
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

    <h1> Sorry, there aren't any posts yet. </h1>

  <?php endif; ?>
    </div>



    <div class="section categories related-games">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading">
              <h6>Action</h6>
              <h2>Related Games</h2>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="main-button">
              <a href="shop.html">View All</a>
            </div>
          </div>
          <div class="col-lg col-sm-6 col-xs-12">
            <div class="item">
              <h4>Action</h4>
              <div class="thumb">
                <a href="product-details.html"><img src="assets/images/categories-01.jpg" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-lg col-sm-6 col-xs-12">
            <div class="item">
              <h4>Action</h4>
              <div class="thumb">
                <a href="product-details.html"><img src="assets/images/categories-05.jpg" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-lg col-sm-6 col-xs-12">
            <div class="item">
              <h4>Action</h4>
              <div class="thumb">
                <a href="product-details.html"><img src="assets/images/categories-03.jpg" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-lg col-sm-6 col-xs-12">
            <div class="item">
              <h4>Action</h4>
              <div class="thumb">
                <a href="product-details.html"><img src="assets/images/categories-04.jpg" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-lg col-sm-6 col-xs-12">
            <div class="item">
              <h4>Action</h4>
              <div class="thumb">
                <a href="product-details.html"><img src="assets/images/categories-05.jpg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php get_footer(); ?>