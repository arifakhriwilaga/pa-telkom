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

$route['default_controller'] = 'c_home';
$route['default_controller'] = 'front_end/front_end/c_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 
// Routes HMVC
$route['widgets/(:any)'] = 'widgets/$1/Widget';
$route['widgets/(:any)/(:any)'] = 'widgets/$1/Widget/$2';
 
// autentikasi
$route['masuk-akun'] = 'c_autentikasi';
$route['registrasi'] = 'c_autentikasi/registrasi';
$route['lupa-kata-sandi'] = 'c_autentikasi/lupa_kata_sandi';
$route['ubah-profil'] = 'front_end/c_profil';

// Front End
$route['info-sehat'] = 'front_end/c_info_sehat';
$route['info-sehat/13-tips-makan-sehat-untuk-orang-sibuk'] = 'front_end/c_info_sehat/detail1';
$route['info-sehat/makan-daging-tingkatkan-risiko-diabetes'] = 'front_end/c_info_sehat/detail2';
$route['info-sehat/mengenal-asam-amino-fungsinya-bagi-tubuh-dan-sumber-makanannya'] = 'front_end/c_info_sehat/detail3';
$route['info-sehat/5-resep-brunch-lezat-buat-anda-yang-suka-sarapan-siang-siang'] = 'front_end/c_info_sehat/detail4';
$route['info-sehat/4-manfaat-jamu-kunyit-asam-tak-cuma-redakan-nyeri-haid-lho'] = 'front_end/c_info_sehat/detail5';
$route['info-sehat/berapa-batas-asupan-karbohidrat-yang-ideal-per-hari'] = 'front_end/c_info_sehat/detail6';
$route['info-sehat/mengapa-semakin-tua-kebutuhan-kalori-semakin-berkurang'] = 'front_end/c_info_sehat/detail7';
$route['info-sehat/bolehkah-ngemil-dulu-sebelum-menyantap-menu-makanan-utama'] = 'front_end/c_info_sehat/detail8';
$route['info-sehat/makanan-untuk-ambeien-mana-yang-harus-dikonsumsi-mana-yang-dihindari'] = 'front_end/c_info_sehat/detail9';
$route['info-sehat/3-makanan-sumber-gandum-utuh-yang-sehat-untuk-sarapan'] = 'front_end/c_info_sehat/detail10';

$route['kunjungan'] = 'front_end/c_kunjungan';
$route['periksa/step-1'] = 'front_end/c_periksa';
$route['periksa/step-2'] = 'front_end/c_periksa/check_step_2';
$route['periksa/step-final'] = 'front_end/c_periksa/check_step_final';
$route['konsul-dokter'] = 'front_end/c_konsultasi_dokter';
$route['notifikasi'] = 'front_end/c_notifikasi';
$route['detail-notifikasi/(:num)'] = 'front_end/c_notifikasi/detail/$1';

// Routes CMS
$route['dasbor'] = 'cms/c_dasbor';
$route['kelola-akun'] = 'cms/c_akun_manajemen';
$route['kelola-notifikasi'] = 'cms/c_notifikasi_manajemen';
$route['kelola-konsultasi'] = 'cms/c_konsultasi_manajemen';
$route['detail-konsultasi/(:num)'] = 'cms/c_konsultasi_manajemen/detail/$1';
$route['cetak-riwayat'] = 'cms/consultation_management/detail_history';
$route['cetak-riwayat'] = 'cms/c_cetak_riwayat';
