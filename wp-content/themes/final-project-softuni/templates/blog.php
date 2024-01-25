<?php

/**
 * Template Name: Blog
 */
?>

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1; // Get current page number


$blog_query_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'paged'          => get_query_var('paged')
);

$blog_query = new WP_Query($blog_query_args);
?>

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


<?php if ($blog_query->have_posts()) : ?>

    <div class="section trending">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : ?>

                    <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

                        <?php get_template_part('template-parts/post-content', 'post-content'); ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h1> Sorry, there aren't any posts yet. </h1>

                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="blog-pagination">
        <?php
        $pagination_args = array(
            'mid_size'  => 2,
            'prev_text' => __('Previous', 'softuni'),
            'next_text' => __('Next', 'softuni'),
            'total'     => $blog_query->max_num_pages, // Specify the total number of pages
            'current'   => $paged, // Specify the current page
        );

        echo paginate_links($pagination_args);
        ?>
    </div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>