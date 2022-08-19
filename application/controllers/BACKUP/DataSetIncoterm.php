<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetIncoterm extends CI_Controller {

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
}

public function index(){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmasterinco']    =$this->MSetInco->GetListMasterInco();

	$this->load->view('DataSetIncoterm/VList',$data);

}

public function createnewinco(){

    $IncoCode        =strtoupper($this->input->post('incocode'));
    $IncoDesc        =strtoupper($this->input->post('incodesc'));
    $checkerCode     =$this->MSetInco->CheckCode($IncoCode);

    if($checkerCode==TRUE){
        
        echo "Maaf Data Sudah Tersedia";
    
    }else{

        $data=array(
            'IncotermCode'   =>$IncoCode,
            'IncotermDesc'   =>$IncoDesc,
            'IncotermStats'  =>"1"
        );
        
            $insert  =$this->MSetInco->tambah_incoterm($data);

        if($insert){
            echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetIncoterm');
        }else{
            echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                    redirect('DataSetIncoterm');
        }

    }

}

public function Editmasterinco($IncotermId){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmasterinco']     =$this->MSetInco->GetListRowMasterInco($IncotermId);

	$this->load->view('DataSetIncoterm/VEdit',$data);

}


public function submiteditmasterinco(){

    $IncoId             =$this->input->post('incoid');
    $IncoCode           =strtoupper($this->input->post('incocode'));
    $IncoDesc           =strtoupper($this->input->post('incodesc'));
    $IncoStats          =$this->input->post('incostats');

    // $checkerCode     =$this->MSetInco->CheckCode($IncoCode);

    // if($checkerCode==TRUE){
        
    //     echo "Maaf Data Sudah Tersedia";
    
    // }else{

            $data=array(
                'IncotermCode'=>$IncoCode,
                'IncotermDesc'=>$IncoDesc,
                'IncotermStats'=>$IncoStats,
            );
            $update=$this->MSetInco->update_inco($IncoId,$data);
            if($update){
                // echo "TRUE";
                        $this->session->set_flashdata('success','Data Berhasil Di Proses');
                        redirect('DataSetIncoterm');
            }else{
                // echo "FALSE";
                        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetIncoterm');
            }

    // }

}



}