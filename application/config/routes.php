<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Untuk mengarahkan suatu link yang diminta ke suatu sub kontroller
$route['default_controller'] = 'account';
$route['login'] = 'account';
$route['profile'] = 'account/profile';
$route['logout'] = 'account/logout';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = '';

$route['detailNode/(:any)'] = 'admin/detailNode/$1';
$route['listNode'] = 'admin/listNode';
$route['adminDashboard'] = 'admin/adminDashboard';
$route['createAccount'] = 'admin/createAccount';
$route['listAccount'] = 'admin/listAccount';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['test'] = 'admin/test';
$route['createnodesuccess'] = 'admin/createNodeSuccess';


$route['clientDashboard'] = 'client/clientDashboard';
$route['detailNodeClient/(:any)'] = 'client/detailNodeClient/$1';
