<?php 
session_start();
include_once('cxn.php');
if ((isset($_COOKIE['userid']))&&(isset($_COOKIE['role'])) )
{
   $_SESSION['userid'] = $_COOKIE['userid'];
    $_SESSION['role'] = $_COOKIE['role'];
}
if (!isset($_SESSION['userid'] )) {


	

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>LeaveDesk</title> 
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
   <script src="gen_validatorv4.js" type="text/javascript"></script> 
       
    </head>
    
    <body >
   
    <div id="new-logo"></div>
     <div id="iiit-logo"></div>
  <div class="homebox">
   <iframe class="home-video" width="560" height="315" src="http://www.youtube.com/embed/j06wDNruGIw?rel=0" frameborder="0" allowfullscreen></iframe>
  
    
     <form  id="login"  action="login.php" method="post">
      <legend>Log In</legend>
      <?php
if(isset($_GET['err']))
{
  ?>
  <span style="color:red;">You entered wrong email id or password</span>
  <?php
}
      ?>
      <div id='login_email_errorloc' style="color:red;"></div>
    <?php
if(isset($_GET['email']))
{
  ?>
 <input  id="xlInput" class="inp"  name="email" size="220" type="text" value="<?php echo $_GET['email']; ?>" placeholder="Email Id" /><br/>
  
  <?php
}
else {
    ?>
  <input  id="xlInput" class="inp"  name="email" size="220" type="text" placeholder="Email Id" /><br/>
  <?php } ?>
  <div id='login_pass_errorloc' style="color:red;"></div>
   <input  id="xlInput" class="inp" type="password" name="pass" size="220" type="text" placeholder="Password"/><br/>
  <input type="checkbox" name="remember"/> Remember Me <br><br>
  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Login </button>
  <a href="frgt-pass.php">Forgot your password?</a><br/>
</form>
 
  
    </div>
   <script  type="text/javascript">
 var frmvalidator = new Validator("login");
 frmvalidator.addValidation("email","req","Please enter your email id");
 frmvalidator.addValidation("email","email","Please enter valid email id");
 frmvalidator.addValidation("pass","req","Please enter the password");
  frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
 

</script>
   <center>
      <div class="main" style="position:relative; top:500px; font-size:15px;">
      <a href="#">Help </a>. <a href="about.php">About</a> . <a href="#">Team </a>. <a href="#">T&C </a>
      </div>
      </center>

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
	
    