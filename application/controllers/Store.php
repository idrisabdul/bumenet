<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store extends CI_Controller
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
		$this->load->model('Store_m');
		
	}
	public function index()
	{
		$data['products'] = $this->Store_m->getproducts();
		// var_dump($data);
		$this->template->load('template', 'Store/store_v', $data);
	}

	public function detail($id)
	{
		$data['product'] = $this->Store_m->getidproduct($id);
		// var_dump($data);
		$this->template->load('template', 'Store/store_detail_v', $data);
	}
}
