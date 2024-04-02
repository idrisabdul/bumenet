<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_m extends CI_Model {

    public function getproducts()
    {
        $this->db->select('*');
        $this->db->from("products");
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
