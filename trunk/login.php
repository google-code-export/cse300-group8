<?php
include_once("cxn.php");


$email=$_POST['email'];
 $qry = "SELECT * FROM users WHERE email='$email' AND password='".md5($_POST['pass'])."'";
  $result = mysql_query($qry);
  
  if(mysql_num_rows($result) > 0) {
	//Login Successful
    //Regenerate session ID to prevent session fixation attacks
    session_regenerate_id();
	session_start();

    $member=mysql_fetch_assoc($result);
    $_SESSION['userid'] = $member['id'];
	  $_SESSION['role'] = $member['role'];
    //Write session to disc
    session_write_close();
    if (isset($_POST['remember'])){
    $expire=time()+60*60*24*30*12;
setcookie("userid", $member['id'], $expire);
setcookie("role", $member['role'], $expire);
}
	//session_register("password");
	//session_register("id");
if ($_SESSION['role']=="faculty"){
	header ("Location:faculty.php");
	}
	else if ($_SESSION['role']=="admin"){
	header ("Location:admin.php");
	}
	else if ($_SESSION['role']=="director"){
	header ("Location:director.php");
	}
 
   
    exit();
}

else {
	
 header("location: index.php?err=1&email=$email");

}
  
 ?>