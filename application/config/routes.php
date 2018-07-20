<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Untuk mengarahkan suatu link yang diminta ke suatu sub kontroller
$route['default_controller'] = 'account';
$route['login'] = 'account';
$route['logout'] = 'account/logout';
$route['profile'] = 'account/profile';
$route['404_override'] = '';
$route['adminDashboard'] = 'admin/adminDashboard';
$route['createAccount'] = 'admin/createAccount';
$route['clientDashboard'] = 'client/clientDashboard';

$route['translate_uri_dashes'] = FALSE;
$route['test'] = 'welcome/test';
