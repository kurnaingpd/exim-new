<?php

    Class ExportTerm extends CI_Controller
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
                base_url("assets/js/expterm/list.js"),
            ];
            $datas['title'] = 'Export - Export Terms';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Export Terms'];
            $datas['header'] = 'Export terms list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_export_terms_list')
            ];

            $this->template->load('default', 'contents' , 'export/expterm/list', $datas);
        }

        public function add($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/expterm/add.js"),
            ];
            $datas['title'] = 'Export - Export Terms';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Export Terms'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberInvoice('trans_export_terms', 'code', '/ExpTerm/'.date('m/Y'), 4),
                'pi' => $this->M_CRUD->readDatabyID('view_trans_pi_expterm', ['id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/expterm/add', $datas);
        }

        public function save()
        {
            $path = 'assets/attachment/expterm/';
            $path_signed_pi = 'assets/attachment/signedpi/';
            $post = $this->input->post();
            $pi = $this->M_CRUD->readDatabyID('trans_pi', ['code' => $post['pi_no']]);
            $params = [
                'pi_id' => $pi->id,
                'code' => $post['code'],
                'pi_status_id' => 1,
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $condition = [
                'pi_id' => $pi->id,
                'pi_item_id' => 18,
            ];
            $paramsSignePI = [
                'dates' => date('Y-m-d'),
                'updated_by' => $this->session->userdata('logged_in')->id,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $paramsAttachment_1 = [
                'pi_id' => $pi->id,
                'pi_item_id' => 18,
                'dates' => date('Y-m-d'),
                'created_by' => $this->session->userdata('logged_in')->id,
            ];
            $paramsAttachment_2 = [
                'pi_id' => $pi->id,
                'pi_item_id' => 18,
                'dates' => date('Y-m-d'),
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($_FILES) {
                if ( isset($_FILES['attachment1']) && $_FILES['attachment1']['name'] != '' ) {
                    $temp_name = $_FILES['attachment1']['name'];
                    $ext = explode('.', $temp_name);
                    $end = strtolower(end($ext));
                    $timestamp = mt_rand(1, time());
                    $randomDate = date("d M Y", $timestamp);
                    $filename1 = 'Export-Terms-'.md5($randomDate).'.'.$end;
                    move_uploaded_file($_FILES['attachment1']['tmp_name'], $path.$filename1);
                    $params['file_1'] = $path.$filename1;
                    $paramsAttachment_1['values'] = $path.$filename1;
                    $this->M_CRUD->insertData('trans_signed_pi_attachment', $paramsAttachment_1);
                }

                if ( isset($_FILES['attachment2']) && $_FILES['attachment2']['name'] != '' ) {
                    $temp_name = $_FILES['attachment2']['name'];
                    $ext = explode('.', $temp_name);
                    $end = strtolower(end($ext));
                    $timestamp = mt_rand(1, time());
                    $randomDate = date("d M Y", $timestamp);
                    $filename2 = 'Export-Terms-'.md5($randomDate).'.'.$end;
                    move_uploaded_file($_FILES['attachment2']['tmp_name'], $path.$filename2);
                    $params['file_2'] = $path.$filename2;
                    $paramsAttachment_2['values'] = $path.$filename2;
                    $this->M_CRUD->insertData('trans_signed_pi_attachment', $paramsAttachment_2);
                }

                $header = $this->M_CRUD->insertData('trans_export_terms', $params);

                if($header) {
                    $paramHistory = [
                        'export_terms_id' => $header,
                        'status_id' => 1,
                        'remark' => $post['remarks'],
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];
    
                    if($this->M_CRUD->updateData('trans_signed_pi', $paramsSignePI, $condition)) {
                        $this->M_CRUD->insertData('trans_export_terms_history', $paramHistory);
                    }
                    $response = ['status' => 1, 'messages' => 'Export terms has been saved successfully.', 'icon' => 'success', 'url' => 'export/expterm'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Export terms has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
            ];
            $datas['title'] = 'Export - Export Term';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Export Term'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'container' => $this->M_CRUD->readData('view_trans_pi_container', ['pi_id' => $id]),
                'category' => $this->M_CRUD->readData('view_print_trans_pi_category', ['pi_id' => $id]),
                'item' => $this->M_CRUD->readData('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
                'summary' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_summary', ['pi_id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/expterm/detail', $datas);
        }

        public function process($id)
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/expterm/process.js"),
            ];
            $datas['title'] = 'Export - Export Term';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'Export Term'];
            $datas['header'] = 'Process';
            $datas['params'] = [
                'term' => $this->M_CRUD->readDatabyID('trans_export_terms', ['is_deleted' => '0', 'pi_id' => $id]),
                'detail' => $this->M_CRUD->readDatabyID('view_trans_pi_detail', ['is_deleted' => '0', 'id' => $id]),
                'container' => $this->M_CRUD->readData('view_print_trans_pi_container', ['pi_id' => $id]),
                'category' => $this->M_CRUD->readData('view_print_trans_pi_category', ['pi_id' => $id]),
                'item' => $this->M_CRUD->readData('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
                'summary' => $this->M_CRUD->readDatabyID('view_trans_pi_detail_summary', ['pi_id' => $id]),
            ];

            if($datas['params']['term']->pi_status_id == 7) {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','6']]);
            } else {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','5','7']]);
            }

            $this->template->load('default', 'contents' , 'export/expterm/process', $datas);
        }

        public function update()
        {
            $path = 'assets/attachment/expterm/';
            $post = $this->input->post();
            $condition = ['id' => $post['expterm_id']];
            $attachment = $this->M_CRUD->readData('trans_signed_pi_attachment', ['pi_id' => $post['pi_id'], 'pi_item_id' => 18]);
            $params = [
                'pi_status_id' => $post['status'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];
            $conditionSignedPI = [
                'pi_id' => $post['pi_id'],
                'pi_item_id' => 19,
            ];
            $paramsSignePI = [
                'dates' => date('Y-m-d'),
                'updated_by' => $this->session->userdata('logged_in')->id,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if($_FILES) {
                if ( isset($_FILES['attachment1']) && $_FILES['attachment1']['name'] != '' ) {
                    $temp_name = $_FILES['attachment1']['name'];
                    $ext = explode('.', $temp_name);
                    $end = strtolower(end($ext));
                    $timestamp = mt_rand(1, time());
                    $randomDate = date("d M Y", $timestamp);
                    $filename1 = 'Export-Terms-'.md5($randomDate).'.'.$end;
                    move_uploaded_file($_FILES['attachment1']['tmp_name'], $path.$filename1);
                    $params['file_1'] = $path.$filename1;
                    $conditionAttachment_1 = [
                        'id' => $attachment[0]->id
                    ];
                    $paramsAttachment_1['values'] = $path.$filename1;
                    $this->M_CRUD->updateData('trans_signed_pi_attachment', $paramsAttachment_1, $conditionAttachment_1);
                }

                if ( isset($_FILES['attachment2']) && $_FILES['attachment2']['name'] != '' ) {
                    $temp_name = $_FILES['attachment2']['name'];
                    $ext = explode('.', $temp_name);
                    $end = strtolower(end($ext));
                    $timestamp = mt_rand(1, time());
                    $randomDate = date("d M Y", $timestamp);
                    $filename2 = 'Export-Terms-'.md5($randomDate).'.'.$end;
                    move_uploaded_file($_FILES['attachment2']['tmp_name'], $path.$filename2);
                    $params['file_2'] = $path.$filename2;
                    $conditionAttachment_2 = [
                        'id' => $attachment[1]->id
                    ];
                    $paramsAttachment_2['values'] = $path.$filename2;
                    $this->M_CRUD->updateData('trans_signed_pi_attachment', $paramsAttachment_2, $conditionAttachment_2);
                }

                if($this->M_CRUD->updateData('trans_export_terms', $params, $condition)) {
                    $paramHistory = [
                        'export_terms_id' => $post['expterm_id'],
                        'status_id' => $post['status'],
                        'remark' => ($post['remark']?$post['remark']:NULL),
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];

                    if($this->M_CRUD->insertData('trans_export_terms_history', $paramHistory)) {
                        if($post['status'] == 5) {
                            $this->M_CRUD->updateData('trans_signed_pi', $paramsSignePI, $conditionSignedPI);
                        }
                    }

                    $response = ['status' => 1, 'messages' => 'Export terms has been updated successfully.', 'icon' => 'success', 'url' => 'export/expterm'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Export terms has failed to update.', 'icon' => 'error'];
                }
            } else {
                if($this->M_CRUD->updateData('trans_export_terms', $params, $condition)) {
                    $paramHistory = [
                        'export_terms_id' => $post['expterm_id'],
                        'status_id' => $post['status'],
                        'remark' => ($post['remark']?$post['remark']:NULL),
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];

                    if($this->M_CRUD->insertData('trans_export_terms_history', $paramHistory)) {
                        if($post['status'] == 5) {
                            $this->M_CRUD->updateData('trans_signed_pi', $paramsSignePI, $conditionSignedPI);
                        }
                    }
                    
                    $response = ['status' => 1, 'messages' => 'Export terms has been updated successfully.', 'icon' => 'success', 'url' => 'export/expterm'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Export terms has failed to update.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }
    }

?>