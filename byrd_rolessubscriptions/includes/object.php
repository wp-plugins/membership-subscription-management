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
global $byrd_default_user_level; 
$byrd_default_user_level = 0;

class rObject {

	/**
	 * A hack to support __construct() on PHP 4
	 *
	 * Hint: descendant classes have no PHP4 class_name() constructors,
	 * so this constructor gets called first and calls the top-layer __construct()
	 * which (if present) should call parent::__construct()
	 *
	 * @access	public
	 * @return	Object
	 */
	function rObject()
	{
		$args = func_get_args();
		call_user_func_array(array(&$this, '__construct'), $args);
	}
	
	/**
	 * deletes a users account
	 * 
	 * @return unknown_type
	 */
	function deleteUser(){
		$_tbl =& bTable::getInstance('users', 'Table');
		$_tbl->delete( $this->payer_email );
	}
	
	/**
	 * creates a users account
	 * 
	 * @return unknown_type
	 */
	function newUser(){
		global $byrd_default_user_level;
		$_tbl =& bTable::getInstance('users', 'Table');
		
		$i='';
		while(1==1){
			$this->user_name = str_replace(' ','', $this->first_name.$this->last_name.$i);
			
			$user_id = $_tbl->username_exists( $this->user_name );
			if ( !$user_id ) {
				$this->password = $this->wp_generate_password( 12, false );
				$user_id = $this->wp_create_user( $this->user_name, $this->password, $this->payer_email );
				
				$usermeta =& bTable::getInstance('usermeta', 'Table');
				$usermeta->bind( array(
					'user_id' => $user_id,
					'meta_key' => 'word_user_level',
					'meta_value' => $byrd_default_user_level
				) );
				$usermeta->store();
				
				break;
			}
			if(!is_numeric($i))$i=0;$i++;
		}
		
	}
	
	function wp_create_user( $username, $password, $email ){
		//save this to the database
		$_tbl =& bTable::getInstance('users', 'Table');
		$_tbl->bind( array(
			'user_login' => $username,
			'user_pass' => $this->wp_hash_password($password),
			'user_nicename' => $username,
			'user_email' => $email,
			'user_registered' => date('Y-m-d H:i:s'),
			'user_status' => 0,
			'display_name' => $this->first_name.' '.$this->last_name
			
		) );
		$_tbl->store();
		return $_tbl->ID;
	}
		
	function wp_generate_password($length = 12, $special_chars = true) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		if ( $special_chars )
			$chars .= '!@#$%^&*()';
	
		$password = '';
		for ( $i = 0; $i < $length; $i++ )
			$password .= substr($chars, rand(0, strlen($chars) - 1), 1);
		return $password;
	}
	
	function wp_hash_password($password) {
		global $wp_hasher;
	
		if ( empty($wp_hasher) ) {
			require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/class-phpass.php');
			// By default, use the portable hash from phpass
			$wp_hasher = new PasswordHash(8, TRUE);
		}
	
		return $wp_hasher->HashPassword($password);
	}

	/**
	 * Returns an associative array of object properties
	 *
	 * @access	public
	 * @param	boolean $public If true, returns only the public properties
	 * @return	array
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
	 * Set the object properties based on a named array/hash
	 *
	 * @access	protected
	 * @param	$array  mixed Either and associative array or another object
	 * @return	boolean
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
	 * This function uses the php mail class to send mail
	 * 
	 * @param $Sender
	 * @param $Recipiant
	 * @param $Subject
	 * @param $Message
	 * @param $Attach
	 * @param $SendCopy
	 * @return unknown_type
	 */
	function SendEmail( $Sender =false, $Recipiant =false, $Subject =false, $Message =false, $Attach =false ,$SendCopy =true ){
		require_once ROLES_INC.DS.'phpmail.php';
		
		/*
		 * Setting the sender and receipiant to defaults
		 * 
		 */
		$Cc 		= "";
  		$Bcc 		= "";
  		
  		if (!$Sender){
  			//$c 			= new eConfig();
			$Sender 	= 'jonathonbyrd@gmail.com';
			//unset($c);
		}
  		if (!$Recipiant){
			//$c 			= new eConfig();
			$Sender 	= 'jonathonbyrd@gmail.com';
			//unset($c);
		}
		
  		/*
  		 * Building the message
  		 */
  		if(!is_file($Message)){
  			$htmlVersion 	= $Message;
  			
  		} else {
  			ob_start();
  			require $Message;
  			$Message = ob_get_flush();
  			
			/*
			 * replace the variables in the message
			 */			
  			foreach($this->getProperties() as $k => $v){
  				$Message 		= str_replace('_'.$k.'_', $v, $Message);
  			}
  			$htmlVersion 	= $Message;
  		}
  		
  		
  		/*
  		 * Load the class and run its parts
  		 */
  		$msg = new Email($Recipiant, $Sender, $Subject); 
  		$msg->Cc = $Cc;
  		$msg->Bcc = $Bcc;
		
		//** set the message to be text only and set the email content.
		
  		$msg->TextOnly = false;
  		$msg->Content = $htmlVersion;
  		
  		//** attach this scipt itself to the message.
		if (is_file($Attach)){
  			$msg->Attach($Attach, "text/plain");
		}
		//** send the email message.
		
		$SendSuccess = $msg->Send();				
  		unset($msg);
		
		if ($SendCopy){
			/*
			 * Load the class and run its parts
			 */
			$msg 		= new Email($Sender, $Recipiant, $Subject); 
			$msg->Cc 	= $Cc;
			$msg->Bcc 	= $Bcc;
	
			//** set the message to be text only and set the email content.
	
			$msg->TextOnly = false;
			$msg->Content = $htmlVersion;
	  
			//** attach this scipt itself to the message.
			if (is_file($Attach)){
				$msg->Attach($Attach, "text/plain");
			}
			//** send the email message.
			$Send 		= $msg->Send();
			
		}	
		
  		return $SendSuccess ? true : false;
		
	}
	
}?>