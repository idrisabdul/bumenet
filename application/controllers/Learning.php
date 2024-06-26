<?php
defined('BASEPATH') or exit('No direct script access allowed');

class learning extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Services_m');
		$this->load->model('Users_m');
		$this->load->model('Mycourse_m');
		$this->load->model('Sharing_m');

	}
	public function index()
	{
		$this->load->library('upload');
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Users_m->getuser_byid($user_id);
		$data['courses'] = $this->Services_m->getservices_publish();
		$data['categories'] = $this->Services_m->getproductcategory();
		$data['sharing'] = $this->Sharing_m->getsharing();
		$this->template->load('template_learning', 'learning/learning_v', $data);
	}

	public function course_category()
	{
		$category_id = $this->input->post('id', true);
		if ($category_id == 0) {
			$data = $this->Services_m->getservices_publish();
		} else {
			$data = $this->Services_m->getcategory_by_id($category_id);
		}
		echo json_encode($data);
	}

	public function course_detail($id)
	{
		$this->load->library('upload');
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);
		$check_course = $this->Services_m->getcourse_by_id($id);
		if ($check_course != null) {
			$data['service'] = $this->Services_m->getcourse_by_id($id);


			$data['module_course'] = $this->Services_m->getmodulecource_by_id($id);
			$data['total_duration'] = $this->db
				->query("Select SUM(duration) as total from module_course WHERE course_id='$id'")
				->row();

			$user_id = $this->session->userdata("user_id");

			if ($this->session->userdata("user_id")) {
				$data['user_id'] = $this->db
					->query("SELECT user_id FROM course_user WHERE course_id='$id' AND user_id=$user_id")
					->row();
			} else {
				$data['user_id'] = $this->db
					->query("SELECT user_id FROM course_user WHERE course_id='$id'")
					->row();

			}

			// cek jika user sudah beli atau belum


			if ($data["user_id"] === NULL) {
				$data["user_id"] = (object) [
					'user_id' => '0',
				];
				// var_dump($data['user_id']);
				$this->template->load('template_learning', 'learning/course_detail_v', $data);
			} else {
				// var_dump($data['user_id']);
				$this->template->load('template_learning', 'learning/course_detail_v', $data);
			}
		} else {
			show_404();
		}

	}

	public function delete_service($id)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Asset Berhasil Dihapus
	  </div>');
		$this->db->delete('services', ['service_id' => $id]);
		redirect('Product');
	}

	public function add_course_user()
	{
		// INSERT COURSE TO USER
		$user_id = $this->input->post('user_id', true);
		$course_id = $this->input->post('course_id', true);
		$data = [
			'user_id' => $user_id,
			'course_id' => $course_id,
			'date_add_course' => date('Y-m-d H:i:s')
		];
		$this->db->insert('course_user', $data);

		$module = $this->Services_m->getmodulelearning_by_id($course_id);
		$data = array();
		$index = 0;
		foreach ($module as $row) {
			array_push(
				$data,
				array(
					'learning_course_id' => $row->course_id,
					'module_id' => $row->module_course_id,
					'user_id' => $this->session->userdata('user_id'),
				)
			);
			$index++;
		}
		$sql = $this->Services_m->save_batch_learning_progress_user($data);
		echo json_encode($sql);
	}

	public function learning_course($id)
	{
		$this->load->library('upload');
		$user_id = $this->session->userdata("user_id");
		$data['user'] = $this->Users_m->getuser_byid($user_id);
		$check_user = $this->Services_m->checking_user($user_id, $id);

		if ($check_user->num_rows() > 0) {
			$data['module_course'] = $this->Services_m->getmodulelearning_user_by_id($id, $user_id);
			$data['service'] = $this->Services_m->getcourse_by_id($id);
			$this->load->view('learning/learning_course_v2', $data);
		} else {
			show_404();
		}
	}

	public function submodule_js()
	{
		$submodule_id = $this->input->post('id', true);
		$data = $this->Services_m->getsubmodule_by_id($submodule_id);
		echo json_encode($data);
	}

	public function check_submodule_is_done_js()
	{
		$submodule_id = $this->input->post('submodule_id', true);
		$data = $this->db
			->query("SELECT user_id FROM learning_progress WHERE submodule_id='$submodule_id'")
			->row();
		echo json_encode($data);
	}

	public function next_submodule_js()
	{
		$module_id = $this->input->post('module_id', true);
		$submodule_id = $this->input->post('submodule_id', true);
		$data = $this->db
			->query("SELECT * FROM submodule_course where submodule_course_id = (select min(submodule_course_id) from submodule_course where submodule_course_id > $submodule_id) AND module_course_id = $module_id;")
			->row();
		echo json_encode($data);
	}

	public function previous_submodule_js()
	{
		$module_id = $this->input->post('module_id', true);
		$submodule_id = $this->input->post('submodule_id', true);
		$data = $this->db
			->query("SELECT * FROM submodule_course where submodule_course_id = (select max(submodule_course_id) from submodule_course where submodule_course_id < $submodule_id) AND module_course_id = $module_id;")
			->row();
		echo json_encode($data);
	}

	public function done_submodule_js()
	{
		$module_id = $this->input->post('module_id', true);
		$data = [
			'status_progress' => 1,
		];
		$this->db->update('learning_progress', $data, ['module_id' => $module_id]);
		echo json_encode($data);
	}

	public function learning_progress($id)
	{
		$this->load->library('upload');
		$data['course'] = $this->Services_m->getsubmodule_by_course_id($id);
		echo "<pre>";
		var_dump($data['course']);
		echo "</pre>";
	}

	public function exam($id)
	{
		$user_id = $this->session->userdata('user_id');
		$check_passed = $this->Services_m->check_result_passed($id, $user_id);
		$data['user'] = $this->Mycourse_m->getuser($user_id);

		$check_user_failed = $this->Services_m->checking_exam_user($user_id, $id);
		if ($check_passed) {
			redirect('learning/result_exam/' . $id);
		} else if ($check_user_failed->num_rows() == 3) {
			redirect('learning/certificates/' . $id);
		} else {
			$check_user = $this->Services_m->checking_user($user_id, $id);
			$progress_done = $this->db->query("SELECT COUNT(learning_progress_id) AS total_progress FROM learning_progress WHERE learning_course_id='$id' && user_id='$user_id' && status_progress='1';")->row();
			$all_progress = $this->db->query("SELECT COUNT(learning_progress_id) AS total_progress FROM learning_progress WHERE learning_course_id='$id' && user_id='$user_id';")->row();
			$progress = round($progress_done->total_progress / $all_progress->total_progress * 100, 2);

			if ($check_user->num_rows() > 0 && $progress == 100) {
				$data['service'] = $this->Services_m->getcourse_by_id($id);
				$data['questions'] = $this->Services_m->getquiz_bycourseid($id);
				$this->template->load('template_learning', 'ujian/ujian_v', $data);
			} else {
				show_404();
			}
		}
	}

	public function result()
	{
		$score = 0;
		$user_learn_id = $this->session->userdata('user_id');
		$course_id = $this->input->post('course_id');
		if ($course_id != null) {

			foreach ($_POST['questionIds'] as $questionId) {
				if ($this->Services_m->findAnswerIdCorrect($questionId) == $_POST['question_' . $questionId]) {
					$score++;
				}
			}

			$data['service'] = $this->Services_m->getcourse_by_id($course_id);

			$final_score = $score * 20;
			if ($final_score >= 80) {
				$status = 1;
			} else {
				$status = 0;
			}

			$data_result = [
				'course_id' => $course_id,
				'user_learn_id' => $user_learn_id,
				'date_exam' => date('Y-m-d'),
				'score' => $final_score,
				'status' => $status,
			];
			$this->db->insert('result_exam', $data_result);

			if ($status == 1) {
				$data_certificate = [
					'course_id' => $course_id,
					'credential_id' => 'BMNTACDMY' . $course_id . rand(),
					'user_learn_id' => $user_learn_id,
					'created_date' => date('Y-m-d'),
				];
				$this->db->insert('certificates', $data_certificate);
			}

			$data['score'] = $final_score;

			$data['results'] = $this->Services_m->list_result($course_id, $user_learn_id);
			// $this->template->load('template_learning', 'ujian/result_v', $data);
			redirect('learning/result_exam/' . $course_id);
		} else {
			show_404();
		}
	}

	public function certificates($course_id)
	{
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);
		$score = 0;
		$user_learn_id = $this->session->userdata('user_id');

		$data['score'] = $score;
		$data['service'] = $this->Services_m->getcourse_by_id($course_id);

		$certificate = $this->Services_m->certificate($course_id, $user_learn_id);

		if ($certificate) {
			$data['certificate'] = $this->Services_m->certificate($course_id, $user_learn_id);
		} else {
			$data['certificate'] = (object) [
				'credential_id' => '-',
				'created_date' => '-',
			];
		}

		$final_score = $score * 20;
		if ($final_score >= 80) {
			$status = 1;
		} else {
			$status = 0;
		}

		$data['results'] = $this->Services_m->list_result($course_id, $user_learn_id);

		$this->template->load('template_learning', 'ujian/certificate_v', $data);
	}


	public function result_exam($course_id)
	{
		$user_learn_id = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);

		$check_user = $this->Services_m->checking_exam_user($user_learn_id, $course_id);
		if ($check_user->num_rows() > 0) {
			$data['service'] = $this->Services_m->getcourse_by_id($course_id);
			$data['last_result'] = $this->Services_m->last_result($course_id, $user_learn_id);
			$data['results'] = $this->Services_m->list_result($course_id, $user_learn_id);
			$this->template->load('template_learning', 'ujian/result_v', $data);
		} else {
			show_404();
		}
	}
}
