<?php 
session_start();
include_once("cxn.php");
$password= md5($_POST['password']);
$password2=md5($_POST['password2']);
$temp=$_SESSION['userid'];
 //echo $temp;

if($_POST['password2']==$_POST['password3'])
{
 
 $qry= "SELECT password FROM users WHERE id='$temp'";
 
 $result=mysql_query($qry);
 while($nt=mysql_fetch_array($result))
	{
	$passdb=$nt['password'];
	}
 if($passdb==$password)
 {

 $qry1="UPDATE users SET password = '$password2' WHERE id='$temp'";
 $rt3=mysql_query($qry1);
 
 
?>
 <fieldset class="memberpage">
 <h1>
<?php die('Your New password has been saved'); ?>
</h1>
</fieldset>
<?php
 
 
 }
 else
 {
 
?>
 <fieldset class="memberpage">
 <h1>
<?php die('You entered wrong current password'); ?>
</h1>
</fieldset>
<?php
 
 }
 }
 else
 {
 
?>
 <fieldset class="memberpage">
 <h1>
<?php die('Your Passwords did not match'); ?>
</h1>
</fieldset>
<?php
 
 }
 
 
 ?>
 