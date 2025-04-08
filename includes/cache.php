<?php
if (!defined('ABSPATH')) {
    exit;
}

function jm_li_cache_get($key)
{
    global $wpdb;
    $table = $wpdb->prefix . 'jmli_cache';

    $row = $wpdb->get_row(
        $wpdb->prepare("SELECT cache_value, expires_at FROM $table WHERE cache_key = %s", $key),
        ARRAY_A
    );

    if ($row && intval($row['expires_at']) > time()) {
        return maybe_unserialize($row['cache_value']);
    }

    return false;
}

function jm_li_cache_set($key, $value, $duration)
{
    global $wpdb;
    $table = $wpdb->prefix . 'jmli_cache';

    $expires_at = time() + $duration;
    $serialized_value = maybe_serialize($value);

    $existing = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE cache_key = %s", $key));

    if ($existing) {
        $wpdb->update(
            $table,
            ['cache_value' => $serialized_value, 'expires_at' => $expires_at],
            ['cache_key' => $key],
            ['%s', '%d'],
            ['%s']
        );
    } else {
        $wpdb->insert(
            $table,
            ['cache_key' => $key, 'cache_value' => $serialized_value, 'expires_at' => $expires_at],
            ['%s', '%s', '%d']
        );
    }
}

function jm_li_cache_clear($key = null)
{
    global $wpdb;
    $table = $wpdb->prefix . 'jmli_cache';

    if ($key) {
        $wpdb->delete($table, ['cache_key' => $key], ['%s']);
    } else {
        $wpdb->query("DELETE FROM $table");
    }
}
function jm_li_cache_clear_all()
{
    global $wpdb;
    $table = $wpdb->prefix . 'jmli_cache';

    $wpdb->query("TRUNCATE TABLE $table");
    return true;
}
