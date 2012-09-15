<?
include("cxn.php");
session_start();
$id=$_SESSION['userid'];
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

mysql_query("INSERT INTO `leave` (id,start,end,no_days,type,fin_support,amount,reason,c_miss,city,country,time,agree)  VALUES ('$id','$from','$to','$days','$type','$f_supp1','$amount','$reason','$n_cls','$city','$country',now(),'$agree')") ; 
header ('LOCATION:faculty.php');


// echo $member['name'];
//echo "done";

/*if ($_SESSION['role']=="faculty") {
header ('LOCATION:faculty.php');
}*/
?>