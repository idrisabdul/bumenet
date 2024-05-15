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

    public function getcertificate($course_id)
    {
        $this->db->select('service_name, nickname');
        $this->db->from("course_user");
        // $this->db->join("course_user", "course_user.course_id = services.service_id");
        $this->db->join("users", "users.user_id = course_user.user_id");
        $this->db->join("services", "services.service_id = course_user.course_id");
        $this->db->where("service_id", $course_id);
        return $this->db->get()->row();
        // $this->db->select('service_name, nickname, nickname');
        // $this->db->from("services");
        // $this->db->join("course_user", "course_user.course_id = services.service_id");
        // $this->db->join("users", "users.user_id = services.service_created_by");
        // // $this->db->join("services", "services.service_id = course_user.course_id");
        // $this->db->where("service_id", $course_id);
        // return $this->db->get()->row();
    }

    public function getcourse_byuserid($user_id)
    {
        $this->db->select('nickname');
        $this->db->from("users");
        $this->db->join("services", "services.service_created_by = users.user_id");
        $this->db->where("service_id", $user_id);
        return $this->db->get()->row();
    }
}
