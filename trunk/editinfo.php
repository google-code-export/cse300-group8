<?php
include("cxn.php");
session_start();

$id=$_SESSION['userid'];

//$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$m_status=$_POST['m_status'];
$child=$_POST['child'];

//echo $name.$address.$phone.$child;
mysql_query("UPDATE users SET  address='$address', m_status='$m_status', phone='$phone', child='$child'  where id='$id'") ; 
header ('LOCATION:'.$_SERVER['HTTP_REFERER']);
?>