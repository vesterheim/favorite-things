<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller {

	/**
	 * Tests controller
	 *
	 * Put all of my makeshift tests here.
	 */


	public function __construct()
    {
    	parent::__construct();

		$this->load->model('image_model');
    }

	/**
	 * List of tests
	 *
	 * @return Response
	 * @todo consider pagination
	 */	
	public function index()
	{
		echo $this->images_not_in_file_system();
		echo $this->images_not_in_database();

	}

	public function images_not_in_file_system()
	{
		$data = '';
		$results = '';

		$images = $this->image_model->get_all();

		$data .= '<h1>Images not in file system but referenced in the database</h1>';
		$data .= '<ul>';

		foreach ($images as $image)
		{
			if (file_exists(BASEPATH.'../public/assets/img/artifacts/' . $image['image']) === FALSE)
			{
				$results .= '<li>' . $image['image'] . ' (artifact_id: ' . $image['artifact_id'] . ')</li>';

			}
		}			
		if ($results === '')
		{
			$results .= '<li>None!</li>';
		}
		$data .= $results;
		$data .= '</ul>';

		return $data;
	}


	public function images_not_in_database()
	{
		$data = '';
		$results = '';

		$data .= '<h1>Files in file system but not referenced in the database</h1>';
		$data .= '<ul>';

		foreach (glob(BASEPATH."../public/assets/img/artifacts/*.jpg") as $file) 
		{
			$filename = basename($file);
			if ($this->image_model->exists($filename) === FALSE)
			{
				$results .= '<li>' . $filename . '</li>';
			}			
		}
		if ($results === '')
		{
			$results .= '<li>None!</li>';
		}
		$data .= $results;
		$data .= '</ul>';		

		return $data;
	}	
}