<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_linkedin_api_page()
{
    $connection = jm_li_fetch_connection_to_jeromedia();
    $connection_posts = jm_li_fetch_connection_posts_check_to_jeromedia();

    // $connection = jm_li_fetch_connection_cached();
    $connection_logo = jm_li_fetch_logo();
    // $company = jm_li_get_active_company_name();
    $base_url = jm_li_get_api_base_url();
    // include plugin_dir_path(__FILE__) . '../templates/api-output-page.php';
    $page = 'api';
    include plugin_dir_path(__FILE__) . '../templates/layouts/main.php';
}

