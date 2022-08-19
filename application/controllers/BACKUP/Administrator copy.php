<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    $this->load->model('MAdministrator');
    // $this->load->model('MLogin');
}

public function index()
{
	$this->load->view('Administrator/V_Login');
}

public function doLogin()
{
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $hashpass = base64_encode(hash("sha1",$password));

    if($username=='' OR $password==''){
      
        // echo"FALSE";
        $this->session->set_flashdata('warns','Maaf, data input tidak boleh kosong');
        redirect('Administrator');
  
    }else{

          $CheckUser=$this->MAdministrator->CheckRootLogin($username,$password,$hashpass);
        
          if($CheckUser){
        
              // echo "TRUE";
              $userlogin = $this->MAdministrator->GetUserRoot($username, $hashpass);
              $this->session->set_userdata('logged_gexp_in', $userlogin);
              $data = array(
                "user_lastlogin" => NOW,
              );
              $this->MAdministrator->UpdateLastLogin($data, $userlogin->user_userid);
              redirect('Dashboard_Admin/Dashboard');
              // redirect('BlankPage/test_blank');
        
          }else{
  
              // echo "FALSE";
              $this->session->set_flashdata('warns','Maaf, data yang anda masukan salah / tidak terdaftar');
    
              // echo "<script>alert('Mohon Maaf, Data yang anda masukan salah / Tidak Terdaftar')</script>";
              redirect('Administrator');
        
          }
  
    }

}


public function doLogout()
{
    $this->session->unset_userdata('logged_gexp_in');
    $this->session->sess_destroy();
    redirect('Administrator','refresh');
}




}