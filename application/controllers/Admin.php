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
		$this->load->model('admin_model');
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
			$this->account_model->createAccount1();
			$this->account_model->createAccount2();
//			$data['view_name'] = 'admin/listAccount';
			$data['view_name'] = 'no';
			$data['notification'] = 'createAccountSuccess';
			$this->load->view('template',$data);
		}
		$data['view_name'] = 'admin/createAccount';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}

	public function listAccount()
	{
		$data['list'] = $this->admin_model->getListAccount();
		$data['view_name'] = 'admin/listAccount';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}

	public function detailAccount($id)
	{
		$data['notification'] = 'no';
		if ($this->input->post('updateAccount')) {
			$this->admin_model->updateSelectedAccount($id);
			$data['notification'] = 'updateSuccess';
		} elseif ($this->input->post('resetPasword')) {
			$this->admin_model->resetPasswordSelectedAccount($id);
			$data['notification'] = 'updateSuccess';
		} elseif ($this->input->post('createNode')) {
			$this->admin_model->createNode($id);
		}
		$data['list'] = $this->admin_model->getClientNode($id);
		$data['detail'] = $this->admin_model->getSelectedAccount($id);
		$data['view_name'] = 'admin/detailAccount';
		$this->load->view('template',$data);
	}
}
