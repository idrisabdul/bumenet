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

		// cek jika user sudah beli atau belum
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
		// INSERT COURSE TO USER
		$user_id = $this->input->post('user_id', true);
		$course_id = $this->input->post('course_id', true);
		$data = [
			'user_id' => $user_id,
			'course_id' => $course_id,
			'date_add_course' => date('Y-m-d H:i:s')
		];
		$this->db->insert('course_user', $data);

		$module = $this->Services_m->getmodulelearning_by_id($course_id);
		$data = array();
		$index = 0;
		foreach ($module as $row) {
			array_push(
				$data,
				array(
					'learning_course_id' => $row->course_id,
					'module_id' => $row->module_course_id,
					'user_id' => $this->session->userdata('user_id'),
				)
			);
			$index++;
		}
		$sql = $this->Services_m->save_batch_learning_progress_user($data);
		echo json_encode($sql);
	}

	public function learning_course($id)
	{
		$this->load->library('upload');
		$data['module_course'] = $this->Services_m->getmodulelearning_user_by_id($id);
		$data['service'] = $this->Services_m->getcourse_by_id($id);
		// $data['module_course'] = $this->Services_m->getmodulelearning_by_id($id);
		// echo "<pre>";
		// var_dump($data['module_course']);
		// echo "</pre>";
		$this->template->load('template_learning', 'learning/learning_course_v', $data);
	}

	public function submodule_js()
	{
		$submodule_id = $this->input->post('id', true);
		$data = $this->Services_m->getsubmodule_by_id($submodule_id);
		echo json_encode($data);
	}

	public function check_submodule_is_done_js()
	{
		$submodule_id = $this->input->post('submodule_id', true);
		$data = $this->db
			->query("SELECT user_id FROM learning_progress WHERE submodule_id='$submodule_id'")
			->row();
		echo json_encode($data);	
	}

	public function next_submodule_js()
	{
		$module_id = $this->input->post('module_id', true);
		$submodule_id = $this->input->post('submodule_id', true);
		$data = $this->db
			->query("SELECT * FROM submodule_course where submodule_course_id = (select min(submodule_course_id) from submodule_course where submodule_course_id > $submodule_id) AND module_course_id = $module_id;")
			->row();
		echo json_encode($data);
	}

	public function previous_submodule_js()
	{
		$module_id = $this->input->post('module_id', true);
		$submodule_id = $this->input->post('submodule_id', true);
		$data = $this->db
			->query("SELECT * FROM submodule_course where submodule_course_id = (select max(submodule_course_id) from submodule_course where submodule_course_id < $submodule_id) AND module_course_id = $module_id;")
			->row();
		echo json_encode($data);
	}

	public function done_submodule_js()
	{
		$module_id = $this->input->post('module_id', true);
		$data = [
			'status_progress'=> 1,
		];
		$this->db->update('learning_progress', $data, ['module_id' => $module_id]);
		echo json_encode($data);
	}

	public function learning_progress($id)
	{
		$this->load->library('upload');
		$data['course'] = $this->Services_m->getsubmodule_by_course_id($id);
		echo "<pre>";
		var_dump($data['course']);
		echo "</pre>";
	}

}
