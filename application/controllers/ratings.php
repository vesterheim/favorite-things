<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ratings extends CI_Controller {

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
    	$this->load->model('alert_model');
    	$this->load->model('artifact_model');
    	$this->load->model('rating_model');
    	$this->load->model('visitor_model');

		$this->load->library('form_validation');
		$this->load->helper('controller');

    	/** 
    	 * Display profiler everywhere save the production
    	 * environment.
    	 */
    	$this->output->enable_profiler(ENVIRONMENT !== 'production');
    }


	/**
	 * Add a rating for a particular artifact
	 *
	 * @param  int $artifact_id
	 * @return Response
	 * @todo Add stuff to $input = validation if artifact ID, IP, etc...?
	 * @todo Add validation
	 * @todo Should this be in a rating controller?
	 *       artifacts/(:num)/rating/
	 *       no more need for hidden variables
	 *		 or special HTTP verbs	 
	 */
	public function store($artifact_id)
	{
		$this->form_validation->set_rules($this->rating_model->validation());
		if ($this->form_validation->run() === FALSE)
		{
		/**
		 * If form validation fails, stash the form input and 
		 * validation in "flashdata" so it can be retrieved after 
		 * the redirect back to the entry form.
		 */
			$this->session->set_flashdata('stashed_input_from_post', $this->input->post());
			$this->session->set_flashdata('stashed_validation_errors', validation_errors());
			$this->alert_model->add(validation_errors(), 'danger');
			redirect("/artifacts/$artifact_id");
		}	

		$rating = $this->input->post('rating', TRUE);
		$ip_address = $this->input->ip_address();
		// error checking here?
		$rating_id = $this->rating_model->add($artifact_id, $rating, $ip_address);
		$this->visitor_model->set_rating($artifact_id, $rating_id, $rating);

		if ($this->visitor_model->get_rated_count() < $this->artifact_model->count())
		{
			$this->alert_model->add('You rated the ' . $this->artifact_model->name($artifact_id) . ' ' . indefinite_article($rating) . ' ' . $rating . ' out of 10.');
			$artifacts_rated = $this->visitor_model->get_rated();
			redirect('/artifacts/' . $this->artifact_model->get_random_id($artifacts_rated));			
		}
		$this->alert_model->add('Congratulations and thank you! You rated all ' . $this->artifact_model->count() . ' artifacts.', 'success');
		redirect('/artifacts');
	}


	/**
	 * Update a rating for a particular artifact
	 *
	 * @param  int $artifact_id
	 * @return Response
	 * @todo Add validation	 
	 * @todo Should this be in a rating controller?
	 *       artifacts/(:num)/rating/(:num)
	 *       no more need for hidden variables
	 *		 or special HTTP verbs
	 */
	public function update($previous_id, $artifact_id)
	{
		$this->form_validation->set_rules($this->rating_model->validation());
		if ($this->form_validation->run() === FALSE)
		{
		/**
		 * Same as add() method. I know. Not very DRY.
		 *
		 * If form validation fails, stash the form input and 
		 * validation in "flashdata" so it can be retrieved after 
		 * the redirect back to the entry form.
		 */			
			$this->session->set_flashdata('stashed_input_from_post', $this->input->post());
			$this->session->set_flashdata('stashed_validation_errors', validation_errors());
			$this->alert_model->add(validation_errors(), 'danger');
			redirect("/artifacts/$artifact_id");
		}	
		
		$rating = $this->input->post('rating', TRUE);
		$ip_address = $this->input->ip_address();
		// error checking here?
		$rating_id = $this->rating_model->update($previous_id, $artifact_id, $rating, $ip_address);
		$this->visitor_model->set_rating($artifact_id, $rating_id, $rating);

		if ($this->visitor_model->get_rated_count() < $this->artifact_model->count())
		{
			$this->alert_model->add('You rated the ' . $this->artifact_model->name($artifact_id) . ' ' . indefinite_article($rating) . ' ' . $rating . ' out of 10.');			
			$artifacts_rated = $this->visitor_model->get_rated();
			redirect('/artifacts/' . $this->artifact_model->get_random_id($artifacts_rated));			
		}
		redirect("/artifacts/$artifact_id");
	}
}
