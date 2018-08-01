<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Untuk mengarahkan suatu link yang diminta ke suatu sub kontroller
$route['default_controller'] = 'account';
$route['login'] = 'account';
$route['logout'] = 'account/logout';
$route['profile'] = 'account/profile';
$route['detailNode/(:any)'] = 'admin/detailNode/$1';
$route['detailNodeClient/(:any)'] = 'client/detailNodeClient/$1';
$route['listNode'] = 'admin/listNode';
$route['404_override'] = '';
$route['downloadDataPH/(:any)'] = 'admin/downloadDataPH/$1';
$route['downloadDataTemp/(:any)'] = 'admin/downloadDataTemp/$1';
$route['adminDashboard'] = 'admin/adminDashboard';
$route['createAccount'] = 'admin/createAccount';
$route['listAccount'] = 'admin/listAccount';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['clientDashboard'] = 'client/clientDashboard';
$route['translate_uri_dashes'] = FALSE;
$route['test'] = 'admin/test';
