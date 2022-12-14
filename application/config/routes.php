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
$route['err_500'] = 'Override';

/** Home module */
$route['home'] = 'Home/modules';

/** UAC */
$route['uac'] = 'Home/uac';
$route['uac/master'] = 'Home/uac_master';
$route['uac/transaction'] = 'Home/uac_transaction';
$route['uac/report'] = 'Home/uac_report';

/** UAC - Master - User */
$route['uac/master/user'] = 'uac/User';
$route['uac/master/user/add'] = 'uac/User/add';
$route['uac/master/user/position'] = 'uac/User/position';
$route['uac/master/user/position/(:num)'] = 'uac/User/position/$1';
$route['uac/master/user/save'] = 'uac/User/save';
$route['uac/master/user/detail/(:num)'] = 'uac/User/detail/$1';
$route['uac/master/user/update'] = 'uac/User/update';
$route['uac/master/user/upload/(:num)'] = 'uac/User/upload/$1';
$route['uac/master/user/process'] = 'uac/User/process';
$route['uac/master/user/delete/(:num)'] = 'uac/User/delete/$1';

/** UAC - Master -  Module */
$route['uac/master/modules'] = 'uac/Modules';
$route['uac/master/modules/add'] = 'uac/Modules/add';
$route['uac/master/modules/save'] = 'uac/Modules/save';
$route['uac/master/modules/detail/(:num)'] = 'uac/Modules/detail/$1';
$route['uac/master/modules/update'] = 'uac/Modules/update';
$route['uac/master/modules/delete/(:num)'] = 'uac/Modules/delete/$1';

/** UAC - Master - Menu */
$route['uac/master/menu'] = 'uac/Menu';
$route['uac/master/menu/add'] = 'uac/Menu/add';
$route['uac/master/menu/save'] = 'uac/Menu/save';
$route['uac/master/menu/detail/(:num)'] = 'uac/Menu/detail/$1';
$route['uac/master/menu/update'] = 'uac/Menu/update';
$route['uac/master/menu/delete/(:num)'] = 'uac/Menu/delete/$1';

/** UAC - Transaction - Assign menu */
$route['uac/transaction/assignmenu'] = 'uac/AssignMenu';
$route['uac/transaction/assignmenu/save'] = 'uac/AssignMenu/save';
$route['uac/transaction/assignmenu/delete/(:num)'] = 'uac/AssignMenu/delete/$1';

/** UAC - Log Access */
$route['uac/report/log_auth'] = 'Auth/report';

/** Export */
$route['export'] = 'Home/export';
$route['export/master'] = 'Home/export_master';
$route['export/transaction'] = 'Home/export_transaction';

/** Export - Master - TOP */
$route['export/master/top'] = 'export/TOP';
$route['export/master/top/add'] = 'export/TOP/add';
$route['export/master/top/save'] = 'export/TOP/save';
$route['export/master/top/detail/(:num)'] = 'export/TOP/detail/$1';
$route['export/master/top/update'] = 'export/TOP/update';
$route['export/master/top/delete/(:num)'] = 'export/TOP/delete/$1';

/** Export - Master - Country */
$route['export/master/country'] = 'export/Country';
$route['export/master/country/add'] = 'export/Country/add';
$route['export/master/country/save'] = 'export/Country/save';
$route['export/master/country/detail/(:num)'] = 'export/Country/detail/$1';
$route['export/master/country/update'] = 'export/Country/update';
$route['export/master/country/delete/(:num)'] = 'export/Country/delete/$1';

/** Export - Master - Container */
$route['export/master/container'] = 'export/Container';
$route['export/master/container/add'] = 'export/Container/add';
$route['export/master/container/save'] = 'export/Container/save';
$route['export/master/container/detail/(:num)'] = 'export/Container/detail/$1';
$route['export/master/container/update'] = 'export/Container/update';
$route['export/master/container/delete/(:num)'] = 'export/Container/delete/$1';

/** Export - Master - Incoterm */
$route['export/master/incoterm'] = 'export/Incoterm';
$route['export/master/incoterm/add'] = 'export/Incoterm/add';
$route['export/master/incoterm/save'] = 'export/Incoterm/save';
$route['export/master/incoterm/detail/(:num)'] = 'export/Incoterm/detail/$1';
$route['export/master/incoterm/update'] = 'export/Incoterm/update';
$route['export/master/incoterm/delete/(:num)'] = 'export/Incoterm/delete/$1';

