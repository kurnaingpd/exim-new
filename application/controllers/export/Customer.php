<?php

    Class Customer extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD_Exp']);
        }

        public function index()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/datatables/jquery.dataTables.min.js"),
                base_url("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/customer/list.js"),
            ];
            $datas['title'] = 'Export - Customer';
            $datas['breadcrumb'] = ['Export', 'Master', 'Customer'];
            $datas['header'] = 'Customer list';
            $datas['params'] = [
                'list' => $this->M_CRUD_Exp->readData('view_master_customer')
            ];

            $this->template->load('default', 'contents' , 'export/customer/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/bs-stepper/css/bs-stepper.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/customer/add.js"),
            ];
            $datas['title'] = 'Export - Customer';
            $datas['breadcrumb'] = ['Export', 'Master', 'Customer'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'country' => $this->M_CRUD_Exp->readData('master_country', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD_Exp->readData('master_bank', ['is_deleted' => '0']),
                'top' => $this->M_CRUD_Exp->readData('master_top', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD_Exp->readData('master_currency', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD_Exp->readData('master_incoterm', ['is_deleted' => '0']),
                'import_bill' => $this->M_CRUD_Exp->readData('master_import_doc_option', ['flag' => '1']),
                'import_nonbill' => $this->M_CRUD_Exp->readData('master_import_doc_option', ['flag' => '2']),
            ];

            $this->template->load('default', 'contents' , 'export/customer/add/index', $datas);
        }

        public function bank($id = NULL)
        {
            $data = $this->M_CRUD_Exp->readDatabyID('master_bank', ['id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $country = $this->M_CRUD_Exp->readDatabyID('master_country', ['is_deleted' => '0', 'id' => $post['con_country']]);
            $autonumber = $this->M_CRUD_Exp->autoNumberCustomer('master_customer', 'code', '8801', $country->code, $post['con_country'], 4);

            if($post) {
                $paramConsignee = [
                    'code' => $autonumber,
                    'name' => $post['con_company'],
                    'address' => $post['con_address'],
                    'town' => $post['con_town'],
                    'country_id' => $post['con_country'],
                    'phone_no_tel' => $post['con_phone_tel'],
                    'phone_no_fax' => ($post['con_phone_fax']?$post['con_phone_fax']:NULL),
                    'bank_id' => $post['con_bank'],
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];

                $customer = $this->M_CRUD_Exp->insertData('master_customer', $paramConsignee);

                if($customer) {
                    /** Notify */
                    $this->saveNotify($post, $customer);
                    /** Contact person */
                    $this->saveContactPerson($post, $customer);
                    /** Ship-to Address */
                    $this->saveShipAddress($post, $customer);
                    /** Contact person ship-to */
                    $this->saveCPShipTo($post, $customer);
                    /** Freight */
                    $this->saveFreight($post, $customer);
                    /** Import document needs */
                    $this->saveImport($post, $customer);
                    /** Coding Printing */
                    $this->saveCoding($post, $customer);

                    $response = ['status' => 1, 'messages' => 'Customer has been saved successfully.', 'icon' => 'success', 'url' => 'export/master/customer'];
                }
            } else {
                $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
            }
            
            echo json_encode($response);
        }

        public function saveNotify($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'name' => $param['not_company'],
                'address' => $param['not_address'],
                'country_id' => $param['not_country_id'],
                'phone_no_tel' => $param['not_phone_tel'],
                'phone_no_fax' => ($param['not_phone_fax']?$param['not_phone_fax']:NULL),
            ];
            $this->M_CRUD_Exp->insertData('master_customer_notify', $datas);
        }

        public function saveContactPerson($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'name' => $param['cp_name'],
                'phone_no' => $param['cp_phone'],
                'email' => $param['cp_email'],
                'top_id' => $param['cp_top'],
                'dp' => $param['cp_dp'],
                'balancing' => $param['cp_balancing'],
                'currency_id' => $param['cp_currency'],
                'incoterm_id' => $param['cp_incoterm'],
            ];
            $this->M_CRUD_Exp->insertData('master_customer_contact_person', $datas);
        }

        public function saveShipAddress($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'company_name' => $param['shipto_company'],
                'address' => $param['shipto_address'],
                'country_id' => $param['shipto_country'],
                'phone_no' => ($param['shipto_phone']?$param['shipto_phone']:NULL),
            ];
            $ShipAddress = $this->M_CRUD_Exp->insertData('master_customer_ship', $datas);

            if($ShipAddress) {
                $Grid = array();
			
                foreach($_POST as $index => $value){
                    if(preg_match("/^grid_/i", $index)) {
                        $index = preg_replace("/^grid_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value;
                        if(!isset($Grid[$rnd]['customer_ship_id'])){
                            $Grid[$rnd]['customer_ship_id'] = $ShipAddress;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'ship_id' => $detail['customer_ship_id'],
                            'discharge' => $detail['shipto_discharge'],
                            'destination' => $detail['shipto_destination'],
                        ];
                        $this->M_CRUD_Exp->insertData('master_customer_ship_detail', $params);
                    }
                }
            }
        }

        public function saveCPShipTo($param, $cust_id)
        {
            if(!empty($param['cpshipto'])) {
                $datas = [
                    'customer_id' => $cust_id,
                    'name' => ($param['cpshipto_name']?$param['cpshipto_name']:NULL),
                    'phone_no' => ($param['cpshipto_phone']?$param['cpshipto_phone']:NULL),
                    'email' => ($param['cpshipto_email']?$param['cpshipto_email']:NULL),
                ];
            } else {
                $datas = [
                    'customer_id' => $cust_id,
                    'name' => NULL,
                    'phone_no' => NULL,
                    'email' => NULL,
                ];
            }

            $this->M_CRUD_Exp->insertData('master_customer_contact_person_ship', $datas);
        }

        public function saveFreight($param, $cust_id)
        {
            if(!empty($param['freight'])) {
                $datas = [
                    'customer_id' => $cust_id,
                    'company' => ($param['freight_company']?$param['freight_company']:NULL),
                    'contact' => ($param['freight_company']?$param['freight_contact']:NULL),
                    'phone_no' => ($param['freight_company']?$param['freight_number']:NULL),
                ];
            } else {
                $datas = [
                    'customer_id' => $cust_id,
                    'company' => NULL,
                    'contact' => NULL,
                    'phone_no' => NULL,
                ];
            }

            $this->M_CRUD_Exp->insertData('master_customer_freight', $datas);
        }

        public function saveImport($param, $cust_id)
        {
            if(!empty($param['import_doc'])) {
                $datas = [
                    'customer_id' => $cust_id,
                    'bill_of_ladding' => ($param['imp_bill']?$param['imp_bill']:NULL),
                    'packing_list' => ($param['imp_packing']?$param['imp_packing']:NULL),
                    'invoice' => ($param['imp_inv']?$param['imp_inv']:NULL),
                    'invoice_uv' => ($param['imp_inv_uv']?$param['imp_inv_uv']:NULL),
                    'coo' => ($param['imp_coo']?$param['imp_coo']:NULL),
                    'health_cert' => ($param['imp_hc']?$param['imp_hc']:NULL),
                    'material_safety' => ($param['imp_mat']?$param['imp_mat']:NULL),
                    'coa' => ($param['imp_coa']?$param['imp_coa']:NULL),
                    'product_spec' => ($param['imp_ps']?$param['imp_ps']:NULL),
                    'qcertificate' => ($param['imp_qc']?$param['imp_qc']:NULL),
                    'others' => ($param['imp_others']?$param['imp_others']:NULL),
                ];
            } else {
                $datas = [
                    'customer_id' => $cust_id,
                    'bill_of_ladding' => NULL,
                    'packing_list' => NULL,
                    'invoice' => NULL,
                    'invoice_uv' => NULL,
                    'coo' => NULL,
                    'health_cert' => NULL,
                    'material_safety' => NULL,
                    'coa' => NULL,
                    'product_spec' => NULL,
                    'qcertificate' => NULL,
                    'others' => NULL,
                ];
            }

            $this->M_CRUD_Exp->insertData('master_customer_import_doc', $datas);
        }

        public function saveCoding($param, $cust_id)
        {
            if(!empty($param['coding_print'])) {
                $datas = [
                    'customer_id' => $cust_id,
                    'sachet_company' => ($param['coding_sachet_company']?$param['coding_sachet_company']:NULL),
                    'sachet_city' => ($param['coding_sachet_city']?$param['coding_sachet_city']:NULL),
                    'sachet_postal' => ($param['coding_sachet_postal']?$param['coding_sachet_postal']:NULL),
                    'sachet_hotline' => ($param['coding_sachet_hotline']?$param['coding_sachet_hotline']:NULL),
                    'sachet_best_before' => ($param['coding_sachet_bb']?$param['coding_sachet_bb']:NULL),
                    'sachet_batch' => ($param['coding_sachet_batch']?$param['coding_sachet_batch']:NULL),
                    'pouch_company' => ($param['coding_pouch_company']?$param['coding_pouch_company']:NULL),
                    'pouch_city' => ($param['coding_pouch_city']?$param['coding_pouch_city']:NULL),
                    'pouch_postal' => ($param['coding_pouch_postal']?$param['coding_pouch_postal']:NULL),
                    'pouch_hotline' => ($param['coding_pouch_hotline']?$param['coding_pouch_hotline']:NULL),
                    'pouch_best_before' => ($param['coding_pouch_bb']?$param['coding_pouch_bb']:NULL),
                    'pouch_batch' => ($param['coding_pouch_batch']?$param['coding_pouch_batch']:NULL),
                    'case_company' => ($param['coding_case_company']?$param['coding_case_company']:NULL),
                    'case_city' => ($param['coding_case_city']?$param['coding_case_city']:NULL),
                    'case_postal' => ($param['coding_case_postal']?$param['coding_case_postal']:NULL),
                    'case_hotline' => ($param['coding_case_hotline']?$param['coding_case_hotline']:NULL),
                    'case_best_before' => ($param['coding_case_bb']?$param['coding_case_bb']:NULL),
                    'case_batch' => ($param['coding_case_batch']?$param['coding_case_batch']:NULL),
                    'notes' => ($param['coding_notes']?$param['coding_notes']:NULL),
                ];
            } else {
                $datas = [
                    'customer_id' => $cust_id,
                    'sachet_company' => NULL,
                    'sachet_city' => NULL,
                    'sachet_postal' => NULL,
                    'sachet_hotline' => NULL,
                    'sachet_best_before' => NULL,
                    'sachet_batch' => NULL,
                    'pouch_company' => NULL,
                    'pouch_city' => NULL,
                    'pouch_postal' => NULL,
                    'pouch_hotline' => NULL,
                    'pouch_best_before' => NULL,
                    'pouch_batch' => NULL,
                    'case_company' => NULL,
                    'case_city' => NULL,
                    'case_postal' => NULL,
                    'case_hotline' => NULL,
                    'case_best_before' => NULL,
                    'case_batch' => NULL,
                    'notes' => NULL,
                ];
            }

            $this->M_CRUD_Exp->insertData('master_customer_coding', $datas);
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/bs-stepper/css/bs-stepper.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/customer/detail.js"),
            ];
            $datas['title'] = 'Export - Customer';
            $datas['breadcrumb'] = ['Export', 'Master', 'Customer'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'country' => $this->M_CRUD_Exp->readData('master_country', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD_Exp->readData('master_bank', ['is_deleted' => '0']),
                'top' => $this->M_CRUD_Exp->readData('master_top', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD_Exp->readData('master_currency', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD_Exp->readData('master_incoterm', ['is_deleted' => '0']),
                'import_bill' => $this->M_CRUD_Exp->readData('master_import_doc_option', ['flag' => '1']),
                'import_nonbill' => $this->M_CRUD_Exp->readData('master_import_doc_option', ['flag' => '2']),
                'customer' => $this->M_CRUD_Exp->readDatabyID('master_customer', ['id' => $id]),
                'cust_notify' => $this->M_CRUD_Exp->readDatabyID('master_customer_notify', ['customer_id' => $id]),
                'cust_cp' => $this->M_CRUD_Exp->readDatabyID('master_customer_contact_person', ['customer_id' => $id]),
                'cust_ship' => $this->M_CRUD_Exp->readDatabyID('master_customer_ship', ['customer_id' => $id]),
                'cust_cpship' => $this->M_CRUD_Exp->readDatabyID('master_customer_contact_person_ship', ['customer_id' => $id]),
                'cust_freight' => $this->M_CRUD_Exp->readDatabyID('master_customer_freight', ['customer_id' => $id]),
                'cust_import' => $this->M_CRUD_Exp->readDatabyID('master_customer_import_doc', ['customer_id' => $id]),
                'cust_coding' => $this->M_CRUD_Exp->readDatabyID('master_customer_coding', ['customer_id' => $id]),
            ];
            $datas['detail'] = [
                'cust_bank' => $this->M_CRUD_Exp->readDatabyID('master_bank', ['id' => ($datas['params']['customer']?$datas['params']['customer']->bank_id:'')]),
                'cust_ship' => $this->M_CRUD_Exp->readData('master_customer_ship_detail', ['is_deleted' => '0', 'ship_id' => $datas['params']['cust_ship']->id]),
            ];

            $this->template->load('default', 'contents' , 'export/customer/detail/index', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $paramConsignee = [
                'name' => $post['con_company'],
                'address' => $post['con_address'],
                'town' => $post['con_town'],
                'country_id' => $post['con_country'],
                'phone_no_tel' => $post['con_phone_tel'],
                'phone_no_fax' => ($post['con_phone_fax']?$post['con_phone_fax']:NULL),
                'bank_id' => $post['con_bank'],
                'updated_by' => $this->session->userdata('logged_in')->id,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $customer = $this->M_CRUD_Exp->updateData('master_customer', $paramConsignee, ['id' => $post['id']]);

            if($customer) {
                /** Notify */
                $this->saveUpdateNotify($post, $post['id']);
                /** Contact person */
                $this->saveUpdateContactPerson($post, $post['id']);
                /** Ship-to Address */
                $this->saveUpdateShipAddress($post, $post['id']);
                /** Contact person ship-to */
                $this->saveUpdateCPShipTo($post, $post['id']);
                /** Freight */
                $this->saveUpdateFreight($post, $post['id']);
                /** Import document needs */
                $this->saveUpdateImport($post, $post['id']);
                /** Coding printing */
                $this->saveUpdateCoding($post, $post['id']);

                $response = ['status' => 1, 'messages' => 'Customer has been saved successfully.', 'icon' => 'success', 'url' => 'export/master/customer'];
            } else {
                $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function saveUpdateNotify($param, $cust_id)
        {
            $datas = [
                'name' => $param['not_company'],
                'address' => $param['not_address'],
                'country_id' => $param['not_country_id'],
                'phone_no_tel' => $param['not_phone_tel'],
                'phone_no_fax' => ($param['not_phone_fax']?$param['not_phone_fax']:NULL),
            ];
            $this->M_CRUD_Exp->updateData('master_customer_notify', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateContactPerson($param, $cust_id)
        {
            $datas = [
                'name' => $param['cp_name'],
                'phone_no' => $param['cp_phone'],
                'email' => $param['cp_email'],
                'top_id' => $param['cp_top'],
                'dp' => $param['cp_dp'],
                'balancing' => $param['cp_balancing'],
                'currency_id' => $param['cp_currency'],
                'incoterm_id' => $param['cp_incoterm'],
            ];
            $this->M_CRUD_Exp->updateData('master_customer_contact_person', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateShipAddress($param, $cust_id)
        {
            $Grid = array();
            $ship_id = $this->M_CRUD_Exp->readDatabyID('master_customer_ship', ['customer_id' => $cust_id]);
            $datas = [
                'company_name' => $param['shipto_company'],
                'address' => $param['shipto_address'],
                'country_id' => $param['shipto_country'],
                'phone_no' => ($param['shipto_phone']?$param['shipto_phone']:NULL),
            ];
            $this->M_CRUD_Exp->updateData('master_customer_ship', $datas, ['customer_id' => $cust_id]);
        
            foreach($_POST as $index => $value){
                if(preg_match("/^grid_/i", $index)) {
                    $index = preg_replace("/^grid_/i","",$index);
                    $arr = explode('_',$index);
                    $rnd = $arr[count($arr)-1];
                    array_pop($arr);
                    $idx = implode('_',$arr);
                    
                    $Grid[$rnd][$idx] = $value;
                    if(!isset($Grid[$rnd]['customer_ship_id'])){
                        $Grid[$rnd]['customer_ship_id'] = $ship_id->id;
                    }
                }
            }

            if(!empty($Grid)) {
                foreach($Grid as $detail) {
                    $params = [
                        'ship_id' => $detail['customer_ship_id'],
                        'discharge' => $detail['shipto_discharge'],
                        'destination' => $detail['shipto_destination'],
                    ];
                    $this->M_CRUD_Exp->insertData('master_customer_ship_detail', $params);
                }
            }
        }

        public function saveUpdateCPShipTo($param, $cust_id)
        {
            $datas = [
                'name' => ($param['cpshipto_name']?$param['cpshipto_name']:NULL),
                'phone_no' => ($param['cpshipto_phone']?$param['cpshipto_phone']:NULL),
                'email' => ($param['cpshipto_email']?$param['cpshipto_email']:NULL),
            ];
            $this->M_CRUD_Exp->updateData('master_customer_contact_person_ship', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateFreight($param, $cust_id)
        {
            $datas = [
                'company' => ($param['freight_company']?$param['freight_company']:NULL),
                'contact' => ($param['freight_company']?$param['freight_contact']:NULL),
                'phone_no' => ($param['freight_company']?$param['freight_number']:NULL),
            ];
            $this->M_CRUD_Exp->updateData('master_customer_freight', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateImport($param, $cust_id)
        {
            $datas = [
                'bill_of_ladding' => ($param['imp_bill']?$param['imp_bill']:NULL),
                'packing_list' => ($param['imp_packing']?$param['imp_packing']:NULL),
                'invoice' => ($param['imp_inv']?$param['imp_inv']:NULL),
                'invoice_uv' => ($param['imp_inv_uv']?$param['imp_inv_uv']:NULL),
                'coo' => ($param['imp_coo']?$param['imp_coo']:NULL),
                'health_cert' => ($param['imp_hc']?$param['imp_hc']:NULL),
                'material_safety' => ($param['imp_mat']?$param['imp_mat']:NULL),
                'coa' => ($param['imp_coa']?$param['imp_coa']:NULL),
                'product_spec' => ($param['imp_ps']?$param['imp_ps']:NULL),
                'qcertificate' => ($param['imp_qc']?$param['imp_qc']:NULL),
                'others' => ($param['imp_others']?$param['imp_others']:NULL),
            ];
            $this->M_CRUD_Exp->updateData('master_customer_import_doc', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateCoding($param, $cust_id)
        {
            $datas = [
                'sachet_company' => ($param['coding_sachet_company']?$param['coding_sachet_company']:NULL),
                'sachet_city' => ($param['coding_sachet_city']?$param['coding_sachet_city']:NULL),
                'sachet_postal' => ($param['coding_sachet_postal']?$param['coding_sachet_postal']:NULL),
                'sachet_hotline' => ($param['coding_sachet_hotline']?$param['coding_sachet_hotline']:NULL),
                'sachet_best_before' => ($param['coding_sachet_bb']?$param['coding_sachet_bb']:NULL),
                'sachet_batch' => ($param['coding_sachet_batch']?$param['coding_sachet_batch']:NULL),
                'pouch_company' => ($param['coding_pouch_company']?$param['coding_pouch_company']:NULL),
                'pouch_city' => ($param['coding_pouch_city']?$param['coding_pouch_city']:NULL),
                'pouch_postal' => ($param['coding_pouch_postal']?$param['coding_pouch_postal']:NULL),
                'pouch_hotline' => ($param['coding_pouch_hotline']?$param['coding_pouch_hotline']:NULL),
                'pouch_best_before' => ($param['coding_pouch_bb']?$param['coding_pouch_bb']:NULL),
                'pouch_batch' => ($param['coding_pouch_batch']?$param['coding_pouch_batch']:NULL),
                'case_company' => ($param['coding_case_company']?$param['coding_case_company']:NULL),
                'case_city' => ($param['coding_case_city']?$param['coding_case_city']:NULL),
                'case_postal' => ($param['coding_case_postal']?$param['coding_case_postal']:NULL),
                'case_hotline' => ($param['coding_case_hotline']?$param['coding_case_hotline']:NULL),
                'case_best_before' => ($param['coding_case_bb']?$param['coding_case_bb']:NULL),
                'case_batch' => ($param['coding_case_batch']?$param['coding_case_batch']:NULL),
                'notes' => ($param['coding_notes']?$param['coding_notes']:NULL),
            ];
            $this->M_CRUD_Exp->updateData('master_customer_coding', $datas, ['customer_id' => $cust_id]);
        }

        public function shipto_del($id)
        {
            $condition = ['id' => $id];
            
            if($this->M_CRUD_Exp->deleteData('master_customer_ship_detail', $condition)) {
                $response = ['status' => 1, 'messages' => 'Item has been deleted successfully.'];
            } else {
                $response = ['status' => 0, 'messages' => 'Item has failed to delete.'];
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            $customer = $this->M_CRUD_Exp->readDatabyID('master_customer', ['id' => $id]);
            $status = ($customer->is_deleted == '1'?'0':'1');
            
            if($this->M_CRUD_Exp->updateData('master_customer', ['is_deleted' => $status], $condition)) {
                $response = ['status' => 1, 'messages' => 'Customer has been deleted successfully.', 'icon' => 'success', 'url' => 'export/master/customer'];
            } else {
                $response = ['status' => 0, 'messages' => 'Customer has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>