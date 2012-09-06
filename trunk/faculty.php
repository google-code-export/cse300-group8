<?php 
session_start();
include_once('cxn.php');

if (!isset($_SESSION['userid'])) {
	header ('Location:index.php');
       // die( "You need to login to view this page!! ");

        exit;

}
else if ($_SESSION['role']=="faculty") {
 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SoftCopy | Faculty</title> 
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
<body>
<div class="left_menu">
<div id="leave"><a href="#"><b>Leaves</b></a></div>
<div id="rim"><a href="#"><b>Reimbursements</b></a></div>
<div id="bills"><a href="#"><b>Bills</b></a></div>
<div id="logout"><a href="logout.php"><b>Logout</b></a></div>
<?
$id=$_SESSION['userid']; 
$qry = "SELECT * FROM users WHERE id='$id'";
  $result = mysql_query($qry);
   $info=mysql_fetch_assoc($result);?>
<div id="logo2"></div></div>
<div class="info_bar">
<div id="name" style="font-family: 'Fugaz One';"><? echo $info['name']; ?> <br/><br/> <? echo "<div style='font-size:16px;'>".$info['role']." </div>"; ?></div>
<div class="dp_area">
<a data-toggle="modal"  href="#addpic" title="Click to add/change your pic">
<? if(!$info['pic'])
{?>
<img src="pics/dp.png"/>

<? }
else
{
	echo "<img src='pics/".$info['pic']."' />";
}?>
</a>
</div>
<a data-toggle="modal"  href="#infoEdit" title="Change your info">
<div id="info">

<? echo $info['address']."<br/>".$info['phone']."<br/>"; ?>

</div></a>
</div>


<div class="body">
<div class="leave-body">
<h1 style="color:#399;"> Leaves</h1>
<br/>
<h3><a data-toggle="modal"  href="#addleave">+ | Submit a leave application</a></h3>



</div>


</div>


<div id="addleave" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Submit leave application</b> </p></center>

        <form  action="addleave.php" method="post">
From (mm/dd/yy):<br/>
 <textarea  name='from' rows='1' cols='500' wrap="physical" placeholder="12/12/12" ></textarea> <br/>
To (mm/dd/yy):<br/>
 <textarea  name='to' rows='1' cols='500' wrap="physical" placeholder="12/12/12" ></textarea> <br/>
No. of days <br/>
<textarea  id="expand" class="txtarea" name='name' rows='1' cols='1000' wrap="physical" ></textarea> <br/>
Reason of leave <br/>
<select> <option>Paid Leave</option> <option>Work Leave</option> <option>Unpaid Leave</option> <option>Vacation Leave</option> <option>Casual Leave</option><option>Sabbatical Leave</option></select><br/>
  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer"> Submit </button>
  
</form>
           

          </div>
          </div>


     <div id="addpic" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Add/Change your photo</b> </p></center>
 <form  action="addpic.php" method="post">
       <input name="photo" type="file" size="10" />
            <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Add this photo </button>
</form>
          </div>
          </div>
          
          <div id="infoEdit" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Edit Info</b> </p></center>
 <form  action="editinfo.php" method="post">
Name <br/>
<textarea  id="expand" class="txtarea" name='name' rows='1' cols='1000' wrap="physical" ><? echo $info['name'];?></textarea> <br/>
Address <br/>
  <textarea  id="expand" class="txtarea" name='address' rows='5' cols='1000' wrap="physical" ><? echo $info['address'];?></textarea> <br/>
  Phone No. <br/>
  <textarea  id="expand" class="txtarea" name='phone' rows='1' cols='1000' wrap="physical" ><? echo $info['phone'];?></textarea> <br/>
 Marital Status <br/>
  <select name="m_status">
  <?  if($info['m_status']==0){ ?>
  <option>
  <? echo "Single"; }
  else {
  echo "Married"; } ?>
  </option>
  <?  if($info['m_status']==0){ ?>
  <option>
  <? echo "Married"; }
  else 
  echo "Single"; ?>
  </option>
  </select>
  <br/>
  No. of children <br/>
  <textarea  id="expand" class="txtarea" name='child' rows='1' cols='1000' wrap="physical" ><? echo $info['child'];?></textarea> <br/>
  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer"> Save Changes </button>
  <br/><a href="editpass.php">Change your password</a>
</form>
       
           

          </div>
          </div>

 <script type="text/javascript" src='http://code.jquery.com/jquery-1.7.2.js'></script>
      <script type="text/javascript" src="js/bootstrap-button.js"></script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>
</body>
</html>
<? } ?>