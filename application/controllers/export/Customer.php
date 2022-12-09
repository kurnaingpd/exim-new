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
                // 'import_bill' => $this->M_CRUD_Exp->readData('master_import_doc_option', ['flag' => '1', 'is_deleted' => '0']),
                // 'import_nonbill' => $this->M_CRUD_Exp->readData('master_import_doc_option', ['flag' => '2', 'is_deleted' => '0']),
                // 'coding' => $this->M_CRUD_Exp->readData('master_coding_type', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'export/customer/add/index', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $country = $this->M_CRUD_Exp->readDatabyID('master_country', ['is_deleted' => '0', 'id' => $post['con_country']]);
            $autonumber = $this->M_CRUD_Exp->autoNumberCustomer('master_customer', 'code', '8801', $country->code, 4);

            if($post) {
                $paramConsignee = [
                    'code' => $autonumber,
                    'name' => $post['con_company'],
                    'address' => $post['con_address'],
                    'town' => $post['con_town'],
                    'country_id' => $post['con_country'],
                    'phone_no_tel' => $post['con_phone_tel'],
                    'phone_no_fax' => ($post['con_phone_fax']?$post['con_phone_fax']:NULL),
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];

                $customer = $this->M_CRUD_Exp->insertData('master_customer', $paramConsignee);

                if($customer) {
                    /** Notify */
                    $this->saveNotify($post, $customer);
                    /** Contact person */
                    $this->saveContactPerson($post, $customer);

                    $response = ['status' => 1, 'messages' => 'Customer has been saved successfully.', 'icon' => 'success', 'url' => 'export/master/customer'];
                }
                
                // if($this->M_CRUD_Exp->insertData('master_customer', $paramConsignee)) {
                // } else {
                //     $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
                // }
    
                echo json_encode($response);
            }
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