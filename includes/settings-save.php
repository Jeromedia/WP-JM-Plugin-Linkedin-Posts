<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_li_save_settings($data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'jmli_settings';

    // Define the settings array to save
    $settings = [
        'jm_li_settings_column_limit' => sanitize_text_field($data['jm_li_settings_column_limit']),
        'jm_li_settings_post_limit' => intval($data['jm_li_settings_post_limit']),
        'jm_li_settings_api_base_url' => esc_url_raw($data['jm_li_settings_api_base_url']),
        'jm_li_settings_api_token' => esc_url_raw($data['jm_li_settings_api_token']),
        'jm_li_settings_testing_mode' => isset($data['jm_li_settings_testing_mode']) ? 'yes' : 'no',
    ];

    // Save or update the settings in the database
    foreach ($settings as $key => $value) {
        $exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE jmli_name = %s", $key));
        if ($exists) {
            $wpdb->update(
                $table_name,
                ['jmli_value' => $value],
                ['jmli_name' => $key],
                ['%s'],
                ['%s']
            );
        } else {
            $wpdb->insert(
                $table_name,
                ['jmli_name' => $key, 'jmli_value' => $value],
                ['%s', '%s']
            );
        }
    }
}
// function jm_li_save_settings_cache($data)
// {
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'jmli_settings';

//     // Define the settings array to save
//     $settings = [
//         'jm_li_settings_cache_timeout' => sanitize_text_field($data['jm_li_settings_cache_timeout']),
//     ];

//     // Save or update the settings in the database
//     foreach ($settings as $key => $value) {
//         $exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE jmli_name = %s", $key));
//         if ($exists) {
//             $wpdb->update(
//                 $table_name,
//                 ['jmli_value' => $value],
//                 ['jmli_name' => $key],
//                 ['%s'],
//                 ['%s']
//             );
//         } else {
//             $wpdb->insert(
//                 $table_name,
//                 ['jmli_name' => $key, 'jmli_value' => $value],
//                 ['%s', '%s']
//             );
//         }
//     }
// }
