<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mydashboard extends CI_Controller
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
		if (!$this->session->userdata('user_id')) {
			redirect('auth');
		}
		$this->load->helper('form');
		$this->load->model('Services_m');
		$this->load->model('Mycourse_m');
		$this->load->model('Users_m');

	}
	public function index()
	{
		$this->load->library('upload');
		$user_id = $this->session->userdata('user_id');
		$data['courses'] = $this->Services_m->getservices();
		$data['user'] = $this->Users_m->getuser_byid($user_id);
		$data['categories'] = $this->Services_m->getproductcategory();
		$data['mycourses'] = $this->Mycourse_m->getmycourse($user_id);
		$this->template->load('template_learning', 'mydashboard/my_dashboard_v', $data);
	}

	public function myaccount()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Mycourse_m->getuser($user_id);
		$this->template->load('template_learning', 'mydashboard/my_account_v', $data);
	}

	public function update_account()
	{
		$user_id = $this->session->userdata('user_id');
		$ori_filename = $_FILES['img_profile']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
		$config = array(
			'upload_path' => "./images/profile/",
			'allowed_types' => "jpg|png|jpeg",
			'file_name' => $new_name,
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('img_profile')) {
			$data = [
				'nickname' => $this->input->post('nickname'),
				'about_person' => $this->input->post('about_person'),
				'current_company' => $this->input->post('current_company'),
				'current_job' => $this->input->post('current_job'),
				'address' => $this->input->post('address'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
			];
			$this->db->update('users', $data, ['user_id' => $user_id]);
			redirect('mydashboard/myaccount');
		} else {
			$user_id = $this->session->userdata('user_id');
			$img_profile_del = $this->db->query("SELECT img_profile FROM users WHERE user_id='$user_id';")->row();
			if ($img_profile_del->img_profile != 'profile-img.jpg') {
				unlink('images/profile/' . $img_profile_del->img_profile);
			}

			$prod_filename = $this->upload->data('file_name');
			$data = [
				'img_profile' => $prod_filename,
				'nickname' => $this->input->post('nickname'),
				'about_person' => $this->input->post('about_person'),
				'current_company' => $this->input->post('current_company'),
				'current_job' => $this->input->post('current_job'),
				'address' => $this->input->post('address'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
			];
			$this->db->update('users', $data, ['user_id' => $user_id]);
			redirect('mydashboard/myaccount');
		}
	}

	public function bumenet_mengajar($user_id)
	{
		$user_id = $this->session->userdata('user_id');
		$data = [
			'role' => 4,
		];
		$this->db->update('users', $data, ['user_id' => $user_id]);
		redirect('mydashboard');
	}

	public function get_certificate_bkp($course_id)
	{
		$data['certificate'] = $this->Mycourse_m->getcertificate($course_id);

		$data['service'] = $this->Mycourse_m->getcourse_byuserid($course_id);
		// var_dump($data);
		$this->load->view('mydashboard/certificate_course_v', $data);
		// redirect('mydashboard');
	}

	public function get_certificate($course_id)
	{
		$data['certificate'] = $this->Mycourse_m->getcertificate($course_id);
		if ($data['certificate']->nickname) {
			$this->generate($course_id, $data['certificate']->nickname, $data['certificate']->service_name);
		}
	}

	public function generate($course_id, $fullname = '', $course_name = '')
	{
		$user_id = $this->session->userdata('user_id');
		$certificate = $this->Services_m->certificate($course_id, $user_id);
		$course = $this->Services_m->getservices_preview($course_id);

		$nickname = $this->db->query("SELECT nickname FROM users WHERE user_id='$user_id';")->row();

		//direktori template sertifikat dan file hasil generate
		$directory = "./assets/img/certificate";
		if (!is_dir($directory)) {
			mkdir($directory, 0775, TRUE);
		}

		//path file template
		$image = $directory . '/template/1.png';
		$ttd = $directory . '/template/ttd.png';

		//fungsi php untuk membuat image baru dari file atau URL
		$createimage = imagecreatefrompng($image);

		//mendapatkan width dan height dari image yang baru saja dibuat
		$image_width = imagesx($createimage);
		$image_height = imagesy($createimage);

		//set variabel yang isinya path tempat menyimpan sertifikat hasil generate
		//untuk format nama file sertifikat nya, gua menggunakan input fullname dengan menghapus spasi
		//dan di konversi ke huruf kecil semua, plus disisipkan angka random, supaya nama file nya identik
		//contoh : nama yang diinputkan "Roronoa Zoro", maka nama file nya kurang lebih menjadi roronoazoro345.png
		$output = $directory . '/' . str_replace(" ", "", strtolower($nickname->nickname)) . "-" . strtolower($course_name) . ".png";

		//fungsi untuk set warna text dalam format RGB
		$color = imagecolorallocate($createimage, 5, 85, 86);
		$black = imagecolorallocate($createimage, 0, 0, 0);

		//variabel untuk set, jika text mau di putar. Jika posisi text mau yang normal, set nilainya 0
		$rotation = 0;
		//variabel untuk set nama di sertifikat
		$certificate_text = $nickname->nickname;
		$certificate_course_text = $course_name;
		$certificate_instructure = $course->nickname;
		$credential_id = $certificate->credential_id;
		$date = $certificate->created_date;
		//ukuran font text sertifikat, sesuaikan dengan ukuran font yang sesuai dengan template sertifikat
		$font_size = 35;
		$font_size_course = 20;
		$font_size_instructure = 25;
		$font_size_cred_id = 25;
		$font_size_date = 24;
		//font directory untuk text
		$drFont = FCPATH . "/assets/fonts/Zetafonts-reguler.otf";
		$drFont_course = FCPATH . "/assets/fonts/Zetafonts.otf";
		$drFont_instructure = FCPATH . "/assets/fonts/Lora-reguler.ttf";
		$drFont_cred_id = FCPATH . "/assets/fonts/Lora-reguler.ttf";
		$drFont_date = FCPATH . "/assets/fonts/Lora-reguler.ttf";

		//fungsi untuk memberikan kotak batas text
		//return nya berupa array
		$text_box = imagettfbbox($font_size, $rotation, $drFont, $certificate_text);

		//fungsi untuk mengetahui panjang text ditambah padding
		//silahkan sesuaikan value variable padding ini dengan template sertifikat kalian
		$padding = 700;
		$text_width = ($text_box[2] - $text_box[0]) + intval($padding);

		//setup posisi x dan y terhadap template sertifikat (silahkan sesuaikan dengan template kalian)
		// $origin_x = $image_width - $text_width;
		$origin_x = 280;
		$origin_y = 600;
		$origin_x_course = 670;
		$origin_y_course = 320;
		$origin_x_instructure = 1393;
		$origin_y_instructure = 1150;
		$origin_x_cred_id = 350;
		$origin_y_cred_id = 765;
		$origin_x_date = 510;
		$origin_y_date = 937;

		//function untuk "menempelkan" text nama di sertifikat dengan parameter yang sudah di set sebelumnya
		imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $color, $drFont, $certificate_text);
		imagettftext($createimage, $font_size_course, $rotation, $origin_x_course, $origin_y_course, $color, $drFont_course, $certificate_course_text);
		imagettftext($createimage, $font_size_instructure, $rotation, $origin_x_instructure, $origin_y_instructure, $black, $drFont_instructure, $certificate_instructure);
		imagettftext($createimage, $font_size_cred_id, $rotation, $origin_x_cred_id, $origin_y_cred_id, $black, $drFont_cred_id, $credential_id);
		imagettftext($createimage, $font_size_date, $rotation, $origin_x_date, $origin_y_date, $black, $drFont_date, $date);
		// imagecopy($$createimage, $ttd, 500, 200, 0, 0, 100, 100);

		//membuat image sertifikat yang sudah ada text namanya dengan format png dan simpan sesuai dengan value variabel output
		imagepng($createimage, $output, 3);

		//memanggil fungsi untuk proses download sertifikat
		$this->download_file($output);
	}

	public function download_file($path_file)
	{
		header("Content-Description: File Transfer");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"" . basename($path_file) . "\"");
		readfile($path_file);
		redirect('/Mydashboard', 'reload');
		exit();
	}

	public function update_img_profile()
	{
		$ori_filename = $_FILES['picture']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
		$config = array(
			'upload_path' => "./images/profile/",
			'allowed_types' => "jpg|png|jpeg",
			'file_name' => $ori_filename,
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('picture')) {
			echo "gagal upload";
			// $error = array('error' => $this->upload->display_errors());
			// $this->template->load('template_admin', 'Admin/add_product_v', $error);
		} else {
			$prod_filename = $this->upload->data('file_name');
			$data = [
				'img_profile' => $prod_filename,
			];
			$this->db->insert('products', $data);
			// 	$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			//     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			//     <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
			//     Asset Berhasil Ditambahkan
			//   </div>');
			redirect('Admin/Product/add_product');
		}
	}




}
