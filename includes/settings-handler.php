<?php
if (!defined('ABSPATH')) {
    exit;
}

// function jm_li_settings_save($data)
// {
//     // Validate and sanitize settings data before saving
//     if (isset($data['jm_li_settings_column_limit']) && is_numeric($data['jm_li_settings_column_limit'])) {
//         update_option('jm_li_settings_column_limit', intval($data['jm_li_settings_column_limit']));
//     }

//     if (isset($data['jm_li_settings_post_limit']) && is_numeric($data['jm_li_settings_post_limit'])) {
//         update_option('jm_li_settings_post_limit', intval($data['jm_li_settings_post_limit']));
//     }

//     if (isset($data['jm_li_settings_api_base_url'])) {
//         update_option('jm_li_settings_api_base_url', sanitize_text_field($data['jm_li_settings_api_base_url']));
//     }

//     if (isset($data['jm_li_settings_testing_mode'])) {
//         update_option('jm_li_settings_testing_mode', sanitize_text_field($data['jm_li_settings_testing_mode']));
//     }

//     if (isset($data['jm_li_settings_cache_timeout'])) {
//         update_option('jm_li_settings_cache_timeout', sanitize_text_field($data['jm_li_settings_cache_timeout']));
//     }
// }

// function jm_li_get_settings()
// {
//     return [
//         'column_limit' => get_option('jm_li_settings_column_limit', 5),
//         'post_limit' => get_option('jm_li_settings_post_limit', 10),
//         'api_base_url' => get_option('jm_li_settings_api_base_url', ''),
//         'testing_mode' => get_option('jm_li_settings_testing_mode', 'no'),
//         'cache_timeout' => get_option('jm_li_settings_cache_timeout', null),
//     ];
// }
