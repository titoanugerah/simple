<?php
//if ($this->session->userdata['privileges']!='admin') {
//	redirect(base_url('login'));
//}
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login sebagai kontroller
//penamaan kontroller harus huruf kapital didepan
class Android extends CI_Controller {
	//construct itu seperti autoload tapi khusus buat satu kontroller/model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Android_Model');
	}

	public function index()
	{

	}

	public function showData()
	{
		$data = $this->Android_Model->getData1();
		$array = array();
    	foreach ($data as $result) {
		$row_array['id_node'] = $result->id_node;
		$row_array['node_name'] = $result->node_name;
		$row_array['record_time'] = $result->record_time;
		$row_array['ph'] = $result->ph;
		array_push($array, $row_array);
	}
		echo json_encode(array('data'=>$array));
	}

}
