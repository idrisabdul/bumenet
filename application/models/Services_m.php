<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_m extends CI_Model {

    public function getservices()
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("user", "user.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        return $this->db->get()->result();
    }

    public function getidproduct($id)
    {
        $this->db->select('*');
        $this->db->from("products");
        $this->db->where("product_id", $id);
        return $this->db->get()->row();
    }

}
