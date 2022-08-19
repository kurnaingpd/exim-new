<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('Administrator/doLogout');
    }
        $this->load->model('MAdministrator');
        // $this->load->model('MLogin');
}

public function Dashboard(){

    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
   
    $data['userprofile']=$this->MAdministrator->GetProfileSign($UserId);
    // $GroupMenu=$DataUsers->UserGroup;
    // $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['groupname']=$this->MLogin->GetGroupName($UserId);

	$this->load->view('Administrator/V_Dashboard',$data);

}


}