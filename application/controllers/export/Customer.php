<?php

    Class Customer extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD']);
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
                base_url("assets/js/customer/list.js"),
            ];
            $datas['title'] = 'Export - Customer';
            $datas['breadcrumb'] = ['Export', 'Master', 'Customer'];
            $datas['header'] = 'Customer list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_master_customer_list')
            ];

            $this->template->load('default', 'contents' , 'export/customer/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/bs-stepper/css/bs-stepper.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                base_url("assets/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/customer/add.js"),
            ];
            $datas['title'] = 'Export - Customer';
            $datas['breadcrumb'] = ['Export', 'Master', 'Customer'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'country' => $this->M_CRUD->readData('master_country', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'top' => $this->M_CRUD->readData('master_top', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD->readData('master_incoterm', ['is_deleted' => '0']),
                'import_bill' => $this->M_CRUD->readData('master_import_doc_option', ['flag' => '1', 'is_deleted' => '0']),
                'import_nonbill' => $this->M_CRUD->readData('master_import_doc_option', ['flag' => '2', 'is_deleted' => '0']),
                'coding' => $this->M_CRUD->readData('master_coding_type', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'export/customer/add/index', $datas);
        }

        public function bank($id = NUll)
        {
            $data = $this->M_CRUD->readDatabyID('master_bank', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $country = $this->M_CRUD->readDatabyID('master_country', ['is_deleted' => '0', 'id' => $post['con_country']]);
            $autonumber = $this->M_CRUD->autoNumberCustomer('master_customer', 'code', '8801', $country->code, 4);

            if($post) {
                $paramConsignee = [
                    'code' => $autonumber,
                    'company_name' => $post['con_company'],
                    'address' => $post['con_address'],
                    'town' => $post['con_town'],
                    'country_id' => $post['con_country'],
                    'phone_no_tel' => $post['con_phone_tel'],
                    'phone_no_fax' => ($post['con_phone_fax']?$post['con_phone_fax']:NULL),
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];
                $customer = $this->M_CRUD->insertData('master_customer', $paramConsignee);

                if($customer) {
                    /** Notify */
                    $this->saveNotify($post, $customer);
                    /** Contact person */
                    $this->saveContactPerson($post, $customer);
                    /** Bank account */
                    $this->saveBank($post, $customer);
                    /** Ship-to Address */
                    $this->saveShipAddress($post, $customer);
                    /** Contact person ship-to */
                    if( !empty($post['cpshipto']) ) {
                        $this->saveCPShipTo($post, $customer);
                    }
                    /** Freight */
                    if( !empty($post['freight']) ) {
                        $this->saveFreight($post, $customer);
                    }
                    /** Import document needs */
                    if( !empty($post['import_doc']) ) {
                        $this->saveImport($post, $customer);
                    }
                    /** Coding printing */
                    if( !empty($post['coding_print']) ) {
                        $this->saveCoding($post, $customer);
                    }

                    $response = ['status' => 1, 'messages' => 'Customer has been saved successfully.', 'icon' => 'success', 'url' => 'export/customer'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }

        public function saveNotify($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'company_name' => $param['not_company'],
                'address' => $param['not_address'],
                'country_id' => $param['not_country_id'],
                'phone_no_tel' => $param['not_phone_tel'],
                'phone_no_fax' => ($param['not_phone_fax']?$param['not_phone_fax']:NULL),
            ];
            $this->M_CRUD->insertData('master_customer_notify', $datas);
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
            $this->M_CRUD->insertData('master_customer_cp', $datas);
        }

        public function saveBank($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'bank_id' => $param['con_bank'],
                'account_no' => $param['bank_accno'],
                'account_name' => $param['bank_accname'],
            ];
            $this->M_CRUD->insertData('master_customer_bank', $datas);
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
            $ShipAddress = $this->M_CRUD->insertData('master_customer_ship', $datas);

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
                            'customer_ship_id' => $detail['customer_ship_id'],
                            'discharge_port' => $detail['shipto_discharge'],
                            'destination_port' => $detail['shipto_destination'],
                        ];
                        $this->M_CRUD->insertData('master_customer_ship_detail', $params);
                    }
                }
            }
        }

        public function saveCPShipTo($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'name' => ($param['cpshipto_name']?$param['cpshipto_name']:NULL),
                'phone' => ($param['cpshipto_phone']?$param['cpshipto_phone']:NULL),
                'email' => ($param['cpshipto_email']?$param['cpshipto_email']:NULL),
            ];
            $this->M_CRUD->insertData('master_customer_cp_ship', $datas);
        }

        public function saveFreight($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'company' => $param['freight_company'],
                'contact' => $param['freight_contact'],
                'number' => $param['freight_number'],
            ];
            $this->M_CRUD->insertData('master_customer_freight', $datas);
        }

        public function saveImport($param, $cust_id)
        {
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
                'prod_spec' => ($param['imp_ps']?$param['imp_ps']:NULL),
                'qcertificate' => ($param['imp_qc']?$param['imp_qc']:NULL),
                'others' => ($param['imp_others']?$param['imp_others']:NULL),
            ];
            $this->M_CRUD->insertData('master_customer_import_doc', $datas);
        }

        public function saveCoding($param, $cust_id)
        {
            $datas = [
                'customer_id' => $cust_id,
                'notes' => ($param['coding_notes']?$param['coding_notes']:NULL),
            ];
            $Coding = $this->M_CRUD->insertData('master_customer_coding', $datas);

            if($Coding) {
                $Grid = array();
			
                foreach($_POST as $index => $value){
                    if(preg_match("/^cd_/i", $index)) {
                        $index = preg_replace("/^cd_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value;
                        if(!isset($Grid[$rnd]['customer_coding_id'])){
                            $Grid[$rnd]['customer_coding_id'] = $Coding;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'customer_coding_id' => $detail['customer_coding_id'],
                            'coding_type_id' => $detail['coding_type'],
                            'import_by' => $detail['coding_import'],
                            'hotline' => $detail['coding_hotline'],
                            'best_before' => $detail['coding_bb'],
                        ];
                        $this->M_CRUD->insertData('master_customer_coding_detail', $params);
                    }
                }
            }
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/bs-stepper/css/bs-stepper.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                base_url("assets/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/customer/detail.js"),
            ];
            $datas['title'] = 'Export - Customer';
            $datas['breadcrumb'] = ['Export', 'Master', 'Customer'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'customer' => $this->M_CRUD->readDatabyID('master_customer', ['id' => $id]),
                'cust_bank' => $this->M_CRUD->readDatabyID('view_master_customer_bank', ['customer_id' => $id]),
                'cust_notify' => $this->M_CRUD->readDatabyID('master_customer_notify', ['customer_id' => $id]),
                'cust_country' => $this->M_CRUD->readDatabyID('view_master_customer_country', ['customer_id' => $id]),
                'cust_cp' => $this->M_CRUD->readDatabyID('master_customer_cp', ['customer_id' => $id]),
                'cust_ship' => $this->M_CRUD->readDatabyID('master_customer_ship', ['customer_id' => $id]),
                'cust_cpship' => $this->M_CRUD->readDatabyID('master_customer_cp_ship', ['customer_id' => $id]),
                'cust_freight' => $this->M_CRUD->readDatabyID('master_customer_freight', ['customer_id' => $id]),
                'cust_import' => $this->M_CRUD->readDatabyID('master_customer_import_doc', ['customer_id' => $id]),
                'country' => $this->M_CRUD->readData('master_country', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'top' => $this->M_CRUD->readData('master_top', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD->readData('master_incoterm', ['is_deleted' => '0']),
                'import_bill' => $this->M_CRUD->readData('master_import_doc_option', ['flag' => '1', 'is_deleted' => '0']),
                'import_nonbill' => $this->M_CRUD->readData('master_import_doc_option', ['flag' => '2', 'is_deleted' => '0']),
                'coding' => $this->M_CRUD->readData('master_coding_type', ['is_deleted' => '0']),
                'cust_coding' => $this->M_CRUD->readDatabyID('master_customer_coding', ['customer_id' => $id]),
            ];
            $datas['detail'] = [
                'coding' => $this->M_CRUD->readData('view_master_customer_coding_type_detail', ['customer_coding_id' => ($datas['params']['cust_coding']?$datas['params']['cust_coding']->id:'')]),
                'cust_ship' => $this->M_CRUD->readData('master_customer_ship_detail', ['is_deleted' => '0', 'customer_ship_id' => $datas['params']['cust_ship']->id]),
                'cust_coding' => $this->M_CRUD->readData('view_master_customer_coding_detail', ['is_deleted' => '0', 'customer_coding_id' => ($datas['params']['cust_coding']?$datas['params']['cust_coding']->id:'')]),
            ];

            $this->template->load('default', 'contents' , 'export/customer/detail/index', $datas);
        }

        public function shipto_del($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_customer_ship_detail', $condition)) {
                $response = ['status' => 1, 'messages' => 'Item has been deleted successfully.'];
            } else {
                $response = ['status' => 0, 'messages' => 'Item has failed to delete.'];
            }

            echo json_encode($response);
        }

        public function coding_del($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_customer_coding_detail', $condition)) {
                $response = ['status' => 1, 'messages' => 'Item has been deleted successfully.'];
            } else {
                $response = ['status' => 0, 'messages' => 'Item has failed to delete.'];
            }

            echo json_encode($response);
        }

        public function update()
        {
            $post = $this->input->post();
            $params = [
                'company_name' => $post['con_company'],
                'address' => $post['con_address'],
                'town' => $post['con_town'],
                'country_id' => $post['con_country'],
                // 'phone_no' => $post['con_phone'],
                'phone_no_tel' => $post['con_phone_tel'],
                'phone_no_fax' => ($post['con_phone_fax']?$post['con_phone_fax']:NULL),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];
            $customer = $this->M_CRUD->updateData('master_customer', $params, ['id' => $post['id']]);

            if($customer) {
                /** Notify */
                $this->saveUpdateNotify($post, $post['id']);
                /** Contact person */
                $this->saveUpdateContactPerson($post, $post['id']);
                /** Bank account */
                $this->saveUpdateBank($post, $post['id']);
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

                $response = ['status' => 1, 'messages' => 'Customer has been saved successfully.', 'icon' => 'success', 'url' => 'export/customer'];
            } else {
                $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function saveUpdateNotify($param, $cust_id)
        {
            $datas = [
                'company_name' => $param['not_company'],
                'address' => $param['not_address'],
                'country_id' => $param['not_country_id'],
                // 'phone_no' => $param['not_phone'],
                'phone_no_tel' => $param['not_phone_tel'],
                'phone_no_fax' => ($param['not_phone_fax']?$param['not_phone_fax']:NULL),
            ];
            $this->M_CRUD->updateData('master_customer_notify', $datas, ['customer_id' => $cust_id]);
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
            $this->M_CRUD->updateData('master_customer_cp', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateBank($param, $cust_id)
        {
            $datas = [
                'bank_id' => $param['con_bank'],
                'account_no' => $param['bank_accno'],
                'account_name' => $param['bank_accname'],
            ];
            $this->M_CRUD->updateData('master_customer_bank', $datas, ['customer_id' => $cust_id]);
        }

        public function saveUpdateShipAddress($param, $cust_id)
        {
            $datas = [
                'company_name' => $param['shipto_company'],
                'address' => $param['shipto_address'],
                'country_id' => $param['shipto_country'],
                'phone_no' => ($param['shipto_phone']?$param['shipto_phone']:NULL),
            ];
            $this->M_CRUD->updateData('master_customer_ship', $datas, ['customer_id' => $cust_id]);
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
                        $Grid[$rnd]['customer_ship_id'] = $param['id'];
                    }
                }
            }

            if(!empty($Grid)) {
                foreach($Grid as $detail) {
                    $params = [
                        'customer_ship_id' => $detail['customer_ship_id'],
                        'discharge_port' => $detail['shipto_discharge'],
                        'destination_port' => $detail['shipto_destination'],
                    ];
                    $this->M_CRUD->insertData('master_customer_ship_detail', $params);
                }
            }
        }

        public function saveUpdateCPShipTo($param, $cust_id)
        {
            $datas = [
                'name' => ($param['cpshipto_name']?$param['cpshipto_name']:NULL),
                'phone' => ($param['cpshipto_phone']?$param['cpshipto_phone']:NULL),
                'email' => ($param['cpshipto_email']?$param['cpshipto_email']:NULL),
            ];
            $customer = $this->M_CRUD->readDatabyID('master_customer_cp_ship', ['customer_id' => $cust_id]);
            
            if($customer) {
                $this->M_CRUD->updateData('master_customer_cp_ship', $datas, ['customer_id' => $cust_id]);
            } else {
                $datas = array_merge(
                    $datas, ['customer_id' => $cust_id]
                );
                $this->M_CRUD->insertData('master_customer_cp_ship', $datas);
            }
        }

        public function saveUpdateFreight($param, $cust_id)
        {
            $datas = [
                'company' => $param['freight_company'],
                'contact' => $param['freight_contact'],
                'number' => $param['freight_number'],
            ];
            $customer = $this->M_CRUD->readDatabyID('master_customer_freight', ['customer_id' => $cust_id]);
            
            if($customer) {
                $this->M_CRUD->updateData('master_customer_freight', $datas, ['customer_id' => $cust_id]);
            } else {
                $datas = array_merge(
                    $datas, ['customer_id' => $cust_id]
                );
                $this->M_CRUD->insertData('master_customer_freight', $datas);
            }
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
                'prod_spec' => ($param['imp_ps']?$param['imp_ps']:NULL),
                'qcertificate' => ($param['imp_qc']?$param['imp_qc']:NULL),
                'others' => ($param['imp_others']?$param['imp_others']:NULL),
            ];
            $customer = $this->M_CRUD->readDatabyID('master_customer_import_doc', ['customer_id' => $cust_id]);

            if($customer) {
                $this->M_CRUD->updateData('master_customer_import_doc', $datas, ['customer_id' => $cust_id]);
            } else {
                $datas = array_merge(
                    $datas, ['customer_id' => $cust_id]
                );
                $this->M_CRUD->insertData('master_customer_import_doc', $datas);
            }
        }

        public function saveUpdateCoding($param, $cust_id)
        {
            $datas = [
                'notes' => ($param['coding_notes']?$param['coding_notes']:NULL),
            ];
            $customer = $this->M_CRUD->readDatabyID('master_customer_coding', ['customer_id' => $cust_id]);
            $Grid = array();
        
            foreach($_POST as $index => $value){
                if(preg_match("/^cd_/i", $index)) {
                    $index = preg_replace("/^cd_/i","",$index);
                    $arr = explode('_',$index);
                    $rnd = $arr[count($arr)-1];
                    array_pop($arr);
                    $idx = implode('_',$arr);
                    
                    $Grid[$rnd][$idx] = $value;
                    if(!isset($Grid[$rnd]['customer_coding_id'])){
                        $Grid[$rnd]['customer_coding_id'] = $param['id'];
                    }
                }
            }

            if($customer) {
                $this->M_CRUD->updateData('master_customer_coding', $datas, ['customer_id' => $cust_id]);
                
                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $condition = [
                            'customer_coding_id' => $detail['customer_coding_id'],
                            'coding_type_id' => $detail['coding_type'],
                        ];
                        $params = [
                            'import_by' => $detail['coding_import'],
                            'hotline' => $detail['coding_hotline'],
                            'best_before' => $detail['coding_bb'],
                            'is_deleted' => '0',
                        ];
                        $this->M_CRUD->updateData('master_customer_coding_detail', $params, $condition);
                    }
                }
            } else {
                $datas = array_merge(
                    $datas, ['customer_id' => $cust_id]
                );
                
                if(!empty($Grid)) {
                    $id = $this->M_CRUD->insertData('master_customer_coding', $datas);
                    if($id ) {
                        foreach($Grid as $detail) {
                            // $condition = [
                            //     'customer_coding_id' => $detail['customer_coding_id'],
                            //     'coding_type_id' => $detail['coding_type'],
                            // ];
                            $params = [
                                'coding_type_id' => $detail['coding_type'],
                                'import_by' => $detail['coding_import'],
                                'hotline' => $detail['coding_hotline'],
                                'best_before' => $detail['coding_bb'],
                                'is_deleted' => '0',
                            ];
                            $params = array_merge(
                                ['customer_coding_id' => $id], $params
                            );
                            $this->M_CRUD->insertData('master_customer_coding_detail', $params);
                        }
                    }
                }
            }
        }

        public function delete($id)
        {
            $customer = $this->M_CRUD->readDatabyID('master_customer', ['id' => $id]);
            $condition = [
                'id' => $id
            ];
            $params = [
                'is_deleted' => (($customer->is_deleted == '0') ? '1': '0')
            ];
            
            if($this->M_CRUD->updateData('master_customer', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'Customer has been deleted successfully.', 'icon' => 'success', 'url' => 'export/customer'];
            } else {
                $response = ['status' => 0, 'messages' => 'Customer has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>