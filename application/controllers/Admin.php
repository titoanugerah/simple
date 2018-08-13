<?php


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
		if ($this->input->get('id_node','ph','temp')) {

		} else if ($this->session->userdata['privileges']!='admin') {
			redirect(base_url('logout'));
		}

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
			$id_node = $this->admin_model->createNode($id);
			$this->admin_model->createNodeConf($id_node);
			$this->admin_model->downloadNodeConf();
            $this->admin_model->deleteCurrentPH($id_node);
            $this->admin_model->deleteCurrentTemp($id_node);
            redirect(base_url('listNode'));

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
			$this->admin_model->deleteCurrentPH($id);
			$this->admin_model->deleteCurrentTemp($id);
			redirect(base_url('listAccount'));
		} elseif ($this->input->post('downloadData')) {
			$data['downloadData'] = $this->admin_model->goDownloadData($id);
			$datas = null;
			if ($this->input->post('data')=='ph') {
				foreach ($data['downloadData'] as $item) {
					$datas = $datas." | ".$item->id." | ".$item->node_name." | ".$item->record_time." | ".$item->ph." | \r\n";
				}
			} else {
				foreach ($data['downloadData'] as $item) {
					$datas = $datas." | ".$item->id." | ".$item->node_name." | ".$item->record_time." | ".$item->temp." | \r\n";
				}
			}
			$path = './assets/report'.$this->input->post('data').'Node'.$id.'.txt';
			if ( ! write_file($path, $datas))
	    {
				redirect(base_url('detailNode/'.$id));
	    }
	    else
	    {
				force_download($path,null);
	    }
		}
		$data['download'] = $this->admin_model->getDownloadedData($id);
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

	public function test()
	{
		if ($this->input->get('id_node',false) && $this->input->get('temp',false) && $this->input->get('ph',false)) {
			$this->admin_model->insertPHToDB();
			$this->admin_model->insertTempToDB();
			$epass = $this->admin_model->getEpass();
			$custMail = $this->admin_model->getSelectedNode($this->input->get('id_node',null));
			echo "Get Data Success <br>";
			echo "ID_NODE = ".$this->input->get('id_node',false)."<br>";
			echo "TEMP = ".$this->input->get('temp',false)."<br>";
			echo "PH = ".$this->input->get('ph',false)."<br>";
			if(($this->input->get('temp')<21 or $this->input->get('temp')>35) && ($this->input->get('ph')<5 or $this->input->get('ph')>10)){
				$this->admin_model->sentTempReport($this->input->get('id_node'),$this->input->get('temp'),$epass->email,$epass->epass,$custMail->email);
				$this->admin_model->sentPHReport($this->input->get('id_node'),$this->input->get('ph'),$epass->email,$epass->epass,$custMail->email);

			} else if($this->input->get('temp')<21 or $this->input->get('temp')>35){
				$this->admin_model->sentTempReport($this->input->get('id_node'),$this->input->get('temp'),$epass->email,$epass->epass,$custMail->email);

			} else if($this->input->get('ph')<5 or $this->input->get('ph')>10){
				$this->admin_model->sentPHReport($this->input->get('id_node'),$this->input->get('ph'),$epass->email,$epass->epass,$custMail->email);
			}
		} else {
			echo "Error Get Data";
		}
	}

}
