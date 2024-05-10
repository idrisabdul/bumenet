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

    public function getuser_waiting()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("user_role", "user_role.user_role_id  = users.role");
        $this->db->where('role', 4);
        return $this->db->get()->result();
    }

    
}
