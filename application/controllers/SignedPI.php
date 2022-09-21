<?php

    Class SignedPI extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD']);
        }

        public function index()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/datatables/jquery.dataTables.min.js"),
                base_url("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/signedpi/list.js"),
            ];
            $datas['title'] = 'Export - Signed PI';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Signed PI'];
            $datas['header'] = 'Signed PI list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_pi_list', ['is_deleted' => '0', 'pi_status_id' => '5'])
            ];

            $this->template->load('default', 'contents' , 'export/signedpi/list', $datas);
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/signedpi/detail.js"),
            ];
            $datas['title'] = 'Export - Signed PI';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Signed PI'];
            $datas['header'] = 'Process';
            $datas['params'] = [
                'id' => $id,
                'item' => $this->M_CRUD->readData('view_trans_pi_signed_item', ['pi_id' => $id, 'is_deleted' => '0']),
                'assign' => $this->M_CRUD->pi_item_role('master_pi_item_assign', ['is_deleted' => '0', 'role_id' => $this->session->userdata('logged_in')->role_id]),
                'top' => $this->M_CRUD->readData('master_top', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD->readData('master_incoterm', ['is_deleted' => '0']),
                'balance' => $this->M_CRUD->readData('master_balance_payment', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'export/signedpi/detail', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $Grid = array();
			
            foreach($_POST as $index => $value){
                if(preg_match("/^pi_/i", $index)) {
                    $index = preg_replace("/^pi_/i","",$index);
                    $arr = explode('_',$index);
                    $rnd = $arr[count($arr)-1];
                    array_pop($arr);
                    $idx = implode('_',$arr);
                    
                    $Grid[$rnd][$idx] = $value;
                    if(!isset($Grid[$rnd]['id'])){
                        $Grid[$rnd]['id'] = $post['id'];
                    }
                }
            }

            if($_FILES) {
                foreach($_FILES as $index => $value){
                    if(preg_match("/^pi_/i", $index)) {
                        $index = preg_replace("/^pi_/i","",$index);
                        $arr = explode('_',$index);
                        $rnd = $arr[count($arr)-1];
                        array_pop($arr);
                        $idx = implode('_',$arr);
                        
                        $Grid[$rnd][$idx] = $value['name'];
                        if(!isset($Grid[$rnd]['id'])){
                            $Grid[$rnd]['id'] = $post['id'];
                        }
                    }
                }
            }

            foreach($Grid as $item) {
                if(count(explode('.', $item['val'])) > 1) {
                    $path = 'assets/attachment/signedpi/';
                    $temp_name = $item['val'];
                    $ext = explode('.', $temp_name);
                    $end = strtolower(end($ext));
                    $timestamp = mt_rand(1, time());
                    $randomDate = date("d M Y", $timestamp);
                    $filename = md5($randomDate).'.'.$end;

                    if ( !file_exists($path) ) {
                        mkdir($path, 0777, true);
                    }

                    $name = "pi_val_".$item['item_id'];
                    move_uploaded_file($_FILES[$name]['tmp_name'], $path.$filename);

                    $condition = [
                        'pi_id' => $item['id'],
                        'pi_item_id' => $item['item_id'],
                    ];
                    $params = [
                        'dates' => $item['date'],
                        'value' => 'Attachment location: assets/attachment/signedpi/',
                        'updated_by' => $this->session->userdata('logged_in')->id,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    $paramsAttachment = [
                        'pi_id' => $item['id'],
                        'pi_item_id' => $item['item_id'],
                        'dates' => $item['date'],
                        'values' => $filename,
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];
                    $this->M_CRUD->insertData('trans_signed_pi_attachment', $paramsAttachment);
                } else {
                    $condition = [
                        'pi_id' => $item['id'],
                        'pi_item_id' => $item['item_id'],
                    ];
                    $params = [
                        'dates' => $item['date'],
                        'value' => $item['val'],
                        'updated_by' => $this->session->userdata('logged_in')->id,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }

                if($this->M_CRUD->updateData('trans_signed_pi', $params, $condition)) {
                    $response = ['status' => 1, 'messages' => 'Signed PI has been saved successfully.', 'icon' => 'success', 'url' => 'export/signedpi'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Signed PI has failed to save.', 'icon' => 'error'];
                }
            }

            $data_pi = [
                'header' => $this->M_CRUD->readDatabyID('view_trans_pi_email_header', ['pi_id' => $post['id']]),
                'detail' => $this->M_CRUD->readData('view_trans_pi_email_detail', ['pi_id' => $post['id']]),
                'list' => $this->M_CRUD->pi_email('view_trans_pi_email_user'),
            ];

            sendmail('PROGRESS PI | '.$data_pi['header']->pi_no, $data_pi['list'], $this->load->view('export/email/content', $data_pi['detail'],  TRUE));
            echo json_encode($response);
        }

        public function attachment($pi_id, $item_id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/datatables/jquery.dataTables.min.js"),
                base_url("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"),
                base_url("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"),
                base_url("assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/signedpi/attachment.js"),
            ];
            $datas['title'] = 'Export - Signed PI';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Signed PI'];
            $datas['header'] = 'Attachment list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('trans_signed_pi_attachment', ['pi_id' => $pi_id, 'pi_item_id' => $item_id])
            ];

            $this->template->load('default', 'contents' , 'export/signedpi/attachment', $datas);
        }
    }

?>