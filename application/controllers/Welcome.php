<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function testweek()
	{

$ddate = Tanggal;
// $date = new DateTime($ddate);
// $week = $date->format("W");
// echo "Weeknummer: $week";


// $first_of_month = new DateObject($ddate->format('Y/m/1'));
// $day_of_first = $first_of_month->format('N');
// $day_of_month = $ddate->format('j');
// return floor(($day_of_first + $day_of_month - 1) / 7) + 1;

// 		$date="01-10-2022";
// $orderdate = explode('-', $date);
// $day   = $orderdate[1];
// $month = $orderdate[0];
// $year  = $orderdate[2];
// echo $day."<br>";
// echo $month."<br>";
// echo $year."<br>";

// $ref_date=strtotime("$date");
// $week_of_year=date( 'W', $ref_date );

// echo $week_of_year;

		// $date=2022-10-01;
		// $tgl=explode('-',$date); //explode untuk pemisah kata,  variable $date dengan batas - ke array
		// $bln=$tgl[1]; //mengambil array $tgl[1] yang isinya 03
		// $thn=$tgl[0]; //mengambil array $tgl[0] yang isinya 2015
		// $ref_date=strtotime("$date"); //strtotime ini mengubah varchar menjadi format time
		// $week_of_year=date('W', $ref_date); //mengetahui minggu ke berapa dari tahun

		// print_r($bln);
		// $week_of_month=$week_of_year - date( 'W', strtotime( "$bln/1/$thn" ) ); //mengetahui minggu ke berapa dari bulan 
	}
}
