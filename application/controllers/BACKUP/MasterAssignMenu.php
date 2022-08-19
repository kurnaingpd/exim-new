<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterAssignMenu extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MAssignMenu');
    $this->load->model('MGroup');
}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmasterassign']=$this->MAssignMenu->GetListAssignMenu();
    $data['lsmastergroup']=$this->MAssignMenu->GetListGroup_Activ();

    $data['lsmastermenu']=$this->MAssignMenu->GetListMenu_Activ();

	$this->load->view('MasterAssignMenu/VList',$data);

}

public function save_master_menuassign()
{
    $groupmenu=$this->input->post('groupmenu');
    $menuid=$this->input->post('menuid');

    $data=array(
        'AssignRoleGroup'=>$groupmenu,
        'AssignMenusId'=>$menuid,
        'AssignWrite'=>'1',
        'AssignEdit'=>'1',
        'AssignDelete'=>'1',
        'AssignStats'=>'1',
    );
    $this->MAssignMenu->insert_assign_menu($data);
    redirect('MasterAssignMenu/');

}

public function Nonactive_assign($assign_id)
{
    # code...
    $data=array(
        'AssignStats'=>'2',
    );
    $this->MAssignMenu->update_assign_menu($assign_id, $data);
    redirect('MasterAssignMenu/');
}

public function Activated_assign($assign_id)
{
    # code...
    $data=array(
        'AssignStats'=>'1',
    );
    $this->MAssignMenu->update_assign_menu($assign_id, $data);
    redirect('MasterAssignMenu/');
}



}