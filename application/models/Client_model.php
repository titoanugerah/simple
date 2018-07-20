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
    $where = array('id' => $id);
    $query = $this->db->get_where('view_temp',$where);
    return $query->result();
  }

  public function getPHSelectedNode($id)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where('view_ph',$where);
    return $query->result();
  }
}

?>
