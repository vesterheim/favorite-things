<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller for database seeding
 * Based on Steve Thomas' "Database Seeding in CodeIgniter" from his
 * blog _Web Development Learnings_ and a bit on Laravel's seeding.
 * Unfortunately, there wasn't really time to explore Faker, which
 * was the main feature of that article, on this project.
 * @link http://stevethomas.com.au/php/database-seeding-in-codeigniter.html
 *
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Controller
 * @subpackage DB
 */ 

class Db extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
 
        // can only be called from the command line
        if ($this->input->is_cli_request() === FALSE)
        {
            show_404();
        } 
 
        // can only be run in the development environment
        if (ENVIRONMENT !== 'development') {
            exit('Wowsers! You don\'t want to do that!');
        }
 
    }
 
     /**
     * Display various command line options
     */
    public function index()
    {
        echo "db seed       Seed the database with records" . PHP_EOL;   
    }

    /**
     * Seed Database Table(s)
     *
     * Note: If using insert validation provided by MY_Model, it
     * seems you can only insert the maximum number of rows as the
     * previous seed. So in this example, if we seeded artifacts
     * before ratings, only 51 rows would be inserted instead of the
     * default of 1000. The options seem to be to skip validation or
     * run the seeds in desending order of rows inserted. Since I
     * just spent the time to implement validation, I chose the later
     * option. But, in practice, I would probably simply skip the
     * validation the way I implemented it all together.
     */
    function seed()
    {
        $this->load->model('rating_model');
        $this->load->library('seeds/ratings_seeder');
        $this->ratings_seeder->run($this->rating_model);

        $this->load->model('image_model');
        $this->load->library('seeds/images_seeder');
        $this->images_seeder->run($this->image_model);

        $this->load->model('artifact_model');
        $this->load->library('seeds/artifacts_seeder');
        $this->artifacts_seeder->run($this->artifact_model);

        // Uncomment the below to update artifacts table with reasonable view counts
        $this->db->query('UPDATE artifacts SET unique_views = (SELECT count(*) FROM ratings WHERE artifacts.id=ratings.artifact_id), views = (SELECT count(*) FROM ratings WHERE artifacts.id=ratings.artifact_id)');
    }
}