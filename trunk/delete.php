<?php
session_start();
$id=$_SESSION['userid'];
include_once("cxn.php");
$lid=$_GET['lid'];
$qr3="select * from `leave` where l_id='$lid' and id='$id'";
$r2=mysql_query($qr3);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r2))
	{
		if ($nt['status']==1)
		{
			$days=$nt['no_days'];
			$type=$nt['type'];
		 if ($type=="Casual Leave")
   {
	   mysql_query("update counter set casual=casual+'$days' where id='$id'");
	
   }
   
   else if ($type=="Paid Leave")
   {
	   mysql_query("update counter set paid=paid+'$days' where id='$id'"); 
   }
   else if ($type=="Vacation Leave")
   { $hdays=$days/2;
	 mysql_query("update counter set vacation=vacation-'$days', paid=paid+'$hdays' where id='$id'");   
   }
   else if ($type=="Work Leave")
   {
	    mysql_query("update counter set work=work-'$days' where id='$id'");
   }
   else if ($type=="Unpaid Leave")
   {
	   mysql_query("update counter set unpaid=unpaid-'$days' where id='$id'");
   }
	
		}
		}
mysql_query("update `leave` set status=5 where l_id='$lid' and id='$id'");
header("LOCATION:faculty.php");
?>
