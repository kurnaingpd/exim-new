<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetCountry extends CI_Controller {

function __construct(){
    parent:: __construct();
    
if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
    $this->load->model('MSetCountry');
}

public function index(){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmastercountry'] =$this->MSetCountry->GetListMasterCountry();

	$this->load->view('DataSetCountry/VList',$data);

}

public function createnewcountry(){

    $CountryCode        =strtoupper($this->input->post('countrycode'));
    $CountryName        =strtoupper($this->input->post('countryname'));

    $checkCountryCode   =$this->MSetCountry->CheckCountryCode($CountryCode);

    if($checkCountryCode==TRUE){

        echo "Data Sudah Tersedia Bro";
    
    }else{
        
        echo "Lanjut Check Country Name";
        $checkCountryName   =$this->MSetCountry->CheckCountryName($CountryName);

        if($checkCountryName==TRUE){

            echo "Data Sudah Tersedia Bro";
        
        }else{
            
            echo "Lanjut Insert Bro";

            $data=array(
                'CountryCode'=> strtoupper($CountryCode),
                'CountryName'=> strtoupper($CountryName),
                'CountryStats'=> "1",
                'CreatedAt'=> date('Y-m-d H:i:s'),
                'CreatedBy'=> $this->session->userdata('logged_gexp_in')->UsersId,
            );

            $insert=$this->MSetCountry->tambah_country($data);

            if($insert){
                echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetCountry');
            }else{
                echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                    redirect('DataSetCountry');
            }
        
        }
    
    }

}

public function Editmastercountry($CountryId){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmastercountry'] =$this->MSetCountry->GetListRowMasterCountry($CountryId);

	$this->load->view('DataSetCountry/VEdit',$data);

}


public function submiteditmastercountry(){

    $CountryId          =$this->input->post('countryid');
    $CountryCode        =strtoupper($this->input->post('countrycode'));
    $CountryName        =strtoupper($this->input->post('countryname'));
    $CountryStats       =$this->input->post('countrystats');
    $date               =date('Y-m-d H:i:s');
    $UserId             =$this->session->userdata('logged_gexp_in')->UsersId;

    $checkCountryCode   =$this->MSetCountry->CheckCountryCode($CountryCode);

    $data=array(
        'CountryCode'   =>$CountryCode,
        'CountryName'   =>$CountryName,
        'CountryStats'  =>$CountryStats,
        'UpdateAt'      =>$date,
        'UpdateBy'      =>$UserId,
    );

    $update=$this->MSetCountry->update_country($CountryId,$data);

    if($update){
        // echo "TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('DataSetCountry');
    }else{
        // echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
        redirect('DataSetCountry');
    }

    // if($checkCountryCode==TRUE){

    //     // echo "Data Sudah Tersedia Bro";
    //         $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Data Country Code Sudah Tersedia');
    //         redirect('DataSetCountry');
    
    // }else{

    //     // echo "Lanjut Check Country Name";
    //     $checkCountryName   =$this->MSetCountry->CheckCountryName($CountryName);

    //     if($checkCountryName==TRUE){

    //         // echo "Data Sudah Tersedia Bro";
    //             $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Data Country Name Sudah Tersedia');
    //             redirect('DataSetCountry');
        
    //     }else{
            
    //         // echo "Lanjut Update Bro";

    //         $data=array(
    //             'CountryCode'   =>$CountryCode,
    //             'CountryName'   =>$CountryName,
    //             'CountryStats'  =>$CountryStats
    //         );

    //         $update=$this->MSetCountry->update_country($CountryId,$data);

    //         if($update){
    //             // echo "TRUE";
    //             $this->session->set_flashdata('success','Data Berhasil Di Proses');
    //             redirect('DataSetCountry');
    //         }else{
    //             // echo "FALSE";
    //             $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
    //             redirect('DataSetCountry');
    //         }
        
    //     }

    // }

}






}