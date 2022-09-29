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
                // 'autonumber' => $this->M_CRUD->autoNumberExpTerms('trans_export_terms', 'code', 'ExpTerm/'.date('Y/m/'), 4),
                'autonumber' => $this->M_CRUD->autoNumberInvoice('trans_export_terms', 'code', '/ExpTerm/'.date('m/Y'), 4),
                'pi' => $this->M_CRUD->readDatabyID('view_trans_pi_expterm', ['id' => $id]),
            ];

            $this->template->load('default', 'contents' , 'export/expterm/add', $datas);
        }

        public function save()
        {
            $path = 'assets/attachment/expterm/';
            $post = $this->input->post();

            if ( isset($_FILES['attachment']) && $_FILES['attachment']['name'] != '' ) {
                $temp_name = $_FILES['attachment']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename = 'Export-Terms-'.md5($randomDate).'.'.$end;

                if ( !file_exists($path) ) {
                    mkdir($path, 0777, true);
                }

                move_uploaded_file($_FILES['attachment']['tmp_name'], $path.$filename);

                $params = [
                    'pi_id' => $post['pi_no'],
                    'code' => $post['code'],
                    'file' => $filename,
                    'pi_status_id' => 1,
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];
                $header = $this->M_CRUD->insertData('trans_export_terms', $params);

                if($header) {
                    $paramHistory = [
                        'export_terms_id' => $header,
                        'status_id' => 1,
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];
    
                    $this->M_CRUD->insertData('trans_export_terms_history', $paramHistory);
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
                'category' => $this->M_CRUD->pi_category('view_print_trans_pi_category', ['pi_id' => $id]),
                'item' => $this->M_CRUD->pi_item('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
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
                'category' => $this->M_CRUD->pi_category('view_print_trans_pi_category', ['pi_id' => $id]),
                'item' => $this->M_CRUD->pi_item('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
            ];

            if($datas['params']['detail']->pi_status_id == 7) {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','6']]);
            } else {
                $datas['status'] = $this->M_CRUD->readDataIn('master_pi_status', ['is_deleted' => '0', 'id' => ['3','5','7']]);
            }

            $this->template->load('default', 'contents' , 'export/expterm/process', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['expterm_id']];
            $param = [
                'pi_status_id' => $post['status'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('trans_export_terms', $param, $condition)) {
                $paramHistory = [
                    'export_terms_id' => $post['expterm_id'],
                    'status_id' => $post['status'],
                    'remark' => ($post['remark']?$post['remark']:NULL),
                    'created_by' => $this->session->userdata('logged_in')->id,
                ];

                $this->M_CRUD->insertData('trans_export_terms_history', $paramHistory);
                $response = ['status' => 1, 'messages' => 'Export terms has been updated successfully.', 'icon' => 'success', 'url' => 'export/expterm'];
            } else {
                $response = ['status' => 0, 'messages' => 'Export terms has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>