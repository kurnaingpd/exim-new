<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        // $this->load->model('MClient');
        $this->load->model('MLogin');
}

public function Dashboard(){

    $UserId=$this->session->userdata('logged_gexp_in')->user_id;
   
    $data['userprofile']=$this->MLogin->GetProfileSign($UserId);
    // $GroupMenu=$DataUsers->UserGroup;
    // $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['groupname']=$this->MLogin->GetGroupName($UserId);

	$this->load->view('V_Dashboard',$data);

}


}