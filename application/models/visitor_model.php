<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model for Visitor
 *
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Model
 * @subpackage Visitor_model
 * @category Model
 */		
class Visitor_model extends CI_Model 
{
	/**
	 * var array
	 */
	 private $_viewed;

	/**
	 * var array
	 */
	 private $_rated;
	
	/**
	 * Constructs the Visitor model
	 *
	 * Initiates artifacts_viewed session variable, 
	 * which is simply an array of artifact_id's viewed, and the rated session 
	 * variable, which is an associative array of artifact_id's rated and
	 * their ratings.
	 *
	 * @uses Session
	 * @uses Session::userdata()
	 * @uses Session::set_userdata()
	 */	
    function __construct()
    {
        parent::__construct();

 		$this->_viewed = $this->session->userdata('viewed');
 		if ($this->_viewed === FALSE)
 		{
 			$this->_viewed = array();
 		}

 		$this->_rated = $this->session->userdata('rated');
 		if ($this->_rated === FALSE)
 		{
 			$this->_rated = array();
 		}  	
    }  


	/**
	  * Has Viewed Artifact
	  *
	  * @access public
	  * @param int $id		  
	  * @return boolean
	  */
	public function has_viewed($id) 
	{
		if (is_valid_id($id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::has_viewed() expects an integer for the id parameter.  Input was: ' . $id);
		} 

		return array_key_exists(clean_id($id), $this->_viewed);			
	}


	/**
	  * Set Viewed Artifact
	  *
	  * @access public
	  * @param int $id		  
	  */
	public function set_viewed($id) 
	{
		if (is_valid_id($id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::set_viewed() expects an integer for the id parameter.  Input was: ' . $id);
		} 

		$clean_id = clean_id($id);
		if ($this->has_viewed($clean_id) === FALSE)
		{
			$this->_viewed[$clean_id] = 1;
		}
		else
		{
			$this->_viewed[$clean_id]++;				
		}
		$this->session->set_userdata('viewed', $this->_viewed);			
	}


	/**
	  * Get Artifacts Rated
	  *
	  * @access public
	  * @return array
	  */
	public function get_rated() 
	{
		return array_keys($this->_rated);			
	}


	/**
	  * Get Artifact Rating Count
	  *
	  * @access public
	  * @return int
	  */
	public function get_rated_count() 
	{
		return count($this->_rated);			
	}


	/**
	  * Has Rated Artifact
	  *
	  * @access public
	  * @param int $id		  
	  * @return boolean
	  */
	public function has_rated($id) 
	{
		if (is_valid_id($id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::has_rated() expects an integer for the id parameter.  Input was: ' . $id);
		} 

		return array_key_exists(clean_id($id), $this->_rated);			
	}


	/**
	  * Get Artifact Rating
	  *
	  * @access public
	  * @param int $id	  
	  * @return boolean|int
	  */
	public function get_rating($id) 
	{
		if (is_valid_id($id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::get_rating() expects an integer for the id parameter.  Input was: ' . $id);
		} 

		$clean_id = clean_id($id);
		if ($this->has_rated($clean_id) !== TRUE) 
		{
			return FALSE;
		}
		return $this->_rated[$clean_id]['rating'];			
	}


	/**
	  * Get Artifact Rating ID
	  *
	  * @access public
	  * @param int $id	  
	  * @return boolean|int
	  */
	public function get_rating_id($id) 
	{
		$data = FALSE;
		if (is_valid_id($id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::get_rating_id() expects an integer for the id parameter.  Input was: ' . $id);
		} 	

		$clean_id = clean_id($id);
		if ($this->has_rated($clean_id) !== TRUE || array_key_exists('ratings_id', $this->_rated[$clean_id]) !== TRUE) 
		{
			return FALSE;
		}
		return $this->_rated[$clean_id]['ratings_id'];			
	}


	/**
	  * Set Artifact Rating
	  *
	  * @access public
	  * @param int $id
	  * @param int $rating_id		
	  * @param int $rating	  
	  */
	public function set_rating($id, $ratings_id, $rating) 
	{
		$data = FALSE;
		if (is_valid_id($id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::set_rating() expects an integer for the id parameter.  Input was: ' . $id);
		} 	
		if (is_valid_id($ratings_id) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::set_rating() expects an integer for the rating_id parameter.  Input was: ' . $rating_id);
		} 
		if (is_valid_rating($rating) === FALSE)
		{
			throw new InvalidArgumentException('Visitor_model::set_rating() expects an integer between 1 and 10 for the rating parameter.  Input was: ' . $rating);
		} 

		$clean_id = clean_id($id);
		$this->_rated[$clean_id]['ratings_id'] = clean_id($ratings_id);
		$this->_rated[$clean_id]['rating'] = clean_rating($rating);
		if (array_key_exists('times', $this->_rated[$clean_id]) === FALSE)
		{
			$this->_rated[$clean_id]['times'] = 1;
		}
		else 
		{
			$this->_rated[$clean_id]['times']++;
		}

		$this->session->set_userdata('rated', $this->_rated);		
	}	
}
