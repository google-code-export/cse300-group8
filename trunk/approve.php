<?
include('cxn.php');
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
	   mysql_query("update `counter` set casual=casual-'$days' where id='$f_id'");
	
   }
   
   else if ($type=="Paid Leave")
   {
	   mysql_query("update `counter` set paid=paid-'$days' where id='$f_id'"); 
   }
   else if ($type=="Vacation Leave")
   {
	 mysql_query("update `counter` set vacation=vacation+'$days', paid=paid-'$hdays' where id='$f_id'");   
   }
   else if ($type=="Work Leave")
   {
	    mysql_query("update `counter` set work=work+'$days' where id='$f_id'");
   }
   else if ($type=="Unpaid Leave")
   {
	   mysql_query("update `counter` set unpaid=unpaid+'$days' where id='$f_id'");
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
	$to = $emailto;
$subject = "Your leave has been approved";
$message = "Hi $rname,

The application  that you had applied for $type from $start to $end has been approved.
You can check it by logging into your SoftCopy account.
_______________
Thanks,
SoftCopy Team
";
$from = "SoftCopy <notify@wizters.com>";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
	
//echo $to." ".$rname." ".$message." ".$headers;
header('LOCATION:director.php');


?>