<?php 

function jm_li_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . "jmli_settings"; // Use WordPress table prefix
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        jmli_name VARCHAR(255) NOT NULL,
        jmli_value VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}