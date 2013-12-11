<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Database Utility Class
 * Required to override DB_forge's add_key method.
 * Modifies add_key method of DB_forge to allow the creation
 * of single, multi-column indexes as I thought it was supposed
 * to work when passed an array based on the documentation: 
 *
 * "Multiple column non-primary keys must be sent as an array."
 *
 * $this->dbforge->add_key(array('blog_name', 'blog_label'));
 * // gives KEY `blog_name_blog_label` (`blog_name`, `blog_label`) 
 *
 * @author 		Faust Gertz <faust@faustgertz.com>
 * @version 	0.1 
 * @category 	Database
 * @package 	CI_DB_forge
 * @subpackage 	MY_DB_forge
 */ 

class MY_DB_forge extends CI_DB_forge {

	/**
	 * Constructor
	 *
	 * 
	 *
	 */
	function __construct()
	{
		parent::__construct();
	}


	// --------------------------------------------------------------------

	/**
	 * Add Key with propper multi-column support
	 *
	 * @access	public
	 * @param	string	key
	 * @param	string	type
	 * @return	void
	 */
	function add_key($key = '', $primary = FALSE)
	{
		if ($key == '')
		{
			show_error('Key information is required for that operation.');
		}

		if ($primary === TRUE)
		{
			$this->primary_keys[] = $key;
		}
		else
		{
			$this->keys[] = $key;
		}
	}
}