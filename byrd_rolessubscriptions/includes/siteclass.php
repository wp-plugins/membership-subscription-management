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

require_once dirname(__file__).'/framework.php';


// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();


class byrdSiteRoles extends byrdPropertiesRoles {

	/**
	 * acts as a controller
	 * @return none
	 */
	function __construct(){
		//get all of the options
		$this->getOptions();
		
	}
	/**
	 * gets the html form and displays it to the user
	 * 
	 * @param $id
	 * @return string
	 */
	function byrd_subscription(){
		if ($this->pp_sandbox) $action ='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
		else $action ='https://www.paypal.com/cgi-bin/webscr';
		
		$return ='<h3>'.$this->item_name.'</h3>
		<div class="left width75">'.$this->item_description.'</div>
		<div class="left width25">$'.$this->a3.'</div>
		<div class="clear"></div>
		
		<div style="position:relative;float:right;"> 
		 <form action="'.$action.'" method="post">
		  <input type="hidden" name="cmd" value="_xclick-subscriptions">
		  '; 
		foreach ($this->getProperties() as $property => $value) { 
			if (is_null($this->$property) || !$this->$property) continue; 
			$return .= '<input type="hidden" name="'.$property.'" value="'.$value.'">'; 
		} 
		$return .= '
		  <input type="submit" name="submit" value="'.$this->submit_button_text.'" border="0" alt="PayPal - The safer, easier way to pay online">
		 </form>
		</div>
		<div style="display:block;width:100%;clear:both;height:1px;line-height:1px;"></div>';
		
		return $return;
	}
	
	/**
	 * <!-- byrd_subscription(); -->
	 * <!-- byrd_login(); -->
	 * 
	 * @param $content
	 * @return unknown_type
	 */
	function contentFilters( $content = '' ) {
		if (strpos($content, '<!-- byrd_subscription() -->') !== false){
			$content = str_replace("<!-- byrd_subscription() -->", $this->byrd_subscription(), $content);
		}
		if (strpos($content, '<!-- byrd_login() -->') !== false){
			$content = str_replace("<!-- byrd_login() -->", $this->byrd_login(), $content);
		}
		
		return $content;
	}
	
	/* 
	 * catch all function
	 */
	function __call($method,$arguments) {
		switch (substr($method,0,3)){
			case 'get': $this->loadTheme($method,$arguments); break;
			case 'scr': $this->javaScript($method,$arguments); break;
			case 'css': $this->cssLink($method,$arguments); break;
			
		}
		
	}
	
	
} 
