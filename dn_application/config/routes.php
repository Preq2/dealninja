<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['administrator/csv'] = "administrator/csv";
$route['administrator/csv/(:any)'] = 'administrator/csv/$1';


$route['administrator/inventory_del'] = "administrator/inventory_del";
$route['administrator/inventory_del/(:any)'] = 'administrator/inventory_del/$1';

$route['administrator/inventory_add'] = "administrator/inventory_add";
$route['administrator/inventory_add/(:any)'] = 'administrator/inventory_add/$1';

$route['administrator/inventory_edit'] = "administrator/inventory_edit";
$route['administrator/inventory_edit/(:any)'] = 'administrator/inventory_edit/$1';

$route['administrator/inventory_list'] = "administrator/inventory_list";
$route['administrator/inventory_list/(:any)'] = 'administrator/inventory_list/$1';

$route['administrator/inventory_csv'] = "administrator/inventory_csv";
$route['administrator/inventory_csv/(:any)'] = 'administrator/inventory_csv/$1';


$route['account/banks_manage'] = "account/banks_manage";
$route['account/banks_manage/(:any)'] = 'account/banks_manage/$1';

$route['account/inventory_del'] = "account/inventory_del";
$route['account/inventory_del/(:any)'] = 'account/inventory_del/$1';

$route['account/inventory_add'] = "account/inventory_add";
$route['account/inventory_add/(:any)'] = 'account/inventory_add/$1';

$route['account/inventory_edit'] = "account/inventory_edit";
$route['account/inventory_edit/(:any)'] = 'account/inventory_edit/$1';

$route['account/inventory_list'] = "account/inventory_list";
$route['account/inventory_list/(:any)'] = 'account/inventory_list/$1';

$route['account/inventory_csv'] = "account/inventory_csv";
$route['account/inventory_csv/(:any)'] = 'account/inventory_csv/$1';

$route['account/dashboard'] = "account/dashboard";
$route['account/dashboard/(:any)'] = 'account/dashboard/$1';

$route['account/dashboard_dealer'] = "account/dashboard_dealer";
$route['account/dashboard_dealer/(:any)'] = 'account/dashboard_dealer/$1';

//Calculator Pages
$route['account/cal_have_pay_stub'] = "account/cal_have_pay_stub";
$route['account/cal_have_pay_stub/(:any)'] = 'account/cal_have_pay_stub/$1';

$route['account/cal_hourly'] = "account/cal_hourly";
$route['account/cal_hourly/(:any)'] = 'account/cal_hourly/$1';

$route['account/cal_salary'] = "account/cal_salary";
$route['account/cal_salary/(:any)'] = 'account/cal_salary/$1';

$route['account/cal_back_into_sale'] = "account/cal_back_into_sale";
$route['account/cal_back_into_sale/(:any)'] = 'account/cal_back_into_sale/$1';



$route['account'] = 'account';



$route['administrator/banks_metrics'] = "administrator/banks_metrics";
$route['administrator/banks_metrics/(:any)'] = 'administrator/banks_metrics/$1';

$route['administrator/banks_rates'] = "administrator/banks_rates";
$route['administrator/banks_rates/(:any)'] = 'administrator/banks_rates/$1';

$route['administrator/banks_rates_edit'] = "administrator/banks_rates_edit";
$route['administrator/banks_rates_edit/(:any)'] = 'administrator/banks_rates_edit/$1';

$route['administrator/banks_rates_add'] = "administrator/banks_rates_add";
$route['administrator/banks_rates_add/(:any)'] = 'administrator/banks_rates_add/$1';

$route['administrator/banks_rates_del/(:any)'] = 'administrator/banks_rates_del/$1';




$route['administrator/banks_del'] = "administrator/banks_del";
$route['administrator/banks_del/(:any)'] = 'administrator/banks_del/$1';

$route['administrator/banks_add'] = "administrator/banks_add";
$route['administrator/banks_add/(:any)'] = 'administrator/banks_add/$1';

$route['administrator/banks_edit'] = "administrator/banks_edit";
$route['administrator/banks_edit/(:any)'] = 'administrator/banks_edit/$1';

$route['administrator/banks_list'] = "administrator/banks_list";
$route['administrator/banks_list/(:any)'] = 'administrator/banks_list/$1';


$route['administrator/dealers_del'] = "administrator/dealers_del";
$route['administrator/dealers_del/(:any)'] = 'administrator/dealers_del/$1';

$route['administrator/dealers_banks'] = "administrator/dealers_banks";
$route['administrator/dealers_banks/(:any)'] = 'administrator/dealers_banks/$1';

$route['administrator/dealers_add'] = "administrator/dealers_add";
$route['administrator/dealers_add/(:any)'] = 'administrator/dealers_add/$1';

$route['administrator/dealers_edit'] = "administrator/dealers_edit";
$route['administrator/dealers_edit/(:any)'] = 'administrator/dealers_edit/$1';

$route['administrator/dealers_list'] = "administrator/dealers_list";
$route['administrator/dealers_list/(:any)'] = 'administrator/dealers_list/$1';



$route['administrator/email_compose'] = "administrator/email_compose";
$route['administrator/email_compose/(:any)'] = 'administrator/email_compose/$1';

$route['administrator/settings'] = "administrator/settings";
$route['administrator/settings/(:any)'] = 'administrator/settings/$1';

$route['administrator/users_del'] = "administrator/users_del";
$route['administrator/users_del/(:any)'] = 'administrator/users_del/$1';

$route['administrator/users_add'] = "administrator/users_add";
$route['administrator/users_add/(:any)'] = 'administrator/users_add/$1';

$route['administrator/users_edit'] = "administrator/users_edit";
$route['administrator/users_edit/(:any)'] = 'administrator/users_edit/$1';

$route['administrator/users_list'] = "administrator/users_list";
$route['administrator/users_list/(:any)'] = 'administrator/users_list/$1';

$route['administrator/dashboard'] = "administrator/dashboard";
$route['administrator/dashboard/(:any)'] = 'administrator/dashboard/$1';

$route['administrator'] = 'administrator';


$route['login/logout'] = "login/logout";
$route['login/password_recovery'] = "login/password_recovery";
$route['login/password_recovery/(:any)'] = 'login/password_recovery/$1';

$route['login'] = "login";
$route['login/(:any)'] = 'login/$1';

$route['login'] = 'login';

$route['caspio_pull'] = "caspio";



$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */