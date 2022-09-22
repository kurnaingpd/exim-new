<?php

    Class Tester extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD']);
        }

        public function index()
        {
            $data_pi = [
                'header' => $this->M_CRUD->readDatabyID('view_trans_pi_email_header', ['pi_id' => 1]),
                'detail' => $this->M_CRUD->readData('view_trans_pi_email_detail', ['pi_id' => 1]),
                'list' => $this->M_CRUD->pi_email('view_trans_pi_email_user'),
            ];
            $this->load->view('export/email/content', $data_pi);
        }
    }

?>