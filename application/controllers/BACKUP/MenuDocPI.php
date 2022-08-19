<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuDocPI extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		if(!$this->session->userdata('logged_gexp_in')){
			redirect('LoginSys/doLogout');
		}
		$this->load->model('MRoot');
		$this->load->model('MLogin');
		$this->load->model('MUser');
		$this->load->model('MGroup');
		$this->load->model('MBoardPI');
		$this->load->model('MEmailBlast');
	
	}

public function index()
{
		$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    	$DataUsers=$this->MLogin->GetProfileSign($UserId);
    	$GroupMenu=$DataUsers->UserGroup;
		$data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
		$data['groupname']=$this->MLogin->GetGroupName($UserId);

		$data['listsignPI']=$this->MBoardPI->Getlist_Sign_PI();
		$this->load->view('UploadDocPI/Upload_main',$data);
	
}

public function checksignPI()
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
	$data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
	$data['groupname']=$this->MLogin->GetGroupName($UserId);

	$data['listsignPI']=$this->MBoardPI->Getlist_Sign_PI();

	$signpi_id=$this->input->post('sign_pi_id');

	if($signpi_id==''){
		echo "FALSE";
	}else{
		$data['getrowspi_value'] = $this->MBoardPI->Getlist_signPI_ById($signpi_id);
		$data['session'] = $this->session->userdata('logged_gexp_in')->UserGroup;
		$this->load->view('UploadDocPI/Upload_ByPI',$data);
	}

}


public function reloadsignpi($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
	$data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
	$data['groupname']=$this->MLogin->GetGroupName($UserId);

	$data['listsignPI']=$this->MBoardPI->Getlist_Sign_PI();

	if($signpi_id==''){
		echo "FALSE";
	}else{
		$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
		$this->load->view('UploadDocPI/Upload_ByPI',$data);
	}
}


public function upload01($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date01');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_pi_submitPI'=>'1',
				'sign_pi_submit_path'=>$fileData['file_name'],
				'sign_pi_submit_date'=>$data_date,
				'sign_pi_submit_at'=>NOW,
				'sign_pi_submit_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_signed($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'SIGN PI',
					'pi_execute_by' => $data_balance->signed_by,
					'pi_create_at' => $data_balance->signed_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }
}

public function download01($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_pi_submit_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}



