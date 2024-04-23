<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mycourse extends CI_Controller {

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
		
	}
	public function index()
	{
        $data['courses'] = $this->Services_m->getservices();
		$data['categories'] = $this->Services_m->getproductcategory();
		$this->template->load('template','mycourse/my_course_v', $data);
	}
	public function about()
	{
		$this->template->load('template','Home/about_v');
	}
}
