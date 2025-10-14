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
|	https://codeigniter.com/userguide3/general/routing.html
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
#
$route['change_room_hk_status'] = 'pages/change_room_hk_status';
$route['manage_housekeeping'] = 'pages/manage_housekeeping';
$route['print_voucher/(:any)'] = 'pages/print_voucher/$1';
$route['print_reg_form/(:any)'] = 'pages/print_reg_form/$1';
$route['manage_reservation'] = 'pages/manage_reservation';
$route['save_reservation'] = 'pages/save_reservation';
$route['view_available/(:any)'] = 'pages/view_available/$1';
$route['delete_package/(:any)'] = 'pages/delete_package/$1';
$route['save_package'] = 'pages/save_package';
$route['manage_package'] = 'pages/manage_package';
$route['delete_room/(:any)'] = 'pages/delete_room/$1';
$route['save_room_image'] = 'pages/save_room_image';
$route['save_room'] = 'pages/save_room';
$route['manage_room'] = 'pages/manage_room';
$route['save_logo'] = 'pages/save_logo';
$route['save_info'] = 'pages/save_info';
$route['manage_info'] = 'pages/manage_info';
$route['delete_users/(:any)'] = 'pages/delete_users/$1';
$route['save_users'] = 'pages/save_users';
$route['manage_users'] = 'pages/manage_users';
$route['delete_department/(:any)'] = 'pages/delete_department/$1';
$route['save_department'] = 'pages/save_department';
$route['manage_department'] = 'pages/manage_department';
$route['main'] = 'pages/main';
$route['logout'] = 'pages/logout';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
