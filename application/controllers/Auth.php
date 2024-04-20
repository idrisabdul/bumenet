<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
    }

    public function index()
    {
        $data['title'] = "B-Learning";
        $this->load->view('auth/login_v', $data);
    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->users_m->login($username);
        if ($user->num_rows() > 0) {
            $row = $user->row_array();
            if (password_verify($password, $row['password'])) {
                $params = [
                    'user_id' => $row['user_id'],
                    'username' => $row['username'],
                    'email' => $row['email'],
                    'current_job' => $row['current_job'],
                    'phone_number' => $row['phone_number'],
                    'role' => $row['role'],
                ];
                $this->session->set_userdata($params);
                echo "<script>window.location='" . base_url('learning') . "'</script>";
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i>
                Maaf, password yang anda masukkan salah
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            Maaf, User tidak ditemukan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $params = [
            'user_id',
            'username',
            'email',
            'current_job',
            'phone_number',
            'role'
        ];
        $this->session->unset_userdata($params);
        redirect('auth');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nickname', 'Nickname', 'required|trim|is_unique[users.nickname]', [
            'is_unique' => 'Nickname sudah tersedia!',
            'required' => 'Nickname wajib diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email sudah tersedia!',
            'required' => 'email wajib diisi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
            'is_unique' => 'Username sudah tersedia!',
            'required' => 'Username wajib diisi'
        ]);
        // $this->form_validation->set_rules('profesi', 'Profesi', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[re-password]', [
            'matches' => 'Password tidak sesuai',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('re-password', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "B-Learning";
            $this->load->view('auth/register_v', $data);
        } else {
            $data = [
                'nickname' => htmlspecialchars($this->input->post('nickname', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-light border-light alert-dismissible fade show" role="alert">
            Selamaat Belajarr, Akun anda berhasil dibuat.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('auth');
        }
    }
}
