<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model for Rating
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package MY_Model
 * @subpackage Rating_model
 */		
class Rating_model extends MY_Model 
{	   

	/**
	 * Constructs the Artifact model
	 */	
    function __construct()
    {
        $this->_table = config_item('rating_table');

        parent::__construct();

        $this->validate = array(
            array(
                'field' => 'id',
                'label' => 'ID',
                'rules' => 'is_natural_no_zero|is_unique[' . $this->table() . '.id]'
            ), 
            array(
                'field' => 'artifact_id',
                'label' => 'Artifact ID',
                'rules' => 'required|is_natural_no_zero'
            ), 
            array(
                'field' => 'rating',
                'label' => 'Rating',
                'rules' => 'required|is_natural_no_zero|less_than[11]'
            ),      
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|is_natural|less_than[2]'
            ),  
            array(
                'field' => 'ip_address',
                'label' => 'IP Address',
                'rules' => 'max_length[20]'
            ),                             
             array(
                'field' => 'previous_id',
                'label' => 'Previous ID',
                'rules' => 'is_natural_no_zero'
            )
        );
    }  

    /**
      * Add Artifact Rating
      * Inserts a new row
      *
      * @access public
      * @param int $artifact_id of artifact being rated
      * @param int $rating between 1 and 10
      * @param string $ip_address 
      * @return boolean|int either the rating_id on success 
      *                     or FALSE on failure.
      */
    public function add($artifact_id, $rating, $ip_address) 
    {
        if (is_idish($artifact_id) === FALSE)
        {
            throw new InvalidArgumentException('Rating_model::add() expects an integer for the artifact_id parameter.   Input was: ' . $artifact_id);
        } 
        if (is_valid_rating($rating) === FALSE)
        {
            throw new InvalidArgumentException('Rating_model::add() expects an integer between 1 and 10 for the rating parameter.   Input was: ' . $rating);
        } 
        if (is_valid_ip($ip_address) === FALSE)
        {
            throw new InvalidArgumentException('Rating_model::add() expects a valid IP address ip_address parameter.   Input was: ' . $ip_address);
        }         

        $this->db->set('artifact_id', clean_id($artifact_id));
        $this->db->set('rating', clean_rating($rating));
        $this->db->set('status', 1);
        $this->db->set('ip_address', "INET_ATON('$ip_address')", FALSE);  
        $this->db->insert($this->table());
        if ($this->db->affected_rows() === 0)
        {
            return FALSE;
        }
        return $this->db->insert_id();
    }    
}