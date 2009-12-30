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

//loading resources
require_once dirname(__file__).'/includes/framework.php';

// Check to ensure this file is within the rest of the framework
defined('_BYRDROLES') or die();

//loading resources
require_once dirname(__file__).'/byrd_properties.php';

//class
class ByrdConfig extends ByrdRolesConfigurations {

	/**
	 * This is the form that will display to the users
	 */
	function display(){
		?>
		<form action="" method="post">
		<?php require_once dirname(__file__).'/config.php'; ?>
 		<input type="submit" name="submit" value="Update Options" />
		</form>
		<?php
	}
	
	/**
	 * manages the checkbox values
	 */
	function clicked( $property ){
	 	if ($property) echo " checked ";
	 }
	
	/**
	 * manages the select boxes
	 */
	function select( $property, $value ){
	 	if ($property == $value) echo " selected ";
	 }
	
	/**
	 * routing the config page
	 * 
	 */
	function __construct(){
		//Check user rights
		if ( !current_user_can('manage_options') ) die(__('Sorry, you don\'t have the rights?'));
		
		//binds the post to this class
		$this->setProperties( $_POST );
		
		//update the posted vars
		if (isset($_POST['submit'])){ 
			$this->updateOptions();
			$this->specialUpdates();
		}
		
		//get the options
		$this->getOptions();
		
		//display the form
		$this->display();
	}
	
	/**
	 * loops through the properties and binds them to this class
	 * 
	 */
	function getOptions(){
		//looping through and updating all the properties
		foreach ($this->getProperties() as $property => $value){
			if (get_option($property)) $this->$property = get_option($property);
		}
		
		//special defaults
		if (is_null($this->notify_url)) $this->notify_url = get_bloginfo( 'wpurl' ).'/wp-content/plugins/byrd_rolessubscriptions/ipn.php';  
		if (is_null($this->_return)) $this->_return = get_bloginfo( 'wpurl' ).'/wp-content/plugins/byrd_rolessubscriptions/confirmation.php';  
		if (is_null($this->cancel_return)) $this->cancel_return = get_bloginfo( 'wpurl' ).'/wp-content/plugins/byrd_rolessubscriptions/cancel_return.php';  
		
	}
	
	/**
	 * loops through and stores theres properties
	 * 
	 */
	function updateOptions(){
		//looping through and updating all the properties
		foreach ($this->getProperties() as $property => $value) update_option($property, $value);
		
		
	}

	/**
	 * This will save the email notifications
	 * 
	 */
	function specialUpdates(){
		file_put_contents(ROLES.DS.'mail_canceled.php', stripslashes($this->_mail_canceled) );
		file_put_contents(ROLES.DS.'mail_expired.php', stripslashes($this->_mail_expired) );
		file_put_contents(ROLES.DS.'mail_renewed.php', stripslashes($this->_mail_renewed) );
		file_put_contents(ROLES.DS.'mail_signup.php', stripslashes($this->_mail_signup) );
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
				$this->$k = stripslashes($v);
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
//start the functions
$config = new ByrdConfig();