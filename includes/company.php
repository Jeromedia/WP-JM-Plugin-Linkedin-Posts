<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_li_get_company_name()
{
    return jm_li_get_custom_setting('jm_li_settings_company_name');
}

function jm_li_get_active_company_name()
{
    $testing_mode = jm_li_get_testing_mode();
    if ($testing_mode) {
        return jm_li_get_custom_setting('jm_li_settings_testing_company_name');
    }
    return jm_li_get_company_name();
}

function jm_li_get_testing_mode()
{
    $testing_mode = jm_li_get_custom_setting('jm_li_settings_testing_mode');
    return $testing_mode === 'yes';
}
