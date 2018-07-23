<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//ci itu punya banyak library dan konfigurasi, nah autoload itu memungkinkan ci itu
//menjalankan beberapa konfig dan library yang kita tentuin

$autoload['packages'] = array();
//library (fitur) yang kita pakai setiap kali website diakses yaitu session dan database
$autoload['libraries'] = array('database','session');
$autoload['drivers'] = array();
//kita juga memakai helper url agar url itu berjalan secara semestinya
$autoload['helper'] = array('url','file','download');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array();
