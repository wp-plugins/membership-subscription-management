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



class byrdConfigRoles extends byrdPropertiesRoles {

	/**
	 * routing the config page
	 * 
	 */
	function __construct(){
		//Check user rights
		if ( !current_user_can('manage_options') ) die(__('Sorry, but you don\'t have the rights.'));
		
		if (!empty($_POST)){
			//update the posted options
			$this->setProperties( $_POST );
			$this->setOptions();
		}
		
		//get all of the options
		$this->getOptions();
		$this->getUrls();
		
	}
	
	/**
	 * loops through and stores theres properties
	 * 
	 */
	function getUrls(){
		if (is_null($this->notify_url) || !$this->notify_url) $this->notify_url = byrd_http_plugin(__file__).'/ipn.php';
		if (is_null($this->return) || !$this->return) $this->return = byrd_http_plugin(__file__).'/confirmation.php';
		if (is_null($this->cancel_return) || !$this->cancel_return) $this->cancel_return = byrd_http_plugin(__file__).'/cancel_return.php';
		
	}
	
	/**
	 * loops through and stores the property values
	 * 
	 */
	function setOptions(){
		//we don't want to be setting empty values
		if (!isset($_POST['submit'])) return false;
		
		//looping through and updating all the properties
		foreach ($this->getProperties() as $property => $value) update_option($property, $value);
		
		file_put_contents(ROLES.DS.'mail_canceled.php', stripslashes($this->_mail_canceled) );
		file_put_contents(ROLES.DS.'mail_expired.php', stripslashes($this->_mail_expired) );
		file_put_contents(ROLES.DS.'mail_renewed.php', stripslashes($this->_mail_renewed) );
		file_put_contents(ROLES.DS.'mail_signup.php', stripslashes($this->_mail_signup) );
	}

	/* 
	 * catch all function
	 */
	function __call($method,$arguments) {
		switch (substr($method,0,3)){
			case 'get': echo $this->loadConfig($method,$arguments); break;
			case 'scr': echo $this->javaScript($method,$arguments); break;
			case 'css': echo $this->cssLink($method,$arguments); break;
			
		}
		
	}
	
}
