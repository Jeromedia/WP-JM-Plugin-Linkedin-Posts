<?php
/*
Plugin Name: Jeromedia: LinkedIn Posts
Plugin URI: https://jeromedia.com/wp/plugins/jm-linkedin-posts
Description: Retrieves posts from an external API and displays them via shortcode.
Version: 1.8
Author: Jeromedia
Author URI: https://jeromedia.com
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define plugin path constant for easy access to plugin directory
define('JM_LI_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Include all necessary files to handle different parts of the plugin
require_once JM_LI_PLUGIN_PATH . 'includes/database.php';   // Database operations (e.g., table creation)
require_once JM_LI_PLUGIN_PATH . 'includes/functions.php';  // Core plugin functions
require_once JM_LI_PLUGIN_PATH . 'includes/cache.php';       // Caching helper functions
require_once JM_LI_PLUGIN_PATH . 'includes/api.php';        // API functions (e.g., fetching LinkedIn data)
require_once JM_LI_PLUGIN_PATH . 'includes/api-functions.php';        // API functions (e.g., fetching LinkedIn data)
require_once JM_LI_PLUGIN_PATH . 'includes/shortcode.php';   // Database operations (e.g., table creation)
require_once JM_LI_PLUGIN_PATH . 'includes/dashboard.php';  // Dashboard functionality
require_once JM_LI_PLUGIN_PATH . 'includes/settings.php';   // Settings management
require_once JM_LI_PLUGIN_PATH . 'includes/settings-handler.php';   // Settings management
require_once JM_LI_PLUGIN_PATH . 'includes/settings-save.php';   // Settings management
require_once JM_LI_PLUGIN_PATH . 'includes/menu.php';       // Admin menu for plugin
// require_once JM_LI_PLUGIN_PATH . 'assets/css/main.css';       // Css

// Register plugin activation hook
register_activation_hook(__FILE__, function() {
    // Create tables needed by the plugin upon activation
    jm_li_create_table(); // Create main plugin table (e.g., for storing settings)
    jm_li_create_cache_table(); // Create cache table (e.g., for caching API responses)
});

// Add the admin menu to the WordPress dashboard
add_action('admin_menu', 'jm_li_add_admin_menu');

// Optional: You can also add an initialization hook for setting up other plugin behavior (e.g., custom post types, etc.)
// add_action('init', 'jm_linkedin_plugin_setup');
function jm_linkedin_enqueue_styles_scripts() {
    wp_enqueue_style('jm-linkedin-style', plugin_dir_url(__FILE__) . 'assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'jm_linkedin_enqueue_styles_scripts');
// Optional: If you want to enqueue plugin-specific scripts and styles, you could use this
// add_action('wp_enqueue_scripts', 'jm_linkedin_enqueue_styles_scripts');

/**
 * Example function for additional initialization if needed.
 */
function jm_linkedin_plugin_setup() {
    // Add any setup actions, like registering custom post types, taxonomies, etc.
}

/**
 * Example function for enqueuing styles and scripts for the frontend.
 */
// function jm_linkedin_enqueue_styles_scripts() {
//     wp_enqueue_style('jm-linkedin-style', plugin_dir_url(__FILE__) . 'assets/css/main.css');
// }
// add_action('admin_enqueue_scripts', 'jm_linkedin_enqueue_styles_scripts');





// GitHub Update Check Functionality - Add this below your plugin code

// Define the plugin's GitHub repository (use your own repo details)
define( 'YOUR_PLUGIN_GITHUB_API_URL', 'https://api.github.com/repos/Jeromedia/WP-JM-Plugin-Linkedin-Posts/releases/latest' );

// Hook to check for updates
add_filter( 'site_transient_update_plugins', 'your_plugin_update_check' );

function your_plugin_update_check( $transient ) {
    // Don't check if WordPress is updating
    if ( empty( $transient->checked ) ) {
        return $transient;
    }

    // Get the current version of the plugin
    $plugin_slug = 'jm-linkedin-posts/jm-linkedin-posts.php'; // Change this to your plugin's main file
    $current_version = isset( $transient->checked[$plugin_slug] ) ? $transient->checked[$plugin_slug] : '';

    // Fetch the latest release information from GitHub
    // $response = wp_remote_get( YOUR_PLUGIN_GITHUB_API_URL );
    $response = wp_remote_get( YOUR_PLUGIN_GITHUB_API_URL, array(
        'headers' => array(
            'Authorization' => 'token ' . GITHUB_TOKEN,
            'User-Agent'    => 'WordPress/' . get_bloginfo( 'version' ),
        )
    ) );
    

    if ( is_wp_error( $response ) ) {
        return $transient;
    }

    $release_data = json_decode( wp_remote_retrieve_body( $response ), true );

    // If a new version is available on GitHub
    if ( version_compare( $release_data['tag_name'], $current_version, '>' ) ) {
        // Add the update information
        $update_data = array(
            'slug' => 'jm-linkedin-posts',
            'plugin' => $plugin_slug,
            'new_version' => $release_data['tag_name'],
            'url' => $release_data['html_url'],
            'package' => $release_data['zipball_url'] // URL to the plugin's zip package
        );

        // Add the update to the transient response
        $transient->response[$plugin_slug] = $update_data;
    }

    return $transient;
}

// Fix plugin folder name after GitHub update install
add_filter( 'upgrader_post_install', 'jm_plugin_post_install', 10, 2 );

function jm_plugin_post_install( $response, $hook_extra ) {
    $plugin_slug = 'jm-linkedin-posts/jm-linkedin-posts.php';
    global $wp_filesystem;

    $correct_path = WP_PLUGIN_DIR . '/jm-linkedin-posts/';

    if (
        isset($hook_extra['plugin']) &&
        $hook_extra['plugin'] === $plugin_slug &&
        $response['destination'] !== $correct_path
    ) {
        $wp_filesystem->move( $response['destination'], $correct_path );
        $response['destination'] = $correct_path;
    }

    return $response;
}
