<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterCategory extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        $this->load->model('MCategory');
        $this->load->model('MLogin');
}

public function index()
{
    # code...
    $data['lsmaster_category']=$this->MCategory->GetListAll_MasterCategory();
	$this->load->view('MasterCategory/V_List',$data);
}

public function tambah_data()
{
    # code...
    $this->load->view('MasterCategory/V_Add');
}

public function submit_tambah_data()
{
    # code...
    $UserId=$this->session->userdata('logged_gexp_in')->user_id;
    $catname=strtoupper($this->input->post('catname'));
    $catstats=$this->input->post('status');

    $data=array(
        'mt_categori_name'=>$catname,
        'mt_categori_stats'=>"1",
        'mt_categori_month'=>M,
        'mt_categori_year'=>Y,
        'mt_categori_createdAt'=>NOW,
        'mt_categori_createdBy'=>$UserId,
    );

    $insert=$this->MCategory->insert_master_category($data);

    if($insert){
            $this->session->set_flashdata('success','Data Berhasil Ditambah');
            redirect('MasterCategory');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('MasterCategory');
    }
    
}


public function filter_search_data()
{
    # code...
    $params1=$this->input->post('categori_id');
    $params2=$this->input->post('categori_name');

    if($params1=='' AND $params2==''){

            $result_empty=$this->MCategory->GetAll_Search();
            $data['searchbydata']=$this->MCategory->GetAll_Search();
            $q=count($result_empty);
            // print_r($q);
            $data['params1']=$params1;
            $data['params2']=$params2;
            $this->session->set_flashdata('success','Total Data Ditemukan : '.$q.'');
            // redirect('MasterCategory');
            $this->load->view('MasterCategory/V_Search',$data);

    }else{

            $searchbydata=$this->MCategory->GetFilterSearch($params1,$params2);
            $data['searchbydata']=$this->MCategory->GetFilterSearch($params1,$params2);

            if($searchbydata)
            {
                $q=count($searchbydata);
                // print_r($q);
                $this->session->set_flashdata('success','Total Data Ditemukan : '.$q.'');
                // redirect('MasterCategory');
                $data['params1']=$params1;
                $data['params2']=$params2;
                $this->load->view('MasterCategory/V_Search',$data);

            }else{

                $q=count($searchbydata);
                // print_r($q);
                $this->session->set_flashdata('success','Total Data Ditemukan : '.$q.'');
                // redirect('MasterCategory');
                $data['params1']=$params1;
                $data['params2']=$params2;
                $this->load->view('MasterCategory/V_Search',$data);
            }

    }


}


public function edit_master_category()
{
    # code...
    $params1=$this->input->post('categori_id');

    $data['rows_category']=$this->MCategory->Getrows_Category_ById($params1);

    // echo $params1;

    $this->load->view('MasterCategory/V_Edit',$data);

}


public function submit_edit_data()
{
    # code...
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $params1=$this->input->post('categori_id');
    $catname=strtoupper($this->input->post('catname'));
    $catstats=$this->input->post('status');

    $data=array(
        'mt_categori_name'=>$catname,
        'mt_categori_stats'=>$catstats,
        'mt_categori_updatedAt'=>NOW,
        'mt_categori_updatedBy'=>$UserId,
    );

    $update=$this->MCategory->update_category_byid($data, $params1);

    if($update){
            $this->session->set_flashdata('success','Data Berhasil Diupdate');
            redirect('MasterCategory');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('MasterCategory');
    }
    
}


public function submit_delete_data()
{
    # code...
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $params1=$this->input->post('categori_id');

    $data=array(
        'mt_categori_stats'=>'3',
        'mt_categori_updatedAt'=>NOW,
        'mt_categori_updatedBy'=>$UserId,
    );

    $delete=$this->MCategory->update_category_byid($data, $params1);

    if($delete){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
            redirect('MasterCategory');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('MasterCategory');
    }
}


}