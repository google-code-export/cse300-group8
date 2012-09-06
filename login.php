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
	//session_register("password");
	//session_register("id");
if ($_SESSION['role']=="faculty"){
	header ("Location:faculty.php");
	}
	else if ($_SESSION['role']=="admin"){
	header ("Location:admin.php");
	}
 
   
    exit();
}

else {
	
 header("location: index.php");

}
  
 ?>