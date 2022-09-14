<?php

    Class Invoice extends CI_Controller
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
                base_url("assets/js/invoice/list.js"),
            ];
            $datas['title'] = 'Export - Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Invoice'];
            $datas['header'] = 'Invoice list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_invoice_list')
            ];

            $this->template->load('default', 'contents' , 'export/invoice/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/invoice/add.js"),
            ];
            $datas['title'] = 'Export - Invoice';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Invoice'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberInvoice('trans_invoice', 'code', '/SKP-EXT/INV/'.date('m/Y'), 4),
                'pi' => $this->M_CRUD->readData('view_trans_pi_invoice'),
            ];

            $this->template->load('default', 'contents' , 'export/invoice/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();

            $params = [
                'pi_id' => $post['pi_no'],
                'code' => $post['code'],
                'ffrn' => ($post['po_no']?$post['po_no']:NULL),
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->insertData('trans_invoice', $params)) {
                $response = ['status' => 1, 'messages' => 'Invoice has been saved successfully.', 'icon' => 'success', 'url' => 'export/invoice'];
            } else {
                $response = ['status' => 0, 'messages' => 'Invoice has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>