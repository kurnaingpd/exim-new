<?php

    Class Incoterm extends CI_Controller
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
                base_url("assets/js/export/incoterm/list.js"),
            ];
            $datas['title'] = 'Export - Incoterm';
            $datas['breadcrumb'] = ['Export', 'Master', 'Incoterm'];
            $datas['header'] = 'Incoterm list';
            $datas['params'] = [
                'list' => $this->M_CRUD_Exp->readData('view_master_incoterm')
            ];

            $this->template->load('default', 'contents' , 'export/incoterm/list', $datas);
        }

        public function add()
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/incoterm/add.js"),
            ];
            $datas['title'] = 'Export - Incoterm';
            $datas['breadcrumb'] = ['Export', 'Master', 'Incoterm'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'export/incoterm/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $incoterm = $this->M_CRUD_Exp->readDatabyID('master_incoterm', ['code' => $post['code'], 'is_deleted' => '0']);
            
            if($incoterm) {
                $response = ['status' => 0, 'messages' => 'Incoterm code already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'code' => $post['code'],
                    'name' => ucwords($post['description']),
                    'created_by' => $this->session->userdata('logged_in')->id
                ];
                
                if($this->M_CRUD_Exp->insertData('master_incoterm', $param)) {
                    $response = ['status' => 1, 'messages' => 'Incoterm has been saved successfully.', 'icon' => 'success', 'url' => 'export/master/incoterm'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Incoterm has failed to save.', 'icon' => 'error'];
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
                base_url("assets/js/export/incoterm/detail.js"),
            ];
            $datas['title'] = 'Export - Incoterm';
            $datas['breadcrumb'] = ['Export', 'Master', 'Incoterm'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD_Exp->readDatabyID('master_incoterm', ['is_deleted' => '0', 'id' => $id]),
            ];
            
            $this->template->load('default', 'contents' , 'export/incoterm/detail', $datas);
        }
        
        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'name' => ucwords($post['description']),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id
            ];
            
            if($this->M_CRUD_Exp->updateData('master_incoterm', $param, $condition)) {
                $response = ['status' => 1, 'messages' => 'Incoterm has been updated successfully.', 'icon' => 'success', 'url' => 'export/master/incoterm'];
            } else {
                $response = ['status' => 0, 'messages' => 'Incoterm has failed to update.', 'icon' => 'error'];
            }
            
            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            $incoterm = $this->M_CRUD_Exp->readDatabyID('master_incoterm', ['id' => $id]);
            $status = ($incoterm->is_deleted == '1'?'0':'1');
            
            if($this->M_CRUD_Exp->updateData('master_incoterm', ['is_deleted' => $status], $condition)) {
                $response = ['status' => 1, 'messages' => 'Incoterm has been deleted successfully.', 'icon' => 'success', 'url' => 'export/master/incoterm'];
            } else {
                $response = ['status' => 0, 'messages' => 'Incoterm has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>