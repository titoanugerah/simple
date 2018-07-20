<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas account sebagai kontroller
//penamaan kontroller harus huruf kapital didepan
class Account extends CI_Controller {
	//construct itu seperti autoload tapi khusus buat satu kontroller/model
	public function __construct()
	{
		parent::__construct();
		//intinya biar kontroller ini (account) dapat mengakses model account_model
		$this->load->model('account_model');
		$this->load->helper('date');
		$this->load->helper('url');
	}

	//index itu yang diakses kalo dari routes-nya cuman nulis nama kontroller aja
	public function index()
	{
		//pengkondisian kalo pengguna (user) mengklik button account
		if ($this->input->post('loginValidation')) {
			//membuat variabel baru bernama login
			//menjalankan fungsi loginValidation yang ada pada account_model
			//nilai yang keluar dari loginValidation akan dimasukan ke variabel login
			$login =  $this->account_model->loginValidation();
			//jika ada setidaknya 1 akun dengan kombinasi yang tepat maka
			if ($login->num_rows() > 0) {
				//ada array $data['priviilages']
				//menjalankan fungsi getPrivileges yang ada pada account_model
				//nilai yang dihasilkan di fungsi getPrivileges dimasukan ke $data['priviilages']
				$data['privileges'] = $this->account_model->getPrivileges();
				//$privileges, memiliki nilai dari $data['priviilages'] tabel privileges
				$privileges = $data['privileges']->privileges;
				$data['account'] = $this->account_model->getLoggedAccount($privileges);
				$data_session = array(
					'login' =>true,
					'id' => $data['account']->id,
					'username' => $data['account']->username,
					'password' => $data['account']->password,
					'fullname' => $data['account']->fullname,
					'address' => $data['account']->address,
					'email' => $data['account']->email,
					'phone_number'=>$data['account']->phone_number,
					'privileges' => $privileges
				);
				$this->session->set_userdata($data_session);
				redirect(base_url($privileges."Dashboard"));
			} else {
				$this->load->view('notification/loginFailed');
				//menampilkan laman login
				$this->load->view('login');
			}
		} else {
			//menampilkan laman login
			$this->load->view('login');
		}
	}

	public function profile()
	{
		if ($this->input->post('updateProfile')) {
			$this->account_model->updateAccount();
			$data['notification'] = 'updateSuccess';
			$data['view_name'] = 'profile';
			$this->load->view('template',$data);
		} elseif ($this->input->post('updatePassword')) {
			$this->account_model->updatePassword();
			$data['notification'] = 'updateSuccess';
			$data['view_name'] = 'profile';
			$this->load->view('template',$data);
		} else {
			$data['notification'] = 'no';
			$data['view_name'] = 'profile';
			$this->load->view('template',$data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
