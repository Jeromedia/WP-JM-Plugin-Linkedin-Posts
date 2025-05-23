<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_li_fetch_connection_to_jeromedia()
{
    $base_url = jm_li_get_api_base_url();
    $company = jm_li_get_active_company_name();
    $url = "$base_url/connection/$company";

    $token = jm_li_get_custom_setting('jm_li_settings_api_token');

    $args = [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
        ]
    ];

    $response = wp_remote_get($url, $args);

    if (is_wp_error($response)) {
        return (object) [
            'http_status_code' => $response->get_error_code(),
            'connection_message' => $response->get_error_message()
        ];
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return $data;
}
// function jm_li_fetch_connection_posts_check_to_jeromedia()
// {
//     $base_url = jm_li_get_api_base_url();
//     $company = jm_li_get_active_company_name();
//     $url = "$base_url/connection/posts/$company";

//     $token = jm_li_get_custom_setting('jm_li_settings_api_token');

//     $args = [
//         'headers' => [
//             'Authorization' => 'Bearer ' . $token,
//         ]
//     ];

//     $response = wp_remote_get($url, $args);

//     if (is_wp_error($response)) {
//         return (object) [
//             'http_status_code' => $response->get_error_code(),
//             'connection_message' => $response->get_error_message()
//         ];
//     }

//     $body = wp_remote_retrieve_body($response);
//     $data = json_decode($body, true);

//     return $data;
// }

// function jm_li_fetch_connection_cached()
// {
//     $company = jm_li_get_active_company_name();
//     $cache_timeout = jm_li_get_cache_timeout();
//     $cache_key = "jmli_connection_$company";

//     $cached = jm_li_cache_get($cache_key);
//     if ($cached !== false) {
//         return $cached;
//     }

//     $connection = jm_li_fetch_connection(); // Your actual fetch function
//     jm_li_cache_set($cache_key, $connection, $cache_timeout);

//     return $connection;
// }
// function jm_li_fetch_logo()
// {
//     $base_url = jm_li_get_api_base_url();
//     $company = jm_li_get_active_company_name();
//     $url = "$base_url/logo/$company";
//     $response = wp_remote_get($url);

//     if (is_wp_error($response)) {
//         return (object) [
//             'http_status_code' => $response->get_error_code(),
//             'connection_message' => $response->get_error_message()
//         ];
//     }

//     $body = wp_remote_retrieve_body($response);
//     $data = json_decode($body);

//     if (is_null($data)) {
//         return (object) [
//             'http_status_code' => 500,
//             'connection_message' => 'Invalid data format from API'
//         ];
//     }

//     return $data;
// }

// function jm_li_fetch_logo_cached()
// {
//     $company = jm_li_get_active_company_name();
//     $cache_timeout = jm_li_get_cache_timeout();
//     $cache_key = "jmli_logo_$company";

//     $cached = jm_li_cache_get($cache_key);
//     if ($cached !== false) {
//         return $cached;
//     }

//     $logo = jm_li_fetch_logo(); // Your actual fetch function
//     jm_li_cache_set($cache_key, $logo, $cache_timeout);

//     return $logo;
// }
// function jm_li_fetch_followers()
// {
//     $base_url = jm_li_get_api_base_url();
//     $company = jm_li_get_active_company_name();
//     $url = "$base_url/followers/$company";

//     $response = wp_remote_get($url);

//     if (is_wp_error($response)) {
//         return (object) [
//             'http_status_code' => $response->get_error_code(),
//             'connection_message' => $response->get_error_message()
//         ];
//     }

//     $body = wp_remote_retrieve_body($response);
//     $data = json_decode($body);

//     if (is_null($data)) {
//         return (object) [
//             'http_status_code' => 500,
//             'connection_message' => 'Invalid data format from API'
//         ];
//     }

//     return $data;
// }

// function jm_li_fetch_followers_cached()
// {
//     $company = jm_li_get_active_company_name();
//     $cache_timeout = jm_li_get_cache_timeout();
//     $cache_key = "jmli_followers_$company";

//     $cached = jm_li_cache_get($cache_key);
//     if ($cached !== false) {
//         return $cached;
//     }

//     $followers = jm_li_fetch_followers(); // Your actual fetch function
//     jm_li_cache_set($cache_key, $followers, $cache_timeout);

//     return $followers;
// }

function jm_li_fetch_posts()
{
    $base_url = jm_li_get_api_base_url();
    $company = jm_li_get_active_company_name();
    $url = "$base_url/posts/$company";

    // Add your Bearer token here
    $token = jm_li_get_custom_setting('jm_li_settings_api_token');

    $args = [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
        ]
    ];

    $response = wp_remote_get($url, $args);

    if (is_wp_error($response)) {
        return (object) [
            'http_status_code' => $response->get_error_code(),
            'connection_message' => $response->get_error_message()
        ];
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return $data;

}
// function jm_li_fetch_posts_cached()
// {
//     $company = jm_li_get_active_company_name();
//     $cache_timeout = jm_li_get_cache_timeout();
//     $cache_key = "jmli_posts_$company";

//     $cached = jm_li_cache_get($cache_key);
//     if ($cached !== false) {
//         return $cached;
//     }

//     $posts = jm_li_fetch_posts();
//     jm_li_cache_set($cache_key, $posts, $cache_timeout);
//     return $posts;
// }
