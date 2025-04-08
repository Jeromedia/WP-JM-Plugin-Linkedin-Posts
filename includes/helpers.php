<?php
if (!defined('ABSPATH')) exit;

function jm_li_get_custom_setting($key) {
    global $wpdb;
    $table_name = $wpdb->prefix . "jmli_settings";
    return $wpdb->get_var($wpdb->prepare("SELECT jmli_value FROM $table_name WHERE jmli_name = %s", $key));
}

function jm_li_get_active_company_name() {
    return jm_li_get_testing_mode()
        ? jm_li_get_custom_setting('jm_li_settings_testing_company_name')
        : jm_li_get_custom_setting('jm_li_settings_company_name');
}

function jm_li_get_api_base_url() {
    return rtrim(jm_li_get_custom_setting('jm_li_settings_api_base_url'), '/');
}

function jm_li_get_api_token() {
    return jm_li_get_custom_setting('jm_li_settings_api_token');
}

function jm_li_get_testing_mode() {
    return jm_li_get_custom_setting('jm_li_settings_testing_mode') === 'yes';
}

function jm_li_get_columns_limit() {
    return esc_attr(jm_li_get_custom_setting('jm_li_settings_column_limit'));
}

function jm_li_get_post_limit() {
    return esc_attr(jm_li_get_custom_setting('jm_li_settings_post_limit'));
}

function jm_li_get_cache_timeout() {
    return esc_attr(jm_li_get_custom_setting('jm_li_settings_cache_timeout'));
}
