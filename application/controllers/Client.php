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
		$this->load->model('client_model');
		if ($this->session->userdata['privileges']!='client') {
			redirect(base_url('logout'));
		}

	}

	public function index()
	{

	}

	public function clientDashboard()
	{
		$data['phInfo'] = $this->client_model->getStatisticPH();
		$data['tempInfo'] = $this->client_model->getStatisticTemp();
		$data['tempWarningTable'] = $this->client_model->getTempSelectedClient();
		$data['phWarningTable'] = $this->client_model->getPHSelectedClient();
		$data['tempDangerTable'] = $this->client_model->getTempDangerSelectedClient();
		$data['phDangerTable'] = $this->client_model->getPHDangerSelectedClient();
		$data['menu'] = $this->client_model->getMenu();
		$data['view_name'] = 'client/clientDashboard';
		$data['notification'] = 'no';
		$this->load->view('template',$data);
	}

	public function detailNodeClient($id)
	{
		$data['notification'] = 'no';
		if ($this->input->post('updateNode')) {
			$this->client_model->updateNode($id);
			$data['notification'] = 'updateSuccess';
		} elseif ($this->input->post('downloadData')) {
			$data['downloadData'] = $this->client_model->goDownloadData($id);
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
		$data['download'] = $this->client_model->getDownloadedData($id);
		$data['menu'] = $this->client_model->getMenu();
		$data['detail'] = $this->client_model->getSelectedNode($id);
		$data['listPH'] = $this->client_model->getPHSelectedNode($id);
		$data['listTemp'] = $this->client_model->getTempSelectedNode($id);
		$data['view_name'] = 'client/detailNodeClient';
		$this->load->view('template',$data);
	}
}