/** Export - Master - Item */
$route['export/master/item'] = 'export/Item';
$route['export/master/item/add'] = 'export/Item/add';
$route['export/master/item/save'] = 'export/Item/save';
$route['export/master/item/detail/(:num)'] = 'export/Item/detail/$1';
$route['export/master/item/update'] = 'export/Item/update';
$route['export/master/item/delete/(:num)'] = 'export/Item/delete/$1';

/** Export - Item Mapping */
// $route['export/item_mapping'] = 'ItemMapping';
// $route['export/item_mapping/add'] = 'ItemMapping/add';
// $route['export/item_mapping/save'] = 'ItemMapping/save';
// $route['export/item_mapping/detail/(:num)'] = 'ItemMapping/detail/$1';
// $route['export/item_mapping/update'] = 'ItemMapping/update';
// $route['export/item_mapping/delete/(:num)'] = 'ItemMapping/delete/$1';

/** Export - Master - Bank */
$route['export/master/bank'] = 'export/Bank';
$route['export/master/bank/add'] = 'export/Bank/add';
$route['export/master/bank/save'] = 'export/Bank/save';
$route['export/master/bank/detail/(:num)'] = 'export/Bank/detail/$1';
$route['export/master/bank/update'] = 'export/Bank/update';
$route['export/master/bank/delete/(:num)'] = 'export/Bank/delete/$1';

/** Export - Master - Loading Port */
$route['export/master/loading_port'] = 'export/LoadingPort';
$route['export/master/loading_port/add'] = 'export/LoadingPort/add';
$route['export/master/loading_port/save'] = 'export/LoadingPort/save';
$route['export/master/loading_port/detail/(:num)'] = 'export/LoadingPort/detail/$1';
$route['export/master/loading_port/update'] = 'export/LoadingPort/update';
$route['export/master/loading_port/delete/(:num)'] = 'export/LoadingPort/delete/$1';

/** Export - Master - Beneficiary */
$route['export/master/beneficiary'] = 'export/Beneficiary';
$route['export/master/beneficiary/add'] = 'export/Beneficiary/add';
$route['export/master/beneficiary/save'] = 'export/Beneficiary/save';
$route['export/master/beneficiary/detail/(:num)'] = 'export/Beneficiary/detail/$1';
$route['export/master/beneficiary/update'] = 'export/Beneficiary/update';
$route['export/master/beneficiary/delete/(:num)'] = 'export/Beneficiary/delete/$1';

/** Export - Customer */
$route['export/master/customer'] = 'export/Customer';
$route['export/master/customer/add'] = 'export/Customer/add';
$route['export/master/customer/bank'] = 'export/Customer/bank';
$route['export/master/customer/bank/(:num)'] = 'export/Customer/bank/$1';
$route['export/master/customer/save'] = 'export/Customer/save';
$route['export/master/customer/detail/(:num)'] = 'export/Customer/detail/$1';
$route['export/master/customer/shipto_delete/(:num)'] = 'export/Customer/shipto_del/$1';
$route['export/master/customer/update'] = 'export/Customer/update';
$route['export/master/customer/delete/(:num)'] = 'export/Customer/delete/$1';

/** Export - Freight */
$route['export/freight'] = 'Freight';
$route['export/freight/add'] = 'Freight/add';
$route['export/freight/save'] = 'Freight/save';
$route['export/freight/detail/(:num)'] = 'Freight/detail/$1';
$route['export/freight/update'] = 'Freight/update';
$route['export/freight/delete/(:num)'] = 'Freight/delete/$1';

