<?php

/**
 * Loading all scripts scripts
 */
function get_file_version($file_path)
{
    return filemtime($file_path);
}

function final_project_softuni_assets($hook)
{
    $args = array(
        'in_footer' => true,
        'strategy'  => 'defer',
    );

    $script_files = array(
        'jquery.min.js' => '/vendor/jquery/jquery.min.js',
        'bootstrap.min.js' => '/vendor/bootstrap/js/bootstrap.min.js',
        'isotope.min.js' => '/assets/js/isotope.min.js',
        'owl-carousel.js' => '/assets/js/owl-carousel.js',
        'counter.js' => '/assets/js/counter.js',
        'custom.js' => '/assets/js/custom.js',
    );

    $style_files = array(
        'bootstrap.min.css' => '/vendor/bootstrap/css/bootstrap.min.css',
        'fontawesome.css' => '/assets/css/fontawesome.css',
        'main.css' => '/assets/css/templatemo-lugx-gaming.css',
        'owl.css' => '/assets/css/owl.css',
        'animate.css' => '/assets/css/animate.css',
        'swiper-bundle.css' => 'https://unpkg.com/swiper@7/swiper-bundle.min.css',
    );

    foreach ($script_files as $handle => $file_path) {
        $version = get_file_version(get_template_directory() . $file_path);
        wp_enqueue_script($handle, get_template_directory_uri() . $file_path, array(), $version, $args);
    }

    foreach ($style_files as $handle => $file_path) {
        if (strpos($file_path, 'http') === 0 || strpos($file_path, 'https') === 0) {
            // For external stylesheets, use wp_register_style and wp_enqueue_style
            wp_register_style($handle, $file_path, false, '1.0.0');
            wp_enqueue_style($handle);
        } else {
            // For local stylesheets, use filemtime to dynamically generate version
            $version = get_file_version(get_template_directory() . $file_path);
            wp_enqueue_style($handle, get_template_directory_uri() . $file_path, false, $version);
        }
    }
}

add_action('wp_enqueue_scripts', 'final_project_softuni_assets');


add_theme_support('post-thumbnails');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(300, 999, true); // default Featured Image dimensions (cropped)


}


add_filter('post_thumbnail_html', 'my_post_image_html', 10, 3);
function my_post_image_html($html, $post_id, $post_image_id)
{

    $html = '<a href="' . get_permalink($post_id) . '">' . $html . '</a>';
    return $html;
}
