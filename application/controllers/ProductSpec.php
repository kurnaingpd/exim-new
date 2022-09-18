<?php

    Class ProductSpec extends CI_Controller
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
                base_url("assets/js/prodspec/list.js"),
            ];
            $datas['title'] = 'Export - Product Specification';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Product Specification'];
            $datas['header'] = 'Product Specification';
            // $datas['params'] = [
            //     'list' => $this->M_CRUD->readData('view_trans_packing_list')
            // ];

            $this->template->load('default', 'contents' , 'export/prodspec/list', $datas);
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
                base_url("assets/js/prodspec/add.js"),
            ];
            $datas['title'] = 'Export - Product Specification';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Product Specification'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberProdSpec('trans_prod_spec', 'code', '/SKP-PRDSPEC/'.date('m/Y'), 4),
                'invoice' => $this->M_CRUD->readData('view_trans_prodspec_invoice'),
                'item' => $this->M_CRUD->readData('view_trans_coa_item'),
            ];

            $this->template->load('default', 'contents' , 'export/prodspec/add/index', $datas);
        }

        public function save()
        {

        }
    }

?>