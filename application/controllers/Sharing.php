<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sharing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// if ($this->session->userdata('role') != 2 OR $this->session->userdata('role') != 1) {
		// 	show_404();
		// }
		$this->load->model('Mycourse_m');
		$this->load->model('Services_m');
		$this->load->model('Sharing_m');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);
		$data['categories'] = $this->Services_m->getproductcategory();
		$data['sharing'] = $this->Sharing_m->getsharing();
		// echo $data['total_course'];
		$this->template->load('template_learning', 'sharing/list_content_v', $data);
	}

	public function menulis()
	{
		if (!$this->session->userdata('user_id')) {
			show_404();
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->Mycourse_m->getuser($user_id);
			$data['product_category'] = $this->Services_m->getproductcategory();
			// $data['module'] = $this->Services_m->getmodule_by_id($module_id);
			$this->template->load('template_learning', 'sharing/create_content_v', $data);
		}

	}

	public function insert_content()
	{
		$ori_filename = $_FILES['img_sharing']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
		$config = array(
			'upload_path' => "./images/sharing/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'file_name' => $ori_filename,
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('img_sharing')) {
			echo "gagal upload";
		} else {
			$prod_filename = $this->upload->data('file_name');
			$user_id = $this->session->userdata('user_id');
			$data = [
				'sharing_categorization' => $this->input->post('sharing_categorization'),
				'writer_id' => $user_id,
				'title_content' => $this->input->post('title_content'),
				'img_sharing' => $prod_filename,
				'content' => $this->input->post('content'),
				'date' => date('Y-m-d'),
			];
			$this->db->insert('sharing', $data);
			redirect('mydashboard');
		}
	}

	public function content($id)
	{
		$check_sharing = $this->Sharing_m->checking_sharing($id);
		if ($check_sharing->num_rows() > 0) {
			$this->load->library('upload');
			$user_id = $this->session->userdata('user_id');
			$data['sharing'] = $this->Sharing_m->getsharing_byid($id);
			$data['user'] = $this->Mycourse_m->getuser($user_id);
			$this->template->load('template_learning', 'sharing/content_v', $data);
		} else {
			show_404();
		}
	}

	public function tulisan_saya()
	{
		$user_id = $this->session->userdata("user_id");
		$data = $this->Sharing_m->getsharing_byuserid($user_id);
		echo json_encode($data);
	}

	public function edit($id)
	{
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);
		$data['sharing'] = $this->Sharing_m->getsharing_byid($id);
		$data['product_category'] = $this->Services_m->getproductcategory();
		$this->template->load('template_learning', 'sharing/edit_content_v', $data);
	}

	public function update_content()
	{
		$ori_filename = $_FILES['img_sharing']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
		$config = array(
			'upload_path' => "./images/sharing/",
			'allowed_types' => "jpg|png|jpeg",
			'file_name' => $ori_filename,
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('img_sharing')) {
			$prod_filename = $this->upload->data('file_name');
			$user_id = $this->session->userdata('user_id');
			$sharing_id = $this->input->post('sharing_id');
			$data = [
				'sharing_categorization' => $this->input->post('sharing_categorization'),
				'writer_id' => $user_id,
				'title_content' => $this->input->post('title_content'),
				'content' => $this->input->post('content'),
			];
			$this->db->update('sharing', $data, ['sharing_id' => $sharing_id]);
			redirect('mydashboard');
		} else {
			$prod_filename = $this->upload->data('file_name');
			$user_id = $this->session->userdata('user_id');
			$sharing_id = $this->input->post('sharing_id');
			$img_sharing_del = $this->db->query("SELECT img_sharing FROM sharing WHERE sharing_id='$sharing_id';")->row();
			if ($img_sharing_del->img_sharing != 'profile-img.jpg') {
				unlink('images/sharing/' . $img_sharing_del->img_sharing);
			}
			$data = [
				'sharing_categorization' => $this->input->post('sharing_categorization'),
				'writer_id' => $user_id,
				'title_content' => $this->input->post('title_content'),
				'img_sharing' => $prod_filename,
				'content' => $this->input->post('content'),
			];
			$this->db->update('sharing', $data, ['sharing_id' => $sharing_id]);
			redirect('mydashboard');
		}
	}

	public function delete($id)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Asset Berhasil Dihapus
	  </div>');
		$img_sharing_del = $this->db->query("SELECT img_sharing FROM sharing WHERE sharing_id='$id';")->row();
		unlink('images/sharing/' . $img_sharing_del->img_sharing);
		$this->db->delete('sharing', ['sharing_id' => $id]);
		redirect('mydashboard');
	}

	public function redirect_by_id($id)
	{
		$title = $this->Sharing_m->getsharing_byid($id);
		if ($title->title_content) {
			redirect('sharing/show/' . urlencode($title->title_content));
		} else {
			show_404();
		}
	}

	public function show($title_content)
	{
		$decoded_name = urldecode($title_content);
		$id = $this->Sharing_m->getsharingid_bytitle($decoded_name);
		if ($id) {
			$this->load->library('upload');
			$user_id = $this->session->userdata('user_id');
			$data['sharing'] = $this->Sharing_m->getsharing_byid($id);
			$data['user'] = $this->Mycourse_m->getuser($user_id);
			$this->template->load('template_learning', 'sharing/content_v', $data);
		} else {
			show_404();
		}
	}

}
