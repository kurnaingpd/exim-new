<?php

    Class Auth extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model(['M_CRUD']);
        }

        public function index()
        {
            if($this->session->userdata('logged_in')) redirect('home');
            
            $datas['js'] = [
                base_url("assets/js/uac/auth/login.js"),
            ];
            $datas['title'] = 'Login';

            $this->load->view('auth/login', $datas);
        }

        public function process()
        {
            $response = ['status' => 0];
            $post = $this -> input -> post();
            $condition = [
                'username' => $post['username']
            ];

            $datas = $this -> M_CRUD -> readDatabyID('view_master_user_role', $condition);

            if($datas) {
                if( password_verify($post['password'], $datas->password) ) {
                    $datas = (object) array_merge((array) $datas, (array) ['status' => 1]);
                    $this -> session -> set_userdata('logged_in', $datas);
                    $this->M_CRUD->insertData('trans_auth', ['user_id' => $datas->id, 'flag' => '1']);
                    $response = ['status' => 1, 'url' => 'home'];
                } else {
                    $response = ['status' => 0, 'icon' => 'info', 'messages' => 'Invalid username/password', 'url' => '/'];
                }
            } else {
                $response = ['status' => 0, 'icon' => 'info', 'messages' => 'Invalid username/password', 'url' => '/'];
            }

            echo json_encode($response);
        }

        public function logout()
        {
            $this -> session -> sess_destroy();
            $this->M_CRUD->insertData('trans_auth', ['user_id' => $this->session->userdata('logged_in')->id, 'flag' => '2']);
            redirect('/');
        }

        public function report()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
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
                base_url("assets/adminlte/plugins/jszip/jszip.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"),
                base_url("assets/js/uac/auth/report.js"),
            ];
            $datas['title'] = 'UAC - Log Access';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Log Access'];
            $datas['header'] = 'Log Access';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_auth')
            ];
            $this->template->load('default', 'contents' , 'auth/report', $datas);
        }
    }

?>