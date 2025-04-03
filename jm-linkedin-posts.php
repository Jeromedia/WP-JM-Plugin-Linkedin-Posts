<?php
/*
Plugin Name: Jeromedia: LinkedIn Posts
Plugin URI: https://jeromedia.com/wp/plugins/jm-linkedin-posts
Description: Retrieves posts from an external API and displays them via shortcode.
Version: 1.0
Author: Jeromedia
Author URI: https://jeromedia.com
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

define('JM_LI_PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once JM_LI_PLUGIN_PATH . 'includes/database.php';
require_once JM_LI_PLUGIN_PATH . 'includes/api.php';
require_once JM_LI_PLUGIN_PATH . 'includes/dashboard.php';
require_once JM_LI_PLUGIN_PATH . 'includes/settings.php';
require_once JM_LI_PLUGIN_PATH . 'includes/menu.php';

// Register activation hook correctly in the main file
register_activation_hook(__FILE__, 'jm_li_create_table');