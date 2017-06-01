<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('classes/PHPmailer/class.phpmailer.php');
require_once('classes/PHPmailer/class.smtp.php');


$mail_conf = "/var/www/devctc/config/mail.conf";
$mail_creds = array();

$file = fopen($mail_conf, "r");
if ($file) {
    while(!feof($file)) {
        $line = fgets($file);
        $mail_creds[] = explode(" ", $line)[1];
    }
    fclose($file);
} else {
    echo "can't open db.conf<br>";
}

$from_email = $mail_creds[0]; // minectc@gmail.com

function SendMail($send_to, $subject, $message, $name) //, $smtp_host, $smtp_port, $smtp_usr, $smtp_pwd)
{   
    $mail_conf = "/var/www/devctc/config/mail.conf";
    $mail_creds = array();

    $file = fopen($mail_conf, "r");
    if ($file) {
        while(!feof($file)) {
            $line = fgets($file);
            $mail_creds[] = explode(" ", $line)[1];
        }
        fclose($file);
    } else {
        echo "can't open db.conf<br>";
    }

    $smtp_usr = $mail_creds[0]; 
    $smtp_pwd = $mail_creds[1]; 
    $smtp_host = $mail_creds[2]; 
    $smtp_port = $mail_creds[3];  
    
    $mail             = new PHPMailer(true);
    try {
    $body             = $message;
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host       = "smtp.gmail.com"; //$smtp_host;
    $mail->Port       = 587;
    $mail->Username   = $smtp_usr;
    $mail->Password   = $smtp_pwd;
    $mail->SMTPSecure = 'tls';
    $mail->SetFrom($smtp_usr, 'MineCTC');
    $mail->AddReplyTo($smtp_usr, "MineCTC");
    $mail->Subject    = $subject;
    $mail->AltBody    = "Any message.";
    $mail->MsgHTML($body);
    $address = $send_to;
    $mail->AddAddress($address, $name);
    if(!$mail->Send()) {
        return 0;
    } else {
          return 1;
    }
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
