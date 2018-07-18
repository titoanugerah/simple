<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login_model sebagai model
//penamaan kontroller harus huruf kapital didepan
class Login_model extends CI_Model{
  public function __construct(){
    //untuk mengakses database beserta konfigurasi2 dari database
    $this->load->database();
    //untuk mengakses library helper dari file
    $this->load->helper('file');
  }
  //ada function yang namanya loginValidation
  public function loginValidation()
  {
    //array data yang akan diisi username dan password yang dimasukan sama pengguna)
    $data = array(
      //username diambil dari form yang bernama username
      'username' => $this->input->post('username'),
      //password diambil dari form yang bernama password, lalu dienkripsi menggunakan md5
      'password' => md5($this->input->post('password')),
     );
     //memerintahkan program untuk mencari jumlah akun yang sesuai dengan kombinasi yag dimasukan.
     return  $this->db->get_where('account',$data);
  }

  public function getPrivileges()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
     );
     $query = $this->db->get_where('account',$data);
     return $query->row();
  }

  public function getLoggedAccount($privileges)
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
     );
     $query = $this->db->get_where('view_'.$privileges,$data);
     return $query->row();
  }

  public function deleteCaptcha()
  {
    delete_files('./captcha/');
  }

}

?>
