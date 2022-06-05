<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../PHPMailer-master/src/Exception.php');
include('../PHPMailer-master/src/PHPMailer.php');
include('../PHPMailer-master/src/SMTP.php');

    function base_url(){
        $base_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
        return $base_url;
    }

    function kirim_email($email_penerima, $nama_penerima, $judul_email, $isi_email){

        $email_pengirim = "aryaputrahaidar@gmail.com";
        $nama_pengirim  = "Wonderlust-noreply";

        //Load Composer's autoloader
        require getcwd().'/vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer;

        try {
            //Server settings
            $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $email_pengirim;                     //SMTP username
            $mail->Password   = 'ntgtebrwtzqxqoqr';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($email_penerima, $nama_penerima);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '$judul_email';
            $mail->Body    = '$isi_email';

            $mail->send();
            echo 'Sukses';
        } catch (Exception $e) {
            return "Gagal: {$mail->ErrorInfo}";
    }
}
?>