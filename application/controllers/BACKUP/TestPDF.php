<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestPDF extends CI_Controller {

public function Proforma_Invoice()
{
		$this->load->library('fpdf.php');
        
        // $pdf = new FPDF();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        // $pdf->Cell(0,10,'Hello World!',0,0);
        // $pdf->SetFillColor(51,153,255);
        // $pdf->Cell(0, 2, "",0.1, 1, true, 'C');
        $image_path="./assets/images/gonusa_600.gif";
        $pdf->Image($image_path,10,5,50,0);
        $pdf->Cell(0,30,"PROFORMA INVOICE",0,1,'C');

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(45,0,"PI NO",0,0);
        $pdf->Cell(0,0,":",0,1);
        $pdf->Cell(45,10,"PO NO",0,0);
        $pdf->Cell(0,10,":",0,1);
        $pdf->Cell(45,10,"CONSIGNEE",0,0);
        $pdf->Cell(0,10,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,30,"BENEFICIARY",0,0);
        $pdf->Cell(0,30,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"DESTINATION",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"ETD.EST",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"LOADING PORT",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,15,"COUNTRY OF ORIGIN",0,0);
        $pdf->Cell(0,15,":",0,1);

        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(45,10,"DESCRIPTION OF GOODS",1,0,'C');
        $pdf->Cell(55,10,"PACKING",1,0,'C');
        $pdf->Cell(20,10,"QTY",1,0,'C');
        $pdf->Cell(35,10,"UNIT PRICE (FOB)",1,0,'C');
        $pdf->Cell(35,10,"TOTAL",1,0,'C');
        $pdf->Cell(0,10,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(45,8,"DESCRIPTION OF GOODS",1,0,'C');
        $pdf->Cell(55,8,"PACKING",1,0,'C');
        $pdf->Cell(20,8,"QTY",1,0,'C');
        $pdf->Cell(35,8,"UNIT PRICE (FOB)",1,0,'C');
        $pdf->Cell(35,8,"TOTAL",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(45,8,"DESCRIPTION OF GOODS",1,0,'C');
        $pdf->Cell(55,8,"PACKING",1,0,'C');
        $pdf->Cell(20,8,"QTY",1,0,'C');
        $pdf->Cell(35,8,"UNIT PRICE (FOB)",1,0,'C');
        $pdf->Cell(35,8,"TOTAL",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(45,8,"DESCRIPTION OF GOODS",1,0,'C');
        $pdf->Cell(55,8,"PACKING",1,0,'C');
        $pdf->Cell(20,8,"QTY",1,0,'C');
        $pdf->Cell(35,8,"UNIT PRICE (FOB)",1,0,'C');
        $pdf->Cell(35,8,"TOTAL",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(45,8,"GRAND TOTAL FOB",0,0,'C');
        $pdf->Cell(55,8,"......PORT",0,0);
        $pdf->Cell(20,8,"QTY",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(35,8,"TOTAL",0,0,'C');
        $pdf->Cell(0,8,"",0,1);

        // $pdf->SetFillColor(51,153,255);
        $pdf->Cell(0, 0.5, "",0.1, 1, true, 'C');
        $pdf->Cell(0,2,"",0,1);

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(45,8,"Scheme Payment",0,0);
        $pdf->Cell(55,8,"",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(45,8,"Please TT To The Following Account :",0,0);
        $pdf->Cell(55,8,"",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(45,2,"BANK NAME",0,0);
        $pdf->Cell(55,0,":",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,16,"",0,1);

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(45,2,"BENEFICIARY",0,0);
        $pdf->Cell(55,0,":",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,26,"",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,2,"Jakarta,......",0,0,'C');
        $pdf->Cell(55,8,"",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,8,"Guangdong,......",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,30,"",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,2,"User Create PI",0,0,'C');
        $pdf->Cell(55,8,"",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,5,"",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,4,"",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,2,"Global Bussiness Head",0,0,'C');
        $pdf->Cell(55,8,"",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,0,"Contact Person Customer",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,4,"",0,1);

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(45,2,"PT GONUSA PRIMA DISTRIBUSI",0,0,'C');
        $pdf->Cell(55,8,"",0,0);
        $pdf->Cell(20,8,"",0,0,'C');
        $pdf->Cell(35,0,"Consignee",0,0,'C');
        $pdf->Cell(35,8,"",0,0,'C');
        $pdf->Cell(0,14,"",0,1);

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(45,2,"Note : ",0,0);
        $pdf->Cell(55,0,"",0,0);
        $pdf->Cell(20,0,"",0,0,'C');
        $pdf->Cell(35,0,"",0,0,'C');
        $pdf->Cell(35,0,"",0,0,'C');
        $pdf->Cell(0,0,"",0,1);

        $pdf->Output();
        // $pdf->Image(base_url('./assets/img/GAP.png'),33,36,10,0);
        // $pdf->Cell(60 ,40,'PT. GARDA PAKSI NUSANTARA',1,0,'C');
        // $pdf->SetFont('Arial','',9);
        // $pdf->Cell(62 ,10,'NOMOR',1,0);
        // $pdf->Cell(68 ,10,'',1,1);
        // $pdf->Cell(60 ,25,'',0,0);
        // $pdf->Cell(62 ,10,'PERINGKAT EXPOSURE',1,0);
        // $pdf->Cell(68 ,10,'',1,1);
        // $pdf->Cell(60 ,25,'',0,0);
        // $pdf->Cell(62 ,10,'PERINGKAT KEAMANAN FASILITAS',1,0);
        // $pdf->Cell(68 ,10,'',1,1);
        // $pdf->Cell(60 ,25,'',0,0);
        // $pdf->Cell(62 ,10,'PERINGKAT KEAMANAN SEMENTARA',1,0);
        // $pdf->Cell(68 ,10,'',1,1);
}

public function Print_Invoice()
{

    $this->load->library('fpdf.php');
        
        // $pdf = new FPDF();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        // $pdf->Cell(0,10,'Hello World!',0,0);
        // $pdf->SetFillColor(51,153,255);
        // $pdf->Cell(0, 2, "",0.1, 1, true, 'C');
        $image_path="./assets/images/gonusa_600.gif";
        $pdf->Image($image_path,10,5,50,0);
        $pdf->Cell(0,30,"INVOICE",0,1,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,-20,"INV-No",0,1,'C');
        $pdf->Cell(0,20,"",0,1);

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(45,0,"PI NO",0,0);
        $pdf->Cell(0,0,":",0,1);
        $pdf->Cell(45,10,"PO NO",0,0);
        $pdf->Cell(0,10,":",0,1);
        $pdf->Cell(45,10,"CONSIGNEE",0,0);
        $pdf->Cell(0,10,":",0,1);

        $pdf->Cell(45,0,"",0,0);
        $pdf->Cell(0,0,"",0,1);
        $pdf->Cell(45,10,"",0,0);
        $pdf->Cell(0,10,"",0,1);
        $pdf->Cell(45,10,"NOTIFY",0,0);
        $pdf->Cell(0,10,":",0,1);

        $pdf->Cell(45,0,"",0,0);
        $pdf->Cell(0,0,"",0,1);
        $pdf->Cell(45,10,"",0,0);
        $pdf->Cell(0,10,"",0,1);
        $pdf->Cell(45,10,"SHIPPER",0,0);
        $pdf->Cell(0,10,":",0,1);
        $pdf->Cell(0,10,"",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"ETD.EST",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"DESTINATION",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"LOADING PORT",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"COUNTRY OF ORIGIN",0,0);
        $pdf->Cell(0,5,":",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,5,"FFRN #",0,0);
        $pdf->Cell(0,5,":",0,0);
        $pdf->Cell(0,10,"",0,1);

        $pdf->SetFont('Arial','B',7.5);
        $pdf->Cell(25,10,"CONTAINER",1,0,'C');
        $pdf->Cell(20,10,"HS CODE",1,0,'C');
        $pdf->Cell(45,10,"DESCRIPTION OF GOODS",1,0,'C');
        $pdf->Cell(25,10,"PACKING",1,0,'C');
        $pdf->Cell(25,10,"QTY (CTNS)",1,0,'C');
        $pdf->Cell(25,10,"UNIT PRICE",1,0,'C');
        $pdf->Cell(25,10,"TOTAL PRICE",1,0,'C');
        $pdf->Cell(20,10,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->Cell(45,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(20,5,"",0,1);


        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(115,5,"TOTAL FOB : ..............",1,0);
        // $pdf->Cell(0,5,"",1,0,'C');
        // $pdf->Cell(0,5,"",1,0,'C');
        // $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,".......",1,0,'C');
        $pdf->Cell(25,5,"",1,0,'C');
        $pdf->Cell(25,5,".......",1,0,'C');
        $pdf->Cell(20,5,"",0,1);
        
        $pdf->SetFont('Arial','',7.5);
        $pdf->Cell(0,5,"SAY : ..............",1,0);
        // $pdf->Cell(0,5,"",1,0,'C');
        // $pdf->Cell(0,5,"",1,0,'C');
        // $pdf->Cell(25,5,"",1,0,'C');
        // $pdf->Cell(25,5,".......",1,0,'C');
        // $pdf->Cell(25,5,"",1,0,'C');
        // $pdf->Cell(25,5,".......",1,0,'C');
        $pdf->Cell(20,5,"",0,1);

// FREE GOODS

$pdf->SetFont('Arial','B',7.5);
$pdf->Cell(25,10,"FREE GOODS :",0,0,'C');
$pdf->Cell(20,10,"",0,1);
$pdf->Cell(25,10,"CONTAINER",1,0,'C');
$pdf->Cell(20,10,"HS CODE",1,0,'C');
$pdf->Cell(45,10,"DESCRIPTION OF GOODS",1,0,'C');
$pdf->Cell(25,10,"PACKING",1,0,'C');
$pdf->Cell(25,10,"QTY (CTNS)",1,0,'C');
$pdf->Cell(25,10,"UNIT PRICE",1,0,'C');
$pdf->Cell(25,10,"TOTAL PRICE",1,0,'C');
$pdf->Cell(20,10,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",1,0,'C');
$pdf->Cell(45,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(115,5,"TOTAL FOB : ..............",1,0);
// $pdf->Cell(0,5,"",1,0,'C');
// $pdf->Cell(0,5,"",1,0,'C');
// $pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,".......",1,0,'C');
$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(25,5,".......",1,0,'C');
$pdf->Cell(20,10,"",0,1);

$pdf->SetFont('Arial','B',7.5);
$pdf->Cell(25,5,"PURCHASE GOODS",0,0,'C');
$pdf->Cell(20,5,"",0,0,'C');
$pdf->Cell(45,5,"",0,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"NUMBER OF CASE",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"...... Cartons",0,0);
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"AMOUNT",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"USD ........",0,0);
$pdf->Cell(20,10,"",0,1);

$pdf->SetFont('Arial','B',7.5);
$pdf->Cell(25,5,"FREE GOODS",0,0);
$pdf->Cell(20,5,"",0,0,'C');
$pdf->Cell(45,5,"",0,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"NUMBER OF CASE",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"...... Cartons",0,0);
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"AMOUNT",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"USD ........",0,0);
$pdf->Cell(20,10,"",0,1);

$pdf->SetFont('Arial','B',7.5);
$pdf->Cell(25,5,"GRAND TOTAL",0,0);
$pdf->Cell(20,5,"",0,0,'C');
$pdf->Cell(45,5,"",0,0,'C');
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"NUMBER OF CASE",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"...... Cartons",0,0);
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"AMOUNT",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"USD ........",0,0);
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"SAY",0,0);
$pdf->Cell(20,5,":",0,0,'C');
$pdf->Cell(45,5,"........ ........",0,0);
$pdf->Cell(20,10,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",0,0);
$pdf->Cell(20,5,"KUDUS,.....",0,0);
$pdf->Cell(45,5,"",0,0);
$pdf->Cell(20,25,"",0,1);

$pdf->SetFont('Arial','',7.5);
$pdf->Cell(25,5,"",0,0);
$pdf->Cell(20,5,"User Create Invoice",0,0,'C');
$pdf->Cell(45,5,"",0,0);
$pdf->Cell(20,5,"",0,1);

$pdf->SetFont('Arial','B',7.5);
$pdf->Cell(25,5,"",0,0);
$pdf->Cell(20,5,"FINANCE",0,0,'C');
$pdf->Cell(45,5,"",0,0);
$pdf->Cell(20,25,"",0,1);


    $pdf->Output();
}


public function packing_list()
{

    $this->load->library('fpdf.php');
        
        // $pdf = new FPDF();
        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        // $pdf->Cell(0,10,'Hello World!',0,0);
        // $pdf->SetFillColor(51,153,255);
        // $pdf->Cell(0, 2, "",0.1, 1, true, 'C');
        $image_path="./assets/images/gonusa_600.gif";
        $pdf->Image($image_path,10,5,50,0);
        $pdf->Cell(0,30,"PACKING LIST",0,1,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,-20,"No...../PL-NO/....",0,1,'C');
        $pdf->Cell(0,20,"",0,1);

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(45,0,"INVOICE NO",0,0);
        $pdf->Cell(0,0,":",0,1);
        $pdf->Cell(45,10,"PO NO",0,0);
        $pdf->Cell(0,10,":",0,1);
        $pdf->Cell(45,0,"CONSIGNEE",0,0);
        $pdf->Cell(0,0,":",0,0);
        $pdf->Cell(0,15,"",0,1);

        $pdf->Cell(45,0,"",0,0);
        $pdf->Cell(0,0,"",0,1);
        $pdf->Cell(45,10,"",0,0);
        $pdf->Cell(0,10,"",0,1);
        $pdf->Cell(45,10,"SHIPPER",0,0);
        $pdf->Cell(0,10,":",0,0);
        $pdf->Cell(0,30,"",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,0,"PORT OF DISCHARGE",0,0);
        $pdf->Cell(0,0,":",0,1);
        $pdf->Cell(45,10,"PORT OF LOADING",0,0);
        $pdf->Cell(0,10,":",0,1);
        $pdf->Cell(45,0,"COUNTRY OF ORIGIN",0,0);
        $pdf->Cell(10,0,":",0,0);
        $pdf->Cell(0,5,"",0,1);

        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(10,8,"NO",1,0,'C');
        $pdf->Cell(35,8,"DESCRIPTION OF GOODS",1,0,'C');
        $pdf->Cell(28,8,"HS CODE",1,0,'C');
        $pdf->Cell(28,8,"PACKING",1,0,'C');
        $pdf->Cell(28,8,"QTY (CTNS)",1,0,'C');
        $pdf->Cell(30,8,"NET WEIGHT (KG)",1,0,'C');
        $pdf->Cell(30,8,"GROSS WEIGHT (KG)",1,0,'C');
        $pdf->Cell(43.5,8,"TOTAL MEASUREMENT (CBM)",1,0,'C');
        $pdf->Cell(43.5,8,"DIMENSION EACH CARTON (MM)",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(10,8,"NO",1,0,'C');
        $pdf->Cell(35,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(10,8,"NO",1,0,'C');
        $pdf->Cell(35,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','',7);
        $pdf->Cell(10,8,"NO",1,0,'C');
        $pdf->Cell(35,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(0,8,"",0,1);

        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(101,8,"TOTAL",1,0);
        // $pdf->Cell(35,8,"",1,0,'C');
        // $pdf->Cell(28,8,"",1,0,'C');
        // $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(28,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(30,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(43.5,8,"",1,0,'C');
        $pdf->Cell(0,15,"",0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,0,"Kudus,.......",0,0);
        $pdf->Cell(0,0,"",0,1);
        $pdf->Cell(45,10,"",0,0);
        $pdf->Cell(0,10,"",0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(45,0,"User Create PL",0,0);
        $pdf->Cell(10,0,"",0,0);
        $pdf->Cell(0,5,"",0,1);

        // $pdf->SetFont('Arial','',9);
        // $pdf->Cell(45,10,"PORT OF LOADING",0,0);
        // $pdf->Cell(0,10,":",0,1);
        
        // $pdf->Cell(45,0,"COUNTRY OF ORIGIN",0,0);
        // $pdf->Cell(0,0,":",0,1);

        $pdf->Output();

}


public function print_coa()
{

    $this->load->library('fpdf.php');
        
    // $pdf = new FPDF();
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    // $pdf->Cell(0,10,'Hello World!',0,0);
    // $pdf->SetFillColor(51,153,255);
    // $pdf->Cell(0, 2, "",0.1, 1, true, 'C');
    $image_path="./assets/images/gonusa_600.gif";
    $pdf->Image($image_path,10,5,50,0);
    $pdf->Cell(0,30,"CERTIFICATE OF ANALYSYS",0,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,10,"",0,1);

    $pdf->SetFont('Arial','B',9);

    $pdf->Cell(55,0,"PRODUCT NAME",0,0);
    $pdf->Cell(0,0,":",0,1);
    $pdf->Cell(55,10,"BATCH NUMBER",0,0);
    $pdf->Cell(0,10,":",0,1);
    $pdf->Cell(55,0,"PROD.DATE EXP DATE",0,0);
    $pdf->Cell(0,0,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->Cell(55,10,"ORGANOLEPTIC TEST",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Aroma",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Taste",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,10,"",0,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,10,"PHISICAL & CHEMICAL TEST",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Moisture",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"pH",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Brix",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,10,"",0,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,10,"HEAVY METAL TEST",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Mercury (Hg)",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Lead (Pb)",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Cadmium (Cd)",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Tin (Sn)",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Arsenic (As)",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,10,"",0,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,10,"MICROBIOLOGY TEST",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Salmonella sp",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Total Plate Count",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"Mold & Yeast",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,35,"",0,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(300,10,"1 Januari 2022",0,0,'C');
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"",0,0);
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"",0,0);
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"",0,0);
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','U',9);
    $pdf->Cell(300,10,"User Create COA",0,0,'C');
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(300,10,"QA MANAGER",0,0,'C');
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,10,"",0,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,10,"",0,0);
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"",0,0);
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,10,"",0,0);
    $pdf->Cell(0,10,"",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(30,10,"INV No",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(30,10,"QA No",0,0);
    $pdf->Cell(0,10,":",0,0);
    $pdf->Cell(0,10,"",0,1);

    $pdf->Output();

}

public function print_Qs()
{
    $this->load->library('fpdf.php');
        
    // $pdf = new FPDF();
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    // $pdf->Cell(0,10,'Hello World!',0,0);
    // $pdf->SetFillColor(51,153,255);
    // $pdf->Cell(0, 2, "",0.1, 1, true, 'C');
    $image_path="./assets/images/gonusa_600.gif";
    $pdf->Image($image_path,10,5,50,0);
    $pdf->Cell(0,30,"TO WHOM IT MAY CONCERNED",0,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,5,"",0,1);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,-10,"",0,1);
    $pdf->Cell(55,10,"I hereby certify that the recent .......... Shipment made for ........[consignee]..........Covered",0,1);
    $pdf->Cell(55,0,"by our invoice No. .......... [Inv No] ............... Had been produced according to our quality standard.",0,1);
    $pdf->Cell(0,2,"",0,1);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(55,10,"The said products were recorded in our logs as follows :",0,1);
    $pdf->Cell(55,0,"",0,1);
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(20,8,"PO",1,0,'C');
    $pdf->Cell(25,8,"CONTAINER",1,0,'C');
    $pdf->Cell(35,8,"PRODUCTION DATE",1,0,'C');
    $pdf->Cell(30,8,"EXPIRY DATE",1,0,'C');
    $pdf->Cell(45,8,"DESCRIPTION OF GOODS",1,0,'C');
    $pdf->Cell(35,8,"CONTENT / CARTON",1,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,8,"",0,1);
    $pdf->Cell(20,8,"-",1,0,'C');
    $pdf->Cell(25,8,"-",1,0,'C');
    $pdf->Cell(35,8,"-",1,0,'C');
    $pdf->Cell(30,8,"-",1,0,'C');
    $pdf->Cell(45,8,"-",1,0,'C');
    $pdf->Cell(35,8,"-",1,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,8,"",0,1);
    $pdf->Cell(20,8,"-",1,0,'C');
    $pdf->Cell(25,8,"-",1,0,'C');
    $pdf->Cell(35,8,"-",1,0,'C');
    $pdf->Cell(30,8,"-",1,0,'C');
    $pdf->Cell(45,8,"-",1,0,'C');
    $pdf->Cell(35,8,"-",1,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,8,"",0,1);
    $pdf->Cell(20,8,"-",1,0,'C');
    $pdf->Cell(25,8,"-",1,0,'C');
    $pdf->Cell(35,8,"-",1,0,'C');
    $pdf->Cell(30,8,"-",1,0,'C');
    $pdf->Cell(45,8,"-",1,0,'C');
    $pdf->Cell(35,8,"-",1,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,12,"",0,1);
    $pdf->Cell(20,8,"Respectfully",0,0,'C');
    $pdf->Cell(25,8,"",0,0,'C');
    $pdf->Cell(35,8,"",0,0,'C');
    $pdf->Cell(30,8,"",0,0,'C');
    $pdf->Cell(45,8,"",0,0,'C');
    $pdf->Cell(35,8,"",0,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','U',9);
    $pdf->Cell(0,25,"",0,1);
    $pdf->Cell(20,8,"User Create",0,0,'C');
    $pdf->Cell(25,8,"",0,0,'C');
    $pdf->Cell(35,8,"",0,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(0,5,"",0,1);
    $pdf->Cell(20,8,"QA MANAGER",0,0,'C');
    $pdf->Cell(25,8,"",0,0,'C');
    $pdf->Cell(35,8,"",0,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,25,"",0,1);
    $pdf->Cell(20,8,"QA No :",0,0,'C');
    $pdf->Cell(25,8,"",0,0,'C');
    $pdf->Cell(35,8,"",0,0,'C');
    $pdf->Cell(0,0,"",0,1);

    $pdf->Output();
}

public function print_SPP()
{
    $this->load->library('fpdf.php');
        
    // $pdf = new FPDF();
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    // $pdf->Cell(0,10,'Hello World!',0,0);
    // $pdf->SetFillColor(51,153,255);
    // $pdf->Cell(0, 2, "",0.1, 1, true, 'C');
    $image_path="./assets/images/gonusa_600.gif";
    $pdf->Image($image_path,10,5,50,0);
    $pdf->Cell(0,30,"SURAT PERNYATAAN PRODUK",0,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,5,"",0,1);

    $pdf->Output();
}


}
