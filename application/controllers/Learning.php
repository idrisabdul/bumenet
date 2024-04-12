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
		$data['services'] = $this->Services_m->getservices();
		$this->template->load('template_learning', 'learning/course_detail_v', $data);
	}

	public function course_detail($id)
	{
		$this->load->library('upload');
		$data['services'] = $this->Services_m->getservices();
		$this->template->load('template_learning', 'learning/course_detail_v', $data);
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

}
