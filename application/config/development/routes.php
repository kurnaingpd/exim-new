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

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/** Authentication */
$route['default_controller'] = 'Auth';
$route['authentication'] = 'Auth/process';
$route['logout'] = 'Auth/logout';

/** Home module */
$route['home'] = 'Home/modules';

/** UAC */
$route['uac'] = 'Home/uac';

/** UAC - User */
$route['uac/user'] = 'User';
$route['uac/user/add'] = 'User/add';
$route['uac/user/save'] = 'User/save';
$route['uac/user/detail/(:num)'] = 'User/detail/$1';
$route['uac/user/update'] = 'User/update';
$route['uac/user/delete/(:num)'] = 'User/delete/$1';

/** UAC - Module */
$route['uac/modules'] = 'Modules';
$route['uac/modules/add'] = 'Modules/add';
$route['uac/modules/save'] = 'Modules/save';
$route['uac/modules/detail/(:num)'] = 'Modules/detail/$1';
$route['uac/modules/update'] = 'Modules/update';
$route['uac/modules/delete/(:num)'] = 'Modules/delete/$1';

/** UAC - Menu */
$route['uac/menu'] = 'Menu';
$route['uac/menu/add'] = 'Menu/add';
$route['uac/menu/save'] = 'Menu/save';
$route['uac/menu/detail/(:num)'] = 'Menu/detail/$1';
$route['uac/menu/update'] = 'Menu/update';
$route['uac/menu/delete/(:num)'] = 'Menu/delete/$1';

/** UAC - Assign menu */
$route['uac/assignmenu'] = 'AssignMenu';
$route['uac/assignmenu/save'] = 'AssignMenu/save';
$route['uac/assignmenu/delete/(:num)'] = 'AssignMenu/delete/$1';

/** Export */
$route['export'] = 'Home/export';

/** Export - TOP */
$route['export/top'] = 'TOP';
$route['export/top/add'] = 'TOP/add';
$route['export/top/save'] = 'TOP/save';
$route['export/top/detail/(:num)'] = 'TOP/detail/$1';
$route['export/top/update'] = 'TOP/update';
$route['export/top/delete/(:num)'] = 'TOP/delete/$1';

/** Export - Country */
$route['export/country'] = 'Country';
$route['export/country/add'] = 'Country/add';
$route['export/country/save'] = 'Country/save';
$route['export/country/detail/(:num)'] = 'Country/detail/$1';
$route['export/country/update'] = 'Country/update';
$route['export/country/delete/(:num)'] = 'Country/delete/$1';

/** Export - Container */
$route['export/container'] = 'Container';
$route['export/container/add'] = 'Container/add';
$route['export/container/save'] = 'Container/save';
$route['export/container/detail/(:num)'] = 'Container/detail/$1';
$route['export/container/update'] = 'Container/update';
$route['export/container/delete/(:num)'] = 'Container/delete/$1';

/** Export - Incoterm */
$route['export/incoterm'] = 'Incoterm';
$route['export/incoterm/add'] = 'Incoterm/add';
$route['export/incoterm/save'] = 'Incoterm/save';
$route['export/incoterm/detail/(:num)'] = 'Incoterm/detail/$1';
$route['export/incoterm/update'] = 'Incoterm/update';
$route['export/incoterm/delete/(:num)'] = 'Incoterm/delete/$1';

/** Export - Item */
$route['export/item'] = 'Item';
$route['export/item/add'] = 'Item/add';
$route['export/item/save'] = 'Item/save';
$route['export/item/detail/(:num)'] = 'Item/detail/$1';
$route['export/item/update'] = 'Item/update';
$route['export/item/delete/(:num)'] = 'Item/delete/$1';

/** Export - Item Mapping */
$route['export/item_mapping'] = 'ItemMapping';
$route['export/item_mapping/add'] = 'ItemMapping/add';
$route['export/item_mapping/save'] = 'ItemMapping/save';
$route['export/item_mapping/detail/(:num)'] = 'ItemMapping/detail/$1';
$route['export/item_mapping/update'] = 'ItemMapping/update';
$route['export/item_mapping/delete/(:num)'] = 'ItemMapping/delete/$1';

/** Export - Bank */
$route['export/bank'] = 'Bank';
$route['export/bank/add'] = 'Bank/add';
$route['export/bank/save'] = 'Bank/save';
$route['export/bank/detail/(:num)'] = 'Bank/detail/$1';
$route['export/bank/update'] = 'Bank/update';
$route['export/bank/delete/(:num)'] = 'Bank/delete/$1';

/** Export - Loading Port */
$route['export/loading_port'] = 'LoadingPort';
$route['export/loading_port/add'] = 'LoadingPort/add';
$route['export/loading_port/save'] = 'LoadingPort/save';
$route['export/loading_port/detail/(:num)'] = 'LoadingPort/detail/$1';
$route['export/loading_port/update'] = 'LoadingPort/update';
$route['export/loading_port/delete/(:num)'] = 'LoadingPort/delete/$1';

/** Export - Beneficiary */
$route['export/beneficiary'] = 'Beneficiary';
$route['export/beneficiary/add'] = 'Beneficiary/add';
$route['export/beneficiary/save'] = 'Beneficiary/save';
$route['export/beneficiary/detail/(:num)'] = 'Beneficiary/detail/$1';
$route['export/beneficiary/update'] = 'Beneficiary/update';
$route['export/beneficiary/delete/(:num)'] = 'Beneficiary/delete/$1';

/** Export - Beneficiary */
$route['export/customer'] = 'Customer';
$route['export/customer/add'] = 'Customer/add';
$route['export/customer/bank'] = 'Customer/bank';
$route['export/customer/bank/(:num)'] = 'Customer/bank/$1';
$route['export/customer/save'] = 'Customer/save';