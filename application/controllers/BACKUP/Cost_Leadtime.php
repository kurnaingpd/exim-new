<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cost_Leadtime extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        // $this->load->model('MAdministrator');
        $this->load->model('MLogin');
        $this->load->model('MReport');
}

public function index(){

	$this->load->view('CostLeadtime/V_List');

}


public function Details_CLT_1()
{

    $data['years_data']=$this->MReport->getyears_data();
    $this->load->view('CostLeadtime/V_Option01',$data);
}

public function Details_CLT_2()
{

    $data['years_data']=$this->MReport->getyears_data();
    $this->load->view('CostLeadtime/V_Option02',$data);
}

public function Details_CLT_3()
{

    $data['years_data']=$this->MReport->getyears_data();
    $this->load->view('CostLeadtime/V_Option03',$data);
}


public function validop01()
{
    # code...
    $start=$this->input->post('start_years');
    $finish=$this->input->post('finish_years');

    if( $finish >= $start ){

        $data['lt_cat']=$this->MReport->getreport_active1($start,$finish);
        $data['st']=$start;
        $data['fh']=$finish;
        $this->load->view('CostLeadTime/Available1',$data);

    }else{

        echo "<script>
        alert('Tidak dapat di proses, Tahun start harus lebih besar dari finish');
        window.location.href='".base_url('Cost_Leadtime/Details_CLT_1')."';
        </script>";

    }
}


public function validop02()
{
    # code...
    $start=$this->input->post('start_years');
    $finish=$this->input->post('finish_years');

    if( $finish >= $start ){

        $data['lt_cat']=$this->MReport->getreport_active2($start,$finish);
        $data['st']=$start;
        $data['fh']=$finish;
        $this->load->view('CostLeadTime/Available2',$data);

    }else{

        echo "<script>
        alert('Tidak dapat di proses, Tahun start harus lebih besar dari finish');
        window.location.href='".base_url('Cost_Leadtime/Details_CLT_2')."';
        </script>";

    }
}

public function validop03()
{
    # code...
    $start=$this->input->post('start_years');
    $finish=$this->input->post('finish_years');

    if( $finish >= $start ){

        $data['lt_cat']=$this->MReport->getreport_active3($start,$finish);
        $data['st']=$start;
        $data['fh']=$finish;
        $this->load->view('CostLeadTime/Available3',$data);

    }else{

        echo "<script>
        alert('Tidak dapat di proses, Tahun start harus lebih besar dari finish');
        window.location.href='".base_url('Cost_Leadtime/Details_CLT_3')."';
        </script>";

    }
}


public function export_excel_1()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Report_GDA1.xls");
    
    $start=$this->input->post('start_years');
    $finish=$this->input->post('finish_years');

    $data['lt_cat']=$this->MReport->getreport_active1($start,$finish);
    $this->load->view('CostLeadTime/export1', $data);
}

public function export_excel_2()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Report_GDA2.xls");
    
    $start=$this->input->post('start_years');
    $finish=$this->input->post('finish_years');

    $data['lt_cat']=$this->MReport->getreport_active2($start,$finish);
    $this->load->view('CostLeadTime/export1', $data);
}

public function export_excel_3()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Report_GDA3.xls");
    
    $start=$this->input->post('start_years');
    $finish=$this->input->post('finish_years');

    $data['lt_cat']=$this->MReport->getreport_active3($start,$finish);
    $this->load->view('CostLeadTime/export1', $data);
}


}