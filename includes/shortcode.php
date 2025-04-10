<?php
// Function to generate the dashboard output
function jm_linkedin_dashboard_shortcode()
{
    $cols = jm_li_get_columns_limit();
    $posts = jm_li_fetch_posts();
    $logo = jm_li_fetch_logo_cached();
    $followers = jm_li_fetch_followers_cached();
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
function jm_enqueue_styles()
{
    wp_enqueue_style('jm-linkedin-dashboard', plugin_dir_url(__FILE__) . 'assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'jm_enqueue_styles');
?>