<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller for Migrate
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Controller
 * @subpackage Migrate
 *
 * Based on some stuff I saw floating around online as well as
 * Laravel's artisan commands.
 */ 

class Migrate extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    	
        // can only be called from the command line
        if ($this->input->is_cli_request() === FALSE)
        {
            show_404();
        }    	

        $this->load->library('migration');
        $this->load->dbforge();   	
    }


    /**
     * Display various command line options
     */
    public function index()
    {
    	echo "migrate current 	Run up to current migration specified in config" . PHP_EOL;
    	echo "migrate latest 		Run all migrations" . PHP_EOL;
    	echo "migrate refresh 	Reset and re-run all migrations" . PHP_EOL;
    	echo "migrate reset 		Rollback all database migrations" . PHP_EOL;
    	echo "migrate version 	Rollback or step forward to a specified version" . PHP_EOL;   	
    }


    /**
     * Run up to current migration specified in config
     * and echo any errors.
     */
    public function current()
    {
        $this->migration->current();
        echo $this->migration->error_string() . PHP_EOL;
    }


    /**
     * Run all migrations and echo any errors.
     */
    public function latest()
    {
        $this->migration->latest();
        echo $this->migration->error_string() . PHP_EOL;
    }


    /**
     * Reset and re-run all migrations and echo any errors.
     * Same as running reset() and latest() but simply calling both
     * methods within this method produced a "Cannot redeclare class"
     * error from the migration file. Oh well.
     */
    public function refresh()
    {
        $this->migration->version(0);
        echo $this->migration->error_string() . PHP_EOL;

        $this->migration->latest();
        echo $this->migration->error_string() . PHP_EOL;
    }    


    /**
     * Rollback all database migrations and echo any errors.
     */
    public function reset()
    {
        $this->migration->version(0);
        echo $this->migration->error_string() . PHP_EOL;
    }


    /**
     * Rollback or step forward to a specified version and echo
     * any errors.
     */
    public function version($version = 0)
    {
        $version = (int) $version;

        if ($version == 0)
        {
            die('You need to paas a version greater than zero') . PHP_EOL;
        }

        $this->migration->version($version);
        echo $this->migration->error_string() . PHP_EOL;
    }

}