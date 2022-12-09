<?php

    Class DocPayment extends CI_Controller
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
                base_url("assets/js/docpayment/list.js"),
            ];
            $datas['title'] = 'Import - Document PIB Payment';
            $datas['breadcrumb'] = ['Import', 'Transaction', 'Document PIB Payment'];
            $datas['header'] = 'Document PIB payment list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_doc_pib_payment', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'import/docpayment/list', $datas);
        }

        public function add()
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
                base_url("assets/js/docpayment/add.js"),
            ];
            $datas['title'] = 'Import - Document PIB Payment';
            $datas['breadcrumb'] = ['Import', 'Transaction', 'Document PIB Payment'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'code' => $this->M_CRUD->autoNumberDocImport('trans_doc_pib_payment', 'code', '/SKP-PIB/'.date('m/Y'), 4),
                'po' => $this->M_CRUD->readData('view_trans_doc_import_po', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'import/docpayment/add', $datas);
        }

        public function datas($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_trans_doc_import_pib_payment', ['is_deleted' => '0', 'id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['code'],
                'doc_import_id' => $post['po'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->insertData('trans_doc_pib_payment', $params)) {
                $response = ['status' => 1, 'messages' => 'Document PIB payment has been saved successfully.', 'icon' => 'success', 'url' => 'import/docpayment'];
            } else {
                $response = ['status' => 0, 'messages' => 'Document PIB payment has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {

        }

        public function delete($id)
        {
            $condition = ['id' => $id];

            if($this->M_CRUD->deletePermanent('trans_doc_pib_payment', $condition)) {
                $response = ['status' => 1, 'messages' => 'Document PIB payment has been deleted successfully.', 'icon' => 'success', 'url' => 'import/docpayment'];
            } else {
                $response = ['status' => 0, 'messages' => 'Document PIB payment has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function excel()
        {
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_doc_pib_payment_xls', ['is_deleted' => '0']),
            ];
            $this->load->view('import/docpayment/excel', $datas);
        }
    }

?>