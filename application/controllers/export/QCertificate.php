<?php

    Class QCertificate extends CI_Controller
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
                base_url("assets/js/qcertificate/list.js"),
            ];
            $datas['title'] = 'Export - Quality Certificate';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Quality Certificate'];
            $datas['header'] = 'Quality Certificate';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_qcertificate_list')
            ];

            $this->template->load('default', 'contents' , 'export/qcertificate/list', $datas);
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
                base_url("assets/js/qcertificate/add.js"),
            ];
            $datas['title'] = 'Export - Quality Certificate';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Quality Certificate'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberQCert('trans_qcertificate', 'code', '/SKP-QS/'.date('m/Y'), 4),
                'coa' => $this->M_CRUD->readData('view_trans_qcertificate_coa'),
            ];

            $this->template->load('default', 'contents' , 'export/qcertificate/add', $datas);
        }

        public function coa($id = NULL)
        {
            $data = $this->M_CRUD->readDatabyID('view_trans_qcertificate_coa', ['id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'code' => $post['code'],
                'coa_id' => $post['qa'],
                'invoice_id' => $post['invoice_id'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->insertData('trans_qcertificate', $params)) {
                $response = ['status' => 1, 'messages' => 'Quality certificate has been saved successfully.', 'icon' => 'success', 'url' => 'export/qcertificate'];
            } else {
                $response = ['status' => 0, 'messages' => 'Quality certificate has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>