<?php

/**
 * Add the top level menu page.
 */

function custom_theme_options_page()
{
    add_menu_page(
        'Custom Theme Options',
        'Custom Theme Options',
        'manage_options',
        'customtheme',
        'custom_theme_options_page_html'
    );
}


/**
 * Register our wporg_options_page to the admin_menu action hook.
 */
add_action('admin_menu', 'custom_theme_options_page');


/**
 * Top level menu callback function
 */
function custom_theme_options_page_html()
{
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    // Retrieve current option values
    $options = get_option('custom_hero_titles');
    if (!is_array($options)) {
        $options = array(
            'custom_title' => '',
            'custom_subtitle' => '',
            'custom_description' => ''
        );
    }

    // Handle form submission
    if (!empty($_POST['title_save'])) {
        // Sanitize and update options
        $options['custom_title'] = isset($_POST['custom_title']) ? sanitize_text_field($_POST['custom_title']) : '';
        $options['custom_subtitle'] = isset($_POST['custom_subtitle']) ? sanitize_text_field($_POST['custom_subtitle']) : '';
        $options['custom_description'] = isset($_POST['custom_description']) ? sanitize_text_field($_POST['custom_description']) : '';

        update_option('custom_hero_titles', $options);
    }

    // Assign values for display
    $custom_title = $options['custom_title'];
    $custom_subtitle = $options['custom_subtitle'];
    $custom_description = $options['custom_description'];
?>
    <div class="settings-wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <br><br>
        <hr>
        <h2>Hero section custom titles</h2>
        <p>Leave empty for default titles</p>
        <hr>
        <br>
        <form action="" method="post">
            <div class="option-item">
                <label for="custom_title">Custom Title</label>
                <input type="text" id="custom_title" name="custom_title" value="<?php echo esc_attr($custom_title); ?>">
            </div>
            <div class="option-item">
                <label for="custom_subtitle">Custom Subtitle</label>
                <input type="text" id="custom_subtitle" name="custom_subtitle" value="<?php echo esc_attr($custom_subtitle); ?>">
            </div>
            <div class="option-item">
                <label for="custom_description">Custom Description</label>
                <textarea id="custom_description" name="custom_description"><?php echo esc_textarea($custom_description); ?></textarea>
            </div>
            <div class="option-item">
                <input type="submit" class="button button-primary" value="Update Titles">
            </div>
            <input type="hidden" name="title_save" value="1">
        </form>
    </div>

<?php
}


/**
 * Add styling to the options page
 */

function load_custom_wp_admin_style($hook)
{
    // Load only on ?page=custom+theme
    if ($hook != 'toplevel_page_customtheme') {
        return;
    }
    wp_enqueue_style('custom_wp_admin_css', get_template_directory_uri() . '/assets/css/options-page.css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');
