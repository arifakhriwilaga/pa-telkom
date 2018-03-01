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
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
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

$route['default_controller'] = 'home';
$route['default_controller'] = 'front_end/front_end/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 
// Routes HMVC
$route['widgets/(:any)'] = 'widgets/$1/Widget';
$route['widgets/(:any)/(:any)'] = 'widgets/$1/Widget/$2';
 
// authentications
$route['masuk-akun'] = 'authentication';
$route['registrasi'] = 'authentication/register';
$route['lupa-kata-sandi'] = 'authentication/forgot_password';
$route['edit-profile'] = 'front_end/profile';

// Front End
$route['info-sehat'] = 'front_end/healty_info';
$route['info-sehat/13-tips-makan-sehat-untuk-orang-sibuk'] = 'front_end/healty_info/detail1';
$route['info-sehat/makan-daging-tingkatkan-risiko-diabetes'] = 'front_end/healty_info/detail2';
$route['kunjungan'] = 'front_end/visit';
$route['periksa/step-1'] = 'front_end/check';
$route['periksa/step-2'] = 'front_end/check/check_step_2';
$route['periksa/step-final'] = 'front_end/check/check_step_final';
$route['konsul-dokter'] = 'front_end/consul_doctor';
$route['notifikasi'] = 'front_end/notification';
$route['detail-notifikasi'] = 'front_end/notification/detail';

// Routes CMS
$route['dasbor'] = 'cms/dashboard';
$route['kelola-akun'] = 'cms/account_management';
$route['kelola-notifikasi'] = 'cms/notification_management';
$route['kelola-konsultasi'] = 'cms/consultation_management';
$route['detail-konsultasi'] = 'cms/consultation_management/detail_consul';
$route['cetak-riwayat'] = 'cms/consultation_management/detail_history';