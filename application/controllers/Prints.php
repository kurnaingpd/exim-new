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
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_print_header_trans_pi', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->pi_category('view_print_category_trans_pi', ['pi_id' => $id]),
                'detail' => $this->M_CRUD->pi_item('view_print_detail_trans_pi', ['is_deleted' => '0', 'pi_id' => $id]),
                'footer' => $this->M_CRUD->readDatabyID('view_print_footer_trans_pi', ['pi_id' => $id]),
                'signature' => $this->M_CRUD->readDatabyID('view_print_signature_trans_pi', ['pi_id' => $id]),
            ];
            $datas['content'] = $this->load->view('export/print/proforma', $datas, true);

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
            $content = $this->load->view('export/print/index', $datas, true);
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
            $datas['params'] = [
                'header' => $this->M_CRUD->readDatabyID('view_print_header_trans_pi', ['is_deleted' => '0', 'id' => $id]),
                'category' => $this->M_CRUD->pi_category('view_print_category_trans_pi', ['pi_id' => $id]),
                'detail' => $this->M_CRUD->pi_item('view_print_detail_trans_pi', ['is_deleted' => '0', 'pi_id' => $id]),
                'footer' => $this->M_CRUD->readDatabyID('view_print_footer_trans_pi', ['pi_id' => $id]),
                'signature' => $this->M_CRUD->readDatabyID('view_print_signature_trans_pi', ['pi_id' => $id]),
            ];
            $datas['content'] = $this->load->view('export/print/invoice', $datas, true);

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
            $content = $this->load->view('export/print/index', $datas, true);
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
            $mpdf->Output($filename."-".$time.".pdf", 'I');
        }

        public function packing($id)
        {
            $datas['title'] = 'Print Invoice';
            // $datas['params'] = [
            //     'header' => $this->M_CRUD->readDatabyID('view_print_header_trans_pi', ['is_deleted' => '0', 'id' => $id]),
            //     'category' => $this->M_CRUD->pi_category('view_print_category_trans_pi', ['pi_id' => $id]),
            //     'detail' => $this->M_CRUD->pi_item('view_print_detail_trans_pi', ['is_deleted' => '0', 'pi_id' => $id]),
            //     'footer' => $this->M_CRUD->readDatabyID('view_print_footer_trans_pi', ['pi_id' => $id]),
            //     'signature' => $this->M_CRUD->readDatabyID('view_print_signature_trans_pi', ['pi_id' => $id]),
            // ];
            $datas['content'] = $this->load->view('export/print/packing', $datas, true);

            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $mpdf->defaultheaderline = 0;
            $mpdf->defaultfooterline = 0;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/inventory/skp-logo-crop-removebg.png" width="14%" />||');
            $mpdf->AddPage(
                'L', // L - landscape, P - portrait 
                '', '', '', '',
                20, // margin_left
                20, // margin right
                30, // margin top
                0, // margin bottom
                10, // margin header
                8
            );
            $content = $this->load->view('export/print/index', $datas, true);
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
    }

?>