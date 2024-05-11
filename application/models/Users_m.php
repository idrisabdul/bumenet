<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_m extends CI_Model
{
    public function login($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("user_role", "user_role.user_role_id  = users.role");
        $this->db->where('username', $username);
        return $this->db->get('');
    }

    public function getusers()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("user_role", "user_role.user_role_id  = users.role");
        return $this->db->get()->result();
    }

    public function getuser_byid($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("user_role", "user_role.user_role_id  = users.role");
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }

    public function getuser_waiting()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("user_role", "user_role.user_role_id  = users.role");
        $this->db->where('role', 4);
        return $this->db->get()->result();
    }

    
}
