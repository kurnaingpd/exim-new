<?php

    Class User extends CI_Controller
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
                base_url("assets/js/user/list.js"),
            ];
            $datas['title'] = 'UAC - User';
            $datas['breadcrumb'] = ['UAC', 'Master', 'User'];
            $datas['header'] = 'User list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_user_list', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'uac/user/list', $datas);
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
                base_url("assets/js/user/add.js"),
            ];
            $datas['title'] = 'UAC - User';
            $datas['breadcrumb'] = ['UAC', 'Master', 'User'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'role' => $this->M_CRUD->readData('master_role', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'uac/user/add', $datas);
        }

        public function position($id = NULL)
        {
            $data = $this->M_CRUD->readData('master_position', ['is_deleted' => '0', 'role_id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $post = $this->input->post();
            $check_username = $this->M_CRUD->readDatabyID('view_user_role', ['is_deleted' => '0', 'username' => $post['username']]);
            $check_email = $this->M_CRUD->readDatabyID('view_user_role', ['is_deleted' => '0', 'email' => $post['email']]);

            if($check_username) {
                $response = ['status' => 0, 'messages' => 'Username already exists.', 'icon' => 'info'];
            } elseif($check_email) {
                $response = ['status' => 0, 'messages' => 'Email already exists.', 'icon' => 'info'];
            } else {
                $paramUser = [
                    'fullname' => ucwords($post['fullname']),
                    'username' => $post['username'],
                    'email' => $post['email'],
                    'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                ];
                $user = $this->M_CRUD->insertData('master_user', $paramUser);

                if($user) {
                    $paramUserRole = [
                        'user_id' => $user,
                        'role_id' => $post['role'],
                        'position_id' => $post['position'],
                    ];
                    $this->M_CRUD->insertData('master_user_role', $paramUserRole);
                    $response = ['status' => 1, 'messages' => 'User has been saved successfully.', 'icon' => 'success', 'url' => 'uac/user'];
                } else {
                    $response = ['status' => 0, 'messages' => 'User has failed to save.', 'icon' => 'error'];
                }
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
                base_url("assets/js/user/detail.js"),
            ];
            $datas['title'] = 'UAC - User';
            $datas['breadcrumb'] = ['UAC', 'Master', 'User'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_user_role', ['is_deleted' => '0', 'id' => $id]),
                'role' => $this->M_CRUD->readData('master_role', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'uac/user/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $paramUser = [
                'fullname' => ucwords($post['fullname']),
                'email' => $post['email'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if($post['password']) {
                $paramUser = array_merge(
                    $paramUser, ['password' => password_hash($post['password'], PASSWORD_DEFAULT)]
                );
            }

            $condition = [
                'id' => $id
            ];

            if($this->M_CRUD->updateData('master_user', $paramUser, $condition)) {
                $respponse = ['status' => 1, 'messages' => 'User has been updated successfully.', 'icon' => 'success', 'url' => 'uac/user'];
            } else {
                $respponse = ['status' => 0, 'messages' => 'User has failed to save.', 'icon' => 'error'];
            }
            
            echo json_encode($respponse);
        }

        public function upload($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/user/upload.js"),
            ];
            $datas['title'] = 'UAC - User';
            $datas['breadcrumb'] = ['UAC', 'Master', 'User'];
            $datas['header'] = 'Upload signature';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_user_role', ['is_deleted' => '0', 'id' => $id]),
                'role' => $this->M_CRUD->readData('master_role', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'uac/user/upload', $datas);
        }

        public function process()
        {
            $post = $this->input->post();
            $path = 'assets/attachment/user/';
            $id = $post['id'];
            $condition = [
                'id' => $id
            ];

            if($_FILES) {
                if ( isset($_FILES['attachment']) && $_FILES['attachment']['name'] != '' ) {
                    $temp_name = $_FILES['attachment']['name'];
                    $ext = explode('.', $temp_name);
                    $end = strtolower(end($ext));
                    $timestamp = mt_rand(1, time());
                    $randomDate = date("d M Y", $timestamp);
                    $filename = 'Signature-'.md5($randomDate).'.'.$end;
                    move_uploaded_file($_FILES['attachment']['tmp_name'], $path.$filename);
                    $params['signature'] = $path.$filename;

                    if($this->M_CRUD->updateData('master_user', $params, $condition)) {
                        $response = ['status' => 1, 'messages' => 'User signature has been saved successfully.', 'icon' => 'success', 'url' => 'uac/user'];
                    } else {
                        $response = ['status' => 0, 'messages' => 'User signature has failed to save.', 'icon' => 'error'];
                    }
                }
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_user', $condition)) {
                $response = ['status' => 1, 'messages' => 'User has been deleted successfully.', 'icon' => 'success', 'url' => 'user'];
            } else {
                $response = ['status' => 0, 'messages' => 'User has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>