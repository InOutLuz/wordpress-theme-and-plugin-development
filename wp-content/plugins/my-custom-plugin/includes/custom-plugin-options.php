<?php

function custom_plugin_options_page()
{
    add_menu_page(
        'Custom Plugin Options',
        'Custom Plugin Options',
        'manage_options',
        'customplugin',
        'custom_plugin_options_page_html',
        'dashicons-admin-generic',
        2
    );
    // Register the settings
    add_action('admin_init', 'register_custom_plugin_settings');
}

function register_custom_plugin_settings()
{
    register_setting('custom_plugin_options_group', 'custom_plugin_text');
}

function custom_plugin_options_page_html()
{
    ?>
    <div class="wrap">
        <h1>Custom Plugin Options</h1>
        <form method="post" action="options.php">
            <?php settings_fields('custom_plugin_options_group'); ?>
            <?php do_settings_sections('custom_plugin_options_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Text for SVG:</th>
                    <td><input type="text" name="custom_plugin_text" value="<?php echo esc_attr(get_option('custom_plugin_text')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
add_action('admin_menu', 'custom_plugin_options_page');
