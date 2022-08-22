<?php

    Class ItemMapping extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD']);
        }

        public function index()
        {

        }

        public function add()
        {

        }

        public function save()
        {

        }

        public function detail($id)
        {

        }

        public function update()
        {

        }

        public function delete($id)
        {
            
        }
    }

?>