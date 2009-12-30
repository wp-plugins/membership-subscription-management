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

//will be requiring this
if (!defined('_BYRDROLES')) define('_BYRDROLES', true);
if (!defined('_EXEC')) define('_EXEC', true);

if ( !isset($wp_did_header) ) {
	$wp_did_header = true;
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	require_once( ABSPATH . WPINC . '/template-loader.php' );
}



//loading resources
require_once dirname(__file__).'/define.php';
require_once ROLES_INC.DS.'factory.php';
require_once ROLES_INC.DS.'object.php';
require_once ROLES_INC.DS.'helper.php';

require_once ROLES_DB.DS.'table.php';

//make sure to add the db tables include path
bTable::addIncludePath( ROLES_TABLES );

?>