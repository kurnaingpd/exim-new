<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterIcon extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginSys/doLogout');
    }
        $this->load->model('MRoot');
        $this->load->model('MLogin');
        $this->load->model('MUser');
        $this->load->model('MGroup');
        $this->load->model('MIcons');
}

public function index(){

    $UserId               =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers            =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu            =$DataUsers->UserGroup;
    $data['menusign']     =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmasterusers']=$this->MUser->getlistusers();
    $data['lsmastericons']=$this->MIcons->getlisticons();

	$this->load->view('MasterIcons/VList',$data);

}

public function createnewicon(){
    
    $icondesc = $this->input->post('iconsdesc');

    $data=array(
        'IconsDesc'     =>$icondesc,
        'IconsStats'    =>"1"
    );

    $insert=$this->MIcons->tambah_icons($data);

    if($insert){
            
                echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                redirect('MasterIcon');
    
    }else{
                
                echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                redirect('MasterIcon');
            
    }

    // Check Group
    // $GroupValue=str_replace(' ', '', $groupdesc);
    // $Validasi=$this->MGroup->checkmastervalgroup($GroupValue);

    // if($Validasi==TRUE){

    //     $data=array(
    //         'GroupDesc' => $groupdesc,
    //         'GroupVal' => $GroupValue
    //     );

    //     $insert=$this->MGroup->tambah_group($data);

    //     if($insert){
            
    //         echo "TRUE";
    //         $this->session->set_flashdata('success','Data Berhasil Di Proses');
    //         redirect('MasterGroup');

    //     }else{
            
    //         echo "FALSE";
    //         $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
    //         redirect('MasterGroup');
        
    //     }

    // }else{

    //     echo "FALSE";
    //     $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
    //     redirect('MasterGroup');
        
    // }

}



}