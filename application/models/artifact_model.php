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
                'field' => 'unique_views',
                'label' => 'Unique Views',
                'rules' => 'is_natural'
            ),                
            array(
                'field' => 'views',
                'label' => 'Views',
                'rules' => 'is_natural'
            )          
        );
    }


    /**
      * Get Artifact count
      * 
      *
      * @access public  
      * @return int number of active artifacts
      */
    public function count() 
    {   
        $this->db->from($this->table());
        $this->db->where('status', 1);
        return $this->db->count_all_results();
    }


    /**
      * Get Artifact record by ID
      *
      * @access public
      * @param int $id   
      * @return array Artifact record
      */
    public function get($id) 
    {
        if (is_valid_id($id) === FALSE)
        {
            throw new InvalidArgumentException('Artifact_model::get() expects an integer for the $id parameter.  Input was: ' . $id);
        } 

        $artifacts = $this->artifact_table();
        $images = $this->image_table();
        $ratings = $this->rating_table();

$sql = <<<EOQ
SELECT  $artifacts.id,
        $artifacts.name,
        $artifacts.identifier,
        $artifacts.description,
        $artifacts.date,
        $artifacts.creator,
        $artifacts.source,
        (SELECT GROUP_CONCAT($images.image ORDER BY $images.sort_order ASC) FROM $images WHERE $images.artifact_id = $artifacts.id) as image,
        FIND_IN_SET(AVG($ratings.rating), averages.average_list) AS rank,
        AVG($ratings.rating) AS average,
        STDDEV_POP($ratings.rating) AS deviation,
        SUM($ratings.rating) AS points,
        COUNT($ratings.rating) AS votes,
        $artifacts.views
FROM $artifacts
LEFT JOIN $ratings 
        ON $artifacts.id = $ratings.artifact_id
        AND $ratings.status = 1 
CROSS JOIN
    (SELECT GROUP_CONCAT(DISTINCT(average) ORDER BY average DESC) AS average_list
     FROM
        (SELECT AVG($ratings.rating) AS average
         FROM $artifacts
         LEFT JOIN $ratings 
            ON $artifacts.id = $ratings.artifact_id
            AND $ratings.status = 1
     WHERE $artifacts.status = 1
     GROUP BY $artifacts.id) AS averages) AS averages
WHERE $artifacts.status = 1
AND $artifacts.id = %d
GROUP BY $artifacts.id
LIMIT 1
EOQ;
        $data = array();
        $sql = sprintf($sql, clean_id($id));
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data = $row;
                if (is_null($data['image']) === TRUE)
                {
                    unset($data['image']);
                }
                else
                {
                    $data['image'] = explode(',', $data['image']);
                }       
            }       
        }   
        $query->free_result();  

        return $data;                   
    }


    /**
      * Get array of Artifact records ordered by rank
      *
      * @access public  
      * @return array Artifact records
      */
    public function get_all($limit=FALSE, $offset=0) 
    {
        $data = array();

        $artifacts = $this->artifact_table();
        $images = $this->image_table();
        $ratings = $this->rating_table();

        $pagination = '';
        if ($limit !== FALSE && filter_var($limit, FILTER_VALIDATE_INT, array('min_range' => 1)) !== FALSE)
        {
            $pagination = 'LIMIT ' . abs(intval($limit));
            if (filter_var($offset, FILTER_VALIDATE_INT, array('min_range' => 0)) !== FALSE)
            {
                $pagination .= ' OFFSET ' . abs(intval($offset));
            }
        }

        $sql = <<<EOQ
SELECT  $artifacts.id,
        $artifacts.name,
        $artifacts.identifier,
    (SELECT image
     FROM $images
     WHERE artifact_id = $artifacts.id
     ORDER BY sort_order LIMIT 1) AS image,
        FIND_IN_SET(AVG($ratings.rating), averages.average_list) AS rank,
        AVG($ratings.rating) AS average,
        STDDEV_POP($ratings.rating) AS deviation,
        SUM($ratings.rating) AS points,
        COUNT($ratings.rating) AS votes,
        $artifacts.views
FROM $artifacts
LEFT JOIN $ratings
        ON $artifacts.id = $ratings.artifact_id
        AND $ratings.status = 1 
CROSS JOIN
    (SELECT GROUP_CONCAT(DISTINCT(average) ORDER BY average DESC) AS average_list
     FROM
        (SELECT AVG($ratings.rating) AS average
         FROM $artifacts
         LEFT JOIN $ratings 
            ON $artifacts.id = $ratings.artifact_id
            AND $ratings.status = 1
     WHERE $artifacts.status = 1
     GROUP BY $artifacts.id) AS averages) AS averages
WHERE $artifacts.status = 1
GROUP BY $artifacts.id
ORDER BY rank
$pagination
EOQ;

        $query = $this->db->query($sql);
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
      * Increment views by 1
      * Pass TRUE as second $unique param to track unique views
      *
      * @access public
      * @param int $id  
      * @param boolean $unique (optional)   
      * @return boolean
      */
    public function update_views($id, $unique=FALSE) 
    {
        if (is_valid_id($id) === FALSE)
        {
            throw new InvalidArgumentException('Artifact_model::update_views() expects an integer for the artifact_id parameter.  Input was: ' . $id);
        } 
        if ($unique !== FALSE)
        {
            $this->db->set('unique_views', 'unique_views+1', FALSE);
        }        
        $this->db->set('views', 'views+1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->where('id', clean_id($id));
        $this->db->update($this->table());                 
        return (bool) ($this->db->affected_rows() > 0);                    
    }


    /**
      * Get Random Artifact ID
      *
      * @access public
      * @param int|string|array $skip single or list of artifact_id's to skip         
      * @return string Artifact ID
      */
    public function get_random_id($skip = array()) 
    {
        $data = FALSE;
        if ($this->_is_valid_skip($skip) === FALSE)
        {
           throw new InvalidArgumentException('Artifact_model::get_random_id() expects an array of integers for the skip parameter.  Input was: ' . $skip);
        }

        /**
         * Get random active artifact_id not in skip list
         */
        $this->db->select('id');
        $this->db->from($this->table());
        $this->db->where('status', 1);
        if (empty($skip) === FALSE)
        {
            $this->db->where_not_in('id', $skip);
        }
        $this->db->order_by('id', 'random');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data = $row['id'];
            }   
        }   
        $query->free_result();                      

        return $data;
    }

    /**
      * Validate skip param
      *
      * @access protected
      * @param array $skip list of artifact_id's to skip         
      * @return boolean
      */
    protected function _is_valid_skip($skip) 
    {
        if (is_array($skip) === FALSE)
        {
            return FALSE;
        }
        if (is_assoc($skip) === TRUE)
        {
            return FALSE;
        }
        if (empty($skip) === TRUE)
        {
            return TRUE;
        }
        foreach ($skip as $i)
        {
            if (is_valid_id($i) === FALSE)
            {
                return FALSE;
            }
        }
        return TRUE;
    }

}