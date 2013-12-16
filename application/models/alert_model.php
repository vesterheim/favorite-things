<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model for Alerts
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Model
 * @subpackage alerts_model
 *
 * @todo Do we need a keep old function that copies the old alerts 
 *       to the new alerts array.
 */		
class Alert_model extends CI_Model 
{	 	
	protected $_new = array();
	protected $_old = array();
	/**
	 * Constructs the Artifact model
	 */	
    function __construct()
    {        
        parent::__construct();  
 		$this->_old = $this->session->flashdata('alerts');
 		if ($this->_old  === FALSE)
 		{
 			$this->_old = array();
 		}

	}


	/**
	  * Set Alerts
	  *
	  * @access public
	  * @param string $message
	  * @param string $type	  
	  * @return boolean
	  */
	public function add($message, $type='success', $flashdata=TRUE)
	{
		$valid_types = array('danger', 'info', 'success', 'warning');
		/* add validation */
		/* add text filtering */
		$this->_new[] = array(
			'message' => $message,
			'type' => $type
		);
		if ($flashdata === TRUE) {
			$this->session->set_flashdata('alerts', $this->_new);
		}
	}


	/**
	  * Get Alerts
	  *
	  * @access public	  
	  * @return boolean|array
	  */	
	public function get() 
	{
		return $this->_old;		
	}

	/**
	  * Get Alerts
	  *
	  * @access public	  
	  * @return boolean|array
	  */	
	public function get_latest() 
	{
		return $this->_new;		
	}	
}