<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestMail extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		// if(!$this->session->userdata('logged_gexp_in')){
		// 	redirect('LoginSys/doLogout');
		// }
		// $this->load->model('MRoot');
		// $this->load->model('MLogin');
		// $this->load->model('MUser');
		// $this->load->model('MGroup');
        // $this->load->model('MBoardPI');
        $this->load->model('MEmail');
	
}

public function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = '********';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('info@example.com', 'CodexWorld');
        $mail->addReplyTo('info@example.com', 'CodexWorld');
        
        // Add a recipient
        $mail->addAddress('john.doe@gmail.com');
        
        // Add cc or bcc 
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
}

public function send_email()
{
    // Konfigurasi email
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'smtp_crypto' => 'tls',
        'smtp_host' => 'smtp.office365.com',
        'smtp_port'   => 587,
        'smtp_auth'=> true,
        'smtp_user' => 'no-reply@gonusa-distribusi.com',  // Email gmail
        'smtp_pass'   => 'Gonusa680!',  // Password gmail
        // 'protocol'  => 'smtp.office365.com',
        // 'smtp_auth'=> true,
        // 'smtp_host' => 'smtp.office365.com',
        // 'smtp_user' => 'no-reply@gonusa-distribusi.com',  // Email gmail
        // 'smtp_pass'   => 'Gonusa680!',  // Password gmail
        // // 'smtp_crypto' => 'tls',
        // 'smtp_port'   => 587
    ];

    // Load library email dan konfigurasinya
    $this->load->library('email', $config);

    // Email dan nama pengirim
    $this->email->from('no-reply@gonusa-distribusi.com', 'G-EXIM');

    // $to=array('Muhammad.Rifky@gonusa-distribusi.com','nursaid@gonusa-distribusi.com','thareq.tito@gonusa-distribusi.com');
    $to2=array('Muhammad.Rifky@gonusa-distribusi.com');
    // Email penerima
    $this->email->to($to2); // Ganti dengan email tujuan
    // $cca=array('nanang.kadarusman@gonusa-distribusi.com','audi.wiranto@gonusa-distribusi.com');
    // $this->email->cc($cca);

    // Lampiran email, isi dengan url/path file
    // $this->email->attach();
    // $this->email->attach('./assets/upload_excel/EstimasiSalesReport_(6).xlsx');

    // Subject email
    $this->email->subject('Progress PI | 0001/SKP-EXP/PI/03/2022');

    // Isi email
    // $this->email->message("Contoh email yang dikirim menggunakan SMTP Gmail pada Grofo.<br>;
    $this->email->message("Dear All,

    Terdapat update progress report atas no PI 0001/SKP-EXP/PI/03/2022
    
    Progress PI 92%
    
     
    Update Pada : Signed PI :
    
    -> [Telex Release]  pada 2022-03-08 14:41:13 oleh user Sales 01
     
    
    Untuk informasi bisa dicheck di menu Signed PI aplikasi G-EXIM
     
    
    Terimakasih,
    
    G-EXIM");

    // Tampilkan pesan sukses atau error
    if ($this->email->send()) {
    
        echo 'Sukses! email berhasil dikirim.';
    
    }else{

        echo 'Error! email tidak dapat dikirim.';
    
    }
}


public function test_mail()
{
    include APPPATH.'third_party/phpmailer/class.phpmailer.php';
    include APPPATH.'third_party/phpmailer/class.smtp.php';
        
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = HOSTED; //host provider email
        $mail->SMTPDebug = 0;
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = HOSTED_ACC; //acc
        $mail->Password = HOSTED_PASS; //pass
        $mail->SetFrom(HOSTED_ACC,"GEXIM"); //set email pengirim

                $recipients = array(
                    'Muhammad.Rifky@gonusa-distribusi.com',
                    'Muhammadrifky.development@gmail.com',
                    // 'nursaid@gonusa-distribusi.com',
                    // 'thareq.tito@gonusa-distribusi.com',
                    // 'nanang.kadarusman@gonusa-distribusi.com',
                    // ..
                );

                $rcp=$this->MEmail->Getall_master_receive();
                foreach($recipients as $email)
                {
                    $mail->AddAddress($email);
                }

        $mail->Subject = 'Progress PI | 0001/SKP-EXP/PI/03/2022';

        // Set email format to HTML
        $mail->isHTML(true);
        $mailContent="<p>Kepada Yth :</p>
                        <p>Bapak dan Ibu</p>
                        <br>
                        <p>Dengan Hormat,</p>
                        <p>Berikut disampaikan bahwa terdapat update progress report PI dengan nomor : PI 0001/SKP-EXP/PI/03/2022<br>
                            Update di aktifitas Signed PI, yaitu : <br><br>
                        - [Telex Release] pada 2022-03-08 14:41:13 oleh user Sales 01 <br> - Progress PI 92% 
                        <br><br> Demikian disampaikan, untuk informasi lebih lanjut bisa dicheck di menu Signed PI aplikasi G-EXIM
                        <br><br> Salam, <br><br> <b>G-EXIM</b></p>";

        $mail->Body = $mailContent;
        // Send email
        header('content-type: application/json');

        if(!$mail->send()){
        	echo '{"status":"failed","message":"'.$mail->ErrorInfo.'"}';
        }else{
            echo '{"status":"success","message":"Message has been sent"}';
        }

//  Kepada Yth : 
// 	Bapak dan Ibu 
	
//  Dengan hormat,

//  Berikut disampaikan bahwa terdapat update progress report PI dengan nomor : "PI0001/SKP-EXP/PI/03/2022"
// 	Update di aktifitas Signed PI, yaitu : 
//  - [Telex Release]  pada 2022-03-08 14:41:13 oleh user Sales 01
	
//  Progress PI 92%

//  Demikian disampaikan, untuk informasi lebih lanjut bisa dicheck di menu Signed PI aplikasi G-EXIM


//  Salam,


//  G-EXIM
}


}