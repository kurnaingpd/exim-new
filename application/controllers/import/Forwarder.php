<?php

    Class Forwarder extends CI_Controller
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
                base_url("assets/js/forwarder/list.js"),
            ];
            $datas['title'] = 'Import - Forwarder';
            $datas['breadcrumb'] = ['Import', 'Master', 'Forwarder'];
            $datas['header'] = 'Forwarder list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('master_forwarder', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'import/forwarder/list', $datas);
        }

        public function add()
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/forwarder/add.js"),
            ];
            $datas['title'] = 'Import - Forwarder';
            $datas['breadcrumb'] = ['Import', 'Master', 'Forwarder'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'import/forwarder/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'name' => $post['name'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->insertData('master_forwarder', $params)) {
                $response = ['status' => 1, 'messages' => 'Forwarder has been saved successfully.', 'icon' => 'success', 'url' => 'import/forwarder'];
            } else {
                $response = ['status' => 0, 'messages' => 'Forwarder has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/forwarder/detail.js"),
            ];
            $datas['title'] = 'Import - Forwarder';
            $datas['breadcrumb'] = ['Import', 'Master', 'Forwarder'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_forwarder', ['id' => $id])
            ];

            $this->template->load('default', 'contents' , 'import/forwarder/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $params = [
                'name' => $post['name'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('master_forwarder', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'Forwarder has been updated successfully.', 'icon' => 'success', 'url' => 'import/forwarder'];
            } else {
                $response = ['status' => 0, 'messages' => 'Forwarder has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            
            if($this->M_CRUD->deleteData('master_forwarder', $condition)) {
                $response = ['status' => 1, 'messages' => 'Forwarder has been deleted successfully.', 'icon' => 'success', 'url' => 'import/forwarder'];
            } else {
                $response = ['status' => 0, 'messages' => 'Forwarder has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>