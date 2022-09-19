<?php

    Class SPP extends CI_Controller
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
                base_url("assets/js/spp/list.js"),
            ];
            $datas['title'] = 'Export - Product Statement Letter';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Product Statement Letter'];
            $datas['header'] = 'Product Statement Letter';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_spp_list')
            ];

            $this->template->load('default', 'contents' , 'export/spp/list', $datas);
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
                base_url("assets/js/spp/add.js"),
            ];
            $datas['title'] = 'Export - Quality Certificate';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Quality Certificate'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberSPP('trans_spp', 'code', '/SKP-SPP/'.date('m/Y'), 4),
                'invoice' => $this->M_CRUD->readData('view_trans_spp_invoice'),
            ];

            $this->template->load('default', 'contents' , 'export/spp/add/index', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['code'],
                'invoice_id' => $post['invoice'],
                'name' => ucwords($post['fullname']),
                'position' => ucwords($post['position']),
                'description' => $post['notes'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $header = $this->M_CRUD->insertData('trans_spp', $params);

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
                        if(!isset($Grid[$rnd]['spp_id'])){
                            $Grid[$rnd]['spp_id'] = $header;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'spp_id' => $header,
                            'name_local' => $detail['l_trade'],
                            'type_local' => $detail['l_type'],
                            'md_no_local' => $detail['l_md_no'],
                            'name_export' => $detail['e_trade'],
                            'type_export' => $detail['e_type'],
                        ];
                        $this->M_CRUD->insertData('trans_spp_detail', $params);
                    }
                    $response = ['status' => 1, 'messages' => 'Product statement letter has been saved successfully.', 'icon' => 'success', 'url' => 'export/spp'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Product statement letter has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }
    }

?>