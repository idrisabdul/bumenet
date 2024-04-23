<?php
defined('BASEPATH') or exit('No direct script access allowed');

class learning extends CI_Controller
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
		// $this->load->model('Product_m');

	}
	public function index()
	{
		$this->load->library('upload');
		$data['courses'] = $this->Services_m->getservices();
		$data['categories'] = $this->Services_m->getproductcategory();
		$this->template->load('template_learning', 'learning/learning_v', $data);
	}

	public function course_category()
	{
		$category_id = $this->input->post('id', true);
		if ($category_id == 0) {
			$data = $this->Services_m->getservices();
		} else {
			$data = $this->Services_m->getcategory_by_id($category_id);
		}
		echo json_encode($data);
	}

	public function course_detail($id)
	{
		$this->load->library('upload');
		$data['service'] = $this->Services_m->getcourse_by_id($id);
		$data['module_course'] = $this->Services_m->getmodulecource_by_id($id);
		$data['total_duration'] = $this->db
			->query("Select SUM(duration) as total from module_course WHERE course_id='$id'")
			->row();
		$data['user_id'] = $this->db
			->query("SELECT user_id FROM course_user WHERE course_id='$id'")
			->row();

		if ($data["user_id"] === NULL) {
			$data["user_id"] = (object) [
				'user_id' => '0',
			];
			$this->template->load('template_learning', 'learning/course_detail_v', $data);
		} else {
			$this->template->load('template_learning', 'learning/course_detail_v', $data);
		}

	}

	public function delete_service($id)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Asset Berhasil Dihapus
	  </div>');
		$this->db->delete('services', ['service_id' => $id]);
		redirect('Product');
	}

	public function add_course_user()
	{
		$user_id = $this->input->post('user_id', true);
		$course_id = $this->input->post('course_id', true);
		$data = [
			'user_id' => $user_id,
			'course_id' => $course_id,
			'date_add_course' => date('Y-m-d H:i:s')
		];
		// var_dump($data);
		$this->db->insert('course_user', $data);
		echo json_encode($data);
	}

}
