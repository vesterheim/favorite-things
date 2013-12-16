<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artifacts extends CI_Controller {

	/**
	 * Artifacts controller
	 *
	 * This is where all of the action happens.
	 * Probably could have at least a Ratings controller, but let's
	 * Keep it simple.
	 */


	public function __construct()
    {
    	parent::__construct();

    	$this->load->model('artifact_model');
    	$this->load->model('visitor_model');
    	$this->load->helper('controller');

    	/** 
    	 * Display profiler everywhere save the production
    	 * environment.
    	 */
    	$this->output->enable_profiler(ENVIRONMENT !== 'production');
    }


	/**
	 * List of artifacts sorted by ranking. 
	 *
	 * @return Response
	 * @todo consider pagination
	 */	
	public function index()
	{
		$data['artifacts'] = $this->artifact_model->get_all();

		$data['title'] = 'Artifacts';
		$data['subview'] = 'artifacts/browse';
		$data['current_navigation'] = 'browse';

		$this->load->view('layouts/master', $data);
	}


	/**
	 * Display the specified artifact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['artifact'] = $this->artifact_model->get($id);

// probably need to check for existence of artifact
		$data['subview'] = 'artifacts/detail';
		$data['current_navigation'] = 'browse';

		$data['title'] = 'Rate ' . $data['artifact']['name'] . ' [' . $data['artifact']['identifier'] . ']';

		$unique_view = FALSE;
		$data['rating'] = FALSE;

		$data['form_action'] = "artifacts/$id/ratings";
		$data['form_legend'] = 'Rate this artifact';
		$data['form_submit'] = 'Rate it!';


		if ($this->visitor_model->has_viewed($id) === FALSE) 
		{
			$this->visitor_model->set_viewed($id);
			$unique_view = TRUE;
		}
		$this->artifact_model->update_views($id, $unique_view );

		if ($this->visitor_model->has_rated($id) === TRUE)
		{
			$data['form_action'] .= '/' . $this->visitor_model->get_rating_id($id);
			$data['rating'] = $this->visitor_model->get_rating($id);
			$data['form_legend'] = "You rated this artifact {$data['rating']} out of 10.";
			$data['form_submit'] = 'Change Rating!';
		}
		/**
		 * If there were validation errors, we may have been 
		 * redirected back to this controller. Retreieve any
		 * stashed validation errors and store them in 
		 * $data['validation_errors']. We are using it instead of
		 * validation_errors() in the rating form view, so we need 
		 * its value or FALSE anyway. If there were validation 
		 * errors, retrieve the stashed $this->input->post() and
		 * insert it back into $_POST to repopulate the form.
		 */
		$data['validation_errors'] = $this->session->flashdata('stashed_validation_errors');
		if ($data['validation_errors'] !== FALSE)
		{
			insert_into__POST($this->session->flashdata('stashed_input_from_post'));
		}
		elseif ($data['rating'] !== FALSE)
		{
			insert_into__POST(array('rating' => $data['rating']));
		}
		


		$this->load->view('layouts/master', $data);				
	}


	/**
	 * Redirect to a random artifact 
	 *
	 * @return Redirect
	 * @todo consider option to simply return artifact info
	 * @todo consider option to simply return artifact ID
	 */
	public function random()
	{

	}
}
