<?php
function setup_db() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nemocontact';
    $sql = "CREATE TABLE $table_name ( `id` INT(12) NOT NULL AUTO_INCREMENT , `name` VARCHAR(40) NOT NULL , `email` VARCHAR(50) NOT NULL , `date` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`))";
 
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
?>