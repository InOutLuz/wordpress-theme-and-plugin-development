<?php get_header(); ?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3><?php the_archive_title(); ?></h3>
        <span class="breadcrumb"><a href="<?php echo get_home_url('/'); ?>">Home</a> > <?php the_archive_title(); ?></span>
      </div>
    </div>
  </div>
</div>




<div class="section trending">
  <div class="container">
    <div class="row">
      <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
          <div class="col-lg-3 col-md-6">
            <div class="item">
              <div class="thumb">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail();
                }
                ?>
              </div>
              <div class="down-content">
                <span class="category">
                  <?php $categories = get_the_category();
                  $separator = ', ';
                  $output = '';
                  if (!empty($categories)) {
                    foreach ($categories as $category) {
                      $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'softuni'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                    }
                    echo trim($output, $separator);
                  } ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h4><?php the_title(); ?></h4>
                </a>
              </div>
            </div>
          </div>


        <?php endwhile; ?>

      <?php else : ?>

        <h1> Sorry, there aren't any pages yet. </h1>

      <?php endif; ?>

    </div>
  </div>
</div>




<?php get_footer(); ?>