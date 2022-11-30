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
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_prodspec_list')
            ];

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
            ];

            $this->template->load('default', 'contents' , 'export/prodspec/add/index', $datas);
        }

        public function po($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('trans_invoice', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function item($id = NULL)
        {
            $data = $this->M_CRUD->readData('view_trans_prodspec_item', ['invoice_id' => $id]);
            echo json_encode($data);
        }

        public function batch($invoice = NULL, $item = NULL)
        {
            $data = $this->M_CRUD->readData('view_trans_prodspec_batch', ['invoice_id' => $invoice, 'item_id' => $item]);
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
            $header = $this->M_CRUD->insertData('trans_prod_spec', $params);

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
                        if(!isset($Grid[$rnd]['prod_spec_id'])){
                            $Grid[$rnd]['prod_spec_id'] = $header;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'prod_spec_id' => $header,
                            'item_id' => $detail['product'],
                            'qcontrol_check_id' => $detail['batch'],
                            // 'description' => $detail['desc'],
                            // 'form' => $detail['form'],
                            // 'texture' => $detail['texture'],
                            // 'colour' => $detail['colour'],
                            // 'taste' => $detail['taste'],
                            // 'odour' => $detail['odour'],
                            // 'fat' => $detail['fat'],
                            // 'moisture' => $detail['moisture'],
                            // 'caffeine' => $detail['caffeine'],
                            // 'ingredients' => $detail['ingredients'],
                            // 'product_shelf' => $detail['product_shelf'],
                            // 'packaging' => $detail['packaging'],
                            // 'storage' => $detail['storage'],
                            // 'functions' => $detail['functions'],
                            // 'usage' => $detail['usage'],
                            // 'source' => $detail['source'],
                            // 'country' => $detail['country'],
                        ];
                        $this->M_CRUD->insertData('trans_prod_spec_detail', $params);
                    }
                    $response = ['status' => 1, 'messages' => 'Product specification has been saved successfully.', 'icon' => 'success', 'url' => 'export/prodspec'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Product specification has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }
    }

?>