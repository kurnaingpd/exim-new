<?php

    Class ReportCost extends CI_Controller
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
                base_url("assets/js/report_cost/index.js"),
            ];
            $datas['title'] = 'Import - Cost leadtime';
            $datas['breadcrumb'] = ['Import', 'Report', 'Cost leadtime'];
            $datas['header'] = 'Navigation';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_doc_import_rpt_cost'),
            ];

            $this->template->load('default', 'contents' , 'import/report_cost/index', $datas);
        }

        public function html()
        {
            $get = $this->input->post();

            if(isset($get['year'])) {
                $condition['tahun'] = $get['year'];
            }

            $query = $this -> M_CRUD -> readData("view_trans_doc_import_rpt_cost", $condition);
            echo json_encode($query);
        }
    }

?>