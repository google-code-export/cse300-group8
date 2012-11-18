<?php
include("cxn.php");
require("class.phpmailer.php");
session_start();
if ($_SESSION['role']=="admin")
{


$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$m_status=$_POST['m_status'];
$child=$_POST['child'];
$email=$_POST['email'];
$password_raw=$_POST['password'];
$password=md5($_POST['password']);

//echo $name.$address.$phone.$child.$password.$email;
mysql_query("INSERT INTO  `users` (name, email, address, password, role, phone, m_status, child, time) VALUES ('$name', '$email', '$address', '$password', 'faculty' ,'$phone','$m_status', '$child', now())") ; 
$qr2="select * from `users` where (email='$email')";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
		$c_email=$nt['email'];
		$c_id=$nt['id'];
		
	}
	mysql_query("INSERT INTO `counter` (id) VALUES ('$c_id')");
$to = $email;
$mail             = new PHPMailer();
 
$body             = "Hi $name,
Your account on Leave Desk has been created by your admin. 
Use fllowing credentials to login:
<br>
Email Id: $email <br>
Password: $password_raw <br>
You can change your password from your dashboard after logging in. <br>
_______________ <br>
Thanks, <br>
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
 
$mail->Subject    =  "Your account has been created on Leave Desk";
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$mail->AddAddress($email, $name);
 
$mail->Send();
 
/*
$subject = "Your account has been created on Leave Desk";
$message = "Hi $name,
Your account on Leave Desk has been created by your admin. 
Use fllowing credentials to login:

Email Id: $email
Password: $password_raw
_______________
Thanks,
SoftCopy Team
";
$from = "SoftCopy <notify@wizters.com>";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

*/

echo "<br/><br/><center><h3> $name has been added as a Faculty on leave desk. </h3> </center>";
?><br>
<center><a href="admin.php"> Go Back</a></center>

<?php
}
//header ('LOCATION:'.$_SERVER['HTTP_REFERER']);
?>