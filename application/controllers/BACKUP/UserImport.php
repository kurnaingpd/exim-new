<?php defined('BASEPATH') OR exit('No direct script access allowed');

    Class UserImport extends CI_Controller
    {
        function __construct(){
            parent:: __construct();
            
            if(!$this->session->userdata('logged_gexp_in')){
                redirect('LoginImport/doLogout');
            }
            $this->load->model(array('MUserImport'));
        }

        public function index()
        {
            $params['datas'] = $this->MUserImport->list();

            $this->load->view('UserImport/user-index', $params);
        }

        public function create()
        {
            $response = ['result' => 0];

            $post = $this->input->post();
            $getUser = $this->MUserImport->getUserByUsername($post['username']);

            $datas = [
                'user_username' => $post['username'],
                'user_nip' => $post['nip'],
                'user_accountname' => ucwords($post['accname']),
                'user_email' => $post['email'],
                'user_pass' => md5(12345),
                'user_encrypt' => base64_encode(hash("sha1", md5(12345))),
                'user_phone' => $post['phonenumber'],
                'user_status' => 1,
                'user_createdAt' => date('Y-m-d H:i:s'),
                'user_createdBy' => $this->session->userdata('logged_gexp_in')->user_id,
                'user_role' => 2,
            ];

            if(empty($getUser)) {
                if( $this->MUserImport->save($datas) ) {
                    $response = ['result' => 1, 'title' => '', 'message' => 'Data has been saved successfully', 'icon' => 'success', 'site' => 'UserImport'];
                } else {
                    $response = ['result' => 0, 'title' => '', 'message' => 'Data has failed to save', 'icon' => 'warning', 'site' => 'UserImport'];
                }
            } else {
                $response = ['result' => 0, 'title' => '', 'message' => 'Username '.$post['username'].' has been exist', 'icon' => 'warning'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $params['data'] = $this->MUserImport->getUserByID($id);
            $this->load->view('UserImport/user-detail', $params);
        }

        public function update()
        {
            $response = ['result' => 0];

            $post = $this->input->post();

            $datas = [
                'user_username' => $post['username'],
                'user_nip' => $post['nip'],
                'user_accountname' => ucwords($post['accname']),
                'user_email' => $post['email'],
                'user_phone' => $post['phonenumber'],
                'user_updatedAt' => date('Y-m-d H:i:s'),
                'user_updatedBy' => $this->session->userdata('logged_gexp_in')->user_id,
            ];

            if( $this->MUserImport->update($datas, ['user_id' => $post['id']]) ) {
                $response = ['result' => 1, 'title' => '', 'message' => 'Data has been updated successfully', 'icon' => 'success', 'site' => 'UserImport'];
            } else {
                $response = ['result' => 0, 'title' => '', 'message' => 'Data has failed to update', 'icon' => 'warning', 'site' => 'UserImport'];
            }
            
            echo json_encode($response);
        }
    }

?>