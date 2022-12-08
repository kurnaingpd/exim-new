<?php

    Class Bank extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD_Exp']);
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
                base_url("assets/js/export/bank/list.js"),
            ];
            $datas['title'] = 'Export - Bank';
            $datas['breadcrumb'] = ['Export', 'Master', 'Bank'];
            $datas['header'] = 'Bank list';
            $datas['params'] = [
                'list' => $this->M_CRUD_Exp->readData('view_master_bank')
            ];

            $this->template->load('default', 'contents' , 'export/bank/list', $datas);
        }

        public function add()
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/bank/add.js"),
            ];
            $datas['title'] = 'Export - Bank';
            $datas['breadcrumb'] = ['Export', 'Master', 'Bank'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'export/bank/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $bank_code = $this->M_CRUD_Exp->readDatabyID('master_bank', ['is_deleted' => '0', 'code' => $post['code']]);
            $bank_swift = $this->M_CRUD_Exp->readDatabyID('master_bank', ['is_deleted' => '0', 'swift_code' => $post['swift']]);

            if($bank_code) {
                $response = ['status' => 0, 'messages' => 'Bank code already exist.', 'icon' => 'error'];
            } elseif($bank_swift) {
                $response = ['status' => 0, 'messages' => 'Bank swift code already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'code' => $post['code'],
                    'name' => $post['names'],
                    'account' => $post['account'],
                    'branch' => $post['branch'],
                    'address' => $post['address'],
                    'swift_code' => $post['swift'],
                    'created_by' => $this->session->userdata('logged_in')
                ];

                if($this->M_CRUD_Exp->insertData('master_bank', $param)) {
                    $response = ['status' => 1, 'messages' => 'Bank has been saved successfully.', 'icon' => 'success', 'url' => 'export/master/bank'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Bank has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/bank/detail.js"),
            ];
            $datas['title'] = 'Export - Bank';
            $datas['breadcrumb'] = ['Export', 'Master', 'Bank'];
            $datas['header'] = 'Edit record';
            $datas['params'] = [
                'detail' => $this->M_CRUD_Exp->readDatabyID('master_bank', ['is_deleted' => '0', 'id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/bank/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'name' => $post['names'],
                'account' => $post['account'],
                'branch' => $post['branch'],
                'address' => $post['address'],
                'swift_code' => $post['swift'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id
            ];

            if($this->M_CRUD_Exp->updateData('master_bank', $param, $condition)) {
                $response = ['status' => 1, 'messages' => 'Bank has been updated successfully.', 'icon' => 'success', 'url' => 'export/master/bank'];
            } else {
                $response = ['status' => 0, 'messages' => 'Bank has failed to update.', 'icon' => 'error'];
            }
            
            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            $bank = $this->M_CRUD_Exp->readDatabyID('master_bank', ['id' => $id]);
            $status = ($bank->is_deleted == '1'?'0':'1');
            
            if($this->M_CRUD_Exp->updateData('master_bank', ['is_deleted' => $status], $condition)) {
                $response = ['status' => 1, 'messages' => 'Bank has been deleted successfully.', 'icon' => 'success', 'url' => 'export/master/bank'];
            } else {
                $response = ['status' => 0, 'messages' => 'Bank has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>