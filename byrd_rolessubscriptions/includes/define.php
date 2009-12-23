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
defined('_BYRDROLES') or die();


//Defining base path
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
define('ROLES', str_replace(DS.'includes','', dirname(__file__) ));

//defining all paths
define('ROLES_INC', ROLES.DS.'includes');
define('ROLES_DB', ROLES.DS.'database');
define('ROLES_TABLES', ROLES.DS.'database'.DS.'tables');

