<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginImport extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    // $this->load->model('MRoot');
    $this->load->model('MLogin_Import');
}

public function index(){

	$this->load->view('V_Login');

}

public function doLogin(){

  $username = $this->input->post('username');
  $password = md5($this->input->post('password'));
  $hashpass = base64_encode(hash("sha1",$password));
  

  if($username=='' OR $password==''){
      
      // echo"FALSE";
      $this->session->set_flashdata('warns','Maaf, data input tidak boleh kosong');
      redirect('LoginImport');

  }else{
        $CheckUser=$this->MLogin_Import->CheckRootLogin($username,$password,$hashpass);
      
        if($CheckUser){
      
            // echo "TRUE";
            $userlogin = $this->MLogin_Import->GetUserRoot($username, $hashpass);
            $this->session->set_userdata('logged_gexp_in', $userlogin);
            $data = array(
              "user_lastlogin" => NOW,
            );
            $this->MLogin_Import->UpdateLastLogin($data, $userlogin->user_id);
            redirect('Dashboard/Dashboard');
            // redirect('BlankPage/test_blank');
      
        }else{

            // echo "FALSE";
            $this->session->set_flashdata('warns','Maaf, data yang anda masukan salah / tidak terdaftar');
  
            // echo "<script>alert('Mohon Maaf, Data yang anda masukan salah / Tidak Terdaftar')</script>";
            redirect('LoginImport');
      
        }

  }

}

public function doLogout(){

		$this->session->unset_userdata('logged_gexp_in');
		$this->session->sess_destroy();
		redirect('/','refresh');
  
}


public function checkdb(){

  $username="root01";
  $password="root01";
  $md5pass=md5($password);
  $hashpass = base64_encode(hash("sha1",$md5pass));
  // $hashpass="Y2U1NWVmMzkyNDZhZjVlOWE4OWI5MGY1MmQyZjA0M2FhNmFmMjA0Ng==";

  $userlogin = $this->MLogin->GetUserRoot($username, $hashpass);

  print_r($hashpass);

}




}
