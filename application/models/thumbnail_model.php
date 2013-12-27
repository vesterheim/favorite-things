<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model for Thumbnail
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package MY_Model
 * @subpackage Thumbnail_model
 */		
class Thumbnail_model extends MY_Model 
{	 

	/**
	 * Constructs the Artifact model
	 */	
    function __construct()
    {
        $this->_table = config_item('thumbnail_table');

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
                'field' => 'image',
                'label' => 'Image',
                'rules' => 'required|max_length[255]'
            )
        );
    } 


    /**
     * Exists
     * Given an image name, see if it is referenced in the 
     * thumbnails table.
     *
     * @param string $image
     * @return boolean 
     */
    function exists($image)
    {
        $this->db->where('image', $image);
        $query = $this->db->get($this->table());
        return (bool) $query->num_rows();
    }     
}