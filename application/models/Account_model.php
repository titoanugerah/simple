<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Login_model sebagai model
//penamaan kontroller harus huruf kapital didepan
class Account_model extends CI_Model{
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
      'password' => ($this->input->post('password')),
     );
     //memerintahkan program untuk mencari jumlah akun yang sesuai dengan kombinasi yag dimasukan.
     return  $this->db->get_where('account',$data);
  }

  public function getPrivileges()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => ($this->input->post('password')),
     );
     $query = $this->db->get_where('account',$data);
     return $query->row();
  }

  public function getLoggedAccount($privileges)
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => ($this->input->post('password')),
     );
     $query = $this->db->get_where('view_'.$privileges,$data);
     return $query->row();
  }

  public function updateAccount()
  {
    $dataA = array(
      'username' => $this->input->post('username')
     );

    $dataB = array(
      'fullname' => $this->input->post('fullname'),
      'email' => $this->input->post('email'),
      'phone_number' => $this->input->post('phone_number'),
      'address' => $this->input->post('address')
     );

     $where = array('id' => $this->session->userdata['id']);
     $this->db->where($where);
     $this->db->update('account',$dataA);
     $this->db->where($where);
     $this->db->update('account_'.$this->session->userdata['privileges'],$dataB);
   }

   public function updatePassword()
   {
     $data = array(
       'password' => ($this->input->post('password'))
      );

      $where = array('id' => $this->session->userdata['id']);
      $this->db->where($where);
      $this->db->update('account',$data);
   }

   public function updateEPass()
   {
     $data = array(
       'epass' => $this->input->post('password')
      );

      $where = array('id' => $this->session->userdata['id']);
      $this->db->where($where);
      $this->db->update('account_admin',$data);
   }


   public function createAccount1()
   {
     $dataA = array(
       'username' => $this->input->post('username'),
       'password' => ('0000'),
       'privileges'=> 'client'
      );

      $this->db->insert('account',$dataA);
   }

   public function createAccount2()
   {
    $dataB = array(
      'id' => $this->db->insert_id(),
      'fullname' => $this->input->post('fullname'),
      'email' => $this->input->post('email'),
      'phone_number' => $this->input->post('phone_number'),
      'address' => $this->input->post('address')
     );
     $this->db->insert('account_client',$dataB);

   }
}

?>
