<?php 
session_start();
include_once('cxn.php');

if (!isset($_SESSION['userid'] )) {


	

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SoftCopy</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content= "Say goodbye to paper." />
        <meta name="keywords" content="softcopy, college, faculty, leave system" />         
        <meta name="author" content="SoftCopy Inc." />
         <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
        
        <!-- Google Webfonts and our stylesheet -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Fugaz+One|PT+Sans+Narrow|Open+Sans:300" />
       
          
          <link href="style/bootstrap.css" rel="stylesheet">
           <link href="style/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
   
       
    </head>
    
    <body >
   
    <div id="new-logo"></div>
     
  <div class="homebox">
   <iframe class="home-video" width="560" height="315" src="http://www.youtube.com/embed/j06wDNruGIw?rel=0" frameborder="0" allowfullscreen></iframe>
  
    
     <form  id="login"  action="login.php" method="post">
      <legend>Log In</legend>
  <input  id="xlInput" class="inp"  name="email" size="220" type="text" placeholder="Email Id" /><br/>
  
   <input  id="xlInput" class="inp" type="password" name="pass" size="220" type="text" placeholder="Password"/><br/>
  
  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Login </button>
  <a href="#">Forgot your password?</a><br/>
</form>
 
  
    </div>
   
      <footer class="main">
      <a href="#">Help </a>. <a href="#">About</a> . <a href="#">Team </a>. <a href="#">T&C </a>
      </footer>
       </body>
</html>

 <?php 
	}
	
	
	else if ($_SESSION['role']=="faculty"){
	header ("Location:faculty.php");
	}
	else if ($_SESSION['role']=="admin"){
	header ("Location:admin.php");
	}
	else if ($_SESSION['role']=="director")
{
	header ('LOCATION:director.php');
}
	
	?>
	
    