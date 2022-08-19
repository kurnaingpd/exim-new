<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestMPDF extends CI_Controller {

public function test_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('html_test_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}


}