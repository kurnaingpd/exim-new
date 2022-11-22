<?php

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php');

    Class Prints extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('/');
            $this->load->model(['M_CRUD']);
        }

        public function proforma($id)
        {
            $datas['title'] = 'Print Proforma Invoice';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/proforma.css"),
            ];
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_print_trans_pi_header', ['is_deleted' => '0', 'id' => $id]),
                'container' => $this->M_CRUD->readData('view_print_trans_pi_container', ['pi_id' => $id]),
                'category' => $this->M_CRUD->readData('view_print_trans_pi_category', ['pi_id' => $id]),
                'detail' => $this->M_CRUD->readData('view_print_trans_pi_detail', ['is_deleted' => '0', 'pi_id' => $id]),
                'signature' => $this->M_CRUD->readDatabyID('view_print_trans_pi_signature', ['pi_id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="17%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/proforma', $datas, true);
            $mpdf->SetFooter('
                <div style="text-align: left; font-style: normal; font-size:7px;">Note : Please Sign This Proforma Invoice, fill the date and send back to us with PO as your confirmation</div>
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-ProformaInvoice";
            $time = date('YmdHis');
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function invoice($id)
        {
            $datas['title'] = 'Print Invoice';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/invoice.css"),
            ];
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_print_trans_invoice_header', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->readData('view_print_trans_invoice_category', ['invoice_id' => $id]),
                'container' => $this->M_CRUD->readData('view_print_trans_invoice_container', ['invoice_id' => $id]),
                'detail' => $this->M_CRUD->readData('view_print_trans_invoice_detail', ['is_deleted' => '0', 'invoice_id' => $id]),
                'footer' => $this->M_CRUD->readData('view_print_trans_invoice_footer', ['invoice_id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="17%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/invoice', $datas, true);
            $mpdf->SetFooter('
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-Invoice";
            $time = date('YmdHis');
            $page_count = $mpdf -> page;
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function packing($id)
        {
            $datas['title'] = 'Print Packing';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/packing.css"),
            ];
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_print_trans_packing_header', ['is_deleted' => '0', 'id' => $id]),
                'container' => $this->M_CRUD->readData('view_print_trans_packing_container', ['packing_list_id' => $id]),
                'detail' => $this->M_CRUD->readData('view_print_trans_packing_detail', ['packing_list_id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="12%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/packing', $datas, true);
            $mpdf->SetFooter('
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-Packing";
            $time = date('YmdHis');
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function coa($id)
        {
            $datas['title'] = 'Print COA';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/coa.css"),
            ];
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_print_trans_coa_detail', ['id' => $id]),
                'signature' => $this->M_CRUD->readDatabyID('view_print_trans_coa_signature', ['id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="17%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/coa', $datas, true);
            $mpdf->SetFooter('
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-COA";
            $time = date('YmdHis');
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function prodspec($id)
        {
            $datas['title'] = 'Print Product Specification';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/prodspec.css"),
            ];
            $datas['params'] = [
                'detail' => $this->M_CRUD->readDatabyID('view_print_trans_prod_spec_detail', ['id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="17%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                5, // margin header
                8
            );
            $content = $this->load->view('export/print/prodspec', $datas, true);
            $mpdf->SetFooter('
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-ProductSpecification";
            $time = date('YmdHis');
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function qcertificate($id)
        {
            $datas['title'] = 'Print Quality Certificate';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/qcertificate.css"),
            ];
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_print_trans_qcertificate_header', ['id' => $id]),
                'detail' => $this->M_CRUD->readData('view_print_trans_qcertificate_detail', ['id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="17%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/qcertificate', $datas, true);
            $mpdf->SetFooter('
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-ProductSpecification";
            $time = date('YmdHis');
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function spp($id)
        {
            $datas['title'] = 'Print Product Statement Letter';
            $datas['css'] = [
                "text/css,stylesheet,".base_url("assets/css/print/spp.css"),
            ];
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_trans_spp_list', ['id' => $id]),
                'detail' => $this->M_CRUD->readData('view_print_trans_spp_detail', ['spp_id' => $id]),
            ];

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="17%" />||');
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/spp', $datas, true);
            $mpdf->SetFooter('
                <div style="box-sizing: border-box; content: "", clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: left; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Jl. Lingkar Timur, Loram Wetan<br>
                            Jati, Kab. Kudus<br>
                            Jawa Tengah 59344<br>
                            P +62 291 4257202<br>
                            sumberkopiprima.com
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Mojokerto</b><br>
                            Jl. Raya Mojokerto - Lamongan<br>
                            Desa Mojokumpul, Kemlagi<br>
                            Mojokerto<br>
                            Jawa Timur 61353
                        </p>
                    </div>
                    <div style="float: left; width: 30%; text-align: left; margin-left: 9%; font-style: normal; font-weight: normal; font-size:7px; color: #989579;">
                        <p>
                            <b>Factory Kudus</b><br>
                            Desa Loram Wetan, Jati<br>
                            Kudus, Jawa Tengah 59311
                        </p>
                    </div>
                </div>
            ');
            $mpdf->WriteHTML($content);
            $filename = "Export-ProductSpecification";
            $time = date('YmdHis');
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }
    }

?>