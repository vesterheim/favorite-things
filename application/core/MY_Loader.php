<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY Loader Class
 *
 * Loads views and files
 *
 * Required to override DB_forge's add_key method.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author 		Faust Gertz <faust@faustgertz.com>
 * @version 	0.1 
 * @category	Loader
 * @link		http://codeigniter.com/user_guide/libraries/loader.html
 */
class MY_Loader extends CI_Loader {
	// --------------------------------------------------------------------

	/**
	 * Load the Database Forge Class
	 *
	 * @return	string
	 */
	public function dbforge()
	{
		if ( ! class_exists('CI_DB'))
		{
			$this->database();
		}

		$CI =& get_instance();

		require_once(BASEPATH . 'database/DB_forge.php');
		require_once(BASEPATH . 'database/drivers/' . $CI->db->dbdriver . '/' . $CI->db->dbdriver . '_forge.php');

		/* Look for overload file in the /application/database folders */
		if (file_exists(BASEPATH . APPPATH . 'database/MY_DB_forge.php') && file_exists(BASEPATH . APPPATH . 'database/drivers/' . $CI->db->dbdriver . '/MY_' . $CI->db->dbdriver . '_forge.php')) {
			require_once(BASEPATH . APPPATH . 'database/MY_DB_forge.php');
			require_once(BASEPATH . APPPATH . 'database/drivers/' . $CI->db->dbdriver . '/MY_' . $CI->db->dbdriver . '_forge.php');
			$class = 'MY_DB_'.$CI->db->dbdriver.'_forge';
		}
		else 
		{  
   			$class = 'CI_DB_'.$CI->db->dbdriver.'_forge';
  		}

		$CI->dbforge = new $class();
	}	
}