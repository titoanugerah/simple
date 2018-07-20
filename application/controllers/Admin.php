<?php
//if ($this->session->userdata['privileges']!='admin') {
//	redirect(base_url('login'));
//}
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login sebagai kontroller
//penamaan kontroller harus huruf kapital didepan
class Admin extends CI_Controller {
	//construct itu seperti autoload tapi khusus buat satu kontroller/model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model');
	}

	public function index()
	{

	}

	public function adminDashboard()
	{
		$data['view_name'] = 'no';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}

	public function createAccount()
	{
		if ($this->input->post('createAccount')) {
			$this->account_model->createAccount();
			$data['view_name'] = 'admin/createAccount';
			$data['notification'] = 'createAccountSuccess';
			$this->load->view('template',$data);
		}
		$data['view_name'] = 'admin/createAccount';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}
}
