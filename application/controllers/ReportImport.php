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

        // public function list()
        // {
        //     $column_order = [
        //         'po_no', 'shipment_no', 'shipper', 'seller', 'consignee', 'commodity', 'category', 'hs_code', 'lartas', 'incoterm', 'hbl', 'mbl', 'qty_container', 'container_no', 'goods_qty', 'uom', 
        //         'gross_weight', 'net_weight', 'cbm', 'pol', 'pod', 'etd', 'eta', 'pib_aju', 'coo', 'master_list', 'rcvd_ori_doc', 'billing', 'spjm', 'spjk', 'sppb', 'pickup_do', 'delivery', 'remarks', 'currency', 'cif',
        //         'duty', 'vat', 'tax', 'freight', 'handling', 'at_cost', 'additional', 'lead_time', 'time', 'percent', 'cif2', 'landed_cost', 'percentage', 'forwarder'
        //     ];
        //     $column_search = ['po_no', 'shipment_no', 'shipper', 'seller', 'consignee', 'commodity', 'category', 'hs_code', 'lartas', 'incoterm', 'hbl', 'mbl', 'qty_container', 'container_no', 'goods_qty', 'uom', 
        //         'gross_weight', 'net_weight', 'cbm', 'pol', 'pod', 'etd', 'eta', 'pib_aju', 'coo', 'master_list', 'rcvd_ori_doc', 'billing', 'spjm', 'spjk', 'sppb', 'pickup_do', 'delivery', 'remarks', 'currency', 'cif',
        //         'duty', 'vat', 'tax', 'freight', 'handling', 'at_cost', 'additional', 'lead_time', 'time', 'percent', 'cif2', 'landed_cost', 'percentage', 'forwarder'
        //     ];
        //     $order_by = [];
        //     $list = $this->M_CRUD->get_datatables('view_trans_doc_import_xls', $column_order, $column_search, $order_by);
        //     $data = array();
        //     $no = $_POST['start'];
        //     foreach ($list as $import) {
        //         $no++;
        //         $row = array();
        //         $row[] = $no.'.';
        //         $row[] = $import->po_no;
        //         $row[] = $import->shipment_no;
        //         $row[] = $import->shipper;
        //         $row[] = $import->seller;
        //         $row[] = $import->consignee;
        //         $row[] = $import->commodity;
        //         $row[] = $import->category;
        //         $row[] = $import->hs_code;
        //         $row[] = $import->lartas;
        //         $row[] = $import->incoterm;
        //         $row[] = $import->hbl;
        //         $row[] = $import->mbl;
        //         $row[] = $import->qty_container;
        //         $row[] = $import->container_no;
        //         $row[] = $import->goods_qty;
        //         $row[] = $import->uom;
        //         $row[] = $import->gross_weight;
        //         $row[] = $import->net_weight;
        //         $row[] = $import->cbm;
        //         $row[] = $import->pol;
        //         $row[] = $import->pod;
        //         $row[] = $import->etd;
        //         $row[] = $import->eta;
        //         $row[] = $import->pib_aju;
        //         $row[] = $import->coo;
        //         $row[] = $import->master_list;
        //         $row[] = $import->rcvd_ori_doc;
        //         $row[] = $import->billing;
        //         $row[] = $import->spjm;
        //         $row[] = $import->spjk;
        //         $row[] = $import->sppb;
        //         $row[] = $import->pickup_do;
        //         $row[] = $import->delivery;
        //         $row[] = $import->remarks;
        //         $row[] = number_format($import->currency, 2);
        //         $row[] = number_format($import->cif, 2);
        //         $row[] = $import->duty;
        //         $row[] = round($import->vat, 2);
        //         $row[] = round($import->tax, 2);
        //         $row[] = round($import->freight, 2);
        //         $row[] = number_format($import->handling, 2);
        //         $row[] = number_format($import->at_cost, 2);
        //         $row[] = $import->additional;
        //         $row[] = round($import->lead_time, 2);
        //         $row[] = $import->time;
        //         $row[] = round($import->percent, 4);
        //         $row[] = number_format($import->cif2, 2);
        //         $row[] = number_format($import->landed_cost, 2);
        //         $row[] = round($import->percentage, 2);
        //         $row[] = $import->forwarder;
        //         $data[] = $row;
        //     }
    
        //     $output = [
        //         "draw" => $_POST['draw'],
        //         "recordsTotal" => $this->M_CRUD->count_all('view_trans_doc_import_xls'),
        //         "recordsFiltered" => $this->M_CRUD->count_filtered('view_trans_doc_import_xls', $column_order, $column_search, $order_by),
        //         "data" => $data,
        //     ];

        //     echo json_encode($output);
        // }

        public function html()
        {
            $get = $this->input->post();

            if($get['po']) {
                $condition['po_no'] = $get['po'];
            }

            if($get['delivery']) {
                $condition['delivery'] = $get['delivery'];
            }

            if($get['consignee']) {
                $condition['consignee_id'] = $get['consignee'];
            }

            if($get['category']) {
                $condition['category_id'] = $get['category'];
            }

            if($get['shipper']) {
                $condition['shipper_id'] = $get['shipper'];
            }

            if($get['forwarder']) {
                $condition['forwarder_id'] = $get['forwarder'];
            }
            
            $query = $this -> M_CRUD -> readData("view_trans_doc_import_xls", $condition);
            echo json_encode($query);
        }
    }

?>