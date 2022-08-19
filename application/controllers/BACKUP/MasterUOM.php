<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterUOM extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        // $this->load->model('MAdministrator');
        $this->load->model('MLogin');
        $this->load->model('MUom');
}

public function index(){

    $data['lsmaster_uom']=$this->MUom->GetListAll_MasterUom();
	$this->load->view('MasterUOM/V_List',$data);

}

public function tambah_data()
{
    # code...
    $this->load->view('MasterUOM/V_Add');
}

public function filter_search_data()
{
    # code...
    $params1=$this->input->post('uom_id');
    $params2=$this->input->post('uom_name');

    if($params1=='' AND $params2==''){

            $result_empty=$this->MUom->GetAll_Search();
            $q=count($result_empty);
            // print_r($q);
            $data['searchbydata']=$this->MUom->GetAll_Search();
            $this->session->set_flashdata('success','Total Data Ditemukan : '.$q.'');
            $this->load->view('MasterUOM/V_Search',$data);
            // redirect('MasterUOM');

    }else{

            $searchbydata=$this->MUom->GetFilterSearch($params1,$params2);
            $data['searchbydata']=$this->MUom->GetFilterSearch($params1,$params2);

            if($searchbydata)
            {
                $q=count($searchbydata);
                // print_r($q);
                $this->session->set_flashdata('success','Total Data Ditemukan : '.$q.'');
                // redirect('MasterUOM');
                $this->load->view('MasterUOM/V_Search',$data);

            }else{

                $q=count($searchbydata);
                // print_r($q);
                $this->session->set_flashdata('success','Total Data Ditemukan : '.$q.'');
                // redirect('MasterUOM');
                $this->load->view('MasterUOM/V_Search',$data);
            }

    }


}


public function submit_tambah_data()
{
    # code...
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $uom_name=strtoupper($this->input->post('uom_name'));
    $stats=$this->input->post('status');

    $data=array(
        'mt_uom_name'=>$uom_name,
        'mt_uom_stats'=>"1",
        'mt_uom_month'=>M,
        'mt_uom_year'=>Y,
        'mt_uom_createdAt'=>NOW,
        'mt_uom_createdBy'=>$UserId,
    );

    $insert=$this->MUom->insert_master_uom($data);

    if($insert){
            $this->session->set_flashdata('success','Data Berhasil Ditambah');
            redirect('MasterUOM');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('MasterUOM');
    }
    
}


public function edit_master_UOM()
{
    # code...
    $params1=$this->input->post('uom_id');

    $data['rows_Uom']=$this->MUom->Getrows_uom_byId($params1);

    // echo $params1;

    $this->load->view('MasterUOM/V_Edit',$data);

}


public function submit_edit_data()
{
    # code...
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $params1=$this->input->post('uom_id');
    $uom_name=strtoupper($this->input->post('uom_name'));
    $stats=$this->input->post('status');

    $data=array(
        'mt_uom_name'=>$uom_name,
        'mt_uom_stats'=>$stats,
        'mt_uom_updatedAt'=>NOW,
        'mt_uom_updatedBy'=>$UserId,
    );

    $update=$this->MUom->update_uom_byId($data, $params1);

    if($update){
            $this->session->set_flashdata('success','Data Berhasil Diupdate');
            redirect('MasterUOM');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('MasterUOM');
    }
    
}


public function submit_delete_data()
{
    # code...
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $params1=$this->input->post('uom_id');
    $uom_name=strtoupper($this->input->post('uom_name'));
    $stats=$this->input->post('status');

    $data=array(
        'mt_uom_stats'=>'3',
        'mt_uom_updatedAt'=>NOW,
        'mt_uom_updatedBy'=>$UserId,
    );

    $delete=$this->MUom->update_uom_byId($data, $params1);

    if($delete){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
            redirect('MasterUOM');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('MasterUOM');
    }
    
}



}