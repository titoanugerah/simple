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

	public function detailNode($id)
	{
		$data['notification'] = 'no';
		if ($this->input->post('updateNode')) {
			$this->admin_model->updateNode($id);
			$data['notification'] = 'updateSuccess';
		} elseif ($this->input->post('deleteNode')) {
			$this->admin_model->deleteNode($id);
			redirect(base_url('listAccount'));
		}
		$data['listTemp'] = $this->admin_model->getTempSelectedNode($id);
		$data['listPH'] = $this->admin_model->getPHSelectedNode($id);
		$data['detail'] = $this->admin_model->getSelectedNode($id);
		$data['view_name'] = 'admin/detailNode';
		$this->load->view('template',$data);
	}

	public function listNode()
	{
		$data['list'] = $this->admin_model->getListNode();
		$data['view_name'] = 'admin/listNode';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}

	public function downloadDataPH($id)
	{
		$data['listPH'] = $this->admin_model->getPHSelectedNode($id);
		$datas = null;
		foreach ($data['listPH'] as $item) {
			$datas = $datas." | ".$item->id." | ".$item->node_name." | ".$item->record_time." | ".$item->ph." | \r\n";
		}
		$path = './assets/dataPHNode-'.$id.'.txt';
		if ( ! write_file($path, $datas))
    {
			redirect(base_url('detailNode/'.$id));
    }
    else
    {
			force_download($path,null);
    }

	}

	public function downloadDataTemp($id)
	{
		$data['$listTemp'] = $this->admin_model->getTempSelectedNode($id);
		$datas = null;
		foreach ($data['listTemp'] as $item) {
			$datas = $datas." | ".$item->id." | ".$item->node_name." | ".$item->record_time." | ".$item->temp." | \r\n";
		}
		$path = './assets/dataTempNode-'.$id.'.txt';
		if ( ! write_file($path, $datas))
    {
			redirect(base_url('detailNode/'.$id));
    }
    else
    {
			force_download($path,null);
    }
	}

	public function test($id)
	{
		$data['type'] = $id;
		$data['list'] = $this->admin_model->getAllData($id);
		$this->load->view('test',$data);
	}

	
}
