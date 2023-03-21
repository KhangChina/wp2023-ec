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
        'ec_other',//menu_slug
        'ec_other_ui', 
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
    echo 'ec_dashboard';
}
function ec_other_ui()
{
    echo 'ec_other';
}
function ec_config_ui()
{
    echo 'ec_config_ui';
}