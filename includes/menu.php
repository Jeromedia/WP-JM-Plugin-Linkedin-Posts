<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_li_add_admin_menu()
{
    add_menu_page(
        'JM LinkedIn Posts',       // 1. $page_title
        'JM LinkedIn Posts',       // 2. $menu_title
        'manage_options',          // 3. $capability
        'jm-linkedin-posts',       // 4. $menu_slug
        'jm_linkedin_dashboard_page', // 5. $function
        'dashicons-marker',        // 6. $icon_url
        81                         // 7. $position
    );
    add_submenu_page(
        'jm-linkedin-posts',   // 1. $parent_slug
        'Dashboard',           // 2. $page_title
        'Dashboard',           // 3. $menu_title
        'manage_options',      // 4. $capability
        'jm-linkedin-posts',   // 5. $menu_slug
        'jm_linkedin_dashboard_page' // 6. $function
    );
    add_submenu_page(
        'jm-linkedin-posts',
        'Api',
        'Api',
        'manage_options',
        'jm-linkedin-api',
        'jm_linkedin_api_page'
    );
    add_submenu_page(
        'jm-linkedin-posts',
        'Settings',
        'Settings',
        'manage_options',
        'jm-linkedin-settings',
        'jm_linkedin_settings_page'
    );
}

add_action('admin_menu', 'jm_li_add_admin_menu');
