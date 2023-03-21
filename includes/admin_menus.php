<?php
//Thêm menu
add_action('admin_menu','ec_admin_menu');
function ec_admin_menu()
{
    //Thêm menu cha
    add_menu_page(
        'EC Dev',
        'EC Dev',
        'manage_options',//roles
        'ec_dashboard',//menu_slug
        'ec_dashboard_ui', 
        'dashicons-dashboard', //icon
        25
    );
    add_submenu_page(
        'ec_dashboard', 
        'Other', 
        'Other', 
        'manage_options', 
        'ec_order',//menu_slug
        'ec_order_ui', 
        26
    );
    add_submenu_page(
        'ec_dashboard', 
        'Config', 
        'Config', 
        'manage_options', 
        'ec_config',//menu_slug
        'ec_config_ui', 
        27
    );
}


function ec_dashboard_ui()
{
   include_once WP2023_PATH.'includes/admin_pages/dashboard.php';
}
function ec_order_ui()
{
    include_once WP2023_PATH.'includes/admin_pages/order.php';
}
function ec_config_ui()
{
    include_once WP2023_PATH.'includes/admin_pages/config.php';
}