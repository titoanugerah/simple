<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Untuk mengarahkan suatu link yang diminta ke suatu sub kontroller
$route['default_controller'] = 'login';
$route['login'] = 'login';
$route['404_override'] = '';
$route['adminDashboard'] = 'admin/adminDashboard';
$route['translate_uri_dashes'] = FALSE;
$route['test'] = 'welcome/test';
