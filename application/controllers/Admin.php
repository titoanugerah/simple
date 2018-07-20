<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login sebagai kontroller
//penamaan kontroller harus huruf kapital didepan
class Admin extends CI_Controller {
	//construct itu seperti autoload tapi khusus buat satu kontroller/model
	public function __construct()
	{
		parent::__construct();
		//intinya biar kontroller ini (login) dapat mengakses model login_model
		$this->load->model('login_model');
		if ($this->session->userdata['privileges']!='admin') {
			redirect(base_url('login'));
		}
	}

	public function index()
	{

	}

	public function adminDashboard()
	{
		
	}
}
