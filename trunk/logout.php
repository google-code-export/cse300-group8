<?php //Start session 
session_start(); 
//Unset the variable SESS_MEMBER_ID stored in session
 unset($_SESSION['userid']);
  unset($_SESSION['role']);
 header ('Location:index.php');