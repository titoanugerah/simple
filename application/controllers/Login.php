<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login sebagai kontroller
//penamaan kontroller harus huruf kapital didepan
class Login extends CI_Controller {
	//construct itu seperti autoload tapi khusus buat satu kontroller/model
	public function __construct()
	{
		parent::__construct();
		//intinya biar kontroller ini (login) dapat mengakses model login_model
		$this->load->model('login_model');
		$this->load->helper('date');
		$this->load->helper('url');
	}

	//index itu yang diakses kalo dari routes-nya cuman nulis nama kontroller aja
	public function index()
	{
		//pengkondisian kalo pengguna (user) mengklik button login
		if ($this->input->post('loginValidation')) {
			//membuat variabel baru bernama login
			//menjalankan fungsi loginValidation yang ada pada Login_model
			//nilai yang keluar dari loginValidation akan dimasukan ke variabel login
			$login =  $this->login_model->loginValidation();
			//jika ada setidaknya 1 akun dengan kombinasi yang tepat maka
			if ($login->num_rows() > 0) {
				//ada array $data['priviilages']
				//menjalankan fungsi getPrivileges yang ada pada login_model
				//nilai yang dihasilkan di fungsi getPrivileges dimasukan ke $data['priviilages']
				$data['privileges'] = $this->login_model->getPrivileges();
				//$privileges, memiliki nilai dari $data['priviilages'] tabel privileges
				$privileges = $data['privileges']->privileges;
				$data['account'] = $this->login_model->getLoggedAccount($privileges);
				$data_session = array(
					'login' =>true,
					'id' => $data['account']->id,
					'username' => $data['account']->username,
					'password' => $data['account']->password,
					'fullname' => $data['account']->fullname,
					'email' => $data['account']->email,
					'phone_number'=>$data['account']->phone_number,
					'privileges' => $privileges
				);
				$this->session->set_userdata($data_session);
				redirect(base_url($privileges."Dashboard"));
			} else {
				//menampilkan laman login
				$this->load->view('login');
			}
		} else {
			//menampilkan laman login
			$this->load->view('login');
		}
	}

}
