

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                    <?php
            //display the post thumbnail if there isn't one display the awaiting image photo
             if ( has_post_thumbnail() ) {
                the_post_thumbnail();
                } else { ?>
                     <svg xmlns="http://www.w3.org/2000/svg"  width="190" height="200" viewBox="0 0 190 200">
                     <?php get_template_part('template-parts/fallback-svg-content', 'fallback-svg-content'); ?>
    </svg>
                <?php } 
            ?>
                    </div>
                    <div class="down-content">
                        <span class="category">Adventure</span>
                        <h4><?php the_title(); ?></h4>
                        <a href="<?php the_permalink(); ?>">Explore</a>
                    </div>
                </div>
            </div>
