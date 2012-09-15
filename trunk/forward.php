<?
include('cxn.php');
session_start();
$l_id=$_GET['lid'];
mysql_query("update `leave` set status=3 where l_id='$l_id'");
header('LOCATION:admin.php');

?>