/** Export - Proforma */
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
$route['export/proforma/freight'] = 'ProformaInvoice/freight';
$route['export/proforma/freight/(:num)'] = 'ProformaInvoice/freight/$1';
$route['export/proforma/item'] = 'ProformaInvoice/item';
$route['export/proforma/item/(:num)'] = 'ProformaInvoice/item/$1';
$route['export/proforma/coding'] = 'ProformaInvoice/coding';
$route['export/proforma/coding/(:num)'] = 'ProformaInvoice/coding/$1';
$route['export/proforma/save'] = 'ProformaInvoice/save';
$route['export/proforma/print/(:num)'] = 'Prints/proforma/$1';
$route['export/proforma/detail/(:num)'] = 'ProformaInvoice/detail/$1';
$route['export/proforma/detail/container/(:num)'] = 'ProformaInvoice/add_detail_container/$1';
$route['export/proforma/insert_detail_container'] = 'ProformaInvoice/insert_detail_container';
$route['export/proforma/update'] = 'ProformaInvoice/update';
$route['export/proforma/submit/(:num)'] = 'ProformaInvoice/submit/$1';
$route['export/proforma/process/(:num)'] = 'ProformaInvoice/process/$1';
$route['export/proforma/process/container/(:num)'] = 'ProformaInvoice/add_process_container/$1';
$route['export/proforma/insert_process_container'] = 'ProformaInvoice/insert_process_container';
$route['export/proforma/update_process'] = 'ProformaInvoice/update_process';
$route['export/proforma/requests/(:num)'] = 'ProformaInvoice/requests/$1';
$route['export/proforma/requests/container/(:num)'] = 'ProformaInvoice/add_requests_container/$1';
$route['export/proforma/insert_requests_container'] = 'ProformaInvoice/insert_requests_container';
$route['export/proforma/revise'] = 'ProformaInvoice/revise';
$route['export/proforma/edit/(:num)'] = 'ProformaInvoice/edit/$1';
$route['export/proforma/edit_procurement'] = 'ProformaInvoice/edit_procurement';
$route['export/proforma/delete/(:num)'] = 'ProformaInvoice/delete/$1';
$route['export/proforma/delete_item/(:num)'] = 'ProformaInvoice/delete_item/$1';
$route['export/proforma/delete_container/(:num)'] = 'ProformaInvoice/delete_container/$1';
$route['export/proforma/filter/(:num)'] = 'ProformaInvoice/filter/$1';

/** Export - Signed PI */
$route['export/signedpi'] = 'SignedPI';
$route['export/signedpi/detail/(:num)'] = 'SignedPI/detail/$1';
$route['export/signedpi/save'] = 'SignedPI/save';
$route['export/signedpi/attachment/(:num)/(:num)'] = 'SignedPI/attachment/$1/$2';

/** Export - Term/Ketentuan Ekspor */
$route['export/expterm'] = 'ExportTerm';
$route['export/expterm/add/(:num)'] = 'ExportTerm/add/$1';
$route['export/expterm/save'] = 'ExportTerm/save';
$route['export/expterm/detail/(:num)'] = 'ExportTerm/detail/$1';
$route['export/expterm/process/(:num)'] = 'ExportTerm/process/$1';
$route['export/expterm/update'] = 'ExportTerm/update';

/** Export - Invoice */
$route['export/invoice'] = 'Invoice';
$route['export/invoice/add'] = 'Invoice/add';
$route['export/invoice/save'] = 'Invoice/save';
$route['export/invoice/detail/(:num)'] = 'Invoice/detail/$1';
$route['export/invoice/print/(:num)'] = 'Prints/invoice/$1';

/** Export - QC Check */
$route['export/qc_check'] = 'QCCheck';
$route['export/qc_check/add'] = 'QCCheck/add';
$route['export/qc_check/save'] = 'QCCheck/save';
$route['export/qc_check/detail/(:num)'] = 'QCCheck/detail/$1';
$route['export/qc_check/update'] = 'QCCheck/update';

