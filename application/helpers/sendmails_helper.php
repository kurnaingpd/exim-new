<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(!function_exists('sendmail')) {
        function sendmail($subject, $to, $content)
        {
            $CI =& get_instance();
            $implode = implode(", ", $to);
            $CI->email->set_newline("\r\n");
            $CI->email->set_crlf("\r\n");
            $CI->email->from('no-reply4@gonusa-distribusi.com');
            $CI->email->to($implode);
            $CI->email->subject($subject);
            $CI->email->message($content);
            $CI->email->send();
        }
    }
?>