<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sharing_m extends CI_Model
{

    public function getsharing()
    {
        $this->db->select('*');
        $this->db->from("sharing");
        $this->db->join("product_category", "product_category.product_category_id  = sharing.sharing_categorization");
        $this->db->join("users", "users.user_id = sharing.writer_id");
        return $this->db->get()->result();
    }

    public function getsharing_byuserid($user_id)
    {
        $this->db->select('*');
        $this->db->from("sharing");
        $this->db->join("product_category", "product_category.product_category_id  = sharing.sharing_categorization");
        $this->db->join("users", "users.user_id = sharing.writer_id");
        $this->db->where("writer_id", $user_id);
        return $this->db->get()->result();
    }

    public function getsharing_byid($id)
    {
        $this->db->select('*');
        $this->db->from("sharing");
        $this->db->join("product_category", "product_category.product_category_id  = sharing.sharing_categorization");
        $this->db->join("users", "users.user_id = sharing.writer_id");
        $this->db->where("sharing_id", $id);
        return $this->db->get()->row();
    }

    public function checking_sharing($id)
    {
        $this->db->select('*');
        $this->db->from("sharing");
        $this->db->join("product_category", "product_category.product_category_id  = sharing.sharing_categorization");
        $this->db->join("users", "users.user_id = sharing.writer_id");
        $this->db->where("sharing_id", $id);
        return $this->db->get();
    }

}
