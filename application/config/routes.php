<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'presensi';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "presensi" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['beranda'] = 'Beranda';
$route['tentang'] = 'Beranda/tentang';
$route['profile/(:any)'] = 'Beranda/profile/$1';

$route['ceklogin'] = 'login/cek_login';
$route['logout'] = 'login/logout';

$route['monitoring'] = 'Presensi';
$route['insert'] = 'Presensi/insert';
$route['fetch/(:any)'] = 'Presensi/fetch/$1';
$route['delete'] = 'Presensi/delete';
$route['edit'] = 'Presensi/edit';
$route['update'] = 'Presensi/update';

$route['absen'] = 'Presensi/absen';
$route['fetch_absen/(:any)'] = 'Presensi/fetch_absen/$1';
$route['lokasi'] = 'Presensi/lokasi';
$route['insert_absen'] = 'Presensi/insert_absen';
$route['absen_pulang/(:any)'] = 'Presensi/absen_pulang/$1';

$route['dashboard'] = 'Dashboard';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;