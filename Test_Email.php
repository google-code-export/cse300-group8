<?php

require("class.phpmailer.php");

$mail             = new PHPMailer();
 
$body             = "Message Body";
 
$mail->Mailer = "smtp"; 
$mail->Host = "ssl://smtp.gmail.com"; 
$mail->Port = 465; 
$mail->SMTPAuth = true; // turn on SMTP authentication 
$mail->Username = "leavedesk"; // SMTP username 
$mail->Password = "softcopy"; // SMTP password 
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom('notification@softcopy.com', 'SoftCopy');
 
$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$mail->AddAddress('apoorvsaini9@gmail.com', 'Apoorv Saini');
 
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
?>