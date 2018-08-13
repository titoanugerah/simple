<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login_model sebagai model
//penamaan kontroller harus huruf kapital didepan
class Client_model extends CI_Model{
  public function __construct(){
    //untuk mengakses database beserta konfigurasi2 dari database
    $this->load->database();
    //untuk mengakses library helper dari file
    $this->load->helper('file');
  }

  public function getMenu()
  {
    $where = array('id_client' => $this->session->userdata['id']);
    $query = $this->db->get_where('view_node',$where);
    return $query->result();
  }

  public function getSelectedNode($id)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where('view_node',$where);
    return $query->row();
  }

  public function getTempSelectedNode($id)
  {
    $where = array('id_node' => $id);
    $query = $this->db->get_where('view_temp',$where, 1000);
    return $query->result();
  }

  public function getPHSelectedNode($id)
  {
    $where = array('id_node' => $id);
    $query = $this->db->get_where('view_ph',$where);
    return $query->result();
  }

  public function getStatisticPH()
  {
    $where = array('id_client' => $this->session->userdata['id']);
    $query = $this->db->get_where('view_ph_warning',$where);
    return $query->result();
  }

  public function getStatisticTemp()
  {
    $where = array('id_client' => $this->session->userdata['id']);
    $query = $this->db->get_where('view_temp_warning',$where);
    return $query->result();
  }

  public function getTempSelectedClient()
  {
    $where = array(
      'id_client' => $this->session->userdata['id']
    );
    $query = $this->db->get_where('view_temp_warning_detail',$where);
    return $query->result();
  }

  public function getPHSelectedClient()
  {
    $where = array(
      'id_client' => $this->session->userdata['id']
    );
    $query = $this->db->get_where('view_ph_warning_detail',$where);
    return $query->result();
  }

  public function getTempDangerSelectedClient()
  {
    $where = array(
      'id_client' => $this->session->userdata['id']
    );
    $query = $this->db->get_where('view_temp_danger_detail',$where);
    return $query->result();
  }

  public function getPHDangerSelectedClient()
  {
    $where = array(
      'id_client' => $this->session->userdata['id']
    );
    $query = $this->db->get_where('view_ph_danger_detail',$where);
    return $query->result();
  }

  public function updateNode($id)
  {
    $data = array(
      'node_name' => $this->input->post('node_name'),
     );
     $where = array('id'=>$id);
     $this->db->where($where);
     $this->db->update('node',$data);
  }

  public function getDownloadedData($id_node)
  {
    $where = array(
      'id_node' => $id_node
      );
    $query = $this->db->get_where('view_download_ph',$where);
    return $query->result();
  }

  public function goDownloadData($id_node)
  {

    $year = $this->input->post('year');
    $month = $this->input->post('month');
    $week = $this->input->post('week');
    $date = $this->input->post('date');
    if ($year=='') {
      $year = 'null';
    }
    if ($month=='') {
      $month = 'null';
    }
    if ($week=='') {
      $week = 'null';
    }
    if ($date=='') {
      $date = 'null';
    }
    $query = $this->db->query('select * from view_download_'.$this->input->post('data').' where id_node = '.$id_node.' and (year = '.$year.' or month = '.$month.' or week = '.$week.' or date = "'.$date.'")');
    return $query->result();

  }


}

?>
