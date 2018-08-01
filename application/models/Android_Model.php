<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login_model sebagai model
//penamaan kontroller harus huruf kapital didepan
class Android_Model extends CI_Model{
  public function __construct(){
    //untuk mengakses database beserta konfigurasi2 dari database
    $this->load->database();
    //untuk mengakses library helper dari file
    $this->load->helper('file');
  }

  public function getData1()
  {
    $query = $this->db->query(
        "SELECT A.*, B.node_name FROM ph AS A JOIN node AS B ON A.id_node = B.id WHERE A.id_node");
    return $query->result();
  }
}

?>
