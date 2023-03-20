<?php
//Gỡ plugin

// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}
// Xóa option
// $option_name = 'wporg_option';
// delete_option( $option_name );
// delete_site_option( $option_name );

//Xóa csdl
// global $wpdb;
// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );