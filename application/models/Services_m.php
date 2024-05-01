<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services_m extends CI_Model
{

    public function getservices()
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        return $this->db->get()->result();
    }

    public function getcategory_by_id($product_categories_id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        $this->db->where("product_categories_id", $product_categories_id);
        return $this->db->get()->result();
    }
    
    public function getproductcategory()
    {
        $this->db->select('*');
        $this->db->from("product_category");
        $this->db->order_by('product_category_name', 'ASC');
        return $this->db->get()->result();
    }

    public function getusers()
    {
        $this->db->select('*');
        $this->db->from("users");
        return $this->db->get()->result();
    }

    public function getmodulecource_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("module_course");
        $this->db->where("course_id", $id);
        return $this->db->get()->result();
    }

    public function getmodulelearning_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("module_course");
        $this->db->where("course_id", $id);
        return $this->db->get()->result();
    }

    public function getsubmodule_by_moduleid($id)
    {
        $this->db->select('*');
        $this->db->from("submodule_course");
        $this->db->where("submodule_course", $id);
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

    public function getsubmodule_by_id($submodule_id)
    {
        $this->db->select('*');
        $this->db->from("submodule_course");
        $this->db->where("submodule_course_id", $submodule_id);
        return $this->db->get()->row();
    }

    public function save_batch($data)
    {
        return $this->db->insert_batch('submodule_course', $data);
    }

    public function save_batch_learning_progress_user($data)
    {
        return $this->db->insert_batch('learning_progress', $data);
    }

    public function getsubmodule_by_course_id($course_id)
    {
        $this->db->select('*');
        $this->db->from("submodule_course");
        $this->db->join("module_course", "module_course.module_course_id = submodule_course.module_course_id");
        $this->db->join("services", "services.service_id  = module_course.course_id");
        $this->db->where("service_id", $course_id);
        return $this->db->get()->result();
    }

    public function getmodulelearning_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("module_course", "module_course.course_id  = services.service_id");
        $this->db->join("learning_progress", "learning_progress.module_id  = module_course.module_course_id");
        // $this->db->group_by('module_id'); 
        $this->db->where("service_id", $id);
        return $this->db->get()->result();
    }

    

}
