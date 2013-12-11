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
}