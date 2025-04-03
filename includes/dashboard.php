<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_linkedin_dashboard_page()
{
    $posts = jm_li_fetch_posts();
    include plugin_dir_path(__FILE__) . '../templates/dashboard-output-page.php';
}
