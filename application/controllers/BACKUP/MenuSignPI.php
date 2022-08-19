<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuSignPI extends CI_Controller {

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

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['groupname']=$this->MLogin->GetGroupName($UserId);
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MenuSignPI/VListPI',$data);

}




}