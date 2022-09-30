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
                'list' => $this->M_CRUD->readData('view_trans_doc_import_list', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'import/docimport/list', $datas);
        }

        public function add()
        {
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2/css/select2.min.css"),
                "text/css,stylesheet,".base_url("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"),
            ];
            $datas['js'] = [
                base_url("assets/adminlte/plugins/moment/moment.min.js"),
                base_url("assets/adminlte/plugins/inputmask/jquery.inputmask.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/docimport/add.js"),
            ];
            $datas['title'] = 'Import - Document Import';
            $datas['breadcrumb'] = ['Import', 'Transaction', 'Document Import'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'code' => $this->M_CRUD->autoNumberDocImport('trans_doc_import', 'code', '/SKP-IMP/'.date('m/Y'), 4),
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
                'code' => $post['code'],
                'po_no' => ($post['po']?$post['po']:NULL),
                'shipment_no' => ($post['shipment']?$post['shipment']:NULL),
                'shipper_id' => ($post['shipper']?$post['shipper']:NULL),
                'seller' => ($post['seller']?$post['seller']:NULL),
                'consignee_id' => ($post['consignee']?$post['consignee']:NULL),
                'commodity' => ($post['commodity']?$post['commodity']:NULL),
                'category_id' => ($post['category']?$post['category']:NULL),
                'hs_code' => ($post['hscode']?$post['hscode']:NULL),
                'lartas' => ($post['lartas']?$post['lartas']:NULL),
                'incoterm_id' => ($post['incoterm']?$post['incoterm']:NULL),
                'hbl' => ($post['hbl']?$post['hbl']:NULL),
                'mbl' => ($post['mbl']?$post['mbl']:NULL),
                'qty_container' => ($post['qty_container']?$post['qty_container']:0),
                'container_no' => ($post['container_no']?$post['container_no']:NULL),
                'goods_qty' => ($post['goods_qty']?$post['goods_qty']:0),
                'uom_id' => ($post['uom']?$post['uom']:NULL),
                'gross_weight' => ($post['gw']?$post['gw']:0),
                'net_weight' => ($post['nw']?$post['nw']:0),
                'cbm' => ($post['cbm']?$post['cbm']:0),
                'pol' => ($post['pol']?$post['pol']:NULL),
                'pod' => ($post['pod']?$post['pod']:NULL),
                'etd' => ($post['etd']?$post['etd']:NULL),
                'eta' => ($post['eta']?$post['eta']:NULL),
                'pib_aju' => ($post['pib_aju']?$post['pib_aju']:NULL),
                'coo' => ($post['coo']?$post['coo']:NULL),
                'master_list' => ($post['masterlist']?$post['masterlist']:NULL),
                'rcvd_ori_doc' => ($post['rcvd_ori']?$post['rcvd_ori']:NULL),
                'billing' => ($post['billing']?$post['billing']:NULL),
                'spjm' => ($post['spjm']?$post['spjm']:NULL),
                'spjk' => ($post['spjk']?$post['spjk']:NULL),
                'sppb' => ($post['sppb']?$post['sppb']:NULL),
                'pickup_do' => ($post['pickup_do']?$post['pickup_do']:NULL),
                'delivery' => ($post['delivery']?$post['delivery']:NULL),
                'remarks' => ($post['remarks']?$post['remarks']:NULL),
                'currency' => ($post['currency']?$post['currency']:0),
                'cif' => ($post['cif']?$post['cif']:0),
                'duty' => ($post['duty']?$post['duty']:0),
                'vat' => ($post['vat']?$post['vat']:0),
                'tax' => ($post['tax']?$post['tax']:0),
                'freight' => ($post['freight_vat']?$post['freight_vat']:0),
                'handling' => ($post['handling_vat']?$post['handling_vat']:0),
                'at_cost' => ($post['at_cost']?$post['at_cost']:0),
                'additional' => ($post['additional']?$post['additional']:0),
                'time' => ($post['times']?$post['times']:0),
                'forwarder_id' => ($post['forwarder']?$post['forwarder']:NULL),
                'created_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->insertData('trans_doc_import', $params)) {
                $response = ['status' => 1, 'messages' => 'Document import has been saved successfully.', 'icon' => 'success', 'url' => 'import/docimport'];
            } else {
                $response = ['status' => 0, 'messages' => 'Document import has failed to save.', 'icon' => 'error'];
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
                base_url("assets/adminlte/plugins/moment/moment.min.js"),
                base_url("assets/adminlte/plugins/inputmask/jquery.inputmask.min.js"),
                base_url("assets/adminlte/plugins/select2/js/select2.full.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"),
                base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js"),
                base_url("assets/adminlte/plugins/sweetalert/sweetalert.min.js"),
                base_url("assets/js/docimport/detail.js"),
            ];
            $datas['title'] = 'Import - Document Import';
            $datas['breadcrumb'] = ['Import', 'Transactino', 'Document Import'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('trans_doc_import', ['id' => $id]),
                'shipper' => $this->M_CRUD->readData('master_shipper', ['is_deleted' => '0']),
                'consignee' => $this->M_CRUD->readData('master_consignee', ['is_deleted' => '0']),
                'category' => $this->M_CRUD->readData('master_category', ['is_deleted' => '0']),
                'incoterm' => $this->M_CRUD->readData('master_incoterm', ['is_deleted' => '0']),
                'uom' => $this->M_CRUD->readData('master_uom', ['is_deleted' => '0']),
                'forwarder' => $this->M_CRUD->readData('master_forwarder', ['is_deleted' => '0']),
                'status' => $this->M_CRUD->readData('master_doc_import_status', ['is_deleted' => '0']),
            ];

            $this->template->load('default', 'contents' , 'import/docimport/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $params = [
                'po_no' => ($post['po']?$post['po']:NULL),
                'shipment_no' => ($post['shipment']?$post['shipment']:NULL),
                'shipper_id' => ($post['shipper']?$post['shipper']:NULL),
                'seller' => ($post['seller']?$post['seller']:NULL),
                'consignee_id' => ($post['consignee']?$post['consignee']:NULL),
                'commodity' => ($post['commodity']?$post['commodity']:NULL),
                'category_id' => ($post['category']?$post['category']:NULL),
                'hs_code' => ($post['hscode']?$post['hscode']:NULL),
                'lartas' => ($post['lartas']?$post['lartas']:NULL),
                'incoterm_id' => ($post['incoterm']?$post['incoterm']:NULL),
                'hbl' => ($post['hbl']?$post['hbl']:NULL),
                'mbl' => ($post['mbl']?$post['mbl']:NULL),
                'qty_container' => ($post['qty_container']?$post['qty_container']:0),
                'container_no' => ($post['container_no']?$post['container_no']:NULL),
                'goods_qty' => ($post['goods_qty']?$post['goods_qty']:0),
                'uom_id' => ($post['uom']?$post['uom']:NULL),
                'gross_weight' => ($post['gw']?$post['gw']:0),
                'net_weight' => ($post['nw']?$post['nw']:0),
                'cbm' => ($post['cbm']?$post['cbm']:0),
                'pol' => ($post['pol']?$post['pol']:NULL),
                'pod' => ($post['pod']?$post['pod']:NULL),
                'etd' => ($post['etd']?$post['etd']:NULL),
                'eta' => ($post['eta']?$post['eta']:NULL),
                'pib_aju' => ($post['pib_aju']?$post['pib_aju']:NULL),
                'coo' => ($post['coo']?$post['coo']:NULL),
                'master_list' => ($post['masterlist']?$post['masterlist']:NULL),
                'rcvd_ori_doc' => ($post['rcvd_ori']?$post['rcvd_ori']:NULL),
                'billing' => ($post['billing']?$post['billing']:NULL),
                'spjm' => ($post['spjm']?$post['spjm']:NULL),
                'spjk' => ($post['spjk']?$post['spjk']:NULL),
                'sppb' => ($post['sppb']?$post['sppb']:NULL),
                'pickup_do' => ($post['pickup_do']?$post['pickup_do']:NULL),
                'delivery' => ($post['delivery']?$post['delivery']:NULL),
                'remarks' => ($post['remarks']?$post['remarks']:NULL),
                'currency' => ($post['currency']?$post['currency']:0),
                'cif' => ($post['cif']?$post['cif']:0),
                'duty' => ($post['duty']?$post['duty']:0),
                'vat' => ($post['vat']?$post['vat']:0),
                'tax' => ($post['tax']?$post['tax']:0),
                'freight' => ($post['freight_vat']?$post['freight_vat']:0),
                'handling' => ($post['handling_vat']?$post['handling_vat']:0),
                'at_cost' => ($post['at_cost']?$post['at_cost']:0),
                'additional' => ($post['additional']?$post['additional']:0),
                'time' => ($post['times']?$post['times']:0),
                'forwarder_id' => ($post['forwarder']?$post['forwarder']:NULL),
                'doc_import_status_id' => $post['status'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('logged_in')->id,
            ];

            if($this->M_CRUD->updateData('trans_doc_import', $params, $condition)) {
                $response = ['status' => 1, 'messages' => 'Document import has been updated successfully.', 'icon' => 'success', 'url' => 'import/docimport'];
            } else {
                $response = ['status' => 0, 'messages' => 'Document import has failed to update.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = ['id' => $id];
            
            if($this->M_CRUD->deleteData('trans_doc_import', $condition)) {
                $response = ['status' => 1, 'messages' => 'Document import has been deleted successfully.', 'icon' => 'success', 'url' => 'import/docimport'];
            } else {
                $response = ['status' => 0, 'messages' => 'Document import has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }

        public function excel()
        {
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_trans_doc_import_xls', ['is_deleted' => '0']),
            ];
            $this->load->view('import/docimport/excel', $datas);
        }
    }

?>