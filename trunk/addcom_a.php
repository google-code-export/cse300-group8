<?php

include('cxn.php');
$comment=$_POST['comment_a'];
$lid=$_GET['lid'];
mysql_query("update `leave` set comment_a='$comment' where l_id='$lid'");

header ('LOCATION:admin.php');
?>