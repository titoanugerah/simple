<?php
//if ($this->session->userdata['privileges']!='admin') {
//	redirect(base_url('login'));
//}
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login sebagai kontroller
//penamaan kontroller harus huruf kapital didepan
class Client extends CI_Controller {
	//construct itu seperti autoload tapi khusus buat satu kontroller/model
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function clientDashboard()
	{
		$data['view_name'] = 'no';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}
}
