<?php 
/**
 * Plugin Name: User Role Subscriptions
 * Plugin URI: http://www.jonathonbyrd.com
 * Description: This simple wordpress plugin is designed to manage user role subscriptions. You may charge differently for all roles and manage their subscription periods.
 * Version: 1.5.0
 * Date: December 20th, 2009
 * Author: Jonathon Byrd
 * Author URI: http://www.jonathonbyrd.com
 * 
 * @subpackage	: Wordpress
 * @author		: Jonathon Byrd
 * @copyright	: All Rights Reserved, Byrd Inc. 2009
 * @link		: http://www.jonathonbyrd.com
 * 
 * Jonathon Byrd is a freelance developer for hire. Jonathon has owned many companies and
 * understands the importance of website credibility. Contact Jonathon Today.
 * 
 */ 

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'framework.php';


// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();

if ( class_exists('byrdSiteRoles') ){
	global $byrdRoles;
	$byrdRoles = new byrdSiteRoles();
	
	//adding admin menu options
	if ( function_exists('add_action') ) add_action('admin_menu', 'plugin_config_Roles');
	function plugin_config_Roles(){
		if ( function_exists('add_submenu_page') ){
			add_submenu_page('users.php',__('Role Subscriptions'),__('Role Subscriptions'),'manage_options',dirname(__file__).DS.'config_index.php','');
		}
		
	}
	
	add_filter('the_content', array(&$byrdRoles, 'contentFilters'));
	
	//php method of loading the contact form
	if (!function_exists('byrd_subscription')){ function byrd_subscription(){
		global $byrdRoles;
		$byrdRoles->byrd_subscription();
	}}
	
	function getLogin(){
		global $byrdRoles;
		$byrdRoles = new getLogin();
	}
	
}

