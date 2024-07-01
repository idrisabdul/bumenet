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

    public function getsharingid_bytitle($title_content)
    {
        $this->db->select('sharing_id');
        $this->db->from("sharing");
        // $this->db->join("product_category", "product_category.product_category_id  = sharing.sharing_categorization");
        // $this->db->join("users", "users.user_id = sharing.writer_id");
        $this->db->where("title_content", $title_content);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row()->sharing_id;
        } else {
            return null; // or handle the case where the name does not exist
        }
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
