<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//deklarasi kelas Admin_model sebagai model
//penamaan kontroller harus huruf kapital didepan
class Admin_model extends CI_Model{
  public function __construct(){
    //untuk mengakses database beserta konfigurasi2 dari database
    $this->load->database();
    //untuk mengakses library helper dari file
    $this->load->helper('file');
  }

  public function getListAccount()
  {
    $query = $this->db->get('view_client');
    return $query->result();
  }

  public function getSelectedAccount($id)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where('view_client',$where);
    return $query->row();
  }

  public function updateSelectedAccount($id)
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
     $where = array('id' => $id);
     $this->db->where($where);
     $this->db->update('account',$dataA);
     $this->db->where($where);
     $this->db->update('account_client',$dataB);
  }

  public function resetPasswordSelectedAccount($id)
  {
    $where = array('id' => $id );
    $data = array('password' => md5('0000'));
    $this->db->where($where);
    $this->db->update('account',$data);
  }

   public function createAccount1()
   {
     $dataA = array(
       'username' => $this->input->post('username'),
       'password' => md5('0000'),
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
