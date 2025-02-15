<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Services_m');
		$this->load->model('Users_m');
		$this->load->model('Mycourse_m');
		$this->load->model('Sharing_m');
		
	}
	public function index($id = 1)
	{
		$this->load->library('upload');
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);
		$check_course = $this->Services_m->getcourse_by_id($id);
		if ($check_course != null) {
			$data['service'] = $this->Services_m->getcourse_by_id($id);


			$data['module_course'] = $this->Services_m->getmodulecource_by_id($id);
			$data['total_duration'] = $this->db
				->query("Select SUM(duration) as total from module_course WHERE course_id='$id'")
				->row();

			$user_id = $this->session->userdata("user_id");

			if ($this->session->userdata("user_id")) {
				$data['user_id'] = $this->db
					->query("SELECT user_id FROM course_user WHERE course_id='$id' AND user_id=$user_id")
					->row();
			} else {
				$data['user_id'] = $this->db
					->query("SELECT user_id FROM course_user WHERE course_id='$id'")
					->row();

			}

			// cek jika user sudah beli atau belum


			if ($data["user_id"] === NULL) {
				$data["user_id"] = (object) [
					'user_id' => '0',
				];
				// var_dump($data['user_id']);
				$this->template->load('template_learning', 'Product/product_v', $data);
			} else {
				// var_dump($data['user_id']);
				$this->template->load('template_learning', 'Product/product_v', $data);
			}
		} else {
			show_404();
		}	
	}

}
