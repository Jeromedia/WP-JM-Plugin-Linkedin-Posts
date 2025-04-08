<?php
if (!defined('ABSPATH')) {
    exit;
}


function jm_linkedin_settings_page()
{
    $page = 'settings';
    include plugin_dir_path(__FILE__) . '../templates/layouts/main.php';
    // include plugin_dir_path(__FILE__) . '../templates/settings-output-page.php';
}