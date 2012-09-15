<?

include('cxn.php');
$comment=$_POST['comment_d'];
$lid=$_GET['lid'];
mysql_query("update `leave` set comment_d='$comment' where l_id='$lid'");

header ('LOCATION:director.php');
?>