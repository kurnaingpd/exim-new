<?php

    Class ReportImport extends CI_Controller
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
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                "https://cdn.jsdelivr.net/npm/flatpickr",
                "//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js",
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/datatables/jquery.dataTables.min.js"),
                base_url("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/jszip/jszip.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/report_import/index.js"),
            ];
            $datas['title'] = 'Import - Import(s)';
            $datas['breadcrumb'] = ['Import', 'Report', 'Import(s)'];
            $datas['header'] = 'Navigation';
            $datas['params'] = [
                'po' => $this->M_CRUD->readData('view_trans_doc_import_nav_po'),
                'consignee' => $this->M_CRUD->readData('master_consignee', ['is_deleted' => '0']),
                'category' => $this->M_CRUD->readData('master_category', ['is_deleted' => '0']),
                'shipper' => $this->M_CRUD->readData('master_shipper', ['is_deleted' => '0']),
                'forwarder' => $this->M_CRUD->readData('master_forwarder', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'import/report_import/index', $datas);
        }

        public function html()
        {
            $get = $this->input->post();

            if(($get['po'])) {
                $condition['po_no'] = $get['po'];
            }

            if(($get['delivery'])) {
                $condition['delivery'] = $get['delivery'];
            }

            if(($get['consignee'])) {
                $condition['consignee_id'] = $get['consignee'];
            }

            if(($get['category'])) {
                $condition['category_id'] = $get['category'];
            }

            if(($get['shipper'])) {
                $condition['shipper_id'] = $get['shipper'];
            }

            if(($get['forwarder'])) {
                $condition['forwarder_id'] = $get['forwarder'];
            }

            if(isset($condition)) {
                $query = $this -> M_CRUD -> readData("view_trans_doc_import_xls", $condition);
            } else {
                $query = $this -> M_CRUD -> readData("view_trans_doc_import_xls");
            }

            echo json_encode($query);
        }
    }

?>