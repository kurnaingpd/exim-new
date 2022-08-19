<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestUpload extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    $this->load->model('MTestUpload');
}

public function index(){

	$this->load->view('TestUpload');
}


public function aksi_upload(){

    $berkas=$this->input->post('berkas');

	$config['upload_path']          = './assets/doc_upload/';
    $config['allowed_types']        = 'pdf';
    // $config['allowed_types']        = 'gif|jpg|png|pdf';
	$config['max_size']             = 2000;
	// $config['max_width']            = 1024;
	// $config['max_height']           = 768;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData){

            echo "T";
        
        }else{
        
            echo "F";
        
        }

        // $data = [
        //      'gpr_incident_photo01' => $fileData['file_name'],
        //     //  'tipe_file' => $fileData['file_type'],
        //     //  'ukuran_file' => $fileData['file_size'],
        // ];

        // if($this->M_User->update($data,$incident_id)) {
        //     echo "success";
        //     //  $this->session->set_flashdata('success', '<p>Selamat! Anda berhasil mengunggah file <strong>'. $fileData['file_name'] .'</strong></p>');
        // } else {
        //     echo "fail_upload";
        //     //  $this->session->set_flashdata('error', '<p>Gagal! File '. $fileData['file_name'] .' tidak berhasil tersimpan di database anda</p>');
        // }

        // redirect('Upload_File');
   }else{

        echo "fail";
        // $this->session->set_flashdata('error', $this->upload->display_errors());
        // redirect('Upload_File');
   }
 
	// if ( ! $this->upload->do_upload('berkas')){
	// 	$error = array('error' => $this->upload->display_errors());
	// 	$this->load->view('v_upload', $error);
	// }else{
	// 	$data = array('upload_data' => $this->upload->data());
	// 	$this->load->view('v_upload_sukses', $data);
	// }
}


}