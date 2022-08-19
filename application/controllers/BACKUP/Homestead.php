<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homestead extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    $this->load->model('MRoot');
    $this->load->model('MLogin');
}

public function index(){

	$this->load->view('homestead');

}


}