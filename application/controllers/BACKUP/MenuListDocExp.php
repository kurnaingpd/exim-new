<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuListDocExp extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginSys/doLogout');
    }
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MUser');
    $this->load->model('MGroup');
    $this->load->model('MBoardPI');
    $this->load->model('MApproval');
    $this->load->model('MExportRequire');
}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['listexpdataPI']=$this->MExportRequire->GetList_PI();

	$this->load->view('MenuListDocExp/VList',$data);

}

public function Search()
{
    $post = $this->input->post();
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);

    $data['listexpdataPI']=$this->MExportRequire->GetList_PI($post);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $this->load->view('MenuListDocExp/VSearch',$data);
}

public function download_expreq($exp_id)
{

    $rowsexpreq_byid=$this->MExportRequire->Getexpreq_rows($exp_id);

    $namefile=$rowsexpreq_byid->gexp_expreq_doc01;

    $this->load->helper('download');


    $tempdir="./assets/doc_upload/Expreq/";
    $file_name=$namefile;
    $file_path = $tempdir.$file_name;
    
    force_download($file_path, NULL);
    // print_r($exp_id);

    redirect('MenuListDocExp');


    // print_r($rowsexpreq_id);

}


public function approved_reqexp($exp_id)
{   
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data=array(
        'gexp_expreq_confirm_id'=>$UserId,
        'gexp_expreq_confirmedAt'=>NOW,
        'gexp_expreq_statusDoc'=>'1',
        'gexp_expreq_isRevisi'=>'2',
        // 'gexp_expreq_doc01'=>$fileData['file_name']

    );

    $this->MExportRequire->update_expreq($data, $exp_id);
    redirect('MenuListDocExp');
}

public function void_reqexp($exp_id)
{   
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data=array(
        'gexp_expreq_confirm_id'=>$UserId,
        'gexp_expreq_confirmedAt'=>NOW,
        'gexp_expreq_statusDoc'=>'2',
        'gexp_expreq_isRevisi'=>'2',
        // 'gexp_expreq_doc01'=>$fileData['file_name']

    );

    $this->MExportRequire->update_expreq($data, $exp_id);
    redirect('MenuListDocExp');
}

public function preview_revised($exp_id)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['listexpdataPI']=$this->MExportRequire->GetList_PI();

    $data['exprowsdata']=$this->MExportRequire->Getexpreq_rows($exp_id);

    $this->load->view('MenuListDocExp/Preview_Revisi',$data);
}

public function revised_expreq($exp_id)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $noted_val=$this->input->post('note_doc');

    $data=array(
        'gexp_expreq_confirm_id'=>$UserId,
        'gexp_expreq_confirmedAt'=>NOW,
        'gexp_expreq_statusDoc'=>'4',
        'gexp_expreq_isRevisi'=>'1',
        'gexp_expreq_ValRevisi'=>$noted_val,
        'gexp_expreq_DateRevisi'=>NOW,
        // 'gexp_expreq_doc01'=>$fileData['file_name']

    );

    $this->MExportRequire->update_expreq($data, $exp_id);
    redirect('MenuListDocExp');
}



}