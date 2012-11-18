<?php
include('cxn.php');
require("class.phpmailer.php");
session_start();
$l_id=$_GET['lid'];
$qry = "SELECT * FROM `leave` WHERE l_id='$l_id'";
  $result = mysql_query($qry);
   $info=mysql_fetch_assoc($result);
   $type=$info['type'];
   $f_id=$info['id'];
   $days=$info['no_days'];
   $hdays=$days/2;
   $start=$info['start'];
   $end=$info['end'];
   if ($type=="Casual Leave")
   {
	   mysql_query("update counter set casual=casual-'$days' where id='$f_id'");
	
   }
   
   else if ($type=="Paid Leave")
   {
	   mysql_query("update counter set paid=paid-'$days' where id='$f_id'"); 
   }
   else if ($type=="Vacation Leave")
   {
	 mysql_query("update counter set vacation=vacation+'$days', paid=paid-'$hdays' where id='$f_id'");   
   }
   else if ($type=="Work Leave")
   {
	    mysql_query("update counter set work=work+'$days' where id='$f_id'");
   }
   else if ($type=="Unpaid Leave")
   {
	   mysql_query("update counter set unpaid=unpaid+'$days' where id='$f_id'");
   }
  
   
mysql_query("update `leave` set status=1 where l_id='$l_id'");

$sql="select * from users where id='$f_id' ";
$rt2=mysql_query($sql);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($rt2))
	{
	$emailto=$nt2['email'];
	$rname=$nt2['name'];
	}
	
	
	
	$mail             = new PHPMailer();
 
$body             = "Hi $rname,

The application  that you had applied for $type from $start to $end has been approved.
You can check it by logging into your SoftCopy account. <br>
_______________
Thanks,
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
 
$mail->Subject    = "Your leave has been approved";
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$mail->AddAddress($emailto, $rname);
 
$mail->Send();
 

	
	
	
	
/*	$to = $emailto;
$subject = "Your leave has been approved";
$message = "Hi $rname,

The application  that you had applied for $type from $start to $end has been approved.
You can check it by logging into your SoftCopy account.
_______________
Thanks,
SoftCopy Team
";

*/


	
//echo $to." ".$rname." ".$message." ".$headers;
header('LOCATION:director.php');


?>