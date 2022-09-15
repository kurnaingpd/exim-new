<?php

    Class Packing extends CI_Controller
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
                base_url("assets/js/packing/list.js"),
            ];
            $datas['title'] = 'Export - Packing';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Packing'];
            $datas['header'] = 'Packing';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_packing_list')
            ];

            $this->template->load('default', 'contents' , 'export/packing/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/packing/add.js"),
            ];
            $datas['title'] = 'Export - Packing';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Packing'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberPacking('trans_packing_list', 'code', '/SKP-PL/'.date('m/Y'), 4),
                'invoice' => $this->M_CRUD->readData('view_trans_pi_packing'),
            ];

            $this->template->load('default', 'contents' , 'export/packing/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['code'],
                'invoice_id' => $post['invoice'],
                'dates' => $post['pack_date'],
                'container' => $post['container'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $header = $this->M_CRUD->insertData('trans_packing_list', $params);

            if($header) {
                $paramsFilter = [
                    'packing_list_id' => $header,
                ];
                $this->M_CRUD->insertData('trans_packing_inv_filter', $paramsFilter);
                $response = ['status' => 1, 'messages' => 'Packing has been saved successfully.', 'icon' => 'success', 'url' => 'export/packing'];
            } else {
                $response = ['status' => 0, 'messages' => 'Packing check has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>