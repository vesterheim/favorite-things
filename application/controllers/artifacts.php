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
		$this->artifact_model->update_views($id);

		$data['title'] = 'Rate ' . $data['artifact']['name'] . ' [' . $data['artifact']['identifier'] . ']';
		$data['subview'] = 'artifacts/detail';
		$data['current_navigation'] = 'browse';

		$data['rated'] = FALSE;

		$this->load->view('layouts/master', $data);				
	}


	/**
	 * Add a rating for a particular artifact
	 *
	 * @param  int  $id
	 * @return Response
	 * @todo Add stuff to $input = validation if artifact ID, IP, etc...?
	 * @todo Add validation
	 * @todo Should this be in a rating controller?
	 *       artifacts/(:num)/rating/
	 *       no more need for hidden variables
	 *		 or special HTTP verbs	 
	 */
	public function store($id)
	{
		$this->load->model('rating_model');
		$artifact_id = $id;
		$rating = $this->input->post('rating');
		$ip_address = $this->input->ip_address();
		$this->rating_model->add($artifact_id, $rating, $ip_address);

		echo "artifacts.store";
	}


	/**
	 * Update a rating for a particular artifact
	 *
	 * @param  int  $id
	 * @return Response
	 * @todo Add validation	 
	 * @todo Should this be in a rating controller?
	 *       artifacts/(:num)/rating/(:num)
	 *       no more need for hidden variables
	 *		 or special HTTP verbs
	 */
	public function update($artifact_id)
	{
		$this->load->model('rating_model');
		$id = $this->input->post('previous_id');
		$rating = $this->input->post('rating');
		$ip_address = $this->input->ip_address();
		$this->rating_model->update($id, $artifact_id, $rating, $ip_address);

		echo "artifacts.update";
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
