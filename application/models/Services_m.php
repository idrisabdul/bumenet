<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_m extends CI_Model {

    public function getservices()
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        return $this->db->get()->result();
    }

    public function getproductcategory()
    {
        $this->db->select('*');
        $this->db->from("product_category");
        return $this->db->get()->result();
    }

    public function getusers()
    {
        $this->db->select('*');
        $this->db->from("users");
        return $this->db->get()->result();
    }

    public function getcourse_by_id($course_id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->where("service_id", $course_id);
        return $this->db->get()->row();
    }

}
