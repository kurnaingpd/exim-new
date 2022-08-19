<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetTop extends CI_Controller {

function __construct(){
    parent:: __construct();
    
if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
    $this->load->model('MSetCountry');
    $this->load->model('MSetTop');
}

public function index(){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmastertop']     =$this->MSetTop->GetListMasterTop();

	$this->load->view('DataSetTOP/VList',$data);

}

public function createnewtop(){

    $TopDesc        =strtoupper($this->input->post('topdesc'));
    $checkerTOP     =$this->MSetTop->CheckTopDesc($TopDesc);

    if($checkerTOP==TRUE){
        
        echo "Maaf Data Sudah Tersedia";
    
    }else{

        $data=array(
            'TopDesc'   =>$TopDesc,
            'TopStats'  =>"1",
            'CreatedBy'  =>$this->session->userdata('logged_gexp_in')->UsersId,
            'CreatedAt'  =>date('Y-m-d H:i:s'),
        );
        
        $insert         =$this->MSetTop->tambah_top($data);

        if($insert){
            echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetTop');
        }else{
            echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                    redirect('DataSetTop');
        }

    }

}

public function Editmastertop($TopId){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmastertop']     =$this->MSetTop->GetListRowMasterTop($TopId);

	$this->load->view('DataSetTop/VEdit',$data);

}


public function submiteditmastertop(){

    $TopId          =$this->input->post('topid');
    $TopDesc        =strtoupper($this->input->post('topdesc'));
    $TopStats       =$this->input->post('topstats');
    $UserId         =$this->session->userdata('logged_gexp_in')->UsersId;
    $Date           =date('Y-m-d H:i:s');

    $data=array(
        'TopDesc'=>$TopDesc,
        'TopStats'=>$TopStats,
        'UpdateBy'=>$UserId,
        'UpdateAt'=>$Date,
    );
    $update=$this->MSetTop->update_top($TopId,$data);
    if($update){
        // echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                redirect('DataSetTop');
    }else{
        // echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                redirect('DataSetTop');
    }

}



}