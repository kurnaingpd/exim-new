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
                base_url("assets/js/auth/login.js"),
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

            $datas = $this -> M_CRUD -> readDatabyID('view_user_role', $condition);

            if($datas) {
                if( password_verify($post['password'], $datas->password) ) {
                    $datas = (object) array_merge((array) $datas, (array) ['status' => 1]);
                    $this -> session -> set_userdata('logged_in', $datas);
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
            redirect('/');
        }
    }

?>