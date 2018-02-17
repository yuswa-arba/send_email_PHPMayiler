<?php

$nama = $_POST["nama"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$messages = $_POST["messages"];

//Load composer's autoloader
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
//$mail->SMTPDebug = 2;
$mail->isHTML(true);
$mail->isSMTP();// Mengatur mailer untuk mengguna SMTP
$mail->SMTPSecure = 'ssl';// Port TCP untuk terhubung
$mail->Host = 'ssl://smtp.gmail.com:465';  // tentukan server SMTP utama dan cadangan
$mail->Port = 465;// port yang digunakan sesuai SMTP nya
$mail->SMTPAuth = true;// aktifkan otentikasi SMTP
$mail->Username = 'yuswa98@gmail.com';// Alamat email yang digunakan, harus aktif
$mail->Password = 'yuswa01@gmail';// Password email aktif yang digunakan
$mail->setFrom('GlobalXtreme@info.net', 'Global Info');// informasi email pengirim (boleh sembarang)
$mail->addAddress($email);// alamat email tujuan

$mail->Subject = $subject;// subject pesan yang dikirim
$mail->Body = $messages;// isi email yang dikirim
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

if ($mail->send()) {
    echo "<script>
            alert('Message has been sent');
            window.location.href = 'email.php';
          </script>";
} else {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    echo "<br> <a href='email.php'>Kembali</a>";
}