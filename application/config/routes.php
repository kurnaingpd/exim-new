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
$route['uac/user/position'] = 'User/position';
$route['uac/user/position/(:num)'] = 'User/position/$1';
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

/** Export - Customer */
$route['export/customer'] = 'Customer';
$route['export/customer/add'] = 'Customer/add';
$route['export/customer/bank'] = 'Customer/bank';
$route['export/customer/bank/(:num)'] = 'Customer/bank/$1';
$route['export/customer/save'] = 'Customer/save';
$route['export/customer/detail/(:num)'] = 'Customer/detail/$1';
$route['export/customer/delete/(:num)'] = 'Customer/delete/$1';

/** Export Proforma */
$route['export/proforma'] = 'ProformaInvoice';
$route['export/proforma/add'] = 'ProformaInvoice/add';
$route['export/proforma/customer'] = 'ProformaInvoice/customer';
$route['export/proforma/customer/(:num)'] = 'ProformaInvoice/customer/$1';
$route['export/proforma/beneficiary'] = 'ProformaInvoice/beneficiary';
$route['export/proforma/beneficiary/(:num)'] = 'ProformaInvoice/beneficiary/$1';
$route['export/proforma/discharge'] = 'ProformaInvoice/discharge';
$route['export/proforma/discharge/(:num)'] = 'ProformaInvoice/discharge/$1';
$route['export/proforma/destination'] = 'ProformaInvoice/destination';
$route['export/proforma/destination/(:num)'] = 'ProformaInvoice/destination/$1';
$route['export/proforma/cbm'] = 'ProformaInvoice/cbm';
$route['export/proforma/cbm/(:num)'] = 'ProformaInvoice/cbm/$1';
$route['export/proforma/item'] = 'ProformaInvoice/item';
$route['export/proforma/item/(:num)'] = 'ProformaInvoice/item/$1';
$route['export/proforma/coding'] = 'ProformaInvoice/coding';
$route['export/proforma/coding/(:num)'] = 'ProformaInvoice/coding/$1';
$route['export/proforma/save'] = 'ProformaInvoice/save';
$route['export/proforma/print/(:num)'] = 'Prints/proforma/$1';
$route['export/proforma/detail/(:num)'] = 'ProformaInvoice/detail/$1';
$route['export/proforma/process/(:num)'] = 'ProformaInvoice/process/$1';
$route['export/proforma/update'] = 'ProformaInvoice/update';
$route['export/proforma/delete/(:num)'] = 'ProformaInvoice/delete/$1';
$route['export/proforma/delete_item/(:num)'] = 'ProformaInvoice/delete_item/$1';

/** Signed PI */
$route['export/signedpi'] = 'SignedPI';
$route['export/signedpi/detail/(:num)'] = 'SignedPI/detail/$1';
$route['export/signedpi/save'] = 'SignedPI/save';
$route['export/signedpi/attachment/(:num)/(:num)'] = 'SignedPI/attachment/$1/$2';

/** Export Term/Ketentuan Ekspor */
$route['export/expterm'] = 'ExportTerm';
$route['export/expterm/add/(:num)'] = 'ExportTerm/add/$1';
$route['export/expterm/save'] = 'ExportTerm/save';
$route['export/expterm/detail/(:num)'] = 'ExportTerm/detail/$1';
$route['export/expterm/process/(:num)'] = 'ExportTerm/process/$1';
$route['export/expterm/update'] = 'ExportTerm/update';

/** Invoice */
$route['export/invoice'] = 'Invoice';
$route['export/invoice/add'] = 'Invoice/add';
$route['export/invoice/save'] = 'Invoice/save';
$route['export/invoice/detail/(:num)'] = 'Invoice/detail/$1';
$route['export/invoice/print/(:num)'] = 'Prints/invoice/$1';

/** QC Check */
$route['export/qc_check'] = 'QCCheck';
$route['export/qc_check/add'] = 'QCCheck/add';
$route['export/qc_check/save'] = 'QCCheck/save';
$route['export/qc_check/detail/(:num)'] = 'QCCheck/detail/$1';
$route['export/qc_check/update'] = 'QCCheck/update';

/** Packing */
$route['export/packing'] = 'Packing';
$route['export/packing/add'] = 'Packing/add';
$route['export/packing/data'] = 'Packing/data';
$route['export/packing/data/(:num)'] = 'Packing/data/$1';
$route['export/packing/item'] = 'Packing/table_item';
$route['export/packing/item/(:num)'] = 'Packing/table_item/$1';
$route['export/packing/save'] = 'Packing/save';
$route['export/packing/detail/(:num)'] = 'Packing/detail/$1';
$route['export/packing/update'] = 'Packing/update';
$route['export/packing/filter/(:num)'] = 'Packing/filter/$1';
$route['export/packing/print/(:num)'] = 'Prints/packing/$1';

/** COA */
$route['export/coa'] = 'COA';
$route['export/coa/add'] = 'COA/add';
$route['export/coa/country'] = 'COA/country';
$route['export/coa/country/(:num)'] = 'COA/country/$1';
$route['export/coa/item'] = 'COA/item';
$route['export/coa/item/(:num)'] = 'COA/item/$1';
$route['export/coa/qcheck'] = 'COA/qcheck';
$route['export/coa/qcheck/(:num)'] = 'COA/qcheck/$1';
$route['export/coa/save'] = 'COA/save';
$route['export/coa/print/(:num)'] = 'Prints/coa/$1';

/** Product Specification */
$route['export/prodspec'] = 'ProductSpec';
$route['export/prodspec/add'] = 'ProductSpec/add';
$route['export/prodspec/item'] = 'ProductSpec/item';
$route['export/prodspec/item/(:num)'] = 'ProductSpec/item/$1';
$route['export/prodspec/qcheck'] = 'ProductSpec/qcheck';
$route['export/prodspec/qcheck/(:num)'] = 'ProductSpec/qcheck/$1';
$route['export/prodspec/save'] = 'ProductSpec/save';
$route['export/prodspec/print/(:num)'] = 'Prints/prodspec/$1';

/** Quality Certificate */
$route['export/qcertificate'] = 'QCertificate';
$route['export/qcertificate/add'] = 'QCertificate/add';
$route['export/prodspec/coa'] = 'QCertificate/coa';
$route['export/prodspec/coa/(:num)'] = 'QCertificate/coa/$1';
$route['export/qcertificate/save'] = 'QCertificate/save';
$route['export/qcertificate/print/(:num)'] = 'Prints/qcertificate/$1';

/** Product Statement Letter */
$route['export/spp'] = 'SPP';
$route['export/spp/add'] = 'SPP/add';
$route['export/spp/save'] = 'SPP/save';
$route['export/spp/print/(:num)'] = 'Prints/spp/$1';

/** Import */
$route['import'] = 'Home/import';
$route['import/category'] = 'Category';
$route['import/category/add'] = 'Category/add';
$route['import/category/save'] = 'Category/save';
$route['import/category/detail/(:num)'] = 'Category/detail/$1';
$route['import/category/update'] = 'Category/update';
$route['import/category/delete/(:num)'] = 'Category/delete/$1';