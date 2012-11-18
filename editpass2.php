<?php
$hash=$_GET['hash'];
$id=$_GET['id'];
$pass1=$_POST['password1'];
$pass2=$_POST['password2'];
include("cxn.php");
if($pass1==$pass2)
{
	$pass=md5($pass1);
	$qry="update users SET password='$pass' where hash='$hash' and id='$id'";
	$set_done=mysql_query($qry);
	
	?>
    <div class="fadein">
  
  </div>

<div class="common" style="position:absolute; top:100px; left:300px;">
    <?php
	$qry2="update users set hash='' where id='$id'";
	$set_dn=mysql_query($qry2);
	die('Your password has been changed. You can now <a href="http://14.139.56.179:8088">login</a>.');
	include("footer.php");
}
else
{
	
	?>
     <div class="fadein">
  
  </div>

<div class="common" style="position:absolute; top:100px; left:300px;">
    
    <?php
	die('Your passwords did not match. Go back and make them match.');
	
}
?>