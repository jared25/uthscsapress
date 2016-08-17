<?php

/**
*   Admin Settings Page
*	Author: Jared Ozuna
*
*   Need Help? Reference https://www.youtube.com/watch?v=nvsK0cTH0So
*   Or reference the Settings API in the WordPress Codex
*
* add_submenu_page -> https://developer.wordpress.org/reference/functions/add_submenu_page/
**/
//Generate Menu Item for Theme Settings on the Admin Menu Action
function utPress_add_admin_page() {
	add_menu_page('uthscsaPress Theme Options', 'UT Health Settings', 'manage_options', 
	'utPress_custom_settings', 'utPress_user_theme_settings', 
	'dashicons-admin-generic');
	
	add_submenu_page( 'utPress_custom_settings', 'UT Health Settings', 'Settings', 'manage_options',
	'utPress_custom_settings', 'utPress_user_theme_settings');
	
	add_submenu_page( 'utPress_custom_settings', 'UT Health Settings', 'Custom CSS', 'manage_options',
	'utPress_custom_settings_css', 'utPress_user_theme_css');
	
	add_submenu_page( 'utPress_custom_settings', 'UT Health Settings', 'Documentation', 'manage_options',
	'utPress_setting_submenu_documentation', 'utPress_settings_documentation');
}
add_action('admin_menu', 'utPress_add_admin_page');

//The settings of the themes custom settings. 
function utPress_user_theme_settings(){
	//generation of our admin page
}

function utPress_theme_sub_settings(){
	//Do something
}
function utPress_settings_documentation(){
	//Do something
}