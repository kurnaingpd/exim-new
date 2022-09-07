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
                'list' => $this->M_CRUD->readData('view_trans_pi_list', ['is_deleted' => '0'])
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
                'country' => $this->M_CRUD->readData('master_country', ['is_deleted' => '0']),
                'beneficiary' => $this->M_CRUD->readData('master_beneficiary', ['is_deleted' => '0']),
                'load_port' => $this->M_CRUD->readData('master_loading_port', ['is_deleted' => '0']),
                'container' => $this->M_CRUD->readData('master_container', ['is_deleted' => '0']),
                'bank' => $this->M_CRUD->readData('master_bank', ['is_deleted' => '0']),
                'currency' => $this->M_CRUD->readData('master_currency', ['is_deleted' => '0']),
                'category' => $this->M_CRUD->readData('master_pi_item_category', ['is_deleted' => '0']),
                'item' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
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

        public function discharge($cust_id = NULL)
        {
            $data = $this->M_CRUD->readData('view_customer_ship_detail', ['is_deleted' => '0', 'customer_id' => $cust_id]);
            echo json_encode($data);
        }

        public function destination($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_customer_ship_detail', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function cbm($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('master_container', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function item($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('master_item', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function coding($id = NULL)
        {
            $data = $this->M_CRUD->readData('view_customer_coding', ['is_deleted' => '0', 'customer_id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['pi_code'],
                'po_no' => ($post['pi_po']?$post['pi_po']:NULL),
                'customer_id' => $post['pi_consignee'],
                'consignee_id' => $post['pi_consignee'],
                'beneficiary_id' => $post['pi_beneficiary'],
                'loading_port_id' => $post['loading_port'],
                'customer_ship_id' => $post['discharge_port'],
                'container_id' => $post['container'],
                'number_of_container' => $post['container_no'],
                'freight_company' => $post['freight_company'],
                'freight_company_contact' => $post['freight_company_cont'],
                'freight_company_no' => $post['freight_company_no'],
                'freight_cost' => $post['freight_cost'],
                'insurance' => $post['insurance'],
                'bank_id' => $post['bank'],
                'currency_id' => $post['currency'],
                'ppn' => $post['ppn'],
                'top_id' => $post['top_id'],
                'pi_status_id' => 1,
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $header = $this->M_CRUD->insertData('trans_pi', $params);

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
                        if(!isset($Grid[$rnd]['pi_id'])){
                            $Grid[$rnd]['pi_id'] = $header;
                        }
                    }
                }

                if(!empty($Grid)) {
                    foreach($Grid as $detail) {
                        $params = [
                            'pi_id' => $detail['pi_id'],
                            'pi_item_category_id' => $detail['item_category'],
                            'item_id' => $detail['product'],
                            'qty' => $detail['qty'],
                            'price' => $detail['price'],
                        ];
                        $this->M_CRUD->insertData('trans_pi_detail', $params);
                    }
                }

                $paramHistory = [
                    'pi_id' => $header,
                    'pi_status_id' => 1,
                    'remark' => ($post['remark']?$post['remark']:NULL),
                ];
                $this->M_CRUD->insertData('trans_pi_history', $paramHistory);
                
                $response = ['status' => 1, 'messages' => 'Proforma invoice: '.$post['pi_code'].' has been saved successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Container has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/container/detail.js"),
            ];
            $datas['title'] = 'Export - Proforma Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Proforma Invoice'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->pi_category('view_print_category_trans_pi', ['pi_id' => $id]),
                'item' => $this->M_CRUD->pi_item('view_print_detail_trans_pi', ['is_deleted' => '0', 'pi_id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/proforma/detail/index', $datas);
        }

        // public function update()
        // {

        // }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('trans_pi', $condition)) {
                $response = ['status' => 1, 'messages' => 'Proforma invoice has been deleted successfully.', 'icon' => 'success', 'url' => 'export/proforma'];
            } else {
                $response = ['status' => 0, 'messages' => 'Proforma invoice has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>