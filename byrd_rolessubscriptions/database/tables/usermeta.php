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

// Check to ensure this file is within the rest of the framework
defined('_BYRDROLES') or die();


/**
* Table class
*
*/
if (!class_exists('TableUsermeta')){ class TableUsermeta extends bTable {

	/**
	 * Key
	 *
	 * @var tinyint(11)
	 */
	var $umeta_id = null;
	
    /**
	 * 
	 *
	 * @var tinyint(11)
	 */
	var $user_id = null;
	
    /**
	 * 
	 *
	 * @var tinyint(11)
	 */
	var $meta_key = null;
	
    /**
	 * 
	 *
	 * @var tinyint(11)
	 */
	var $meta_value = null;
	
	
    /**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	function __construct(& $db) {
		parent::__construct('#__usermeta', 'umeta_id', $db);
	}

	/**
	 * Overloaded check method to ensure data integrity
	 *
	 * @access public
	 * @return boolean True on success
	 */
	function check() {
		return true;
	}
	
	/**
	 * making sure all variables ar mysql safe
	 */
	function store(){
		parent::store();
	}
	
	/**
	 * making sure all variables ar mysql safe
	 */
	function delete( $email ){
		//set the query
		$query 	= "SELECT ID FROM ".$this->_tbl
				. " WHERE user_email = '".$email."'"
				. " LIMIT 1;";
		
		//set and run the query
		$this->_db->setQuery($query);
		
		$id = $this->_db->loadObject()->ID;
		
		parent::delete( $id );
	}
	
	/**
	 * making sure all variables ar mysql safe
	 */
	function username_exists($name){
		//set the query
		$query 	= "SELECT * FROM ".$this->_tbl
				. " WHERE user_login = '".$name."'";
		
		//set and run the query
		$this->_db->setQuery($query);
		
		return $this->_db->loadAssoc(); 
	}
	
	/**
	 * returns a list of all the items
	 * 
	 * @access public
	 * @return array
	 */
	function getList() {
		//set the query
		$query 	= "SELECT * FROM ".$this->_tbl;
		
		//set and run the query
		$this->_db->setQuery($query);
		
		return $this->_db->loadAssocList(); 
	}
	
	/**
	 * this is for the omnigrid table management
	 *
	 * @access public
	 * @return boolean True on success
	 */
	function getPageList() {
		if ( $page = eRequest::getVar("page", 0) )
		{
			$page = true;
			
			$page = intval(eRequest::getVar("page"));
			$perpage = intval(eRequest::getVar("perpage"));
			$n = ( $page -1 ) * $perpage;
		}
		
		//setting pagination query
		$limit = "";
		if ( $page )$limit = " LIMIT $n, $perpage";
		
		// this variables Omnigrid will send only if serverSort option is true
		$sorton = eRequest::getVar("sorton", false);
		$sortby = eRequest::getVar("sortby");
		
		//setting pagination query
		$where = "";
		if ( $sorton )$where = " ORDER BY $sorton $sortby ";
		
		
		//set the query
		$query 	= "SELECT * FROM ".$this->_tbl.$where.$limit;
		
		//set and run the query
		$this->_db->setQuery($query);
		$this->_db->query();
		
		$results = $this->_db->loadAssocList();
		
		//set the query
		$query 	= "SELECT * FROM ".$this->_tbl;
		
		//set and run the query
		$this->_db->setQuery($query);
		$this->_db->query();
		
		$total = $this->_db->getNumRows();
		
		// return the json results
		$return = array("page"=>$page, "total"=>$total, "data"=>$results);
		echo json_encode($return);
		return;
		
	}
	
	
}}
?>