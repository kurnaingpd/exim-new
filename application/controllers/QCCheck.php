<?php

    Class QCCheck extends CI_Controller
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
                base_url("assets/js/qc_check/list.js"),
            ];
            $datas['title'] = 'Export - QC Check';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'QC Check'];
            $datas['header'] = 'QC check list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_qcontrol_check_list')
            ];

            $this->template->load('default', 'contents' , 'export/qc_check/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/qc_check/add.js"),
            ];
            $datas['title'] = 'Export - QC Check';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'QC Check'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'autonumber' => $this->M_CRUD->autoNumberQCheck('trans_qcontrol_check', 'code', '/SKP-QC/'.date('m/Y'), 4),
                'product' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
                'status' => $this->M_CRUD->readData('master_qc_status', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'export/qc_check/add', $datas);
        }

        public function batch($id = NULL)
        {
            $data = $this->M_CRUD->readData('view_trans_qcheck_batch', ['item_id' => $id]);
            echo json_encode($data);
        }

        public function save()
        {
            $path = 'assets/attachment/qc_check/';
            $post = $this->input->post();
            $qc_check = $this->M_CRUD->readDatabyID('trans_qcontrol_check', ['code' => $post['code']]);
            
            if($qc_check) {
                $response = ['status' => 0, 'messages' => 'QC check code Already exists.', 'icon' => 'error'];
            } else {
                $params = [
                    'code' => $post['code'],
                    'item_id' => $post['product'],
                    'production_date' => $post['prod_date'],
                    'expired_date' => $post['exp_date'],
                    'surat_jalan' => $post['no_surat'],
                    'batch_pl_detail_id' => $post['batch'],
                    'aroma' => $post['aroma'],
                    'taste' => $post['taste'],
                    'value' => $post['value'],
                    'moisture' => $post['moisture'],
                    'ph' => $post['ph'],
                    'brix' => $post['brix'],
                    'finish_good_date' => $post['finish_date'],
                    'analys_date' => $post['analys_date'],
                    'analys_end_date' => $post['analys_end_date'],
                    'total_plate' => $post['tot_plate'],
                    'yeast' => $post['yeast'],
                    'coliform' => $post['coliform'],
                    'salmonella' => $post['salmonella'],
                    'enterobacteriaceae' => $post['enterobacteriaceae'],
                    'qc_status_id' => $post['status'],
                    'release_date' => $post['release_date'],
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];
    
                if($_FILES) {
                    if ( isset($_FILES['attachment_1']) && $_FILES['attachment_1']['name'] != '' ) {
                        $temp_name = $_FILES['attachment_1']['name'];
                        $ext = explode('.', $temp_name);
                        $end = strtolower(end($ext));
                        $timestamp = mt_rand(1, time());
                        $randomDate = date("d M Y", $timestamp);
                        $filename = 'QC-Check-'.md5($randomDate).'_1.'.$end;
                        move_uploaded_file($_FILES['attachment_1']['tmp_name'], $path.$filename);
                        $params['attachment_1'] = $path.$filename;
                    }
    
                    if ( isset($_FILES['attachment_2']) && $_FILES['attachment_2']['name'] != '' ) {
                        $temp_name = $_FILES['attachment_2']['name'];
                        $ext = explode('.', $temp_name);
                        $end = strtolower(end($ext));
                        $timestamp = mt_rand(1, time());
                        $randomDate = date("d M Y", $timestamp);
                        $filename = 'QC-Check-'.md5($randomDate).'_2.'.$end;
                        move_uploaded_file($_FILES['attachment_2']['tmp_name'], $path.$filename);
                        $params['attachment_2'] = $path.$filename;
                    }
    
                    if($this->M_CRUD->insertData('trans_qcontrol_check', $params)) {
                        $response = ['status' => 1, 'messages' => 'QC check has been saved successfully.', 'icon' => 'success', 'url' => 'export/qc_check'];
                    } else {
                        $response = ['status' => 0, 'messages' => 'QC check has failed to save.', 'icon' => 'error'];
                    }
                } else {
                    $response = ['status' => 0, 'messages' => 'QC check image has failed to save.', 'icon' => 'error'];
                }
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['css'] = [
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];

            $datas['js'] = [
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/qc_check/detail.js"),
            ];
            $datas['title'] = 'Export - QC Check';
            $datas['breadcrumb'] = ['Export', 'Transaction', 'QC Check'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('trans_qcontrol_check', ['is_deleted' => '0', 'id' => $id]),
                'product' => $this->M_CRUD->readData('master_item', ['is_deleted' => '0']),
                'status' => $this->M_CRUD->readData('master_qc_status', ['is_deleted' => '0']),
            ];
            $datas['chained'] = [
                'batch' => $this->M_CRUD->readData('view_trans_qcheck_batch', ['item_id' => $datas['params']['detail']->item_id]),
            ];

            $this->template->load('default', 'contents' , 'export/qc_check/detail', $datas);
        }

        public function update()
        {
            $path = 'assets/attachment/qc_check/';
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $params = [
                'item_id' => $post['product'],
                'production_date' => $post['prod_date'],
                'expired_date' => $post['exp_date'],
                'surat_jalan' => $post['no_surat'],
                'batch_pl_detail_id' => $post['batch'],
                'aroma' => $post['aroma'],
                'taste' => $post['taste'],
                'value' => $post['value'],
                'moisture' => $post['moisture'],
                'ph' => $post['ph'],
                'brix' => $post['brix'],
                'finish_good_date' => $post['finish_date'],
                'analys_date' => $post['analys_date'],
                'analys_end_date' => $post['analys_end_date'],
                'total_plate' => $post['tot_plate'],
                'yeast' => $post['yeast'],
                'coliform' => $post['coliform'],
                'salmonella' => $post['salmonella'],
                'enterobacteriaceae' => $post['enterobacteriaceae'],
                'qc_status_id' => $post['status'],
                'release_date' => $post['release_date'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if ( isset($_FILES['attachment_1']) && $_FILES['attachment_1']['name'] != '' ) {
                $temp_name = $_FILES['attachment_1']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename = 'QC-Check-'.md5($randomDate).'_1.'.$end;
                move_uploaded_file($_FILES['attachment_1']['tmp_name'], $path.$filename);
                $params['attachment_1'] = $path.$filename;
            }

            if ( isset($_FILES['attachment_2']) && $_FILES['attachment_2']['name'] != '' ) {
                $temp_name = $_FILES['attachment_2']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename = 'QC-Check-'.md5($randomDate).'_2.'.$end;
                move_uploaded_file($_FILES['attachment_2']['tmp_name'], $path.$filename);
                $params['attachment_2'] = $path.$filename;
            }

            if($this->M_CRUD->updateData('trans_qcontrol_check', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'QC check has been updated successfully.', 'icon' => 'success', 'url' => 'export/qc_check'];
            } else {
                $response = ['status' => 0, 'messages' => 'QC check has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>