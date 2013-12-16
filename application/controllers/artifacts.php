<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artifacts extends CI_Controller {

	/**
	 * Artifacts controller
	 *
	 * This is where all of the action happens.
	 * Probably could have at least a Ratings controller, but let's
	 * Keep it simple.
	 */
	protected $pagination_config = array();

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('alert_model');
    	$this->load->model('artifact_model');
    	$this->load->model('visitor_model');
    	$this->load->helper('controller');

    	$this->load->library('pagination');
    	$this->pagination_config = array(
			'base_url'       => 'http://ci.favoritethings.vesterheim.dev/artifacts/page',
			'total_rows'     => $this->artifact_model->count(),
			'per_page'       => 12,
			'num_links'      => 20,
			'full_tag_open'  => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'next_link'      => '&raquo;',
			'next_tag_open'  => '<li>',
			'next_tag_close' => '</li>',
			'prev_link'      => '&laquo;',
			'prev_tag_open'  => '<li>',
			'prev_tag_close' => '</li>',
			'cur_tag_open'   => '<li class="active"><span>',
			'cur_tag_close'  => '<span class="sr-only">(current)</span></span></li>',
			'num_tag_open'   => '<li>',
			'num_tag_close'  => '</li>'
    	);    	

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
	public function index($offset=0)
	{
		$data['artifacts'] = $this->artifact_model->get_all($this->pagination_config['per_page'], $offset);

		$data['alerts'] = $this->alert_model->get();

		$this->pagination->initialize($this->pagination_config, $this->pagination_config['per_page'], $this->uri->segment(3));

		$data['title'] = 'Current Artifact Rankings';
		$data['title_messsage'] = '<div>50 artifacts were nominated. Your votes decide which ones are exbihibited and which ones remain in storage.</div>';
		$data['subview'] = 'artifacts/browse';
		$data['current_navigation'] = 'browse';

		$this->load->view('layouts/master', $data);
	}

	public function redirect_to_index()
	{
		redirect('/artifacts');
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

		$data['alerts'] = $this->alert_model->get();

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
			$data['form_submit'] = 'Change Rating';
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
