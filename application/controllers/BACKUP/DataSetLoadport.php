<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetLoadport extends CI_Controller {

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
    $this->load->model('MSetInco');
    $this->load->model('MSetLoadport');
}

public function index(){

    $UserId                      =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                   =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                   =$DataUsers->UserGroup;
    $data['menusign']            =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']       =$this->MMenu->GetListMasterMenu();
    $data['lsmasterloadport']    =$this->MSetLoadport->GetListMasterLoadport();

	$this->load->view('DataSetLoadingPort/VList',$data);

}


public function createnewloadingport(){

    $LoadPortDesc           =strtoupper($this->input->post('loadportdesc'));
    $LoadPortDescId           =strtoupper($this->input->post('loadportdescid'));
    // $checkerTOP          =$this->MSetTop->CheckTopDesc($TopDesc);

    // if($checkerTOP==TRUE){
        
    //     echo "Maaf Data Sudah Tersedia";
    
    // }else{

        $data=array(
            'LoadPortDescId'    =>$LoadPortDescId,
            'LoadPortDesc'      =>$LoadPortDesc,
            'LoadPortStats'     =>"1",
            'CreatedAt'     =>NOW,
            'CreatedBy'     =>$this->session->userdata('logged_gexp_in')->UsersId,
        );
        
        $insert         =$this->MSetLoadport->tambah_loadport($data);

        if($insert){
            echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetLoadport');
        }else{
            echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                    redirect('DataSetLoadport');
        }

    // }

}

public function Editmasterloadport($LoadPortId){

    $UserId                       =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                    =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                    =$DataUsers->UserGroup;
    $data['menusign']             =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']        =$this->MMenu->GetListMasterMenu();
    $data['lsmasterloadport']     =$this->MSetLoadport->GetListRowMasterLoadport($LoadPortId);

	$this->load->view('DataSetLoadingport/VEdit',$data);

}



public function submiteditmasterloadport(){

    $UserId              =$this->session->userdata('logged_gexp_in')->UsersId;
    $LoadportId          =$this->input->post('loadportid');
    $LoadportDesc        =strtoupper($this->input->post('loadportdesc'));
    $LoadportStats       =$this->input->post('status_id');

    $data=array(
        'LoadPortDesc'=>$LoadportDesc,
        'LoadPortStats'=>$LoadportStats,
        'UpdateAt'          => NOW,
        'UpdateBy'          => $UserId
    );
    $update=$this->MSetLoadport->update_loadport($LoadportId,$data);
    if($update){
        echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                redirect('DataSetLoadport');
    }else{
        echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                redirect('DataSetLoadport');
    }

}




}