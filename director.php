<?php 
session_start();
include_once('cxn.php');

if (!isset($_SESSION['userid'])) {
	header ('Location:index.php');
       // die( "You need to login to view this page!! ");

        exit;

}
else if ($_SESSION['role']=="director") {
 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SoftCopy | Director</title> 
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
           <link href="style/jquery-ui.css" rel="stylesheet">
           <link href="style/style.css" rel="stylesheet">
           <link rel="stylesheet" media="screen" type="text/css" href="style/datepicker.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
   
    <script>
  function update(){
    // Assuming we have #shoutbox
    $('#body').load('director_f.php');
}
setInterval( "update()", 5000 );
  </script>   
    </head>
<body onLoad="update();">
<div class="left_menu">
<!--<div id="leave"><a href="#"><b>Leaves</b></a></div>
<div id="rim"><a href="#"><b>Reimbursements</b></a></div>
<div id="bills"><a href="#"><b>Archive</b></a></div>-->
<div id="logout_d"><a href="logout.php"><b>Logout</b></a></div>
<?
$id=$_SESSION['userid']; 
$qry = "SELECT * FROM users WHERE id='$id'";
  $result = mysql_query($qry);
   $info=mysql_fetch_assoc($result);?>
<div id="logo2"></div></div>
<div class="info_bar">
<div id="name" style="font-family:'Kohinoor Bold';"><? echo $info['name']; ?> <br/><br/> <? echo "<div style='font-size:16px;'>".$info['role']." </div>"; ?></div>
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


<div class="body" id="body">

</div>
     
       <?
	   $qr2="select * from `leave` where (status=3) order by time ASC";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
		$lid=$nt['l_id'];
	}
	?>   

 <div id="addcom" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Add comment</b> </p></center>
 <form  action="addcom_d.php?lid=<? echo $lid; ?>" method="post">
     <textarea value="" name="comment_d" rows="3"></textarea><br/>
            <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Add comment </button><br/>
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
 
  <option>
   <?  echo $info['m_status']; ?>
  </option>
  
  <option>
  <?  if($info['m_status']=="married"){ 
   echo "single"; }
  else if($info['m_status']=="single")
  echo "married"; ?>
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


      <script type="text/javascript" src="js/bootstrap-button.js"></script>
  
     
      <script type="text/javascript" src="js/jquery.js"></script>
    <script>  
   (function() {  
      var elem = document.createElement('input');  
      elem.setAttribute('type', 'date');  
  
      if ( elem.type === 'text' ) {  
         $('#date').datepicker();   
      }  
   })();  
  
</script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>  
<script src="js/jquery-ui.js"></script>
<script>


function calcBusinessDays(date1, date2) {         // input given as Date objects

  var iWeeks, iDateDiff, iAdjust = 0;

  if (dDate2 < dDate1) return -1;                 // error code if dates transposed

  var iWeekday1 = dDate1.getDay();                // day of week
  var iWeekday2 = dDate2.getDay();

  iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1;   // change Sunday from 0 to 7
  iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;

  if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1;  // adjustment if both days on weekend

  iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1;    // only count weekdays
  iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;

  // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
  iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)

  if (iWeekday1 <= iWeekday2) {
    iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
  } else {
    iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
  }

  iDateDiff -= iAdjust                            // take into account both days on weekend

  return (iDateDiff + 1);                         // add 1 because dates are inclusive
 
 

}
</script>
</body>
</html>
<? } 
else if ($_SESSION['role']=="faculty")
{
	header ('LOCATION:faculty.php');
}
else if ($_SESSION['role']=="admin")
{
	header ('LOCATION:admin.php');
}
?>