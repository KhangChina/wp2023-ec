<?php
/*
 * Plugin Name:       My Basics Plugin EC
 * Plugin URI:        https://github.com/KhangChina/wordpress-docker
 * Description:       Plugin started
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            Khang Nguyễn
 * Author URI:        https://github.com/KhangChina
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       wp2023-ec
 * Domain Path:       /languages
 */

//Định nghĩa các hằng số plugin

define('WP2023_PATH', plugin_dir_path(__FILE__));
define('WP2023_URL', plugin_dir_url(__FILE__));

//  echo '<br>'.WP2023_PATH;
//  echo '<br>'.WP2023_URL; // URL CSS
//  die();

//Định nghĩ hành động khi kích hoạt
register_activation_hook(__FILE__, 'pluginActive');
function pluginActive()
{

    // Tạo csdl
    global $table_prefix, $wpdb;
    $tblname = 'orders';
    $wp_track_table = $table_prefix . "$tblname";
    $charset_collate = $wpdb->get_charset_collate();
    if ($wpdb->get_var("show tables like '$wp_track_table'") != $wp_track_table) {
        $sql = "CREATE TABLE $wp_track_table  (
            id int NOT NULL AUTO_INCREMENT,
            created date NULL DEFAULT NULL,
            total double NULL DEFAULT NULL,
            status varchar(225) NULL DEFAULT 'pending',
            payment_method varchar(225) NULL DEFAULT NULL,
            customer_name varchar(225) NULL DEFAULT NULL,
            customer_phone varchar(225) NULL DEFAULT NULL,
            customer_email varchar(25)  NULL DEFAULT NULL,
            note text NULL,
            deleted tinyint NOT NULL DEFAULT 0,
            PRIMARY KEY (id) USING BTREE
          ) $charset_collate;";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
    }


    //Tạo seeding data
    $wpdb->insert( 
        $wp_track_table, 
        [
            'created' => current_time('mysql'),
            'total' => '20000', 
            'payment_method' => 'cod',
            'customer_name' => 'Đào Văn Đức',
            'customer_phone' => '0964440776',
            'customer_email'=>'duc.dao@htgsoft.com',
            'note'=>'Giao đến ETC' 
        ]
    );
    $wpdb->insert( 
        $wp_track_table, 
        [
            'created' => current_time('mysql'),
            'total' => '90000',
            'payment_method' => 'bank',
            'customer_name' => 'Nguyễn Văn Hải',
            'customer_phone' => '0965550776',
            'customer_email'=>'hai.nguyen@htgsoft.com',
            'note'=>'Giao đến ETC'
        ]
    );
    $wpdb->insert( 
        $wp_track_table, 
        [
            'created' => current_time('mysql'),
            'total' => '80000',
            'payment_method' => 'Bank',
            'customer_name' => 'Nguyễn Thị Heo',
            'customer_phone' => '09651110666',
            'customer_email'=>'heo.nguyen@htgsoft.com',
            'note'=>'Giao đến ETC',
            'status'=>'completed'
        ]
    );
    //Tạo option
}

register_deactivation_hook(__FILE__, 'pluginDeactivation');
function pluginDeactivation()
{
    global $table_prefix;
    $tblname = 'orders';
    $wp_track_table = $table_prefix."$tblname";
    $sql = "DROP TABLE IF EXISTS $wp_track_table ;";
    require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
    $wpdb->query($sql);
    //xóa option
}

include_once WP2023_PATH . 'includes/includes.php';
