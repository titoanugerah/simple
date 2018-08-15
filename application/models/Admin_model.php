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
    $this->load->library('email');
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
     return $this->db->insert_id();
  }

  public function createNodeConf($id_node)
  {
    $dataWrite = '#define NODE_addr  '.$id_node.'
    #include <SoftwareSerial.h>
    #define PC  Serial
    //#define nodeWifi  PC

    #define RX_pin  A1
    #define TX_pin  A0
    SoftwareSerial nodeWifi(RX_pin, TX_pin);

    #include "uCRC16Lib.h"

    #define LED           13

    #include <OneWire.h>

    #define ds18B20pin    11
    #define tMeasDS       1000
    #define tSampleDS     2000

    OneWire  ds(ds18B20pin);
    boolean meas;
    boolean newData;
    byte present = 0;
    byte data[12];
    float celsius;
    unsigned long t_DS;

    byte resetCekDS(int n) {
      present = 1;
      for(int i=0; i<n; i++)  {
        if(present) present = ds.reset();
        else break;
      }
      return present;
    }

    #define pHpin A5            //pH meter pin
    #define pHoffset 0.00             //deviation compensate

    #define tSamplePH     20
    #define pHbufLen      40        // total sample

    int pHbuf[pHbufLen];            // penyimpanan data pH
    int pHbufIdx=0;

    unsigned long t_pH;
    float pHValue,voltage;

    float get_average(int* arr, int number){
      int i;
      double avg;
      long amount=0;
      if(number<=0) return 0;

      for(i=0;i<number;i++){
        amount += arr[i];
      }
      avg = amount/number;
      return avg;
    }

    String rxBuf;
    String txBuf;
    unsigned long t;
    unsigned long t_update;
    boolean updating;

    #define sendInterval  10000
    #define maxTry        5

    #define t_wait        1000

    unsigned long t_send;
    int trySend;
    boolean trying;

    void varInit(){
      t = millis();
      t_pH = t;
      t_DS = t;
      meas = false;
      newData = false;
      trySend = 0;
      trying = false;
    }

    void HWinit(){
      pinMode(LED,OUTPUT);
      nodeWifi.begin(4800);
      PC.begin(9600);

      pinMode(pHpin,INPUT);
    }

    uint16_t getCRC(String &inStr){
      if(inStr.length()==0) return 0xFFFF;
      char tmpChar[256];
      inStr.toCharArray(tmpChar,inStr.length());
      uint16_t ceksum = uCRC16Lib::calculate(tmpChar, inStr.length());
      return ceksum;
    }

    void setup(void)  {
      HWinit();
      varInit();
    }

    void loop(void)
    {
      t = millis();
      if((t-t_pH) > tSamplePH)  {
        t_pH = t;
        pHbuf[pHbufIdx++] = analogRead(pHpin);
        if(pHbufIdx==pHbufLen)      pHbufIdx=0;
      }

      t = millis();
      if(meas) {
        if((t - t_DS) > tMeasDS) {
          if(resetCekDS(5)) {
            ds.skip();
            ds.write(0xBE);         // Read Scratchpad

            for (int i = 0; i < 9; i++) {           // we need 9 bytes
              data[i] = ds.read();
            }

            if(data[8]==OneWire::crc8(data, 8)) {
              // Convert the data to actual temperature
              int16_t raw = (data[1] << 8) | data[0];
              byte cfg = (data[4] & 0x60);
              // at lower res, the low bits are undefined, so lets zero them
              if (cfg == 0x00) raw = raw & ~7;  // 9 bit resolution, 93.75 ms
              else if (cfg == 0x20) raw = raw & ~3; // 10 bit res, 187.5 ms
              else if (cfg == 0x40) raw = raw & ~1; // 11 bit res, 375 ms
              //// default is 12 bit resolution, 750 ms conversion time
              celsius = (float)raw / 16.0;

              newData = true;
            }
          }
          else  t_DS = t + 500 - tSampleDS;
          meas = false;
        }
      }
      else  {
        if((t - t_DS) > tSampleDS) {
          digitalWrite(LED,HIGH);
          if(resetCekDS(5)) {
            ds.skip();
            ds.write(0x44, 1);        // start conversion, with parasite power on at the end
            t_DS = t;
            meas = true;
          }
          else  t_DS = t + 500 - tSampleDS;
          digitalWrite(LED,LOW);
        }
      }

      if(newData) {
        t = millis();
        if((t-t_update) > sendInterval) {
          t_update = t;
          newData = false;

          voltage = get_average(pHbuf, pHbufLen)*5.0/1024;
          pHValue = 3.5*voltage+pHoffset;

          txBuf = "[";
          txBuf += String(NODE_addr,DEC);
          txBuf += ",";
          txBuf += String((int)(pHValue*100),DEC);
          txBuf += ",";
          txBuf += String((int)(celsius*100),DEC);
          txBuf += "]";
          uint16_t crc = getCRC(txBuf);
          txBuf += String(crc,DEC);
          txBuf += "\r";

          PC.print("SendData -> ");
          PC.println(txBuf);

          nodeWifi.print(txBuf);
          delay(10);
        }
      }
    }';
    if ( ! write_file("./assets/NodeSensor.ino", $dataWrite))
    {
            return FALSE;
    }
    else
    {
            return TRUE;
    }
  }

  public function downloadNodeConf()
  {
    $path = './assets/NodeSensor.ino';
    force_download($path,null);
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
    $data = array('password' => ('0000'));
    $this->db->where($where);
    $this->db->update('account',$data);
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

    public function deleteCurrentPH($id_node)
    {
      $where = array('id_node'=>$id_node);
      $this->db->where($where);
      $this->db->delete('ph');
    }

    public function deleteCurrentTemp($id_node)
    {
      $where = array('id_node'=>$id_node);
      $this->db->where($where);
      $this->db->delete('temp');
    }
    /*
    public function sentPHReport($id_node,$ph,$email,$pass,$custMail)
    {
    $config['protocol'] = "mail";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = $email;
    $config['smtp_pass'] = $pass;
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $this->email->initialize($config);
    $this->email->from($email, 'Admin SIMPLE');
    $this->email->to($custMail);
    $this->email->subject('Warning pH From Node'.$id_node);
    $this->email->message('Dear pelanggan Kami, Bersamaan dengan email ini memberitahukan bahwa pH pada Perangkat anda (Node'.$id_node.') dalam status BURUK ('.$ph.'). Terima Kasih');
    if ($this->email->send()) {
      echo 'Email Terkirim';
      echo 'Email : '.$custMail;

    } else {
      echo 'Email Tidak Terkirim';
    }
  }*/

  public function sentPHReport($id_node,$ph,$email,$pass,$custMail)
  {
    $config['protocol'] = "sendmail";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = $email;
    $config['smtp_pass'] = $pass;
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $this->email->initialize($config);
    $this->email->from($email, 'Admin SIMPLE');
    $this->email->to($custMail);
    $this->email->subject('Warning pH From Node'.$id_node);
    $this->email->message('Dear pelanggan Kami, Bersamaan dengan email ini memberitahukan bahwa pH pada Perangkat anda (Node'.$id_node.') dalam status BURUK ('.$ph.'). Terima Kasih');
    if ($this->email->send()) {
      echo 'Email Terkirim';
    } else {
      echo 'Email Tidak Terkirim';
    }
  }

  public function getEpass()
  {
    $where = array('id' => 1);
    $query = $this->db->get_where('view_admin',$where);
    return $query->row();
  }

    /*public function sentTempReport($id_node,$temp,$email,$pass,$custMail)
    {
      $config['protocol'] = "mail";
    //  $config['smtp_host'] = "smtp.gmail.com";
      $config['smtp_host'] = "smtp.gmail.com";
      $config['smtp_port'] = "465";
      $config['smtp_user'] = $email;
      $config['smtp_pass'] = $pass;
      $config['charset'] = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $this->email->initialize($config);
      $this->email->from($email, 'Admin SIMPLE');
      $this->email->to($custMail);
      $this->email->subject('Warning Temp From Node'.$id_node);
      $this->email->message('Dear pelanggan Kami, Bersamaan dengan email ini memberitahukan bahwa suhu pada Perangkat anda (Node'.$id_node.') dalam status BURUK ('.$temp.'). Terima Kasih');
      if ($this->email->send()) {
        echo 'Email Terkirim';
      } else {
        echo 'Email Tidak Terkirim';
      }

    }*/

    public function sentTempReport($id_node,$temp,$email,$pass,$custMail)
    {
      $config['protocol'] = "sendmail";
      $config['smtp_host'] = "ssl://smtp.gmail.com";
      //  $config['smtp_host'] = "smtp.gmail.com";
      $config['smtp_port'] = "465";
      $config['smtp_user'] = $email;
      $config['smtp_pass'] = $pass;
      $config['charset'] = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $this->email->initialize($config);
      $this->email->from($email, 'Admin SIMPLE');
      $this->email->to($custMail);
      $this->email->subject('Warning Temp From Node'.$id_node);
      $this->email->message('Dear pelanggan Kami, Bersamaan dengan email ini memberitahukan bahwa suhu pada Perangkat anda (Node'.$id_node.') dalam status BURUK ('.$temp.'). Terima Kasih');
      if ($this->email->send()) {
        echo 'Email Terkirim';
      } else {
        echo 'Email Tidak Terkirim';
      }
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

    public function getNewNodeList()
    {
      $query = $this->db->query('select * from view_node limit 5');
      return $query->result();
    }

    public function getNewClientList()
    {
      $query = $this->db->query('select * from view_client limit 5');
      return $query->result();
    }

  }
?>
