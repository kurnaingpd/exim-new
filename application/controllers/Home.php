<?php

    Class Home extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
        }

        public function modules()
        {
            $datas['title'] = 'Home';

            $this->load->view('template/module', $datas);
        }

        public function uac()
        {
            $datas['title'] = 'UAC - Home';
            $datas['breadcrumb'] = ['UAC', 'Home'];
            $datas['modules'] = 'UAC';
            $this->load->view('template/group', $datas);
        }

        public function uac_master()
        {
            $datas['title'] = 'UAC - Master';
            $datas['breadcrumb'] = ['UAC', 'Master', 'Home'];
            $datas['modules'] = 'UAC - Master';
            $this->template->load('default', 'contents' , 'home/index', $datas);
        }

        public function uac_transaction()
        {
            $datas['title'] = 'UAC | Master - Home';
            $datas['breadcrumb'] = ['UAC', 'Master', 'Home'];
            $datas['modules'] = 'UAC - Master';
            $this->template->load('default', 'contents' , 'home/index', $datas);
        }

        public function export()
        {
            $datas['title'] = 'Export - Home';
            $datas['breadcrumb'] = ['Export', 'Home'];
            $datas['modules'] = 'Export';

            $this->template->load('default', 'contents' , 'home/index', $datas);
        }

        public function import()
        {
            $datas['title'] = 'Import - Home';
            $datas['breadcrumb'] = ['Import', 'Home'];
            $datas['modules'] = 'Import';

            $this->template->load('default', 'contents' , 'home/index', $datas);
        }
    }

?>