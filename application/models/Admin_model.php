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

  public function getClientNode($id)
  {
    $where = array('id_client' => $id);
    $query = $this->db->get_where('view_node',$where);
    return $query->result();
  }

  public function createNode($id)
  {
    $dataA = array(
      'node_name' => $this->input->post('node_name'),
      'id_client' => $id,
      'address'=> $this->input->post('address')
     );

     $this->db->insert('node',$dataA);
  }

  public function getAllData($id)
  {
    $query =  $this->db->get('view_'.$id);
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

  public function updateNode($id)
  {
    $data = array(
      'node_name' => $this->input->post('node_name'),
      'address' => $this->input->post('address'),
      'status' => $this->input->post('status')
     );
     $where = array('id'=>$id);
     $this->db->where($where);
     $this->db->update('node',$data);
  }

  public function deleteNode($id)
  {
    $where = array('id'=>$id);
    $this->db->where($where);
    $this->db->delete('node');
  }

  public function getListNode()
  {
    $query =  $this->db->get('view_node');
    return $query->result();
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

   public function insertPHToDB()
   {
     $data = array(
       'id_node' => $this->input->get('id_node',false),
       'ph' => $this->input->get('ph',false),
      );
      $this->db->insert('ph',$data);
   }

   public function insertTempToDB()
   {
     $data = array(
       'id_node' => $this->input->get('id_node',false),
       'temp' => $this->input->get('temp',false),
      );
      $this->db->insert('temp',$data);
   }

}

?>