public function upload02($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date02');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData) {
			$data=array(
				'sign_pi_po'=>'1',
				'sign_pi_po_path'=>$fileData['file_name'],
				'sign_pi_po_date'=>$data_date,
				'sign_pi_po_at'=>NOW,
				'sign_pi_po_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_po($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Purchase Order',
					'pi_execute_by' => $data_balance->po_by,
					'pi_create_at' => $data_balance->po_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        } else {
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	} else {
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download02($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_pi_po_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function upload03($signpi_id)
{
	$UserId = $this->session->userdata('logged_gexp_in')->UsersId;
	$data_date = $this->input->post('date03');
	$top = $this->input->post('top');
	$user_list = $this->MUser->getlistusers_email();

	$data = array(
		'sign_pi_top'=>'1',
		'sign_pi_top_value'=>$top,
		'sign_pi_top_date'=>$data_date,
		'sign_pi_top_at'=>NOW,
		'sign_pi_top_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data, $signpi_id)) {
		$data_top = $this->MEmailBlast->get_pi_top($signpi_id);

		$data_email = [
			'pi_no' => $data_top->pi_no,
			'pi_type' => 'TOP',
			'pi_execute_by' => $data_top->top_by,
			'pi_create_at' => $data_top->top_at,
			'pi_progress' => $data_top->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_top->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}

		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function download03($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_pi_top_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function upload04($signpi_id)
{

	$UserId = $this->session->userdata('logged_gexp_in')->UsersId;
	$data_date = $this->input->post('date04');
	$berkas = $this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData){
			$data=array(
				'sign_dp_receipt'=>'1',
				'sign_dp_receipt_path'=>$fileData['file_name'],
				'sign_dp_receipt_date'=>$data_date,
				'sign_dp_receipt_at'=>NOW,
				'sign_dp_receipt_by'=>$UserId,
			);
			
			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_dp_receipt = $this->MEmailBlast->get_pi_dp($signpi_id);

				$data_email = [
					'pi_no' => $data_dp_receipt->pi_no,
					'pi_type' => 'Down Payment Receipt',
					'pi_execute_by' => $data_dp_receipt->dp_by,
					'pi_create_at' => $data_dp_receipt->dp_at,
					'pi_progress' => $data_dp_receipt->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_dp_receipt->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
			}
			$this->session->set_flashdata('success','Success, data berhasil di proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
        
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download04($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_dp_receipt_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload05($signpi_id)
{
	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date05');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_dp_receipt_conf'=>'1',
		'sign_dp_receipt_conf_date'=>$data_date,
		'sign_dp_receipt_conf_at'=>NOW,
		'sign_dp_receipt_conf_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_dp_confirm = $this->MEmailBlast->get_pi_dp_confirm($signpi_id);

		$data_email = [
			'pi_no' => $data_dp_confirm->pi_no,
			'pi_type' => 'Down Payment Received Confirmation',
			'pi_execute_by' => $data_dp_confirm->dp_confirm_by,
			'pi_create_at' => $data_dp_confirm->dp_confirm_at,
			'pi_progress' => $data_dp_confirm->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_dp_confirm->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
	}

	$this->session->set_flashdata('success','Success, data berhasil di proses');
	redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
}

public function upload06($signpi_id)
{
	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date06');
	$shipterm=$this->input->post('shipterm');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_shipping_term'=>'1',
		'sign_shipping_term_date'=>$data_date,
		'sign_shipping_term_value'=>$shipterm,
		'sign_shipping_term_at'=>NOW,
		'sign_shipping_term_by'=>$UserId,
	);
	$this->MBoardPI->update_sign01($data,$signpi_id);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_shipping_term($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Shipping Term',
			'pi_execute_by' => $data_balance->ship_term_by,
			'pi_create_at' => $data_balance->ship_term_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload07($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date07');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_bill_of_ladding'=>'1',
				'sign_bill_of_ladding_path'=>$fileData['file_name'],
				'sign_bill_of_ladding_date'=>$data_date,
				'sign_bill_of_ladding_at'=>NOW,
				'sign_bill_of_ladding_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_billing($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Bill Of Ladding',
					'pi_execute_by' => $data_balance->billing_by,
					'pi_create_at' => $data_balance->billing_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download07($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_bill_of_ladding_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function upload08($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date08');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_packing_list'=>'1',
				'sign_packing_list_path'=>$fileData['file_name'],
				'sign_packing_list_date'=>$data_date,
				'sign_packing_list_at'=>NOW,
				'sign_packing_list_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_packing($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Packing List',
					'pi_execute_by' => $data_balance->packing_by,
					'pi_create_at' => $data_balance->packing_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download08($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_packing_list_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload09($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date09');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData) {
			$data=array(
				'sign_invoice'=>'1',
				'sign_invoice_path'=>$fileData['file_name'],
				'sign_invoice_date'=>$data_date,
				'sign_invoice_at'=>NOW,
				'sign_invoice_by'=>$UserId,
			);
			
			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_invoice = $this->MEmailBlast->get_pi_invoice($signpi_id);
				$data_email = [
					'pi_no' => $data_invoice->pi_no,
					'pi_type' => 'Invoice',
					'pi_execute_by' => $data_invoice->invoice_by,
					'pi_create_at' => $data_invoice->invoice_at,
					'pi_progress' => $data_invoice->total,
				];

				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_invoice->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        } else {
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	} else {
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download09($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_invoice_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload10($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date10');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_invoice_underval'=>'1',
				'sign_invoice_underval_path'=>$fileData['file_name'],
				'sign_invoice_underval_date'=>$data_date,
				'sign_invoice_underval_at'=>NOW,
				'sign_invoice_underval_by'=>$UserId,
			);
			
			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_invoice_uv = $this->MEmailBlast->get_pi_invoice_uv($signpi_id);
				$data_email = [
					'pi_no' => $data_invoice_uv->pi_no,
					'pi_type' => 'Invoice Under Value',
					'pi_execute_by' => $data_invoice_uv->invoice_uv_by,
					'pi_create_at' => $data_invoice_uv->invoice_uv_at,
					'pi_progress' => $data_invoice_uv->total,
				];

				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_invoice_uv->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}

				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download10($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_invoice_underval_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload11($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date11');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_coo'=>'1',
				'sign_coo_path'=>$fileData['file_name'],
				'sign_coo_date'=>$data_date,
				'sign_coo_at'=>NOW,
				'sign_coo_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_coo($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'COO',
					'pi_execute_by' => $data_balance->coo_by,
					'pi_create_at' => $data_balance->coo_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download11($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_coo_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload12($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date12');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData) {
			$data=array(
				'sign_healthcert'=>'1',
				'sign_healthcert_path'=>$fileData['file_name'],
				'sign_healthcert_date'=>$data_date,
				'sign_healthcert_at'=>NOW,
				'sign_healthcert_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_health($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Health Certificate / Certificate of Free Sale',
					'pi_execute_by' => $data_balance->healthcert_by,
					'pi_create_at' => $data_balance->healthcert_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        } else {
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download12($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_healthcert_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function upload13($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date13');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_materialsafe'=>'1',
				'sign_materialsafe_path'=>$fileData['file_name'],
				'sign_materialsafe_date'=>$data_date,
				'sign_materialsafe_at'=>NOW,
				'sign_materialsafe_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_material($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Material Safety Data Sheet',
					'pi_execute_by' => $data_balance->materialsafe_by,
					'pi_create_at' => $data_balance->materialsafe_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        } else {
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	} else {
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download13($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_materialsafe_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload14($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date14');
	$berkas=$this->input->post('berkas');

	$config['upload_path']          = './assets/SignUpload/';
    $config['allowed_types']        = 'pdf';
    // $config['allowed_types']        = 'gif|jpg|png|pdf';
	$config['max_size']             = 2000;
	// $config['max_width']            = 1024;
	// $config['max_height']           = 768;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData){

			// echo "T";

			$data=array(
				'sign_coa'=>'1',
				'sign_coa_path'=>$fileData['file_name'],
				'sign_coa_date'=>$data_date,
				'sign_coa_at'=>NOW,
				'sign_coa_by'=>$UserId,
			);
			$this->MBoardPI->update_sign01($data,$signpi_id);

			$this->session->set_flashdata('success','Success, data berhasil di proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			// redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
        
        }else{

			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
            // echo "F";
        
		}
		
	}else{

		// echo "fail";
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
        // $this->session->set_flashdata('error', $this->upload->display_errors());
        // redirect('Upload_File');
   }

}

public function download14($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_coa_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload15($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date15');
	$berkas=$this->input->post('berkas');

	$config['upload_path']          = './assets/SignUpload/';
    $config['allowed_types']        = 'pdf';
    // $config['allowed_types']        = 'gif|jpg|png|pdf';
	$config['max_size']             = 2000;
	// $config['max_width']            = 1024;
	// $config['max_height']           = 768;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData){

			// echo "T";

			$data=array(
				'sign_product_specificat'=>'1',
				'sign_product_specificat_path'=>$fileData['file_name'],
				'sign_product_specificat_date'=>$data_date,
				'sign_product_specificat_at'=>NOW,
				'sign_product_specificat_by'=>$UserId,
			);
			$this->MBoardPI->update_sign01($data,$signpi_id);

			$this->session->set_flashdata('success','Success, data berhasil di proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			// redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
        
        }else{
		
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
            // echo "F";
        
		}
		
	}else{

		// echo "fail";
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
        // $this->session->set_flashdata('error', $this->upload->display_errors());
        // redirect('Upload_File');
   }

}

public function download15($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_product_specificat_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload16($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date16');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_spp'=>'1',
				'sign_spp_path'=>$fileData['file_name'],
				'sign_spp_date'=>$data_date,
				'sign_spp_at'=>NOW,
				'sign_spp_by'=>$UserId,
			);
			
			// $this->MBoardPI->update_sign01($data,$signpi_id);
			// $this->session->set_flashdata('success','Success, data berhasil di proses');
			// redirect('MenuDocPI/reloadsignpi/'.$signpi_id);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_spp($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Surat Pernyataan Product',
					'pi_execute_by' => $data_balance->spp_by,
					'pi_create_at' => $data_balance->spp_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        } else {
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	} else {
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download16($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_spp_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function upload17($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date17');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path']          = './assets/SignUpload/';
    $config['allowed_types']        = 'pdf';
	$config['max_size']             = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_others'=>'1',
				'sign_others_path'=>$fileData['file_name'],
				'sign_others_date'=>$data_date,
				'sign_others_at'=>NOW,
				'sign_others_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_others($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Others',
					'pi_execute_by' => $data_balance->others_by,
					'pi_create_at' => $data_balance->others_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download17($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_others_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload18($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date18');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_expprint_trial'=>'1',
				'sign_expprint_trial_path'=>$fileData['file_name'],
				'sign_expprint_trial_date'=>$data_date,
				'sign_expprint_trial_at'=>NOW,
				'sign_expprint_trial_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_ket_exp_doc($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Ketentuan Export Dokumen',
					'pi_execute_by' => $data_balance->ket_doc_by,
					'pi_create_at' => $data_balance->ket_doc_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }

}

public function download18($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_expprint_trial_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function upload19($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date19');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_expprint_apprv'=>'1',
		'sign_expprint_apprv_date'=>$data_date,
		'sign_expprint_apprv_at'=>NOW,
		'sign_expprint_apprv_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_ket_exp_doc_apprv($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Ketentuan Export Dokumen Approval',
			'pi_execute_by' => $data_balance->ket_doc_apprv_by,
			'pi_create_at' => $data_balance->ket_doc_apprv_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload20($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date20');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_foc'=>'1',
		'sign_foc_date'=>$data_date,
		'sign_foc_at'=>NOW,
		'sign_foc_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_foc = $this->MEmailBlast->get_pi_foc($signpi_id);
		$data_email = [
			'pi_no' => $data_foc->pi_no,
			'pi_type' => 'FOC Approval',
			'pi_execute_by' => $data_foc->foc_by,
			'pi_create_at' => $data_foc->foc_at,
			'pi_progress' => $data_foc->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_foc->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload21($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date21');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_posm'=>'1',
		'sign_posm_date'=>$data_date,
		'sign_posm_at'=>NOW,
		'sign_posm_by'=>$UserId,
	);
	
	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_posm($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'POSM Availbility',
			'pi_execute_by' => $data_balance->posm_by,
			'pi_create_at' => $data_balance->posm_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload22($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date22');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_finishgod'=>'1',
		'sign_finishgod_date'=>$data_date,
		'sign_finishgod_at'=>NOW,
		'sign_finishgod_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_finish_good($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Finish Good Ready Date',
			'pi_execute_by' => $data_balance->finish_by,
			'pi_create_at' => $data_balance->finish_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload23($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date23');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_vesselsche'=>'1',
		'sign_vesselsche_date'=>$data_date,
		'sign_vesselsche_at'=>NOW,
		'sign_vesselsche_by'=>$UserId,
	);
	// $this->MBoardPI->update_sign01($data,$signpi_id);
	// $this->session->set_flashdata('success','Success, data berhasil di proses');
	// redirect('MenuDocPI/reloadsignpi/'.$signpi_id);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_vessel_schedule($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Vessel Schedule',
			'pi_execute_by' => $data_balance->vessel_schedule_by,
			'pi_create_at' => $data_balance->vessel_schedule_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload24($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date24');
	$balance_val=$this->input->post('balancepay_val');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_balancepay'=>'1',
		'sign_balancepay_value'=>$balance_val,
		'sign_balancepay_date'=>$data_date,
		'sign_balancepay_at'=>NOW,
		'sign_balancepay_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_balance($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Balance Payment',
			'pi_execute_by' => $data_balance->balance_by,
			'pi_create_at' => $data_balance->balance_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload25($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date25');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_vesselbookconf'=>'1',
		'sign_vesselbookconf_date'=>$data_date,
		'sign_vesselbookconf_at'=>NOW,
		'sign_vesselbookconf_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_vessel_booking($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Vessel Booking Confirmation',
			'pi_execute_by' => $data_balance->vessel_book_by,
			'pi_create_at' => $data_balance->vessel_book_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload26($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date26');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			$data=array(
				'sign_stuffing'=>'1',
				'sign_stuffing_path'=>$fileData['file_name'],
				'sign_stuffing_date'=>$data_date,
				'sign_stuffing_at'=>NOW,
				'sign_stuffing_by'=>$UserId,
			);

			if($this->MBoardPI->update_sign01($data,$signpi_id)) {
				$data_balance = $this->MEmailBlast->get_pi_stuffing($signpi_id);
				$data_email = [
					'pi_no' => $data_balance->pi_no,
					'pi_type' => 'Stuffing',
					'pi_execute_by' => $data_balance->stuffing_by,
					'pi_create_at' => $data_balance->stuffing_at,
					'pi_progress' => $data_balance->total,
				];
		
				foreach($user_list as $email) {
					send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
				}
				
				$this->session->set_flashdata('success','Success, data berhasil di proses');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / Ada Kesalahan Dalam Proses');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }
}

public function upload27($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date27');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_draftbl_sent'=>'1',
		'sign_draftbl_sent_date'=>$data_date,
		'sign_draftbl_sent_at'=>NOW,
		'sign_draftbl_sent_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_draft_sent($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Draft BL Sent',
			'pi_execute_by' => $data_balance->draft_sent_by,
			'pi_create_at' => $data_balance->draft_sent_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload28($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date28');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_draftbl_apprv'=>'1',
		'sign_draftbl_apprv_date'=>$data_date,
		'sign_draftbl_apprv_at'=>NOW,
		'sign_draftbl_apprv_by'=>$UserId,
	);
	// $this->MBoardPI->update_sign01($data,$signpi_id);
	// $this->session->set_flashdata('success','Success, data berhasil di proses');
	// redirect('MenuDocPI/reloadsignpi/'.$signpi_id);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_draft_apprv($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Draft BL Approved',
			'pi_execute_by' => $data_balance->draft_apprv_by,
			'pi_create_at' => $data_balance->draft_apprv_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload29($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date29');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_telex_release'=>'1',
		'sign_telex_release_date'=>$data_date,
		'sign_telex_release_at'=>NOW,
		'sign_telex_release_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_telex($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Telex Release',
			'pi_execute_by' => $data_balance->telex_by,
			'pi_create_at' => $data_balance->telex_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload30($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date30');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_origin_docsent'=>'1',
		'sign_origin_docsent_date'=>$data_date,
		'sign_origin_docsent_at'=>NOW,
		'sign_origin_docsent_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_ori_doc($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Original Document Sent',
			'pi_execute_by' => $data_balance->ori_doc_by,
			'pi_create_at' => $data_balance->ori_doc_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload31($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date31');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_toppay_balance'=>'1',
		'sign_toppay_balance_date'=>$data_date,
		'sign_toppay_balance_at'=>NOW,
		'sign_toppay_balance_by'=>$UserId,
	);
	// $this->MBoardPI->update_sign01($data,$signpi_id);
	
	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_top_payment($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'TOP Payment Balancing',
			'pi_execute_by' => $data_balance->top_balance_by,
			'pi_create_at' => $data_balance->top_balance_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function upload32($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date32');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_etd'=>'1',
		'sign_etd_date'=>$data_date,
		'sign_etd_at'=>NOW,
		'sign_etd_by'=>$UserId,
	);

	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_etd($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Estimation Time of Departure [ETD]',
			'pi_execute_by' => $data_balance->etd_by,
			'pi_create_at' => $data_balance->etd_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}

}

public function upload33($signpi_id)
{

	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$data_date=$this->input->post('date33');
	$user_list = $this->MUser->getlistusers_email();

	$data=array(
		'sign_eta'=>'1',
		'sign_eta_date'=>$data_date,
		'sign_eta_at'=>NOW,
		'sign_eta_by'=>$UserId,
	);
	if($this->MBoardPI->update_sign01($data,$signpi_id)) {
		$data_balance = $this->MEmailBlast->get_pi_eta($signpi_id);
		$data_email = [
			'pi_no' => $data_balance->pi_no,
			'pi_type' => 'Estimation Time of Arrival [ETA]',
			'pi_execute_by' => $data_balance->eta_by,
			'pi_create_at' => $data_balance->eta_at,
			'pi_progress' => $data_balance->total,
		];

		foreach($user_list as $email) {
			send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
		}
		
		$this->session->set_flashdata('success','Success, data berhasil di proses');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
	}
}

public function download25($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_stuffing_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}

public function download26($signpi_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
	$file01=$data['getrowspi_value']->sign_stuffing_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function uploadsigncoa($signpi_id)
{
	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$datecoa=$this->input->post('datecoa');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			echo "T";
			$data=array(
				'sign_id_pi'=>$signpi_id,
				'coa_detsign_date'=>$datecoa,
				'coa_detsign_path'=>$fileData['file_name'],
				'createdAt'=>NOW,
				'createdBy'=>$UserId,
			);
			
			$insert=$this->MBoardPI->tambah_fileitems_coa($data);
			if($insert){
				$data2=array(
					'sign_coa'=>'1',
					'sign_coa_date'=>$datecoa,
					'sign_coa_at'=>NOW,
					'sign_coa_by'=>$UserId,
				);

				if($this->MBoardPI->update_sign01($data2,$signpi_id)) {
					$data_balance = $this->MEmailBlast->get_pi_coa($signpi_id);
					$data_email = [
						'pi_no' => $data_balance->pi_no,
						'pi_type' => 'COA',
						'pi_execute_by' => $data_balance->coa_by,
						'pi_create_at' => $data_balance->coa_at,
						'pi_progress' => $data_balance->total,
					];
			
					foreach($user_list as $email) {
						send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
					}
					
					$this->session->set_flashdata('success','Success, data berhasil di proses');
					redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
				}
			}else{
				$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			echo "F";
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
		
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }
}


public function uploadprodspec($signpi_id)
{
	$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
	$datespec=$this->input->post('datespec');
	$berkas=$this->input->post('berkas');
	$user_list = $this->MUser->getlistusers_email();

	$config['upload_path'] = './assets/SignUpload/';
    $config['allowed_types'] = 'pdf';
	$config['max_size'] = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {
        $fileData = $this->upload->data();
        if($fileData){
			echo "T";
			$data=array(
				'sign_pi_id'=>$signpi_id,
				'prodspec_date'=>$datespec,
				'prodspec_val'=>$fileData['file_name'],
				'createdAt'=>NOW,
				'createdBy'=>$UserId,
			);
			
			$insert=$this->MBoardPI->tambah_fileitems_prodspec($data);
			if($insert){
				$data2=array(
					'sign_product_specificat'=>'1',
					'sign_product_specificat_date'=>$datespec,
					'sign_product_specificat_at'=>NOW,
					'sign_product_specificat_by'=>$UserId,
				);

				if($this->MBoardPI->update_sign01($data2,$signpi_id)) {
					$data_balance = $this->MEmailBlast->get_pi_prod_spec($signpi_id);
					$data_email = [
						'pi_no' => $data_balance->pi_no,
						'pi_type' => 'Product Specification',
						'pi_execute_by' => $data_balance->prod_spec_by,
						'pi_create_at' => $data_balance->prod_spec_at,
						'pi_progress' => $data_balance->total,
					];
			
					foreach($user_list as $email) {
						send_mails('PROGRESS PI | '.$data_balance->pi_no, $email, $this->load->view('template/email', $data_email,  TRUE));
					}
					
					$this->session->set_flashdata('success','Success, data berhasil di proses');
					redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
				}
			}else{
				$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
				redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
			}
        }else{
			echo "F";
			$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
			redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
		}
	}else{
		$this->session->set_flashdata('warns','Maaf, data tidak dapat di proses / silahkan upload document');
		redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
   }
}


public function getlistsign_coa($signpi_id)
{
		$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    	$DataUsers=$this->MLogin->GetProfileSign($UserId);
    	$GroupMenu=$DataUsers->UserGroup;
		$data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
		$data['groupname']=$this->MLogin->GetGroupName($UserId);

		$data['listsignPI']=$this->MBoardPI->Getlist_Sign_PI();
		$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
		$data['signpi_id']=$signpi_id;

		$data['lscoafile_bypi']=$this->MBoardPI->GetList_AllCoaLamp($signpi_id);

		$this->load->view('UploadDocPI/PreviewlistCoa',$data);
}


public function getlistsign_prodspec($signpi_id)
{
		$UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    	$DataUsers=$this->MLogin->GetProfileSign($UserId);
    	$GroupMenu=$DataUsers->UserGroup;
		$data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
		$data['groupname']=$this->MLogin->GetGroupName($UserId);

		$data['listsignPI']=$this->MBoardPI->Getlist_Sign_PI();
		$data['getrowspi_value']=$this->MBoardPI->Getlist_signPI_ById($signpi_id);
		$data['signpi_id']=$signpi_id;

		$data['lsprodsfile_bypi']=$this->MBoardPI->GetList_AllProdspecLamp($signpi_id);

		$this->load->view('UploadDocPI/PreviewlistProdspec',$data);
}


public function DownloadFile_Coadet($coa_detsign_id)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->GetList_RowCoaLamp($coa_detsign_id);
	$file01=$data['getrowspi_value']->coa_detsign_path;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


public function DownloadFile_Prodspec($prodspec_signid)
{
	$this->load->helper('download');
	$data['getrowspi_value']=$this->MBoardPI->GetList_RowProdsLamp($prodspec_signid);
	$file01=$data['getrowspi_value']->prodspec_val;
	force_download('./assets/SignUpload/'.$file01, NULL);
}


    
}
