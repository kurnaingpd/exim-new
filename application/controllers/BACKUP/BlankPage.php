<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlankPage extends CI_Controller {

    function __construct(){
        parent:: __construct();
        
        if(!$this->session->userdata('logged_gexp_in')){
            redirect('LoginSys/doLogout');
        }
            $this->load->model('MRoot');
            $this->load->model('MLogin');
    }

public function test_blank()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $this->load->view('blank_dashboard',$data);
}


}