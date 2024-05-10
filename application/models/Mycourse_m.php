<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mycourse_m extends CI_Model
{

    public function getmycourse($id)
    {
        $this->db->select('*');
        $this->db->from("course_user");
        $this->db->join("services", "services.service_id = course_user.course_id");
        $this->db->where("user_id", $id);
        return $this->db->get()->result();
    }
    public function getuser($id)
    {
        $this->db->select('*');
        $this->db->from("users");
        // $this->db->join("services", "services.service_id = course_user.course_id");
        $this->db->where("user_id", $id);
        return $this->db->get()->row();
    }
}
