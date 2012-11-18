<?php //Start session 
session_start(); 
//Unset the variable SESS_MEMBER_ID stored in session
 unset($_SESSION['userid']);
  unset($_SESSION['role']);
   $expire=time()-60*60*24*30*12;
setcookie("userid", $member['id'], $expire);
setcookie("role", $member['role'], $expire);
 header ('Location:index.php');