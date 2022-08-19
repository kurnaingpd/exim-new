<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuFreightCost extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginSys/doLogout');
    }

    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MUser');
    $this->load->model('MBoardPI');
    $this->load->model('MFreightCost');

}

public function index()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['listdataPI']=$this->MBoardPI->GetList_PI();
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $this->load->view('MenuFreightCost/VList',$data);
}

public function search()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $params = $this->input->post();
    $data['listdataPI']=$this->MBoardPI->GetResult_PI($params);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $this->load->view('MenuFreightCost/VSearch',$data);
}

public function edit_freight_pi($id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    # code...
    $data['rowsgetpi']=$this->MBoardPI->GetRowList_PI_byId($id_PI);

    $this->load->view('MenuFreightCost/PreviewEdit',$data);
}

public function updates_freightcost_insurance()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $id_pi=$this->input->post('id_pi');
    $input_freightcost=$this->input->post('input_freightcost');
    $input_insurance=$this->input->post('input_insurance');

    $data=array(
        'gexp_pi_freight_cost'=>$input_freightcost,
        'gexp_pi_insurance'=>$input_insurance,
        'gexp_pi_updatedAt'=>NOW,
        'gexp_pi_updatedAt'=>$UserId
    );

    $update=$this->MFreightCost->update_freight_insurance($id_pi, $data);

    if($update){

        redirect('MenuFreightCost/');

    }else{

        redirect('MenuFreightCost/');

    }

}


}