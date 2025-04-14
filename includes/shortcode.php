<?php
// Function to generate the dashboard output
function jm_linkedin_dashboard_shortcode()
{
    $cols = jm_li_get_columns_limit();
    $data = jm_li_fetch_posts();
    $set_posts_limit = jm_li_get_post_limit();
    $companyName = jm_li_get_active_company_name();
    $page = 'shortcode';

    ob_start(); // Start output buffering
    include plugin_dir_path(__FILE__) . '../templates/layouts/main.php';
    $output = ob_get_clean(); // Get the buffered output

    return $output;
}

// Register the shortcode
function jm_register_linkedin_dashboard_shortcode()
{
    add_shortcode('jm-linkedin-posts', 'jm_linkedin_dashboard_shortcode');
}
add_action('init', 'jm_register_linkedin_dashboard_shortcode');

// Enqueue the styles
// function jm_enqueue_styles()
// {
//     wp_enqueue_style('jm-linkedin-dashboard', plugin_dir_url(__FILE__) . 'assets/css/jm-main.css');
// }
// add_action('wp_enqueue_scripts', 'jm_enqueue_styles');
