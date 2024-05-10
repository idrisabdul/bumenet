<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_management extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Users_m');
    }

    public function index()
    {
        $this->load->library('upload');
        $data['users'] = $this->Users_m->getusers();
        $this->template->load('template_admin', 'Admin/Users/list_user_v', $data);
    }

    public function waiting_approve()
    {
        $this->load->library('upload');
        $data['users'] = $this->Users_m->getuser_waiting();
        $this->template->load('template_admin', 'Admin/Users/user_waiting_v', $data);
    }

    public function user_approved($user_id)
    {
        $data = [
            'role' => 2
        ];
        $this->db->update('users', $data, ['user_id' => $user_id]);
        redirect('Admin/user_management/waiting_approve/' . $user_id);
    }
}
