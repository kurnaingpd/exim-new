<?php

    Class Country extends CI_Controller
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
                base_url("assets/js/country/list.js"),
            ];
            $datas['title'] = 'Export - Country';
            $datas['breadcrumb'] = ['Export', 'Master', 'Country'];
            $datas['header'] = 'Country list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('master_country', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'export/country/list', $datas);
        }

        public function add()
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/country/add.js"),
            ];
            $datas['title'] = 'Export - Country';
            $datas['breadcrumb'] = ['Export', 'Master', 'Country'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'export/country/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $country = $this->M_CRUD->readDatabyID('master_country', ['is_deleted' => '0', 'code' => $post['code']]);
            
            if($country) {
                $response = ['status' => 0, 'messages' => 'Country already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'code' => $post['code'],
                    'name' => ucwords($post['name'])
                ];
                if($this->M_CRUD->insertData('master_country', $param)) {
                    $response = ['status' => 1, 'messages' => 'Country has been saved successfully.', 'icon' => 'success', 'url' => 'export/country'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Country has failed to save.', 'icon' => 'error'];
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
                base_url("assets/js/country/detail.js"),
            ];
            $datas['title'] = 'Export - Country';
            $datas['breadcrumb'] = ['Export', 'Master', 'Country'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_country', ['is_deleted' => '0', 'id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/country/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $country = $this->M_CRUD->readDatabyID('master_country', ['is_deleted' => '0', 'code' => $post['code']]);
            $id = $post['id'];
            $condition = [
                'id' => $id
            ];
            
            if($country) {
                $response = ['status' => 0, 'messages' => 'Country already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'code' => $post['code'],
                    'name' => ucwords($post['name']),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                if($this->M_CRUD->updateData('master_country', $param, $condition)) {
                    $response = ['status' => 1, 'messages' => 'Country has been updated successfully.', 'icon' => 'success', 'url' => 'export/country'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Country has failed to update.', 'icon' => 'error'];
                }
            }
            
            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_country', $condition)) {
                $response = ['status' => 1, 'messages' => 'Country has been deleted successfully.', 'icon' => 'success', 'url' => 'export/country'];
            } else {
                $response = ['status' => 0, 'messages' => 'Country has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>