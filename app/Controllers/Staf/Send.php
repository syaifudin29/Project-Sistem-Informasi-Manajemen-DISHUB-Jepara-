<?php

namespace App\Controllers\Staf;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Controllers\BaseController;

class Send extends BaseController
{
    public function proses($id)
    {
    	$mail = new PHPMailer(true);

    	$data = $this->userModel->where('id_user', $id)->find();
    	$email_user = $data[0]['email'];
    	$nama = $data[0]['nama'];

		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'hackroot29@gmail.com';                     //SMTP username
		    $mail->Password   = 'havcoqoretbejhko';                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $mail->setFrom($email_user, 'DINAS PERHUBUNGAN JEPARA');
		    $mail->addAddress($email_user);     //Add a recipient
		 
		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = 'Verifikasi PKL';
		    $mail->Body    = 'Selamat '.$nama.',Kamu <b>Diterima</b> PKL di Dinas Perhubungan Jepara. </br>Silahkan Login ke akun anda.';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    return redirect()->to('/staf/daftar_peserta');
		    // echo 'Message has been sent';
		} catch (Exception $e) {
			return redirect()->to('/staf/daftar_peserta');
		    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
    }
}