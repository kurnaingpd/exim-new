<?php

    Class DocumentImport extends CI_Controller
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
                base_url("assets/js/docimport/list.js"),
            ];
            $datas['title'] = 'Import - Document Import';
            $datas['breadcrumb'] = ['Import', 'Transaction', 'Document Import'];
            $datas['header'] = 'Document import list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('trans_doc_import', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'import/docimport/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
                "text/css,stylesheet, https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css",
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                "https://cdn.jsdelivr.net/npm/flatpickr",
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/docimport/add.js"),
            ];
            $datas['title'] = 'Import - Document Import';
            $datas['breadcrumb'] = ['Import', 'Transaction', 'Document Import'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'shipper' => $this->M_CRUD->readData('master_shipper', ['is_deleted' => '0']),
                'consignee' => $this->M_CRUD->readData('master_consignee', ['is_deleted' => '0']),
                'category' => $this->M_CRUD->readData('master_category', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD->readData('master_incoterm', ['is_deleted' => '0']),
                'uom' => $this->M_CRUD->readData('master_uom', ['is_deleted' => '0']),
                'forwarder' => $this->M_CRUD->readData('master_forwarder', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'import/docimport/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $params = [
                'name' => $post['name'],
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->insertData('master_shipper', $params)) {
                $response = ['status' => 1, 'messages' => 'Shipper has been saved successfully.', 'icon' => 'success', 'url' => 'import/shipper'];
            } else {
                $response = ['status' => 0, 'messages' => 'Shipper has failed to save.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function detail($id)
        {
            $datas['js'] = [
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/shipper/detail.js"),
            ];
            $datas['title'] = 'Import - Shipper';
            $datas['breadcrumb'] = ['Import', 'Master', 'Shipper'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_shipper', ['id' => $id])
            ];

            $this->template->load('default', 'contents' , 'import/shipper/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $params = [
                'name' => $post['name'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('master_shipper', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'Shipper has been updated successfully.', 'icon' => 'success', 'url' => 'import/shipper'];
            } else {
                $response = ['status' => 0, 'messages' => 'Shipper has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            
            if($this->M_CRUD->deleteData('master_shipper', $condition)) {
                $response = ['status' => 1, 'messages' => 'Shipper has been deleted successfully.', 'icon' => 'success', 'url' => 'import/shipper'];
            } else {
                $response = ['status' => 0, 'messages' => 'Shipper has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>