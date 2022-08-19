<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterUser extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginSys/doLogout');
    }
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MUser');
    $this->load->model('MGroup');
}

public function index(){

    $UserId                 =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers              =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu              =$DataUsers->UserGroup;
    $data['menusign']       =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmasterusers']  =$this->MUser->getlistusers();
    $data['grouplisting']   =$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MasterUsers/VList',$data);

}

public function createnewuser(){

    $username     = strtolower($this->input->post('username'));
    $userpassword = md5($this->input->post('userpassword'));
    $accountname  = $this->input->post('accountname');
    $useremail    = $this->input->post('useremail');
    $userphone    = $this->input->post('userphone');
    $usergroup    = $this->input->post('usergroup');
    $jabatan      = $this->input->post('jabatan');
    $hashtoken    = base64_encode(hash("sha1",$userpassword));

    if($username=='' OR $userpassword=='' OR $accountname=='' OR $useremail=='' OR $userphone=='' OR $usergroup==''){
    
            // echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Karena Ada Input Yang Kosong');
            redirect('MasterUser');
    
    }else{

        $UserCheck=$this->MUser->usernamecheck($username);
        
        if($UserCheck==TRUE){
     
            // echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Karena Username Sudah Digunakan');
            redirect('MasterUser');
     
        }else{
     
            // echo "TRUE";

            $data=array(

                'UserName'     => $username,
                'UserPassword' => $userpassword,
                'AccountName'  => $accountname,
                'UserEmail'    => $useremail,
                'UserPhone'    => $userphone,
                'UserGroup'    => $usergroup,
                'HashToken'    => $hashtoken,
                'UserJabatan'  => $jabatan

            );

            $insert=$this->MUser->tambah_user($data);

            if($insert){
                echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                redirect('MasterUser');
            }else{
                echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                redirect('MasterUser');
            }


     
        }


    }
    
}

public function Editmasterusers($UsersId){

    $UserId                =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers             =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu             =$DataUsers->UserGroup;
    $data['menusign']      =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmasterusers'] =$this->MUser->getrowmasteruser($UsersId);
    $data['grouplisting']  =$this->MUser->getlistgroup();

    $this->load->view('MasterUsers/VEdit',$data);

}

public function submiteditmasterusers(){

    $usersid          = $this->input->post('usersid');
    // $usergroup        = $this->input->post('usergroup');
    $username         = $this->input->post('username');
    $userpassword     = md5($this->input->post('userpassword'));
    $accountname      = $this->input->post('accountname');
    $useremail        = $this->input->post('useremail');
    $userphone        = $this->input->post('userphone');
    $jabatan          = $this->input->post('jabatan');
    $hashtoken        = base64_encode(hash("sha1",$userpassword));

    if($username=='' OR $userpassword=='' OR $accountname=='' OR $useremail=='' OR $userphone==''){

            // echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Karena Ada Input Yang Kosong');
            redirect('MasterUser');

    }else{

        // $UserCheck=$this->MUser->usernamecheck($username);
        // if($UserCheck==TRUE){
     
        //     // echo "FALSE";
        //     $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Karena Username Sudah Digunakan');
        //     redirect('MasterUser');
     
        // }else{
     
            // echo "TRUE";

            $data=array(

                'UserName'     => $username,
                'UserPassword' => $userpassword,
                'AccountName'  => $accountname,
                'UserEmail'    => $useremail,
                'UserPhone'    => $userphone,
                'UserJabatan'  => $jabatan,
                // 'UserGroup'    => $usergroup,
                'HashToken'    => $hashtoken

            );

            $update=$this->MUser->Update_users($usersid,$data);

            if($update){
                // echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Update');
                redirect('MasterUser');
            }else{
                // echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Data Connection Lost');
                redirect('MasterUser');
            }


     
        // }
    }


}



}