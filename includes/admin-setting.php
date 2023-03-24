<?php
//Khai báo hàm sử dụng: add_action( 'admin_init', <function name> );
add_action( 'admin_init', 'ec_settings_init' );
function ec_settings_init()
{
    // Register a new setting for "wporg" page.
    /*
    register_setting( string $option_group, string $option_name, array $args = array() )
    add_settings_section( string $id, string $title, callable $callback, string $page, array $args = array() )
    add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
     */
	register_setting( 'ec_page_setting', 'ec_options' );


    add_settings_section('ec_section_developers',
    'Info', 
    'ec_section_developers_html',
    'ec_page'
);
    add_settings_field( 
        'ec_setting_name', 
        'Name Setting',
        'ec_setting_name_render', 
        'ec_page_setting', 
        'ec_section_developers', //$args
        [
            'label_for'         => 'ec_setting_name',
			'class'             => 'form-control',
			'type'              => 'text',
        ]
    );

}
function ec_setting_name_render($args) 
{
    echo '<pre> Name !</pre>';
}
function ec_section_developers_html()
{
    echo '<pre> Session is here !</pre>';
}