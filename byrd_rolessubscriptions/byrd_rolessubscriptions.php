<?php
/*
Plugin Name: User Role Subscriptions
Plugin URI: http://www.jonathonbyrd.com
Description: This simple wordpress plugin is designed to manage user role subscriptions. You may charge differently for all roles and manage their subscription periods.
Version: 1.0.0
Date: December 20th, 2009
Author: Jonathon Byrd
Author URI: http://www.jonathonbyrd.com
*/ 

//loading resources
require_once dirname(__file__).'/includes/framework.php';

// Check to ensure this file is within the rest of the framework
defined('_BYRDROLES') or die();


//adding admin menu options
add_action('admin_menu', 'Byrd_roles_config');
function Byrd_roles_config(){if ( function_exists('add_submenu_page') ) add_submenu_page('options-general.php', 
	__('Membership Subscription'), 
	__('Membership Subscription'),
	'manage_options', 
	'byrd_rolessubscriptions/byrd_rolessubscriptions_config.php', 
	'');}

//loading resources
require_once dirname(__file__).'/byrd_properties.php';
global $byrdRoles;

//class
class byrdRoles extends ByrdRolesConfigurations {

	/**
	 * loads the proper functions
	 */
	function __construct(){
		//binding the options to this class
		$this->getOptions();
	}
	
	/* 
	 * dynamic function server 
	 */
	function __call($method,$arguments) {
		$page = $this->from_camel_case(substr($method,3,strlen($method)-3));
		require_once dirname(__file__).'/'.$page.'.php';
	} 
  
	/* 
	 * uncamelcaser: via http://www.paulferrett.com/2009/php-camel-case-functions/ 
	 */ 
	function from_camel_case($str) { 
		$str[0] = strtolower($str[0]);
		$func = create_function('$c', 'return "_" . strtolower($c[1]);');
		return preg_replace_callback('/([A-Z])/', $func, $str);
	}  

	/**
	 * loops through the properties and binds them to this class
	 * 
	 */
	function getOptions(){
		//looping through and updating all the properties
		foreach ($this->getProperties() as $property => $value) $this->$property = get_option($property);
	}
	
	/**
	* Set the object properties based on a named array/hash
	*
	* @access	protected
	* @param	$array  mixed Either and associative array or another object
	* @return	boolean
	* @see		set()
	* @since	1.5
	*/
	function setProperties( $properties )
	{
		$properties = (array) $properties; //cast to an array

		if (is_array($properties))
		{
			foreach ($properties as $k => $v) {
				$this->$k = $v;
			}

			return true;
		}

		return false;
	}
	
	/**
	 * Returns an associative array of object properties
	 *
	 * @access	public
	 * @param	boolean $public If true, returns only the public properties
	 * @return	array
	 * @see		get()
	 * @since	1.5
 	 */
	function getProperties( $public = true )
	{
		$vars  = get_object_vars($this);

        if($public)
		{
			foreach ($vars as $key => $value)
			{
				if ('_' == substr($key, 0, 1)) {
					unset($vars[$key]);
				}
			}
		}

        return $vars;
	}
	
	/**
	 * the serialize dont function properly when a variable contain a ; 
	 * I wrote these two functions that resolve this problem:
	 * this function works only with arrays:
	 * @param $str
	 * @return unknown_type
	 */
	function base64_unserialize($str){
	    $ary = unserialize($str);
	    if (is_array($ary)){
	        foreach ($ary as $k => $v){
	            if (is_array(unserialize($v))){
	                $ritorno[$k]=base64_unserialize($v);
	            }else{
	                $ritorno[$k]=base64_decode($v);
	            }
	        }
	    }else{
	        return false;
	    }
	    return $ritorno;
	}
	function base64_serialize($ary){
	    if (is_array($ary)){
	        foreach ($ary as $k => $v){
	            if (is_array($v)){
	                $ritorno[$k]=base64_serialize($v);
	            }else{
	                $ritorno[$k]=base64_encode($v);
	            }
	        }
	    }else{
	        return false;
	    }
	    return serialize ($ritorno);
	}
	
} 

$byrdRoles = new byrdRoles();
?>