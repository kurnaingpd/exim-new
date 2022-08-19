<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    function __construct(){
        parent:: __construct();
        
        if(!$this->session->userdata('logged_gexp_in')){
            redirect('LoginSys/doLogout');
        }
            $this->load->model('MRoot');
            $this->load->model('MLogin');
            $this->load->model('MAdministrator');
    }

public function Login_Administrator()
{
    $this->load->view('Administrator/Login');
}

public function authenticate()
{
    
    $mail=$this->input->post('email');
    $pass=md5($this->input->post('password'));
    $hashpass = base64_encode(hash("sha1",$pass));

    $checkauth=$this->MAdministrator->getuser_administrator($mail, $hashpass);

    if($checkauth=='TRUE'){
        // redirect('Administrator/Dashboard');
        echo "TRUE";
    }else{
        // redirect('Administrator/Login_Administrator');
        echo "FALSE";
    }


}

public function Dashboard()
{
    $this->load->view('Administrator/Dashboard');
}


}