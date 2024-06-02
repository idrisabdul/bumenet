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
        // $this->db->where("status_course", 1);
        return $this->db->get()->result();
    }

    public function getservices_byuserid($user_id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        $this->db->where("service_created_by", $user_id);
        return $this->db->get()->result();
    }

    public function getservices_preview($id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        $this->db->where("service_id", $id);
        return $this->db->get()->row();
    }
    public function getservices_publish()
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        $this->db->where("status_course", 1);
        return $this->db->get()->result();
    }

    public function getcategory_by_id($product_categories_id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("users", "users.user_id = services.service_created_by");
        $this->db->join("product_category", "product_category.product_category_id  = services.product_categories_id");
        $this->db->where("product_categories_id", $product_categories_id);
        $this->db->where("status_course", 1);
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

    public function getmodule_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("module_course");
        $this->db->where("module_course_id", $id);
        return $this->db->get()->row();
    }

    public function getsubmodule_by_moduleid($id)
    {
        $this->db->select('*');
        $this->db->from("submodule_course");
        $this->db->where("module_course_id", $id);
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
    public function save_batch_answer($data)
    {
        return $this->db->insert_batch('answer', $data);
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

    public function getmodulelearning_user_by_id($id, $user_id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("module_course", "module_course.course_id  = services.service_id");
        $this->db->join("learning_progress", "learning_progress.module_id  = module_course.module_course_id");
        // $this->db->group_by('module_id'); 
        $this->db->where("service_id", $id);
        $this->db->where("learning_progress.user_id", $user_id);
        return $this->db->get()->result();
    }

    public function getpreview_user($id)
    {
        $this->db->select('*');
        $this->db->from("services");
        $this->db->join("module_course", "module_course.course_id  = services.service_id");
        // $this->db->join("learning_progress", "learning_progress.module_id  = module_course.module_course_id");
        // $this->db->group_by('module_id'); 
        $this->db->where("service_id", $id);
        // $this->db->where("learning_progress.user_id", $user_id);
        return $this->db->get()->result();
    }

    public function getquiz_bycourseid($course_id)
    {
        $this->db->select('*');
        $this->db->from("questions");
        $this->db->join("answer", "answer.question_answer_id = questions.question_id");
        $this->db->where("course_id", $course_id);
        $this->db->where("correct_answer", 1);
        return $this->db->get()->result();
    }

    public function findAnswerIdCorrect($question_id)
    {
        $this->db->select('*');
        $this->db->from("answer");
        $this->db->where("correct_answer", 1);
        $this->db->where("question_answer_id", $question_id);
        return $this->db->get()->row()->answer_id;
    }

    
    public function list_result($course_id, $user_learn_id)
    {
        $this->db->select('*');
        $this->db->from("result_exam");
        $this->db->where("course_id", $course_id);
        $this->db->where("user_learn_id", $user_learn_id);
        return $this->db->get()->result();
    }

    public function checking_user($user_id, $course_id)
    {
        $this->db->select('*');
        $this->db->from("course_user");
        $this->db->where("user_id", $user_id);
        $this->db->where("course_id", $course_id);
        return $this->db->get();
    }

    public function checking_exam_user($user_id, $course_id)
    {
        $this->db->select('*');
        $this->db->from("result_exam");
        $this->db->where("user_learn_id", $user_id);
        $this->db->where("course_id", $course_id);
        return $this->db->get();
    }

    public function last_result($course_id, $user_learn_id)
    {
        $this->db->select('*')->limit(1)->order_by('result_exam_id', 'DESC');
        $this->db->from("result_exam");
        $this->db->where("course_id", $course_id);
        $this->db->where("user_learn_id", $user_learn_id);
        return $this->db->get()->row();
    }

    public function certificate($course_id, $user_learn_id)
    {
        $this->db->select('*');
        $this->db->from("certificates");
        $this->db->where("course_id", $course_id);
        $this->db->where("user_learn_id", $user_learn_id);
        return $this->db->get()->row();
    }

    public function check_result_passed($course_id, $user_learn_id)
    {
        $this->db->select('*')->limit(1)->order_by('result_exam_id', 'DESC');
        $this->db->from("result_exam");
        $this->db->where("course_id", $course_id);
        $this->db->where("user_learn_id", $user_learn_id);
        $this->db->where("status", 1);
        return $this->db->get()->row();
    }
    

}
