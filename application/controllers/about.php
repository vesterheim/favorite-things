<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Controller for About page(s)
	 *
	 * Not much to see here. Just one static page.
	 */

	public function __construct()
    {
    	parent::__construct();   	
    }

	/**
	 * Display the static about page.
	 * @return Response
	 * @todo Create views 
	 * @todo Update method with view.
	 */	
	public function index()
	{
		$data['title'] = 'Help Us Design an Exhibit';
		$data['subview'] = 'about/index';
		$data['current_navigation'] = 'about';

		$this->load->view('layouts/master', $data);		
		


	}

}