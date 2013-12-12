<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY Model Class
 * Set a bunch of properties and methods to stay DRY while making 
 * database seeding easier. I "borrowed" several ideas from Jamie 
 * Rumbelow's codeigniter-base-model, especially the validation 
 * functionality and _fetch_table() method. Neither of which will 
 * probably *necessary* for this project due to time constraints.
 * If CodeIgniter was longer for our use and/or this project did
 * not have such modest needs, I might have simply used Jamie's code.
 * @link http://github.com/jamierumbelow/codeigniter-base-model
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net> 
 *
 * @author      Faust Gertz <faust@faustgertz.com>
 * @version     0.1 
 * @package     CI_Model
 * @subpackage  MY_Model
 * @category    Libraries
 * @link        http://codeigniter.com/user_guide/libraries/config.html
 */

class MY_Model extends CI_Model
{
    /**
     * An array of validation rules. This needs to be the same format
     * as validation rules passed to the Form_validation library.
     */
    protected $validate;

    /**
     * Optionally skip the validation. Used in conjunction with
     * skip_validation() to skip data validation for any future calls.
     */
    protected $skip_validation = FALSE;

    /**
     * Table of current model
     * Set in the child class's constructer before calling 
     * parent::__construct().
     */  
    protected $_table;

    /**
     * Other table names used
     * Since these tables are pretty tightly coupled, this seemed
     * a convenient way to stay consistent. These are set in the
     * application specific config file. 
     */  
    protected $_artifact_table;
    protected $_image_table;
    protected $_rating_table;


    public function __construct()
    {
        parent::__construct();

		$this->_artifact_table = config_item('artifact_table');
		$this->_image_table    = config_item('image_table');
		$this->_rating_table   = config_item('rating_table');
        
		$this->_fetch_table();	
    }	


    /**
     * Get All
     * Return all rows as an array.
     *
     * @return array 
     */
    function get_all()
    {
        $data = array();
        $query = $this->db->get($this->table());
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }   
        }   
        $query->free_result();  
        return $data;         
    } 


    /**
     * Insert
     * Take data array, optionally valiated it, and insert into 
     * database table. Mainly here to make database seeding easier.
     * Returns TRUE on success or FALSE on first problem.
     *
     * @param array $data
     * @param boolean $skip_validation
     * @return boolean 
     */
    function insert($data, $skip_validation = FALSE)
    {
    	if (is_array($data) === FALSE) {
    		return FALSE;
    	}

        /**
         * Check to see if $data is an associate array
         * @todo probably should be a helper function
         */
    	if ((bool)count(array_filter(array_keys($data), 'is_string')) === TRUE)
    	{
    		return $this->_insert_row($data, $skip_validation);
    	}
    	else
    	{
    		if ($skip_validation === FALSE)
    		{
	    		foreach ($data as $row)
	    		{	    			
	    			if($this->_insert_row($row, $skip_validation) === FALSE)
	    			{
	    				return FALSE;
	    			}
	    		}
	    		return TRUE;
    		}
    		else 
            /**
             * If we are skiping the validation and we want to insert
             * mulitple rows, this should be faster.
             */                
    		{
				$this->db->insert_batch($this->_table, $data);
				return (bool) $this->db->affected_rows();
    		}
    	}
    }


    /**
     * Insert Row
     * Take data array, optionally valiated it, and insert into 
     * database table. Validation called by this method.
     * Returns TRUE on success or FALSE on first problem.
     *
     * @param array $data
     * @param boolean $skip_validation
     * @return boolean 
     */
    function _insert_row($data, $skip_validation = FALSE)
    {
        if ($skip_validation === FALSE)
        {
            $data = $this->validate($data);
            if ($data === FALSE) {
            	return FALSE;
            }
        }
		$this->db->insert($this->_table, $data);
		return (bool) $this->db->affected_rows();
    }


    /**
     * Truncate
     * Truncate the table for the model. Mainly here to make database
     * seeding easier.
     *
     * @return boolean 
     */
    function truncate()
    {
    	return $this->db->truncate($this->_table);
    } 
    

    /**
     * Getter/Setter for the table name
     * 
     * @param string $table
     * @return string      
     * @todo ponder if we need a setter
     * @todo ponder if getter an setter can be same method
     * @todo see if we ever use this method
     */
    public function table($table=FALSE)
    {
    	if ($table !== FALSE) {
    		$this->_table = $table;	
    	}
        return $this->_table;
    }   


    /**
     * Getter for the artifacts table
     * 
     * @return string      
     */
    public function artifact_table()
    {
        return $this->_artifact_table;
    } 


    /**
     * Getter for the images table
     * 
     * @return string      
     */
    public function image_table()
    {
        return $this->_image_table;
    } 


    /**
     * Getter for the ratings table
     * 
     * @return string      
     */
    public function rating_table()
    {
        return $this->_rating_table;
    }     


    /**
     * Run validation on the passed data
     * Completely lifted from
     * @link http://github.com/jamierumbelow/codeigniter-base-model
     * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
     *
     * @param array $data
     * @return array|boolean
     */
    public function validate($data)
    {
        if($this->skip_validation)
        {
            return $data;
        }
        
        if(!empty($this->validate))
        {
            foreach($data as $key => $val)
            {
                $_POST[$key] = $val;
            }

            $this->load->library('form_validation');

            if(is_array($this->validate))
            {
                $this->form_validation->set_rules($this->validate);

                if ($this->form_validation->run() === TRUE)
                {
                    return $data;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                if ($this->form_validation->run($this->validate) === TRUE)
                {
                    return $data;
                }
                else
                {
                    return FALSE;
                }
            }
        }
        else
        {
            return $data;
        }
    }


    /**
     * Guess the table name based on the model name
     * Also pretty much lifted from 
     * @link http://github.com/jamierumbelow/codeigniter-base-model
     * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
     *
     * Augmented the code to check the config for table name before
     * simply settling for the plural of the model name.
     *
     * @todo Determine if this convenience method was even needed or 
     *       used on such a small/simply project.
     */
    private function _fetch_table()
    {
        if ($this->_table === NULL)
        {
        	$name = preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this)));
        	$config_item = $name . '_table';
        	$table = config_item($config_item);
        	if ($table === FALSE)
        	{
                $this->load->helper('inflector');
        		$table = plural($name);
        	}
        	$this->_table = $table;
        }
    }
}