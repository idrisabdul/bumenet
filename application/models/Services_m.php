<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_m extends CI_Model {

    public function getservices()
    {
        $this->db->select('*');
        $this->db->from("services");
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
