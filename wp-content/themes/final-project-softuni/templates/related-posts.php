<?php get_header(); ?>

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3><?php the_title(); ?></h3>
                <span class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> > <?php the_title(); ?></span>
            </div>
        </div>
    </div>
</div>

<?php
// Retrieve the category IDs from the URL parameters
$related_categories = isset($_GET['related_categories']) ? $_GET['related_categories'] : '';

// Convert the category IDs string into an array
$related_categories_array = explode(',', $related_categories);

$paged = get_query_var('paged') ? get_query_var('paged') : 1; // Get current page number

// Arguments for WP_Query to fetch related posts based on category IDs
$args = array(
    'post_type' => 'post',
    'paged' => $paged, // Set the current page
    'category__in' => $related_categories_array, // Filter by related categories
);

$query = new WP_Query($args);

?>

<div class="section trending">
    <div class="container">
        <div class="row">
            <?php if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <?php get_template_part('template-parts/post-content', 'post-content'); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <h1>Sorry, there aren't any posts yet.</h1>
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
        'total'     => $query->max_num_pages, // Specify the total number of pages
        'current'   => $paged, // Specify the current page
    );

    echo paginate_links($pagination_args);
    ?>
</div>

<?php get_footer(); ?>