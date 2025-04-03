<?php

// function jm_li_get_code()
// {
//     $jmLinkedInCode = "AQQtGC6Uys663c8rIX6d1JYZ9TvRuzLyFpDfNJLplCPd2DRtvP1YWdcCYsV5kuvr23LLsQEGUAu6N4PKLoMisUtOOto3Ob5YtKjrQBbj4adGy-B_Bpdwl4hzOTUq0aBPsrLKXNJ3p9bXdE8y0etAkXi47RYeOyHVYFSXY1x1CcGb6eGrHILQm0vlDeEB2xxoXDTqkpc6Lk5TaVzsmwg";
//     return $jmLinkedInCode;

// }

// function jm_li_get_auth_url($jm_li_get_code)
// {

//     return true;
// }


function jm_li_fetch_posts()
{

    // $args = [
    //     'headers' => [
    //         'Authorization' => 'Bearer ' .$api_key,
    //         'X-Restli-Protocol-Version' => '2.0.0',
    //         'Content-Type' => 'application/json',
    //         'LinkedIn-Version' => '202501'
    //     ]
    // ];

    $base_url = "http://jeromedia-api.test/api/posts/jeromedia";
    // $query_params = [
    //     'author' => 'urn:li:company:101768514',
    //     'q' => 'author'
    // ];

    // $response = wp_remote_get(add_query_arg($query_params, $base_url), $args);
    $response = wp_remote_get($base_url);

    // Check for errors
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo "Something went wrong: $error_message";
    } else {
        $body = wp_remote_retrieve_body($response);
        $posts = json_decode($body, true);
    }
    return $posts ?? null;
}