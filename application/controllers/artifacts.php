<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artifacts extends MY_Controller {

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

    	$this->load->library('pagination');

    	$this->pagination_config = array(
			'base_url'       => '/artifacts/page',
			'total_rows'     => $this->_artifact_count(),
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
    }


	/**
	 * List of artifacts sorted by ranking. 
	 *
	 * @return Response
	 * @todo consider pagination
	 */	
	public function index($offset=0)
	{
		if (($clean_offset = filter_var($offset, FILTER_VALIDATE_INT, array('min_range' => 0))) === FALSE)
		{
			show_404();
		}

		$cache_id = 'artifact_model__get_all__' . $this->pagination_config['per_page'] . '__' . $clean_offset;
		if (($data['artifacts'] = $this->zf_cache->load($cache_id)) === FALSE)
		{
			$data['artifacts'] = $this->artifact_model->get_all($this->pagination_config['per_page'], $offset);
			$this->zf_cache->save($data['artifacts'], $cache_id, array('artifactsIndex', 'containsRatings'));
		}	

		$data['alerts'] = $this->alert_model->get();

		$this->pagination->initialize($this->pagination_config, $this->pagination_config['per_page'], $clean_offset);

		$data['title'] = 'Current Artifact Rankings';
		$data['title_messsage'] = '<div>50 artifacts were nominated. Your ratings decide which ones are exhibited and which ones remain in storage.</div>';
		$data['subview'] = 'artifacts/browse';
		$data['current_navigation'] = 'browse';
		$data['display_progress'] = FALSE;

		if ($this->visitor_model->get_rated_count() > 0)
		{
			$data['display_progress'] = TRUE;
			$data['progress_context'] = '';
			$data['progress_panel_context'] = 'panel-info';
			$data['progress_rated'] = $this->visitor_model->get_rated_count();
			$data['progress_total'] = $this->_artifact_count();
			$data['progress_percent'] = $data['progress_rated'] / $data['progress_total'] * 100;
			if ($data['progress_percent'] === 100 )
			{
				$data['progress_context'] = 'progress-bar-success';
				$data['progress_panel_context'] = 'panel-success';
			}
			elseif ($data['progress_percent'] < 34 )
			{
				$data['progress_context'] = 'progress-bar-warning';
				$data['progress_panel_context'] = 'panel-warning';
			}	
			elseif ($data['progress_percent'] < 66 )
			{
				$data['progress_context'] = 'progress-bar-info';
				$data['progress_panel_context'] = 'panel-info';
			}			
		}

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
		if($this->_is_actual_id($id) === FALSE)
		{
			show_404();
		}

		$clean_id = clean_id($id);
		$cache_id = 'artifact_model__get__' . $clean_id;
		if (($data['artifact'] = $this->zf_cache->load($cache_id)) === FALSE)
		{
			$data['artifact'] = $this->artifact_model->get($id);
			$this->zf_cache->save($data['artifact'], $cache_id, array('artifactsShow', 'containsRatings'));
		}
		
		if (empty($data['artifact']) === TRUE)
		{
			show_404();
		}

		$data['alerts'] = $this->alert_model->get();

		$data['subview'] = 'artifacts/detail';
		$data['current_navigation'] = 'browse';

		$data['title'] = 'Rate ' . $data['artifact']['name'] . ' [' . $data['artifact']['identifier'] . ']';

		$unique_view = FALSE;
		$data['rating'] = FALSE;
		$data['display_progress'] = FALSE;

		$data['form_action'] = "artifacts/$id/ratings";
		$data['form_legend'] = 'Rate this artifact'; 
		$data['form_directions'] = '1) Choose a number.  2) Submit with <em>\'Rate It!\'</em> button.';
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

		if ($this->visitor_model->get_rated_count() > 0)
		{
			$data['display_progress'] = TRUE;
			$data['progress_context'] = '';
			$data['progress_panel_context'] = 'panel-info';
			$data['progress_rated'] = $this->visitor_model->get_rated_count();
			$data['progress_total'] = $this->_artifact_count();
			$data['progress_percent'] = $data['progress_rated'] / $data['progress_total'] * 100;
			if ($data['progress_percent'] === 100 )
			{
				$data['progress_context'] = 'progress-bar-success';
				$data['progress_panel_context'] = 'panel-success';
			}
			elseif ($data['progress_percent'] < 34 )
			{
				$data['progress_context'] = 'progress-bar-warning';
				$data['progress_panel_context'] = 'panel-warning';
			}	
			elseif ($data['progress_percent'] < 66 )
			{
				$data['progress_context'] = 'progress-bar-info';
				$data['progress_panel_context'] = 'panel-info';
			}			
		}

		$this->load->view('layouts/master', $data);				
	}
}
