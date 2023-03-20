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

 define('WP2023_PATH',plugin_dir_path(__FILE__));
 define('WP2023_URL',plugin_dir_url(__FILE__));

//  echo '<br>'.WP2023_PATH;
//  echo '<br>'.WP2023_URL; // URL CSS
//  die();

//Định nghĩ hành động khi kích hoạt
register_activation_hook(__FILE__,'pluginActive');
function pluginActive(){
   // Tạo csdl

   //Tạo seeding data

   //Tạo option
}

register_deactivation_hook(__FILE__,'pluginDeactivation');
function pluginDeactivation(){

    //xóa option
}

include_once WP2023_PATH.'includes/includes.php';