<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Services_m');
	}

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
	public function index()
	{
		$this->load->library('upload');
		$data['services'] = $this->Services_m->getservices();
		$this->template->load('template_admin', 'Admin/list_product_v', $data);
	}

	public function add_product()
	{
		$this->template->load('template_admin', 'Admin/add_product_v');
	}


	public function insert_product()
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
			// $error = array('error' => $this->upload->display_errors());
			// $this->template->load('template_admin', 'Admin/add_product_v', $error);
		} else {
			$prod_filename = $this->upload->data('file_name');
			$data = [
				'picture' => $prod_filename,
				'product_name' => $this->input->post('product_name'),
				'product_desc' => $this->input->post('product_desc'),
				'product_category' => $this->input->post('product_category'),
				'product_status' => $this->input->post('product_status'),
				'stock' => $this->input->post('stock'),
				'discount_price' => $this->input->post('discount_price'),
				'price' => $this->input->post('price'),
				'date_time' => date('Y-m-d H:i:s')

			];
			$this->db->insert('products', $data);
			// 	$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			//     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			//     <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
			//     Asset Berhasil Ditambahkan
			//   </div>');
			redirect('Admin/Product/add_product');
		}
	}

	public function insert_service()
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
			// $error = array('error' => $this->upload->display_errors());
			// $this->template->load('template_admin', 'Admin/add_product_v', $error);
		} else {
			$prod_filename = $this->upload->data('file_name');
			$data = [
				'img_service' => $prod_filename,
				'service_name' => $this->input->post('service_name'),
				'product_categories_id' => $this->input->post('product_categories_id'),
				'service_description' => $this->input->post('service_description'),
				'service_price' => $this->input->post('service_price'),
				'service_created_by' => $this->input->post('service_created_by'),
			];
			$this->db->insert('services', $data);
			// 	$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			//     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			//     <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
			//     Asset Berhasil Ditambahkan
			//   </div>');
			redirect('Admin/Product/');
		}
	}

	public function show_all_services_user()
	{
		$this->load->library('upload');
		$data['services'] = $this->Services_m->getservices();
		var_dump($data['services']);
		// $this->template->load('template', 'Devops/devops_v', $data);
	}
}
