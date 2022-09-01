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
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_customer_list', ['is_deleted' => '0'])
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
                'beneficiary' => $this->M_CRUD->readData('master_beneficiary', ['is_deleted' => '0']),
                'load_port' => $this->M_CRUD->readData('master_loading_port', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'export/proforma/add/index', $datas);
        }

        public function customer($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_customer_cp', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function beneficiary($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_beneficiary', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {

        }
    }

?>