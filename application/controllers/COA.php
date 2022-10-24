<?php

    Class COA extends CI_Controller
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
                base_url("assets/js/coa/list.js"),
            ];
            $datas['title'] = 'Export - Certificate Of Analysys';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Certificate Of Analysys'];
            $datas['header'] = 'Certificate Of Analysys';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_coa_list')
            ];

            $this->template->load('default', 'contents' , 'export/coa/list', $datas);
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
                base_url("assets/js/coa/add.js"),
            ];
            $datas['title'] = 'Export - Certificate Of Analysys';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Certificate Of Analysys'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberCOA('trans_coa', 'code', '/'.date('m/Y').'/', 4),
                'invoice' => $this->M_CRUD->readData('view_trans_coa_invoice'),
                'item' => $this->M_CRUD->readData('view_trans_coa_item'),
            ];

            $this->template->load('default', 'contents' , 'export/coa/add/index', $datas);
        }

        public function country($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_trans_coa_country', ['id' => $id]);
            echo json_encode($data);
        }

        public function item($id = NULL)
        {
            $data = $this->M_CRUD->readData('view_trans_coa_item', ['invoice_id' => $id]);
            echo json_encode($data);
        }

        public function batch($id = NULL)
        {
            $data = $this->M_CRUD->readData('view_trans_coa_batch', ['item_id' => $id]);
            echo json_encode($data);
        }

        public function qcheck($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('trans_qcontrol_check', ['is_deleted' => '0', 'item_id' => $id]);
            echo json_encode($data);
        }

        public function tanggal($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_trans_coa_batch', ['id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['code'],
                'invoice_id' => $post['invoice'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $header = $this->M_CRUD->insertData('trans_coa', $params);

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
                        if(!isset($Grid[$rnd]['coa_id'])){
                            $Grid[$rnd]['coa_id'] = $header;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'coa_id' => $header,
                            'item_id' => $detail['product'],
                            'packing_list_detail_id' => $detail['batch'],
                            'qc_check_id' => $detail['qcheck_id'],
                            'mercury' => $detail['mercury'],
                            'lead' => $detail['lead'],
                            'cadmium' => $detail['cadmium'],
                            'tin' => $detail['tin'],
                            'arsenic' => $detail['arsenic'],
                        ];
                        $this->M_CRUD->insertData('trans_coa_detail', $params);
                    }
                    $response = ['status' => 1, 'messages' => 'COA has been saved successfully.', 'icon' => 'success', 'url' => 'export/coa'];
                } else {
                    $response = ['status' => 0, 'messages' => 'COA has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }
    }

?>