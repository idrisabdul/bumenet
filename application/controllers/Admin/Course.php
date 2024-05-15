<?php
defined('BASEPATH') or exit('No direct script access allowed');

class course extends CI_Controller
{

	public function __construct()
	{
		// $user_id = $this->session->userdata('user_id');
		
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Services_m');
	}

	public function index()
	{
		$this->load->library('upload');
		$data['services'] = $this->Services_m->getservices();
		$this->template->load('template_admin', 'Admin/list_product_v', $data);
	}


	public function insert_course()
	{
		$ori_filename = $_FILES['picture']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
		$config = array(
			'upload_path' => "./images/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'file_name' => $ori_filename,
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('picture')) {
			echo "gagal upload";
		} else {
			// INSERT COURSE
			$prod_filename = $this->upload->data('file_name');
			$data = [
				'img_service' => $prod_filename,
				'service_name' => $this->input->post('service_name'),
				'product_categories_id' => $this->input->post('product_categories_id'),
				'service_description' => $this->input->post('service_description'),
				'service_price' => $this->input->post('service_price'),
				'service_created_by' => $this->input->post('service_created_by'),
				'status_course' => 0,
			];
			$this->db->insert('services', $data);
			$course_id = $this->db->insert_id();
			redirect('Admin/course/list_module/' . $course_id);
		}
	}

	public function list_module($course_id)
	{
		$this->load->library('upload');
		$data['service'] = $this->Services_m->getcourse_by_id($course_id);
		$data['modules'] = $this->Services_m->getmodulecource_by_id($course_id);
		$data['total_duration'] = $this->db->query("Select SUM(duration) as total from module_course WHERE course_id='$course_id'")->row();

		$this->template->load('template_admin', 'Admin/list_module_v', $data);
	}

	public function list_submodule($module_id)
	{
		$this->load->library('upload');
		$data['module'] = $this->Services_m->getmodule_by_id($module_id);
		$data['submodules'] = $this->Services_m->getsubmodule_by_moduleid($module_id);
		$this->template->load('template_admin', 'Admin/list_submodule_v', $data);
	}

	public function insert_module()
	{
		$course_id = $this->input->post('course_id');
		$data = [
			'course_id' => $course_id,
			'module_name' => $this->input->post('module_name'),
			'duration' => $this->input->post('duration'),
		];
		$this->db->insert('module_course', $data);
		redirect('Admin/course/list_module/' . $course_id);
	}

	public function update_module()
	{
		$course_id = $this->input->post('course_id');
		$id = $this->input->post('module_course_id');
		$data = [
			'module_name' => $this->input->post('module_name'),
			'duration' => $this->input->post('duration'),
		];
		$this->db->update('module_course', $data, ['module_course_id' => $id]);
		redirect('Admin/course/list_module/'. $course_id);
	}

	public function create_content($module_id)
	{
		$data['module'] = $this->Services_m->getmodule_by_id($module_id);
		$this->template->load('template_admin', 'Admin/create_content_v', $data);
	}

	public function insert_content()
	{
		$module_course_id = $this->input->post('module_course_id');
		$data = [
			'module_course_id' => $module_course_id,
			'submodule_name' => $this->input->post('submodule_name'),
			'submodule_content' => $this->input->post('submodule_content'),
		];
		$this->db->insert('submodule_course', $data);
		redirect('Admin/course/list_submodule/' . $module_course_id);
	}


	public function add_module_course($id)
	{
		$data['service'] = $this->Services_m->getcourse_by_id($id);
		$data['module_course'] = $this->Services_m->getmodulecource_by_id($id);
		$this->template->load('template_admin', 'Admin/add_module_course_v', $data);
	}


	public function add_submodule($id)
	{
		$data['service'] = $this->Services_m->getcourse_by_id($id);
		$data['module_course'] = $this->Services_m->getmodule_by_id($id);
		$this->template->load('template_admin', 'Admin/add_submodule_v', $data);
	}

	public function edit_submodule($id)
	{
		$data['submodule'] = $this->Services_m->getsubmodule_by_id($id);
		$data['service'] = $this->Services_m->getcourse_by_id($id);
		$data['module_course'] = $this->Services_m->getmodule_by_id($id);
		$this->template->load('template_admin', 'Admin/edit_content_v', $data);
	}

	public function course_publish($id)
	{
		$data = [
			'status_course' => 1,
		];
		$this->db->update('services', $data, ['service_id' => $id]);
		redirect('Admin/Product/');
	}

	public function preview_course($id)
	{
		$this->load->library('upload');
		$user_id = $this->session->userdata("user_id");
		$data['module_course'] = $this->Services_m->getpreview_user($id, $user_id);
		$data['service'] = $this->Services_m->getservices_preview($id);
		$this->load->view('Admin/preview_course_v', $data);
	}

	public function update_content()
	{
		$submodule_course_id = $this->input->post('submodule_course_id');
		$module_course_id = $this->input->post('module_course_id');
		$data = [
			'submodule_name' => $this->input->post('submodule_name'),
			'submodule_content' => $this->input->post('submodule_content'),
		];
		$this->db->update('submodule_course', $data, ['submodule_course_id' => $submodule_course_id]);
		redirect('Admin/course/list_submodule/' . $module_course_id);
	}

	public function delete_submodule($id)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Asset Berhasil Dihapus
	  </div>');
		$module_id = $this->db->query("SELECT module_course_id FROM submodule_course WHERE submodule_course_id = $id;")->row();
		$this->db->delete('submodule_course', ['submodule_course_id' => $id]);
		redirect('Admin/course/list_submodule/' . $module_id->module_course_id);
	}

	public function delete_module($id)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Asset Berhasil Dihapus
	  </div>');
		$course_id = $this->db->query("SELECT course_id FROM module_course WHERE module_course_id = $id;")->row();

		$this->db->delete('module_course', ['module_course_id' => $id]);
		$this->db->delete('submodule_course', ['module_course_id' => $id]);

		redirect('Admin/course/list_module/' . $course_id->course_id);
	}

}
