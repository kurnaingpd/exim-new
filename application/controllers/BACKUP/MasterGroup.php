<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterGroup extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MGroup');
}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastergroup']=$this->MGroup->getlistmastergroup();

	$this->load->view('MasterGroup/VList',$data);

}

public function createnewgroup(){
    
    $groupdesc = strtoupper($this->input->post('groupdesc'));

    // Check Group
    $GroupValue=str_replace(' ', '', $groupdesc);
    $Validasi=$this->MGroup->checkmastervalgroup($GroupValue);

    if($Validasi==TRUE){

        $data=array(
            'GroupDesc' => $groupdesc,
            'GroupVal' => $GroupValue
        );

        $insert=$this->MGroup->tambah_group($data);

        if($insert){
            
            echo "TRUE";
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
            redirect('MasterGroup');

        }else{
            
            echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
            redirect('MasterGroup');
        
        }

    }else{

        echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
        redirect('MasterGroup');
        
    }

}


public function Editmastergroup($GroupId){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastergroup']=$this->MGroup->getrowmastergroup($GroupId);

    $this->load->view('MasterGroup/VEdit',$data);

}

public function submiteditmastergroup(){

    $GroupId=$this->input->post('groupid');
    $GroupDesc=strtoupper($this->input->post('groupdesc'));
    $GroupStats=$this->input->post('groupstat');
    // $UpdateAt=$this->input->post('groupdesc');
    $UpdateBy=$this->session->userdata('logged_gexp_in')->UsersId;
    $GroupValue=str_replace(' ', '', $GroupDesc);

    if($GroupId==''OR $GroupDesc==''OR $GroupStats==''){

        // echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Kosong');
        redirect('MasterGroup/Editmastergroup/'.$GroupId);

    }else{

        $data=array(
            'GroupDesc'=>$GroupDesc,
            'GroupVal'=>$GroupValue,
            'GroupStats'=>$GroupStats
        );
        $update=$this->MGroup->updatemastergroup($data,$GroupId);
        if($update){
            
            // echo "TRUE";
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
            redirect('MasterGroup/Editmastergroup/'.$GroupId);
    
        }else{
            
            // echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
            redirect('MasterGroup/Editmastergroup/'.$GroupId);
        
        }

    }
    
}


}