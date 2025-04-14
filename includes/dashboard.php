<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_linkedin_dashboard_page()
{
    $cols = jm_li_get_columns_limit();
    $data = jm_li_fetch_posts();
    // $logo = jm_li_fetch_logo();
    // $followers = jm_li_fetch_followers();
    $companyName = jm_li_get_active_company_name();
    $page = 'dashboard';
    include plugin_dir_path(__FILE__) . '../templates/layouts/main.php';
}
