<?php
if (!defined('ABSPATH')) {
    exit;
}


function jm_linkedin_settings_page()
{
    include plugin_dir_path(__FILE__) . '../templates/settings-output-page.php';
}
function jm_li_settings_register_settings()
{
    add_settings_section('jm_li_settings_section', 'Visual Configuration', null, 'jm_li_settings');
    
    register_setting('jm_li_settings_group', 'jm_li_settings_columns');
    register_setting('jm_li_settings_group', 'jm_li_settings_post_limit');
    // register_setting('jm_li_settings_group', 'jm_li_settings_show_images');

    add_settings_field('jm_li_settings_column_limit', 'Number of Columns', 'jm_li_settings_column_limit_callback', 'jm_li_settings', 'jm_li_settings_section');
    add_settings_field('jm_li_settings_post_limit', 'Number of Posts', 'jm_li_settings_post_limit_callback', 'jm_li_settings', 'jm_li_settings_section');
    // add_settings_field('jm_li_settings_show_images', 'Show Images', 'jm_li_settings_show_images_callback', 'jm_li_settings', 'jm_li_settings_section');
}
add_action('admin_init', 'jm_li_settings_register_settings');

function jm_li_settings_column_limit_callback()
{
    $column_limit = get_option('jm_li_settings_column_limit', '');
    echo '<input type="text" name="jm_li_settings_column_limit" value="' . esc_attr($column_limit) . '" />';
}

function jm_li_settings_post_limit_callback()
{
    $post_limit = get_option('jm_li_settings_post_limit', 5);
    echo '<input type="number" name="jm_li_settings_post_limit" value="' . esc_attr($post_limit) . '" />';
}
// function jm_li_settings_show_images_callback()
// {
//     $show_images = get_option('jm_li_settings_show_images', 'yes');
//     echo '<input type="checkbox" name="jm_li_settings_show_images" value="yes" ' . checked('yes', $show_images, false) . ' /> Show images';
// }
// Function to display content when the shortcode is used
// function jeromedia_linkedin_posts_shortcode_function()
// {
//     // Start output buffering
//     $data = jm_li_fetch_posts();
//     $options = false;

//     ob_start();

//     // Include the template file
//     include plugin_dir_path(__FILE__) . '../templates/output-page.php';

//     // Return the buffered content
//     return ob_get_clean();
// }

// Register shortcode
// function jeromedia_linkedin_posts_register_shortcode()
// {
//     add_shortcode('jeromedia_linkedin_posts', 'jeromedia_linkedin_posts_shortcode_function');
// }

// add_action('init', 'jeromedia_linkedin_posts_register_shortcode');

// add_action('init', function () {
//     global $shortcode_tags;
//     if (isset($shortcode_tags['jeromedia_linkedin_posts'])) {
//         error_log('jeromedia_linkedin_posts shortcode is registered.');
//     } else {
//         error_log('jeromedia_linkedin_posts shortcode is NOT registered.');
//     }
// });