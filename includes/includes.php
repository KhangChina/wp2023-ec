<?php 
// Đăng kí sản phẫm và danh mục sản phẩm
include_once WP2023_PATH.'includes/post_types.php';
//Đăng kí thêm trường cho sản phẫm
include_once WP2023_PATH.'includes/metaboxes.php';
 //Thêm cột cho trang quản lý san phẩm
include_once WP2023_PATH.'includes/admin_columns.php';
// Thêm menu 
include_once WP2023_PATH.'includes/admin_menus.php';
//Thêm class chức năng order
include_once WP2023_PATH.'includes/class/ec_order.php';
//Sử dụng ajax order
include_once WP2023_PATH.'includes/admin_ajaxs.php';
//Sủ dung ajax admin
include_once WP2023_PATH.'includes/admin-setting.php';
//Sử dụng api cho plugin
include_once WP2023_PATH.'includes/apis.php';