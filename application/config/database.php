<?php
//buat konfigurasi database
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	//hostname itu nama host/servernya, berhubung kita pakai database server lokal (komputer) kita makanya masukin localhost
	'hostname' => 'localhost',
	//biasanya untuk database server lokal usernamenya root
	'username' => 'root',
	//untuk username root biasanya gaada paswordnya
	'password' => '',
	//database yang kita pakai adalah simpel
	'database' => 'simple',
	//untuk mysql dbdriver ada 2, mysql dan mysqli, kita pakai yang terbaru dan sesuai untuk bahasa php versi 5 keatas yaitu mysqli
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
