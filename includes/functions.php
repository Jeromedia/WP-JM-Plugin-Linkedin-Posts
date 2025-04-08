<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_li_get_custom_setting($key)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "jmli_settings";
    return $wpdb->get_var($wpdb->prepare("SELECT jmli_value FROM $table_name WHERE jmli_name = %s", $key));
}

function jm_li_get_active_company_name()
{
    $testing_mode = jm_li_get_custom_setting('jm_li_settings_testing_mode');
    if ($testing_mode == 'yes') {
        return jm_li_get_custom_setting('jm_li_settings_testing_company_name');
    }
    return jm_li_get_company_name();
}

function jm_li_get_company_name()
{
    return jm_li_get_custom_setting('jm_li_settings_company_name');
}

function jm_li_get_testing_mode()
{
    $testing_mode = jm_li_get_custom_setting('jm_li_settings_testing_mode');
    return $testing_mode == 'yes';
}

function jm_li_get_api_base_url()
{
    return rtrim(jm_li_get_custom_setting('jm_li_settings_api_base_url'), '/');
}

function jm_li_get_api_token()
{
    return jm_li_get_custom_setting('jm_li_settings_api_token');
}

function jm_li_get_columns_limit()
{
    return esc_attr(jm_li_get_custom_setting('jm_li_settings_column_limit'));
}

function jm_li_get_cache_timeout()
{
    return esc_attr(jm_li_get_custom_setting('jm_li_settings_cache_timeout'));
}

function jm_li_get_post_limit()
{
    return intval(jm_li_get_custom_setting('jm_li_settings_post_limit'));
}

function jm_li_settings_register_settings()
{
    add_settings_section('jm_li_settings_section', 'Visual Configuration', null, 'jm_li_settings');
    add_settings_field('jm_li_settings_column_limit', 'Number of Columns', 'jm_li_settings_column_limit_callback', 'jm_li_settings', 'jm_li_settings_section');
    add_settings_field('jm_li_settings_post_limit', 'Number of Posts', 'jm_li_settings_post_limit_callback', 'jm_li_settings', 'jm_li_settings_section');
    add_settings_field('jm_li_settings_api_base_url', 'Api Base Url', 'jm_li_settings_api_base_url_callback', 'jm_li_settings', 'jm_li_settings_section');
    add_settings_field('jm_li_settings_testing_mode', 'Testing Mode', 'jm_li_settings_testing_mode_callback', 'jm_li_settings', 'jm_li_settings_section');
    add_settings_field('jm_li_settings_cache_timeout', 'Cache Timeout', 'jm_li_settings_cache_timeout_callback', 'jm_li_settings', 'jm_li_settings_section');
}

add_action('admin_init', 'jm_li_settings_register_settings');

function jm_li_settings_column_limit_callback()
{
    echo '<input type="number" name="jm_li_settings_column_limit" value="' . esc_attr(jm_li_get_custom_setting('jm_li_settings_column_limit')) . '" />';
}

function jm_li_settings_post_limit_callback()
{
    echo '<input type="number" name="jm_li_settings_post_limit" value="' . esc_attr(jm_li_get_custom_setting('jm_li_settings_post_limit')) . '" />';
}

function jm_li_settings_testing_mode_callback()
{
    echo '<input type="checkbox" name="jm_li_settings_testing_mode" value="' . esc_attr(jm_li_get_custom_setting('jm_li_settings_testing_mode')) . '" />';
}

function jm_li_settings_api_base_url_callback()
{
    echo '<input type="text" name="jm_li_settings_api_base_url" value="' . esc_attr(jm_li_get_custom_setting('jm_li_settings_api_base_url')) . '" />';
}

function jm_li_settings_cache_timeout_callback()
{
    echo '<input type="text" name="jm_li_settings_cache_timeout" value="' . esc_attr(jm_li_get_custom_setting('jm_li_settings_cache_timeout')) . '" />';
}

function jm_li_save_custom_settings($data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'jmli_settings';

    $fields = [
        'jm_li_settings_company_name' => strtolower(sanitize_text_field($data['jm_li_settings_company_name'])),
        'jm_li_settings_api_token' => sanitize_text_field($data['jm_li_settings_api_token']),
        'jm_li_settings_api_base_url' => esc_url_raw($data['jm_li_settings_api_base_url']),
        'jm_li_settings_column_limit' => sanitize_text_field($data['jm_li_settings_column_limit']),
        'jm_li_settings_post_limit' => intval($data['jm_li_settings_post_limit']),
        'jm_li_settings_testing_mode' => isset($data['jm_li_settings_testing_mode']) ? 'yes' : 'no',
    ];

    if ($fields['jm_li_settings_column_limit'] > 5) {
        $fields['jm_li_settings_column_limit'] = 5;
    }
    if ($fields['jm_li_settings_post_limit'] > 10) {
        $fields['jm_li_settings_post_limit'] = 10;
    }

    foreach ($fields as $key => $value) {
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

function jm_li_save_custom_settings_cache($data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'jmli_settings';

    $fields = [
        'jm_li_settings_cache_timeout' => strtolower(sanitize_text_field($data['jm_li_settings_cache_timeout'])),
    ];

    foreach ($fields as $key => $value) {
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