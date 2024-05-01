<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mydashboard extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Services_m');
		$this->load->model('Mycourse_m');
		
	}
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['courses'] = $this->Services_m->getservices();
		$data['categories'] = $this->Services_m->getproductcategory();
        $data['mycourses'] = $this->Mycourse_m->getmycourse($user_id);
		// var_dump($data);
		$this->template->load('template_learning','mydashboard/my_dashboard_v', $data);
	}
	
}
