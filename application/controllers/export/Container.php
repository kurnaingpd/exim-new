<?php

    Class Container extends CI_Controller
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
                base_url("assets/js/export/container/list.js"),
            ];
            $datas['title'] = 'Export - Container';
            $datas['breadcrumb'] = ['Export', 'Master', 'Container'];
            $datas['header'] = 'Container list';
            $datas['params'] = [
                'list' => $this->M_CRUD_Exp->readData('view_master_container')
            ];

            $this->template->load('default', 'contents' , 'export/container/list', $datas);
        }

        public function add()
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/export/container/add.js"),
            ];
            $datas['title'] = 'Export - Container';
            $datas['breadcrumb'] = ['Export', 'Master', 'Container'];
            $datas['header'] = 'Add record';

            $this->template->load('default', 'contents' , 'export/container/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $param = [
                'name' => $post['name'],
                'max_cbm' => $post['cbm'],
                'created_by' => $this->session->userdata('logged_in')->id
            ];

            if($this->M_CRUD_Exp->insertData('master_container', $param)) {
                $response = ['status' => 1, 'messages' => 'Container has been saved successfully.', 'icon' => 'success', 'url' => 'export/master/container'];
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
                base_url("assets/js/export/container/detail.js"),
            ];
            $datas['title'] = 'Export - Container';
            $datas['breadcrumb'] = ['Export', 'Master', 'Container'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD_Exp->readDatabyID('master_container', ['is_deleted' => '0', 'id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/container/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'name' => $post['name'],
                'max_cbm' => $post['cbm'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id
            ];

            if($this->M_CRUD_Exp->updateData('master_container', $param, $condition)) {
                $response = ['status' => 1, 'messages' => 'Container has been updated successfully.', 'icon' => 'success', 'url' => 'export/master/container'];
            } else {
                $response = ['status' => 0, 'messages' => 'Container has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            $container = $this->M_CRUD_Exp->readDatabyID('master_container', ['id' => $id]);
            $status = ($container->is_deleted == '1'?'0':'1');
            
            if($this->M_CRUD_Exp->updateData('master_container', ['is_deleted' => $status], $condition)) {
                $response = ['status' => 1, 'messages' => 'Container has been deleted successfully.', 'icon' => 'success', 'url' => 'export/master/container'];
            } else {
                $response = ['status' => 0, 'messages' => 'Container has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>