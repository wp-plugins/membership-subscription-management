<?php 
/**
 * @subpackage	: Wordpress
 * @author		: Jonathon Byrd
 * @copyright	: All Rights Reserved, Byrd Inc. 2009
 * @link		: http://www.jonathonbyrd.com
 * 
 * Jonathon Byrd is a freelance developer for hire. Jonathon has owned many companies and
 * understands the importance of website credibility. Contact Jonathon Today.
 * 
 */ 



// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();


//Defining base path
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

define('ROLES', str_replace(DS.'includes','', dirname(__file__) ));

//defining all paths
define('ROLES_INCLUDES', 	ROLES.DS.'includes');
define('ROLES_SUPPORT', 	ROLES.DS.'support');
define('ROLES_DATABASE', 	ROLES.DS.'database');
define('ROLES_TABLES', 		ROLES_DATABASE.DS.'tables');

//define('ROLES_HTTP', 		get_bloginfo( 'wpurl' ).'/wp-content/plugins/'.$plugin_folder);