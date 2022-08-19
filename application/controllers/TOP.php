<?php

    Class TOP extends CI_Controller
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
                base_url("assets/js/top/list.js"),
            ];
            $datas['title'] = 'Export - Terms Of Payment';
            $datas['breadcrumb'] = ['Export', 'Master', 'Terms Of Payment'];
            $datas['header'] = 'Terms of payment list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('master_top', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'export/top/list', $datas);
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
                base_url("assets/js/top/add.js"),
            ];
            $datas['title'] = 'Export - Terms Of Payment';
            $datas['breadcrumb'] = ['Export', 'Master', 'Terms Of Payment'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'export/top/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $param = [
                'name' => $post['top']
            ];

            if($this->M_CRUD->insertData('master_top', $param)) {
                $response = ['status' => 1, 'messages' => 'Terms of payment has been saved successfully.', 'icon' => 'success', 'url' => 'export/top'];
            } else {
                $response = ['status' => 0, 'messages' => 'Terms of payment has failed to save.', 'icon' => 'error'];
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
                base_url("assets/js/top/detail.js"),
            ];
            $datas['title'] = 'Export - Terms Of Payment';
            $datas['breadcrumb'] = ['Export', 'Master', 'Terms Of Payment'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_top', ['is_deleted' => '0', 'id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/top/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $param = [
                'name' => $post['top'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $condition = [
                'id' => $id
            ];

            if($this->M_CRUD->updateData('master_top', $param, $condition)) {
                $respponse = ['status' => 1, 'messages' => 'Terms of payment has been updated successfully.', 'icon' => 'success', 'url' => 'export/top'];
            } else {
                $respponse = ['status' => 0, 'messages' => 'Terms of payment has failed to save.', 'icon' => 'error'];
            }
            
            echo json_encode($respponse);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_top', $condition)) {
                $response = ['status' => 1, 'messages' => 'Terms of payment has been deleted successfully.', 'icon' => 'success', 'url' => 'export/top'];
            } else {
                $response = ['status' => 0, 'messages' => 'Terms of payment has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>