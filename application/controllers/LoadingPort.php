<?php

    Class LoadingPort extends CI_Controller
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
                base_url("assets/js/loading_port/list.js"),
            ];
            $datas['title'] = 'Export - Loading Port';
            $datas['breadcrumb'] = ['Export', 'Master', 'Loading Port'];
            $datas['header'] = 'Loading port list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('master_loading_port', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'export/loading_port/list', $datas);
        }

        public function add()
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/loading_port/add.js"),
            ];
            $datas['title'] = 'Export - Loading Port';
            $datas['breadcrumb'] = ['Export', 'Master', 'Loading Port'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'export/loading_port/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $loading_port = $this->M_CRUD->readDatabyID('master_loading_port', ['is_deleted' => '0', 'code' => $post['code']]);

            if($loading_port) {
                $response = ['status' => 0, 'messages' => 'Loading port code already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'code' => $post['code'],
                    'name' => ucwords($post['names']),
                ];

                if($this->M_CRUD->insertData('master_loading_port', $param)) {
                    $response = ['status' => 1, 'messages' => 'Loading port has been saved successfully.', 'icon' => 'success', 'url' => 'export/loading_port'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Loading port has failed to save.', 'icon' => 'error'];
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
                base_url("assets/js/loading_port/detail.js"),
            ];
            $datas['title'] = 'Export - Loading Port';
            $datas['breadcrumb'] = ['Export', 'Master', 'Loading Port'];
            $datas['header'] = 'Edit record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_loading_port', ['is_deleted' => '0', 'id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/loading_port/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'name' => $post['names'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if($this->M_CRUD->updateData('master_loading_port', $param, $condition)) {
                $response = ['status' => 1, 'messages' => 'Loading port has been updated successfully.', 'icon' => 'success', 'url' => 'export/loading_port'];
            } else {
                $response = ['status' => 0, 'messages' => 'Loading port has failed to update.', 'icon' => 'error'];
            }
            
            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_loading_port', $condition)) {
                $response = ['status' => 1, 'messages' => 'Loading port has been deleted successfully.', 'icon' => 'success', 'url' => 'export/loading_port'];
            } else {
                $response = ['status' => 0, 'messages' => 'Loading port has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>