/** Export - Packing */
$route['export/packing'] = 'Packing';
$route['export/packing/add'] = 'Packing/add';
$route['export/packing/data'] = 'Packing/data';
$route['export/packing/data/(:num)'] = 'Packing/data/$1';
$route['export/packing/container'] = 'Packing/container';
$route['export/packing/container/(:num)'] = 'Packing/container/$1';
$route['export/packing/category'] = 'Packing/category';
$route['export/packing/category/(:num)'] = 'Packing/category/$1';
$route['export/packing/category/(:num)/(:num)'] = 'Packing/category/$1/$2';
$route['export/packing/item'] = 'Packing/item';
$route['export/packing/item/(:num)'] = 'Packing/item/$1';
$route['export/packing/item/(:num)/(:num)'] = 'Packing/item/$1/$2';
$route['export/packing/item/(:num)/(:num)/(:num)'] = 'Packing/item/$1/$2/$3';
$route['export/packing/item_qty'] = 'Packing/item_qty';
$route['export/packing/item_qty/(:num)'] = 'Packing/item_qty/$1';
$route['export/packing/item_detail'] = 'Packing/item_detail';
$route['export/packing/item_detail/(:num)'] = 'Packing/item_detail/$1';
$route['export/packing/batch'] = 'Packing/batch';
$route['export/packing/batch/(:num)'] = 'Packing/batch/$1';
$route['export/packing/date'] = 'Packing/date';
$route['export/packing/date/(:num)'] = 'Packing/date/$1';
$route['export/packing/save'] = 'Packing/save';
$route['export/packing/detail/(:num)'] = 'Packing/detail/$1';
$route['export/packing/detail_category'] = 'Packing/detail_category';
$route['export/packing/detail_category/(:num)'] = 'Packing/detail_category/$1';
$route['export/packing/detail_category/(:num)/(:num)'] = 'Packing/detail_category/$1/$2';
$route['export/packing/detail_item'] = 'Packing/detail_item';
$route['export/packing/detail_item/(:num)'] = 'Packing/detail_item/$1';
$route['export/packing/detail_item/(:num)/(:num)'] = 'Packing/detail_item/$1/$2';
$route['export/packing/detail_item/(:num)/(:num)/(:num)'] = 'Packing/detail_item/$1/$2/$3';
// $route['export/packing/detail_item_data'] = 'Packing/detail_item_data';
// $route['export/packing/detail_item_data/(:num)'] = 'Packing/detail_item_data/$1';
$route['export/packing/update'] = 'Packing/update';
$route['export/packing/detail_container/(:num)'] = 'Packing/detail_container/$1';
$route['export/packing/update_container/(:num)/(:any)'] = 'Packing/update_container/$1/$2';
$route['export/packing/filter/(:num)'] = 'Packing/filter/$1';
$route['export/packing/print/(:num)'] = 'Prints/packing/$1';
$route['export/packing/delete/(:num)'] = 'Packing/delete/$1';
$route['export/packing/delete_item/(:num)'] = 'Packing/delete_item/$1';

/** Export - COA */
$route['export/coa'] = 'COA';
$route['export/coa/add'] = 'COA/add';
$route['export/coa/country'] = 'COA/country';
$route['export/coa/country/(:num)'] = 'COA/country/$1';
$route['export/coa/item'] = 'COA/item';
$route['export/coa/item/(:num)'] = 'COA/item/$1';
$route['export/coa/batch'] = 'COA/batch';
$route['export/coa/batch/(:num)'] = 'COA/batch/$1';
$route['export/coa/batch/(:num)/(:num)'] = 'COA/batch/$1/$2';
$route['export/coa/qcheck'] = 'COA/qcheck';
$route['export/coa/qcheck/(:num)'] = 'COA/qcheck/$1';
$route['export/coa/tanggal'] = 'COA/tanggal';
$route['export/coa/tanggal/(:num)'] = 'COA/tanggal/$1';
$route['export/coa/save'] = 'COA/save';
$route['export/coa/print/(:num)'] = 'Prints/coa/$1';

/** Export - Product Specification */
$route['export/prodspec'] = 'ProductSpec';
$route['export/prodspec/add'] = 'ProductSpec/add';
$route['export/prodspec/po'] = 'ProductSpec/po';
$route['export/prodspec/po/(:num)'] = 'ProductSpec/po/$1';
$route['export/prodspec/item'] = 'ProductSpec/item';
$route['export/prodspec/item/(:num)'] = 'ProductSpec/item/$1';
$route['export/prodspec/batch'] = 'ProductSpec/batch';
$route['export/prodspec/batch/(:num)'] = 'ProductSpec/batch/$1';
$route['export/prodspec/batch/(:num)/(:num)'] = 'ProductSpec/batch/$1/$2';
$route['export/prodspec/save'] = 'ProductSpec/save';
$route['export/prodspec/print/(:num)'] = 'Prints/prodspec/$1';

