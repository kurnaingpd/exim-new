<?php

    Class AssignMenu extends CI_Controller
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
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/datatables/jquery.dataTables.min.js"),
                base_url("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/uac/assignmenu/index.js"),
            ];
            $datas['title'] = 'UAC - Assign Menu';
            $datas['breadcrumb'] = ['UAC', 'Transaction', 'Assign Menu'];
            $datas['header'] = 'Add record';
            $datas['table'] = 'Record list';
            $datas['params'] = [
                'menu' => $this->M_CRUD->readData('view_master_menu_sub', ['is_deleted' => '0']),
                'role' => $this->M_CRUD->readData('master_role', ['is_deleted' => '0']),
                'list' => $this->M_CRUD->readData('view_trans_assign_sub'),
            ];

            $this->template->load('default', 'contents' , 'uac/assignmenu/index', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $condition = [
                'menu_sub_id' => $post['menu'],
                'role_id' => $post['role'],
            ];
            $assign = $this->M_CRUD->readDatabyID('trans_menu_assign', $condition);

            if($assign) {
                $response = ['status' => 0, 'messages' => 'Menu & role already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'menu_sub_id' => $post['menu'],
                    'role_id' => $post['role'],
                ];
                if($this->M_CRUD->insertData('trans_menu_assign', $param)) {
                    $response = ['status' => 1, 'messages' => 'Assign menu has been saved successfully.', 'icon' => 'success', 'url' => 'uac/transaction/assignmenu'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Assign menu has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            if($this->M_CRUD->deletePermanent('trans_menu_assign', $condition)) {
                $response = ['status' => 1, 'messages' => 'Assign menu has been deleted successfully.', 'icon' => 'success', 'url' => 'uac/transaction/assignmenu'];
            } else {
                $response = ['status' => 0, 'messages' => 'Assign menu has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>