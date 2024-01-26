<?php get_header(); ?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3><?php the_title(); ?></h3>
        <span class="breadcrumb"><a href="<?php echo get_home_url('/'); ?>">Home</a> > <a href="<?php echo esc_url(site_url('/blog/')); ?>">Blog</a> > <?php the_title(); ?></span>
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
                the_post_thumbnail('full'); // Medium-large resolution (default 768px x no height limit max)
              }
              ?>
            </div>
          </div>
          <div class="col-lg-12 align-self-center single-margin-top">
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
              <?php $categories = get_the_category();
              $separator = ', ';
              $output = '';
              if (!empty($categories)) {
                foreach ($categories as $category) {
                  $output .= '<a class="single-post-category-link" href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'softuni'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                }
                echo trim($output, $separator);
              } ?>
              <h2>Related Posts</h2>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="main-button">
              <a href="shop.html">View All</a>
            </div>
          </div>
          <?php
          $related_categories = wp_get_post_categories(get_the_ID()); // Get categories of the current post

          $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'category__in' => $related_categories, // Only include posts from related categories
            'post__not_in' => array(get_the_ID()), // Exclude the current post from the related posts
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) :


            while ($query->have_posts()) : $query->the_post();
              get_template_part('template-parts/post-content', 'post-content');
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

    <?php get_footer(); ?>