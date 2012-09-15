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
    
   

mysql_query("update `leave` set status=2 where l_id='$l_id'");
$sql="select * from users where id='$f_id' ";
$rt2=mysql_query($sql);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($rt2))
	{
	$emailto=$nt2['email'];
	$rname=$nt2['name'];
	}
	$to = $emailto;
$subject = "Your leave has been rejected";
$message = "Hi $rname,

The application  that you had applied for $type from $start to $end has been rejected.
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