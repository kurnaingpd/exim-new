<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportImport extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        // $this->load->model('MAdministrator');
        $this->load->model('MLogin');
        $this->load->model('MDocim');
}

public function index(){

    // $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
   
    // $data['userprofile']=$this->MAdministrator->GetProfileSign($UserId);
    // $GroupMenu=$DataUsers->UserGroup;
    // $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['lkp_data']=$this->MDocim->Getlookup_docim();
    $data['lkp_data_cat']=$this->MDocim->Getlookup_docim_cat();
    $data['lkp_data_pengirim']=$this->MDocim->Getlookup_docim_pengirim();
    $data['lkp_data_forwarder']=$this->MDocim->Getlookup_docim_forwarder();
    
    $data['ls_master_docim']=$this->MDocim->Getall_master_docim();
	$this->load->view('ReportDoc/V_Report',$data);

}


public function get_filter_search()
{

    $po=$this->input->post('po');
    $start_deliv=$this->input->post('start_deliv');
    $end_deliv=$this->input->post('end_deliv');
    $consig=$this->input->post('consig');
    $category=$this->input->post('category');
    $pengirim=$this->input->post('pengirim');
    $forwarder=$this->input->post('$forwarder');

    if($start_deliv!='' && $end_deliv!=''){
        $cek_filter_data=$this->MDocim->get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }else{
        $cek_filter_data=$this->MDocim->get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }
    // $cek_filter_data=$this->MDocim->get_filter_docim($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);

    $data['lkp_data']=$this->MDocim->Getlookup_docim();
    $data['lkp_data_cat']=$this->MDocim->Getlookup_docim_cat();
    $data['lkp_data_pengirim']=$this->MDocim->Getlookup_docim_pengirim();
    $data['lkp_data_forwarder']=$this->MDocim->Getlookup_docim_forwarder();
    
    if($start_deliv!='' && $end_deliv!=''){
        $data['cek_filter_data']=$this->MDocim->get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }else{
        $data['cek_filter_data']=$this->MDocim->get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }

    $data['po']=$po;

    if(!empty($start_deliv && $end_deliv)){
        $data['start_deliv']=$start_deliv;
        $data['end_deliv']=$end_deliv;
    }else{
        $data['start_deliv']="";
        $data['end_deliv']="";
    }

    $data['consig']=$consig;

    $valcategory=$this->MDocim->getvalue_cat($category);
    if(!empty($valcategory)){
        $data['category']=$valcategory->mt_categori_name;
    }else{
        $data['category']=$category;
    }
    // $data['category']=$valcategory->mt_categori_name;
    $data['pengirim']=$pengirim;
    $data['forwarder']=$forwarder;

    $this->load->view('ReportDoc/V_search',$data);

}


}