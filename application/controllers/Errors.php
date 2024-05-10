<?php
defined('BASEPATH') or exit('No direct script access allowed');

class errors extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
    }

    public function index(){
		$this->output->set_status_header('404');

        // Make sure you actually have some view file named 404.php
        $this->load->view('errors/show_404_v');
    }
    // public function page_missing(){
    //     $this->output->set_status_header('404');

    //     // Make sure you actually have some view file named 404.php
    //     $this->load->view('errors/show_404_v');
    // }



}
