<?php
include("cxn.php");
session_start();
$id=$_SESSION['userid'];
$l_id=$_GET['lid'];
$from=$_POST['from'];
$to=$_POST['to'];
$days=$_POST['days'];
$type=$_POST['type'];
$f_supp=$_POST['finsup'];
$amount=$_POST['amount'];
$reason=$_POST['reason'];
$n_cls=$_POST['n_cls'];
$city=$_POST['city'];
$country=$_POST['country'];
$arrange=$_POST['arrange'];
$agree=0;
if (isset($_POST['agree']))
{
	$agree=1;
}
if ($f_supp=="Institute")
{
	$f_supp1=0; //int form of finsup
}
else if ($f_supp=="PDA")
{
	$f_supp1=1;
}
else if ($f_supp=="Project number")
{
	$f_supp1=2;
}
else if ($f_supp=="Other")
{
	$f_supp1=3;
}
$i=0;

//echo $type,$to,$days,$from;

mysql_query("update `leave` SET id='$id',start='$from',end='$to',no_days='$days',type='$type',fin_support='$f_supp1',amount='$amount',reason='$reason',c_miss='$n_cls',city='$city',country='$country',time=now(),agree='$agree',arrangement='$arrange',status=0 where l_id='$l_id'") ; 
header ('LOCATION:faculty.php');


// echo $member['name'];
//echo "done";

/*if ($_SESSION['role']=="faculty") {
header ('LOCATION:faculty.php');
}*/
?>