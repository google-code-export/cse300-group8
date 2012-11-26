<?php
include('cxn.php');
require("class.phpmailer.php");
$hash = md5( rand(0,1000) );
$email=$_POST['email'];
$qry="select * from users where email='$email'";
$rt=mysql_query($qry);           
	echo mysql_error();    
	
	while($nt=mysql_fetch_array($rt))
	{
		$i=1;
	$username=$nt['name'];
	$u_id=$nt['id'];
	}

	if($i==1)
{
//send mail
$mail             = new PHPMailer();
 
$body             = "Hi $username,
<br>
There was recently a request to change the password on your account.<br>
If you requested this password change, please set a new password by following the link below:
<br>
http://14.139.56.179:8088/pass-recovery.php?hash=$hash&id=$u_id
<br>
If you don't want to change your password, just ignore this message.<br>

Thanks,<br>

_______________<br>
Thanks,<br>
SoftCopy Team
";
 
$mail->Mailer = "smtp"; 
$mail->Host = "ssl://smtp.gmail.com"; 
$mail->Port = 465; 
$mail->SMTPAuth = true; // turn on SMTP authentication 
$mail->Username = "leavedesk"; // SMTP username 
$mail->Password = "softcopy"; // SMTP password 
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom('notification@softcopy.com', 'SoftCopy');
 
$mail->Subject    = "Reset your Leavedesk password";
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$mail->AddAddress($email, $username);
 
$mail->Send();
 

$qry2="update users set hash='$hash' where email='$email'";
$add_hash=mysql_query($qry2);


?>
<div class="fadein">
  
  </div>

<div class="common" style="position:absolute; top:100px; left:300px;">

<?php 
die('The mail has been sent, check your mail [also check your spam folder.]. ');
}
else
{?>
<div class="fadein">
  
  </div>

<div class="common" style="position:absolute; top:100px; left:300px;">


<?php
die('Your email address was not found in our database.');
}

 ?>