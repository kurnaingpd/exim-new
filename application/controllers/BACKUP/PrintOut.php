<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintOut extends CI_Controller {

public function packing_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/packing_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}

public function coa_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/coa_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}

public function spec_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/spec_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}

public function qc_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/qc_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}

public function spp_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/spp_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}

public function invoice_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/invoice_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}

public function pl_print()
{

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('PrintOut/pl_print',[],true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}


}