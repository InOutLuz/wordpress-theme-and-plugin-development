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