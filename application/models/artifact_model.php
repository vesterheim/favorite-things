<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model for Artifact
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package MY_Model
 * @subpackage Artifact_model
 */		
class Artifact_model extends MY_Model 
{	 

	/**
	 * Constructs the Artifact model
	 */	
    function __construct()
    {
        $this->_table = config_item('artifact_table');
        
        parent::__construct();   

        $this->validate = array(
            array(
                'field' => 'id',
                'label' => 'ID',
                'rules' => 'is_natural_no_zero|is_unique[' . $this->table() . '.id]'
            ), 
            array(
                'field' => 'identifier',
                'label' => 'Identifier',
                'rules' => 'required|max_length[15]'
            ), 
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[255]'
            ),      
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => ''
            ), 
            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'max_length[20]'
            ),                             
             array(
                'field' => 'creator',
                'label' => 'Creator',
                'rules' => 'max_length[30]'
            ), 
            array(
                'field' => 'source',
                'label' => 'Source',
                'rules' => 'max_length[100]'
            ),              
            array(
                'field' => 'dimensions',
                'label' => 'Dimensions',
                'rules' => 'max_length[75]'
            ),                              
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|is_natural|less_than[2]'
            ),   
            array(
                'field' => 'views',
                'label' => 'Views',
                'rules' => 'is_natural'
            )
        );
    }
}