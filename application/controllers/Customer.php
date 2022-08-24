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
                'list' => $this->M_CRUD->readData('master_customer', ['is_deleted' => '0'])
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
                // 'autonumber' => $this->M_CRUD->autoNumber('master_customer', 'code', '8801', 'IDN', 4),
                'country' => $this->M_CRUD->readData('master_country', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'top' => $this->M_CRUD->readData('master_top', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD->readData('master_incoterm', ['is_deleted' => '0']),
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
            $autonumber = $this->M_CRUD->autoNumber('master_customer', 'code', '8801', $country->code, 4);
            
            /** consignee */
            $paramConsignee = [
                'code' => $autonumber,
                'company_name' => $post['con_company'],
                'address' => $post['con_address'],
                'country_id' => $post['con_country'],
                'phone_no' => $post['con_phone'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $customer = $this->M_CRUD->insertData('master_customer', $paramConsignee);
            
            if($customer) {
                $paramNotify = [
                    'customer_id' => $customer,
                    'company_name' => $post['not_company'],
                    'address' => $post['not_address'],
                    'country_id' => $post['not_country_id'],
                    'phone_no' => $post['con_phone'],
                ];

                if($this->M_CRUD->insertData('master_customer_notify', $paramNotify)) {
                    $response = ['status' => 1, 'messages' => 'Customer has been saved successfully.', 'icon' => 'success', 'url' => 'export/customer'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
                }
            } else {
                $response = ['status' => 0, 'messages' => 'Customer has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {

        }

        public function update()
        {

        }

        public function delete($id)
        {

        }
    }

?>