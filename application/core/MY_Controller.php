<?php

class MY_Controller extends CI_Controller
{

    
    function __construct ()
    {
        parent::__construct();

        $this->load->model('alert_model');
        $this->load->model('artifact_model');
        $this->load->model('visitor_model');

        $this->load->helper('controller');        
        
        $this->load->library('zf_cache', array('lifetime' => 86400));
        $this->zf_cache = $this->zf_cache->get_instance();
        
        /** 
         * Display profiler everywhere save the production
         * environment.
         */
        $this->output->enable_profiler(ENVIRONMENT !== 'production');
    }

    protected function _is_actual_id($artifact_id, $use_cache=TRUE)
    {
        if ($use_cache !== TRUE)
        {
            return $this->artifact_model->is_actual_id($artifact_id);
        }

        if (is_valid_id($artifact_id) === FALSE) 
        {
            return FALSE;
        }

        $clean_artifact_id = clean_id($artifact_id);
        $cache_id = 'artifact_model__is_actual_id__' . $clean_artifact_id;

        if (($is_actual_id = $this->zf_cache->load($cache_id)) === FALSE)
        {
            $is_actual_id = $this->artifact_model->is_actual_id($clean_artifact_id);
            $this->zf_cache->save($is_actual_id, $cache_id, array('artifactIsActualID'));
        }

        return $is_actual_id;
    }


    protected function _artifact_count($use_cache=TRUE)
    {
        if ($use_cache !== TRUE)
        {
            return $this->artifact_model->count();
        }    

        $cache_id = 'artifacts__count';
        if (($count = $this->zf_cache->load($cache_id)) === FALSE)
        {
            $count = $this->artifact_model->count();
            $this->zf_cache->save($count, $cache_id, array('artifactsCount'));
        }
        return $count;          
    }      
}