<?php

    Class Item extends CI_Controller
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
                base_url("assets/js/item/list.js"),
            ];
            $datas['title'] = 'Export - Item';
            $datas['breadcrumb'] = ['Export', 'Master', 'Item'];
            $datas['header'] = 'Item list';
            $datas['params'] = [
                'list' => $this->M_CRUD->readData('view_item')
            ];

            $this->template->load('default', 'contents' , 'export/item/list', $datas);
        }

        public function add()
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
                base_url("assets/js/item/add.js"),
            ];
            $datas['title'] = 'Export - Item';
            $datas['breadcrumb'] = ['Export', 'Master', 'Item'];
            $datas['header'] = 'Add record';
            $datas['params'] = [
                'category' => $this->M_CRUD->readData('master_item_category', ['is_deleted' => '0'])
            ];

            $this->template->load('default', 'contents' , 'export/item/add', $datas);
        }

        public function save()
        {
            $post = $this->input->post();
            $item_code = $this->M_CRUD->readDatabyID('master_item', ['is_deleted' => '0', 'code' => $post['code']]);

            if($item_code) {
                $response = ['status' => 0, 'messages' => 'Item code already exist.', 'icon' => 'error'];
            } else {
                $param = [
                    'code' => $post['code'],
                    'hs_code' => 'NULL',
                    'item_category_id' => $post['category'],
                    'item_category_id' => $post['category'],
                    'name' => $post['name'],
                    'pack_desc' => $post['desc'],
                    'net_wight' => $post['net'],
                    'gross_weight' => $post['gross'],
                    'length' => $post['length'],
                    'width' => $post['width'],
                    'height' => $post['height'],
                ];
                $insert_id = $this->M_CRUD->insertData('master_item', $param);

                if($insert_id) {
                    $paramSpec = [
                        'item_id' => $insert_id,
                        'description' => $post['desc'],
                        'form' => $post['form'],
                        'texture' => $post['texture'],
                        'colour' => $post['colour'],
                        'taste' => $post['taste'],
                        'odour' => $post['odour'],
                        'fat' => $post['fat'],
                        'moisture' => $post['moisture'],
                        'caffeine' => $post['caffeine'],
                        'ingredients' => $post['ingredients'],
                        'product_shelf' => $post['product_shelf'],
                        'packaging' => $post['packaging'],
                        'storage' => $post['storage'],
                        'functions' => $post['functions'],
                        'usage' => $post['usage'],
                        'source' => $post['source'],
                        'country' => $post['country'],
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];
                    $this->M_CRUD->insertData('master_item_spec', $paramSpec);
                    $response = ['status' => 1, 'messages' => 'Item has been saved successfully.', 'icon' => 'success', 'url' => 'export/item'];
                } else {
                    $response = ['status' => 0, 'messages' => 'Item has failed to save.', 'icon' => 'error'];
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
                base_url("assets/js/item/detail.js"),
            ];
            $datas['title'] = 'Export - Item';
            $datas['breadcrumb'] = ['Export', 'Master', 'Item'];
            $datas['header'] = 'Detail record';
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('master_item', ['id' => $id]),
                'category' => $this->M_CRUD->readData('master_item_category', ['is_deleted' => '0']),
                'spec' => $this->M_CRUD->readDatabyID('master_item_spec', ['item_id' => $id]),
            ];
            
            $this->template->load('default', 'contents' , 'export/item/detail', $datas);
        }

        public function update()
        {
            $post = $this->input->post();
            $condition = ['id' => $post['id']];
            $param = [
                'hs_code' => 'NULL',
                'item_category_id' => $post['category'],
                'item_category_id' => $post['category'],
                'name' => $post['name'],
                'pack_desc' => $post['desc'],
                'net_wight' => $post['net'],
                'gross_weight' => $post['gross'],
                'length' => $post['length'],
                'width' => $post['width'],
                'height' => $post['height'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            
            if($this->M_CRUD->updateData('master_item', $param, $condition)) {
                $item_spec = $this->M_CRUD->readDatabyID('master_item_spec', ['item_id' => $post['id']]);

                if($item_spec) {
                    $paramSpec = [
                        'description' => $post['spec_desc'],
                        'form' => $post['form'],
                        'texture' => $post['texture'],
                        'colour' => $post['colour'],
                        'taste' => $post['taste'],
                        'odour' => $post['odour'],
                        'fat' => $post['fat'],
                        'moisture' => $post['moisture'],
                        'caffeine' => $post['caffeine'],
                        'ingredients' => $post['ingredients'],
                        'product_shelf' => $post['product_shelf'],
                        'packaging' => $post['packaging'],
                        'storage' => $post['storage'],
                        'functions' => $post['functions'],
                        'usage' => $post['usage'],
                        'source' => $post['source'],
                        'country' => $post['country'],
                    ];
                    $this->M_CRUD->updateData('master_item_spec', $paramSpec, ['item_id' => $post['id']]);
                } else {
                    $paramSpec = [
                        'item_id' => $post['id'],
                        'description' => $post['desc'],
                        'form' => $post['form'],
                        'texture' => $post['texture'],
                        'colour' => $post['colour'],
                        'taste' => $post['taste'],
                        'odour' => $post['odour'],
                        'fat' => $post['fat'],
                        'moisture' => $post['moisture'],
                        'caffeine' => $post['caffeine'],
                        'ingredients' => $post['ingredients'],
                        'product_shelf' => $post['product_shelf'],
                        'packaging' => $post['packaging'],
                        'storage' => $post['storage'],
                        'functions' => $post['functions'],
                        'usage' => $post['usage'],
                        'source' => $post['source'],
                        'country' => $post['country'],
                        'created_by' => $this->session->userdata('logged_in')->id,
                    ];
                    $this->M_CRUD->insertData('master_item_spec', $paramSpec);
                }
                
                $response = ['status' => 1, 'messages' => 'Item has been updated successfully.', 'icon' => 'success', 'url' => 'export/item'];
            } else {
                $response = ['status' => 0, 'messages' => 'Item has failed to update.', 'icon' => 'error'];
            }
            
            echo json_encode($response);
        }

        public function delete($id)
        {
            $condition = [
                'id' => $id
            ];
            
            if($this->M_CRUD->deleteData('master_item', $condition)) {
                $response = ['status' => 1, 'messages' => 'Item has been deleted successfully.', 'icon' => 'success', 'url' => 'export/item'];
            } else {
                $response = ['status' => 0, 'messages' => 'Item has failed to delete.', 'icon' => 'error'];
            }

            echo json_encode($response);
        }
    }

?>