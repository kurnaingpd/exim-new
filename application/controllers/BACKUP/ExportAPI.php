<?php
class ExportAPI extends CI_Controller{
function __construct(){
    header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    parent:: __construct();

        $this->load->model('MExportApi');
    }


public function get_list_user_all()
{
    $listusers=$this->MExportApi->GetListUser_All();
    if(!empty($listusers)){
        $rsp['status']="200";
        $msg['message']="User Listing";
        $res['data']=$listusers;
        $response = array_merge($rsp, $msg, $res);
        $json = json_encode($response);
        echo $json;
    }else{

       $rsp['status']="200";
       $msg['message']="User Listing Empty";
       $res['data']="";
       $response = array_merge( $rsp, $msg, $res );
       $json = json_encode($response);
       echo $json;

    }
}

}