<?php
/*
Plugin Name: Sidebar
Plugin URI: http://#
Description: This is a custom menu designed to deactivate the current main menu and replace it with a Sidebar menu. If you delete this plugin you won't find it on the WP Plugin Market, so handle with care. This plugin is in beta.  
Author: Phil Butenko
Author URI: http://#
Version: 	0.1
License: 	GPLv2
*/

function phils_sidemenu() {
	$defaults = array( 
 		'container_class' 	=> 'phils-sidebar', 
 		'container_id'    	=> 'phils-bar',
 		'menu_class'      	=> 'phils-menu', 
 		'menu_id'         	=> 'phils-menu-id',
 		'items_wrap'      	=> '<a href="#" id="phils-burger" class="phils-burger mobileHover"></a><ul id="%1$s" class="%2$s"><li><a id="bg-selector" href="#">Close Menu</a></li>%3$s</ul>'
 	);

	wp_nav_menu($defaults);
}
add_action( 'wp_footer', 'phils_sidemenu' );


function phils_scripts_enqueue() {

    $plugin_url = plugins_url();

    wp_enqueue_script( 'phils_browser_support', $plugin_url.'/sidebar/assets/js/phils-browser-support.js', array('jquery'),false, true);
    //wp_enqueue_script( 'phils_jquery', $plugin_url.'/sidebar/assets/js/jquery.js', array('jquery'),false, true);

    wp_register_style( 'phils_main_css', $plugin_url.'/sidebar/assets/css/phils-sidebar.css');
    wp_register_style( 'phils_remove_menu', $plugin_url.'/sidebar/assets/css/phils-remove-menu.css');
    wp_enqueue_style('phils_main_css');
    wp_enqueue_style('phils_remove_menu');
    wp_enqueue_style('phils_browser_support');
//    wp_enqueue_style('phils_jquery');
}
add_action('wp_enqueue_scripts', 'phils_scripts_enqueue');

function phils_last_nav_item($items) {
  return $items = '<li class="phils-first-item"><a id="phils-l-arrow" class="phils-l-arrow mobileHover">&nbsp;</a></li>'.$items;
}
add_filter('wp_nav_menu_items','phils_last_nav_item');

?>