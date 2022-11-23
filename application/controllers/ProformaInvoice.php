<?php

    Class ProformaInvoice extends CI_Controller
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
                base_url("assets/js/proforma/list.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Proforma invoice list';
            $datas['button'] = (($this->session->userdata('logged_in')->role_id == 3)?'':'disabled');
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_pi_list', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'export/proforma/list', $datas);
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
                base_url("assets/js/proforma/add.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberPI('trans_pi', 'code', date('m/Y'), 4),
                'customer' => $this->M_CRUD->readData('master_customer', ['is_deleted' => '0']),
                'country' => $this->M_CRUD->readData('master_country', ['is_deleted' => '0']),
                'beneficiary' => $this->M_CRUD->readData('master_beneficiary', ['is_deleted' => '0']),
                'load_port' => $this->M_CRUD->readData('master_loading_port', ['is_deleted' => '0']),
                'container' => $this->M_CRUD->readData('master_container', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'category' => $this->M_CRUD->readData('master_pi_item_category', ['is_deleted' => '0']),
                'item' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
            ];
            $this->template->load('default', 'contents' , 'export/proforma/add/index', $datas);
        }

        public function customer($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_customer_cp', ['is_deleted' => '0', 'customer_id' => $id]);
            echo json_encode($data);
        }

        public function beneficiary($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_beneficiary', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function discharge($cust_id = NULL)
        {
            $data = $this->M_CRUD->readData('view_customer_ship_detail', ['is_deleted' => '0', 'customer_id' => $cust_id]);
            echo json_encode($data);
        }

        public function destination($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_customer_ship_detail', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function cbm($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('master_container', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function item($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('master_item', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function coding($id = NULL)
        {
            $data = $this->M_CRUD->readData('view_customer_coding', ['is_deleted' => '0', 'customer_id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['pi_code'],
                'po_no' => ($post['pi_po']?$post['pi_po']:NULL),
                'customer_id' => $post['pi_consignee'],
                'consignee_id' => $post['pi_consignee'],
                'beneficiary_id' => $post['pi_beneficiary'],
                'loading_port_id' => $post['loading_port'],
                'customer_ship_id' => $post['discharge_port'],
                'bank_id' => $post['bank'],
                'currency_id' => $post['currency'],
                'ppn' => $post['ppn'],
                'top_id' => $post['top_id'],
                'pi_status_id' => 8,
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $header = $this->M_CRUD->insertData('trans_pi', $params);

            if($header) {
                $Grid = array();
			
                foreach($_POST as $index => $value){
                    if(preg_match("/^grid_/i", $index)) {
                        $index = preg_replace("/^grid_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value;
                        if(!isset($Grid[$rnd]['pi_id'])){
                            $Grid[$rnd]['pi_id'] = $header;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'pi_id' => $detail['pi_id'],
                            'container_id' => $detail['containers'],
                            'number_of_container' => $detail['container_no'],
                        ];
                        $this->M_CRUD->insertData('trans_pi_container', $params);
                    }
                }

                $signed_item = $this->M_CRUD->readData('master_pi_item', ['is_deleted' => '0']);

                foreach($signed_item as $item_id) {
                    $dataItem = [
                        'pi_id' => $header,
                        'pi_item_id' => $item_id->id,
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];
                    $this->M_CRUD->insertData('trans_signed_pi', $dataItem);
                }

                $paramHistory = [
                    'pi_id' => $header,
                    'pi_status_id' => 8,
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];
                $this->M_CRUD->insertData('trans_pi_history', $paramHistory);
                
                $response = ['status' => 1, 'messages' => 'Proforma invoice: '.$post['pi_code'].' has been saved successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/proforma/detail.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('trans_pi', ['is_deleted' => '0', 'id' => $id]),
                'detail_value' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'customer' => $this->M_CRUD->readData('master_customer', ['is_deleted' => '0']),
                'beneficiary' => $this->M_CRUD->readData('master_beneficiary', ['is_deleted' => '0']),
                'load_port' => $this->M_CRUD->readData('master_loading_port', ['is_deleted' => '0']),
                'container' => $this->M_CRUD->readData('master_container', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'container_no' => $this->M_CRUD->readData('view_trans_pi_container', ['is_deleted' => '0', 'pi_id' => $id]),
            ];
            $datas['chained'] = [
                'discharge' => $this->M_CRUD->readData('view_customer_ship_detail', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
                'freight' => $this->M_CRUD->readDatabyID('master_customer_freight', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
                'coding_detail' => $this->M_CRUD->readData('view_master_customer_coding_detail', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
                'coding' => $this->M_CRUD->readDatabyID('master_customer_coding', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
            ];

            $this->template->load('default', 'contents' , 'export/proforma/detail/index', $datas);
        }

        public function add_detail_container($id)
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
                base_url("assets/js/proforma/detail_container.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['params'] = [
                'container' => $this->M_CRUD->readDatabyID('view_trans_pi_container', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->readData('master_pi_item_category', ['is_deleted' => '0']),
                'item' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
                'item_detail' => $this->M_CRUD->readData('view_trans_pi_detail_item', ['is_deleted' => '0', 'pi_container_id' => $id]),
                'cbm' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_remain_cbm', ['is_deleted' => '0', 'pi_container_id' => $id]),
            ];
            $this->template->load('default', 'contents' , 'export/proforma/detail/items', $datas);
        }

        public function insert_detail_container()
        {
            $post = $this->input->post();
            $pi = $this->M_CRUD->readDatabyID('trans_pi_container', ['id' => $post['id']]);
            $Grid = array();
			
            foreach($_POST as $index => $value){
                if(preg_match("/^grid_/i", $index)) {
                    $index = preg_replace("/^grid_/i","",$index);
                    $arr = explode('_',$index);
                    $rnd = $arr[count($arr)-1];
                    array_pop($arr);
                    $idx = implode('_',$arr);
                    
                    $Grid[$rnd][$idx] = $value;
                    if(!isset($Grid[$rnd]['pi_id'])){
                        $Grid[$rnd]['pi_id'] = $post['id'];
                    }
                }
            }

            if(!empty($Grid)) {
                foreach($Grid as $detail) {
                    $params = [
                        'pi_container_id' => $detail['container'],
                        'pi_item_category_id' => $detail['item_category'],
                        'item_id' => $detail['product'],
                        'hs_code' => $detail['hs_code'],
                        'qty' => $detail['qty'],
                        'price' => $detail['price'],
                        'cbm_item' => $detail['cbm'],
                    ];
                    $this->M_CRUD->insertData('trans_pi_detail', $params);
                }

                $response = ['status' => 1, 'messages' => 'Container has been saved successfully.', 'icon' => 'success', 'url' => 'export/proforma/detail/'.$pi->pi_id];
            } else {
                $response = ['status' => 0, 'messages' => 'Container has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $params = [
                'po_no' => ($post['pi_po']?$post['pi_po']:NULL),
                'customer_id' => $post['pi_consignee'],
                'consignee_id' => $post['pi_consignee'],
                'beneficiary_id' => $post['pi_beneficiary'],
                'loading_port_id' => $post['loading_port'],
                'customer_ship_id' => $post['discharge_port'],
                'bank_id' => $post['bank'],
                'currency_id' => $post['currency'],
                'ppn' => $post['ppn'],
                'top_id' => $post['top_id'],
                'pi_status_id' => 8,
                'updated_by' => $this->session->userdata('logged_in')->id,
                'updated_at' => date('Y-m-d H:i;s'),
            ];

            if($this->M_CRUD->updateData('trans_pi', $params, $condition)) {
                $Grid = array();

                foreach($_POST as $index => $value){
                    if(preg_match("/^grid_/i", $index)) {
                        $index = preg_replace("/^grid_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value;
                        if(!isset($Grid[$rnd]['pi_id'])){
                            $Grid[$rnd]['pi_id'] = $post['id'];
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'pi_id' => $post['id'],
                            'container_id' => $detail['containers'],
                            'number_of_container' => $detail['container_no'],
                        ];
                        $this->M_CRUD->insertData('trans_pi_container', $params);
                    }
                }

                $paramHistory = [
                    'pi_id' => $post['id'],
                    'pi_status_id' => 8,
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];

                $this->M_CRUD->insertData('trans_pi_history', $paramHistory);
                $response = ['status' => 1, 'messages' => 'Proforma invoice has been updated successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function submit($id)
        {
            $params = [
                'pi_status_id' => 1,
                'updated_by' => $this->session->userdata('logged_in')->id,
                'updated_at' => date('Y-m-d H:i;s'),
            ];
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->updateData('trans_pi', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'Proforma invoice has successfully changed status to submit.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to change status to submit.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('trans_pi', $condition)) {
                $response = ['status' => 1, 'messages' => 'Proforma invoice has been deleted successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function delete_container($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('trans_pi_container', $condition)) {
                $response = ['status' => 1, 'messages' => 'Container has been deleted successfully.'];
            } else {
                $response = ['status' => 0, 'messages' => 'Container has failed to delete.'];
            }

            echo json_encode($response);
        }

        public function delete_item($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('trans_pi_detail', $condition)) {
                $response = ['status' => 1, 'messages' => 'Item has been deleted successfully.'];
            } else {
                $response = ['status' => 0, 'messages' => 'Item has failed to delete.'];
            }

            echo json_encode($response);
        }

        public function process($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/proforma/process.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Process';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'container' => $this->M_CRUD->readData('view_trans_pi_container', ['pi_id' => $id]),
                'category' => $this->M_CRUD->readData('view_print_trans_pi_category', ['pi_id' => $id]),
                'item' => $this->M_CRUD->readData('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
                'summary' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_summary', ['pi_id' => $id]),
                'container_no' => $this->M_CRUD->readData('view_trans_pi_container', ['is_deleted' => '0', 'pi_id' => $id]),
            ];

            if($datas['params']['detail']->pi_status_id == 7) {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','6']]);
            } else {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','5','7']]);
            }

            $this->template->load('default', 'contents' , 'export/proforma/process/index', $datas);
        }

        public function add_process_container($id)
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
                base_url("assets/js/proforma/process_container.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['params'] = [
                'container' => $this->M_CRUD->readDatabyID('view_trans_pi_container', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->readData('master_pi_item_category', ['is_deleted' => '0']),
                'item' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
                'item_detail' => $this->M_CRUD->readData('view_trans_pi_detail_item', ['is_deleted' => '0', 'pi_container_id' => $id]),
                'cbm' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_remain_cbm', ['is_deleted' => '0', 'pi_container_id' => $id]),
            ];
            $this->template->load('default', 'contents' , 'export/proforma/process/items_revise', $datas);
        }

        public function update_process()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'pi_status_id' => $post['status'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('trans_pi', $param, $condition)) {
                $Grid = array();

                foreach($_POST as $index => $value){
                    if(preg_match("/^grid_/i", $index)) {
                        $index = preg_replace("/^grid_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value;
                        if(!isset($Grid[$rnd]['pi_id'])){
                            $Grid[$rnd]['pi_id'] = $post['id'];
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'pi_id' => $detail['pi_id'],
                            'number_of_container' => $detail['container_no'],
                            'pi_item_category_id' => $detail['item_category'],
                            'item_id' => $detail['product'],
                            'hs_code' => $detail['hs_code'],
                            'qty' => $detail['qty'],
                            'price' => $detail['price'],
                            'cbm_item' => $detail['cbm'],
                        ];
                        $this->M_CRUD->insertData('trans_pi_detail', $params);
                    }
                }

                $paramHistory = [
                    'pi_id' => $post['id'],
                    'pi_status_id' => $post['status'],
                    'remark' => ($post['remark']?$post['remark']:NULL),
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];

                $this->M_CRUD->insertData('trans_pi_history', $paramHistory);
                $response = ['status' => 1, 'messages' => 'Proforma invoice has been updated successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function requests($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/proforma/revise.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Process';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('trans_pi', ['is_deleted' => '0', 'id' => $id]),
                'detail_value' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'customer' => $this->M_CRUD->readData('master_customer', ['is_deleted' => '0']),
                'beneficiary' => $this->M_CRUD->readData('master_beneficiary', ['is_deleted' => '0']),
                'load_port' => $this->M_CRUD->readData('master_loading_port', ['is_deleted' => '0']),
                'container' => $this->M_CRUD->readData('master_container', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'container_no' => $this->M_CRUD->readData('view_trans_pi_container', ['is_deleted' => '0', 'pi_id' => $id]),
            ];
            $datas['chained'] = [
                'discharge' => $this->M_CRUD->readData('view_customer_ship_detail', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
                'freight' => $this->M_CRUD->readDatabyID('master_customer_freight', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
                'coding_detail' => $this->M_CRUD->readData('view_master_customer_coding_detail', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
                'coding' => $this->M_CRUD->readDatabyID('master_customer_coding', ['is_deleted' => '0', 'customer_id' => $datas['params']['detail']->customer_id]),
            ];

            if($datas['params']['detail']->pi_status_id == 7) {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','6']]);
            } else {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','5','7']]);
            }

            $this->template->load('default', 'contents' , 'export/proforma/revise/index', $datas);
        }

        public function add_requests_container($id)
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
                base_url("assets/js/proforma/request_container.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['params'] = [
                'container' => $this->M_CRUD->readDatabyID('view_trans_pi_container', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->readData('master_pi_item_category', ['is_deleted' => '0']),
                'item' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
                'item_detail' => $this->M_CRUD->readData('view_trans_pi_detail_item', ['is_deleted' => '0', 'pi_container_id' => $id]),
                'cbm' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_remain_cbm', ['is_deleted' => '0', 'pi_container_id' => $id]),
            ];
            $this->template->load('default', 'contents' , 'export/proforma/revise/items_request', $datas);
        }

        public function insert_requests_container()
        {
            $post = $this->input->post();
            $pi = $this->M_CRUD->readDatabyID('trans_pi_container', ['id' => $post['id']]);
            $Grid = array();
			
            foreach($_POST as $index => $value){
                if(preg_match("/^grid_/i", $index)) {
                    $index = preg_replace("/^grid_/i","",$index);
                    $arr = explode('_',$index);
                    $rnd = $arr[count($arr)-1];
                    array_pop($arr);
                    $idx = implode('_',$arr);
                    
                    $Grid[$rnd][$idx] = $value;
                    if(!isset($Grid[$rnd]['pi_id'])){
                        $Grid[$rnd]['pi_id'] = $post['id'];
                    }
                }
            }

            if(!empty($Grid)) {
                foreach($Grid as $detail) {
                    $params = [
                        'pi_container_id' => $detail['container'],
                        'pi_item_category_id' => $detail['item_category'],
                        'item_id' => $detail['product'],
                        'hs_code' => $detail['hs_code'],
                        'qty' => $detail['qty'],
                        'price' => $detail['price'],
                        'cbm_item' => $detail['cbm'],
                    ];
                    $this->M_CRUD->insertData('trans_pi_detail', $params);
                }

                $response = ['status' => 1, 'messages' => 'Container has been saved successfully.', 'icon' => 'success', 'url' => 'export/proforma/requests/'.$pi->pi_id];
            } else {
                $response = ['status' => 0, 'messages' => 'Container has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function revise()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'pi_status_id' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('trans_pi', $param, $condition)) {
                $Grid = array();

                foreach($_POST as $index => $value){
                    if(preg_match("/^grid_/i", $index)) {
                        $index = preg_replace("/^grid_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value;
                        if(!isset($Grid[$rnd]['pi_id'])){
                            $Grid[$rnd]['pi_id'] = $post['id'];
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'pi_id' => $post['id'],
                            'container_id' => $detail['containers'],
                            'number_of_container' => $detail['container_no'],
                        ];
                        $this->M_CRUD->insertData('trans_pi_container', $params);
                    }
                }

                $paramHistory = [
                    'pi_id' => $post['id'],
                    'pi_status_id' => 1,
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];

                $this->M_CRUD->insertData('trans_pi_history', $paramHistory);
                $response = ['status' => 1, 'messages' => 'Proforma invoice has been updated successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }




        public function edit($id)
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/proforma/edit.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'container' => $this->M_CRUD->readData('view_print_trans_pi_container', ['pi_id' => $id]),
                'category' => $this->M_CRUD->readData('view_print_trans_pi_category', ['pi_id' => $id]),
                'item' => $this->M_CRUD->readData('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
                'summary' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_summary', ['pi_id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/proforma/edit/index', $datas);
        }

        public function edit_procurement()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $params = [
                'freight_cost' => $post['freight_cost'],
                'insurance' => $post['insurance'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('trans_pi', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'Proforma invoice has been updated successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>