/** Export - Quality Certificate */
$route['export/qcertificate'] = 'QCertificate';
$route['export/qcertificate/add'] = 'QCertificate/add';
$route['export/prodspec/coa'] = 'QCertificate/coa';
$route['export/prodspec/coa/(:num)'] = 'QCertificate/coa/$1';
$route['export/qcertificate/save'] = 'QCertificate/save';
$route['export/qcertificate/print/(:num)'] = 'Prints/qcertificate/$1';

/** Export - Product Statement Letter */
$route['export/spp'] = 'SPP';
$route['export/spp/add'] = 'SPP/add';
$route['export/spp/item'] = 'SPP/item';
$route['export/spp/item/(:num)'] = 'SPP/item/$1';
$route['export/spp/md_no'] = 'SPP/md_no';
$route['export/spp/md_no/(:num)'] = 'SPP/md_no/$1';
$route['export/spp/save'] = 'SPP/save';
$route['export/spp/print/(:num)'] = 'Prints/spp/$1';

/** Import */
$route['import'] = 'Home/import';

/** Import - Category */
$route['import/category'] = 'Category';
$route['import/category/add'] = 'Category/add';
$route['import/category/save'] = 'Category/save';
$route['import/category/detail/(:num)'] = 'Category/detail/$1';
$route['import/category/update'] = 'Category/update';
$route['import/category/delete/(:num)'] = 'Category/delete/$1';

/** Import - UOM */
$route['import/uom'] = 'UOM';
$route['import/uom/add'] = 'UOM/add';
$route['import/uom/save'] = 'UOM/save';
$route['import/uom/detail/(:num)'] = 'UOM/detail/$1';
$route['import/uom/update'] = 'UOM/update';
$route['import/uom/delete/(:num)'] = 'UOM/delete/$1';

/** Import - Consignee */
$route['import/consignee'] = 'Consignee';
$route['import/consignee/add'] = 'Consignee/add';
$route['import/consignee/save'] = 'Consignee/save';
$route['import/consignee/detail/(:num)'] = 'Consignee/detail/$1';
$route['import/consignee/update'] = 'Consignee/update';
$route['import/consignee/delete/(:num)'] = 'Consignee/delete/$1';

/** Import - Shipper */
$route['import/shipper'] = 'Shipper';
$route['import/shipper/add'] = 'Shipper/add';
$route['import/shipper/save'] = 'Shipper/save';
$route['import/shipper/detail/(:num)'] = 'Shipper/detail/$1';
$route['import/shipper/update'] = 'Shipper/update';
$route['import/shipper/delete/(:num)'] = 'Shipper/delete/$1';

/** Import - Forwarder */
$route['import/forwarder'] = 'Forwarder';
$route['import/forwarder/add'] = 'Forwarder/add';
$route['import/forwarder/save'] = 'Forwarder/save';
$route['import/forwarder/detail/(:num)'] = 'Forwarder/detail/$1';
$route['import/forwarder/update'] = 'Forwarder/update';
$route['import/forwarder/delete/(:num)'] = 'Forwarder/delete/$1';

/** Import - Document Import */
$route['import/docimport'] = 'DocumentImport';
$route['import/docimport/add'] = 'DocumentImport/add';
$route['import/docimport/save'] = 'DocumentImport/save';
$route['import/docimport/detail/(:num)'] = 'DocumentImport/detail/$1';
$route['import/docimport/update'] = 'DocumentImport/update';
$route['import/docimport/delete/(:num)'] = 'DocumentImport/delete/$1';
$route['import/docimport/excel'] = 'DocumentImport/excel';

/** Import - ETA & PIB Payment */
$route['import/docpayment'] = 'DocPayment';
$route['import/docpayment/add'] = 'DocPayment/add';
$route['import/docpayment/datas'] = 'DocPayment/datas';
$route['import/docpayment/datas/(:num)'] = 'DocPayment/datas/$1';
$route['import/docpayment/save'] = 'DocPayment/save';
$route['import/docpayment/detail/(:num)'] = 'DocPayment/detail/$1';
$route['import/docpayment/delete/(:num)'] = 'DocPayment/delete/$1';
$route['import/docpayment/excel'] = 'DocPayment/excel';

/** Import - Report Import */
$route['import/report_import'] = 'ReportImport';
$route['import/report_import/html'] = 'ReportImport/html';

/** Import - Report Cost */
$route['import/report_cost'] = 'ReportCost';
$route['import/report_cost/html'] = 'ReportCost/html';