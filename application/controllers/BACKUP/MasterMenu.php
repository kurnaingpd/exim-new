<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterMenu extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']=$this->MMenu->GetListMasterMenu();
    $data['grouplisting']=$this->MMenu->GetListMasterGroup();
    $data['iconlisting']=$this->MMenu->GetListMasterIcons();
    $data['menulisting']=$this->MMenu->GetListMasterMenu();

	$this->load->view('MasterMenu/VList',$data);

}

public function createnewmenu(){

    // echo "Parameter belum di set";

    $menusname      = $this->input->post('menusname');
    $menusicon      = $this->input->post('menusicon');
    $menuslink      = $this->input->post('menuslink');
    $menuparents    = $this->input->post('menuparents');

    $data=array(
        'MenusName'    =>$menusname,
        'MenusIcon'    =>$menusicon,
        'MenusLink'    =>$menuslink,
        'MenuParents'  =>$menuparents,
        'MenuStats'    =>"1"
    );

    $insert=$this->MMenu->tambah_menu($data);

        if($insert){
            
            echo "TRUE";
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
            redirect('MasterMenu');

        }else{
            
            echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
            redirect('MasterMenu');
        
        }

}



}