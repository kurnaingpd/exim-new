<?php

    Class Menu extends CI_Controller
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
                base_url("assets/js/uac/menu/list.js"),
            ];
            $datas['title'] = 'UAC - Menu';
            $datas['breadcrumb'] = ['UAC', 'Master', 'Menu'];
            $datas['header'] = 'Menu list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_master_menu_sub', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'uac/menu/list', $datas);
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
                base_url("assets/js/uac/menu/add.js"),
            ];
            $datas['title'] = 'UAC - Menu';
            $datas['breadcrumb'] = ['UAC', 'Master', 'Menu'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'module' => $this->M_CRUD->readData('master_menu_module', ['is_deleted' => '0']),
                'group' => $this->M_CRUD->readData('master_menu_group', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'uac/menu/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $param = [
                'menu_module_id' => $post['module'],
                'menu_group_id' => $post['group'],
                'name' => ucwords($post['menu']),
                'icon' => $post['icon'],
                'url' => $post['url'],
            ];

            if($this->M_CRUD->insertData('master_menu_sub', $param)) {
                $response = ['status' => 1, 'messages' => 'Menu has been saved successfully.', 'icon' => 'success', 'url' => 'uac/master/menu'];
            } else {
                $response = ['status' => 0, 'messages' => 'Menu has failed to save.', 'icon' => 'error'];
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
                base_url("assets/js/uac/menu/detail.js"),
            ];
            $datas['title'] = 'UAC - Menu';
            $datas['breadcrumb'] = ['UAC', 'Master', 'Menu'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_menu_sub', ['is_deleted' => '0', 'id' => $id]),
                'module' => $this->M_CRUD->readData('master_menu_module', ['is_deleted' => '0']),
                'group' => $this->M_CRUD->readData('master_menu_group', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'uac/menu/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $param = [
                'menu_module_id' => $post['module'],
                'menu_group_id' => $post['group'],
                'name' => ucwords($post['menu']),
                'icon' => $post['icon'],
                'url' => $post['url'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $condition = [
                'id' => $id
            ];

            if($this->M_CRUD->updateData('master_menu_sub', $param, $condition)) {
                $respponse = ['status' => 1, 'messages' => 'Menu has been updated successfully.', 'icon' => 'success', 'url' => 'uac/master/menu'];
            } else {
                $respponse = ['status' => 0, 'messages' => 'Menu has failed to save.', 'icon' => 'error'];
            }
            
            echo json_encode($respponse);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_menu_sub', $condition)) {
                $response = ['status' => 1, 'messages' => 'Menu has been deleted successfully.', 'icon' => 'success', 'url' => 'uac/master/menu'];
            } else {
                $response = ['status' => 0, 'messages' => 'Menu has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>