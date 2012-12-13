<?php 
session_start();
include_once('cxn.php');
error_reporting(E_ERROR | E_PARSE);
if (!isset($_SESSION['userid'])) {
	header ('Location:index.php');
       // die( "You need to login to view this page!! ");

        exit;

}
else if ($_SESSION['role']=="admin") {
 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SoftCopy | Admin</title> 
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
    $('#body').load('admin_f.php');
}
setInterval( "update()", 5000 );
  </script>   

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.watermarkinput.js"></script>
<script type="text/javascript">
$(document).ready(function(){

$(".search").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;

if(searchbox=='')
{
}
else
{

$.ajax({
type: "POST",
url: "search.php",
data: dataString,
cache: false,
success: function(html)
{

$("#display").html(html).show();
  
  
  }




});
}return false;    


});
});

jQuery(function($){
   $("#searchbox").Watermark("Search");
   });
</script>
<style type="text/css">

</style>
 <script src="gen_validatorv4.js" type="text/javascript"></script> 
    </head>
<body onLoad="update();">
<div class="left_menu">
<!--<div id="leave"><a href="#"><b>Leaves</b></a></div>
<div id="rim"><a href="#"><b>Reimbursements</b></a></div>-->
<div id="bills2"><a data-toggle="modal"  href="#search" title="Click to search faculty archives"><b>Archive</b></a></div>
<div id="add_faculty"><a data-toggle="modal"  href="#addfaculty" title="Click to add a faculty"><b>Add Faculty</b></a></div>
<div id="logout_a"><a href="logout.php"><b>Logout</b></a></div>
<?php
$id=$_SESSION['userid']; 
$qry = "SELECT * FROM users WHERE id='$id'";
  $result = mysql_query($qry);
   $info=mysql_fetch_assoc($result);?>
<a style="position:relative; top:70%; left:10px;" href="index.php"><img src="logo_2.png"/></a></div>
<div class="info_bar">
<div id="name" style="font-family:'Kohinoor Bold';"><?php echo $info['name']; ?> <br/> <?php echo "<div style='font-size:15px;'>".$info['role']." </div>"; ?></div>
<div class="dp_area">
<a data-toggle="modal"  href="#addpic" title="Click to add/change your pic">
<?php if(!$info['pic'])
{?>
<img src="pics/dp.png"/>

<?php }
else
{
	echo "<img src='pics/".$info['pic']."' />";
}?>
</a>
</div>
<a data-toggle="modal"  href="#infoEdit" title="Change your info">
<div id="info">
<!--<div class="icon-address"></div>-->
<img src="images/location.png" width="16" height="16">
<?php echo $info['address'];?>
<br/>
<!--<div class="icon-phone"></div>-->
<img src="images/phone.png" width="16" height="16">
<?php echo $info['phone']; ?>
</div></a>
</div>


<div class="body" id="body">

</div>



       

     <div id="addpic" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Add/Change your photo</b> </p></center>
 <form  action="addpic.php" method="post" enctype="multipart/form-data">
       <input name="photo" type="file" size="10" />
            <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Add this photo </button>
</form>
          </div>
          </div>
          
          
          
          
     <div id="addfaculty" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Add a faculty</b> </p></center>
 <form  action="add-faculty.php" method="post" id="myform">
 Name <br/>
 <div id='myform_name_errorloc' style="color:red;"></div>
<textarea  id="expand" class="txtarea" name='name' rows='1' cols='1000' wrap="physical" ></textarea> <br/>
Email <br/>
<div id='myform_email_errorloc' style="color:red;"></div>
<textarea  id="expand" class="txtarea" name='email' rows='1' cols='1000' wrap="physical" ></textarea> <br/>
Password <br/>
<div id='myform_password_errorloc' style="color:red;"></div>
<textarea  id="expand" class="txtarea" name='password' rows='1' cols='1000' wrap="physical" ></textarea> <br/>
Address <br/>
  <textarea  id="expand" class="txtarea" name='address' rows='5' cols='1000' wrap="physical" ></textarea> <br/>
  Phone No. <br/>
  <textarea  id="expand" class="txtarea" name='phone' rows='1' cols='1000' wrap="physical" ></textarea> <br/>
 Marital Status <br/>
<select name="m_status">
 <option>
   Single
  </option>
  
  <option>
 Married 
  </option>
 </select>
  <br/>
  No. of children <br/>
  <textarea  id="expand" class="txtarea" name='child' rows='1' cols='1000' wrap="physical" ></textarea> <br/>
   
      
            <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Add Faculty </button>
</form>
<script  type="text/javascript">
 var frmvalidator = new Validator("myform");
 frmvalidator.addValidation("email","req","Please enter your email id");
  frmvalidator.addValidation("name","req","Please enter your email id");
 frmvalidator.addValidation("email","email","Please enter valid email id");
 frmvalidator.addValidation("password","req","Please enter the password");
  frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
 </script>
          </div>
          </div>


<div id="search" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Search a faculty for records</b> </p></center>
 <div style=" width:100%; " >
<input type="text" style=" width:100%; " class="search" id="searchbox" /><br />
<div id="display">
</div>

</div>

          </div>
          </div>          
          
          <div id="infoEdit" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Edit Info</b> </p></center>
 <form  action="editinfo.php" method="post">
Name <br/>
<textarea  id="expand" class="txtarea" name='name' rows='1' cols='1000' wrap="physical" ><?php echo $info['name'];?></textarea> <br/>
Address <br/>
  <textarea  id="expand" class="txtarea" name='address' rows='5' cols='1000' wrap="physical" ><?php echo $info['address'];?></textarea> <br/>
  Phone No. <br/>
  <textarea  id="expand" class="txtarea" name='phone' rows='1' cols='1000' wrap="physical" ><?php echo $info['phone'];?></textarea> <br/>
 Marital Status <br/>
   <select name="m_status">
 
  <option>
   <?php  echo $info['m_status']; ?>
  </option>
  
  <option>
  <?php  if($info['m_status']=="married"){ 
   echo "single"; }
  else if($info['m_status']=="single")
  echo "married"; ?>
  </option>
 </select>
  <br/>
  No. of children <br/>
  <textarea  id="expand" class="txtarea" name='child' rows='1' cols='1000' wrap="physical" ><?php echo $info['child'];?></textarea> <br/>
  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer"> Save Changes </button>
  <br/><a href="editpass.php">Change your password</a>
</form>
       
           

          </div>
          </div>
          
       <?php
	   $qr2="select * from `leave` where (status=0 or status=1 or status=2) order by time ASC";
$r1=mysql_query($qr2);
echo mysql_error();    
	$cnt=0;
	while($nt=mysql_fetch_array($r1))
	{
		$lid=$nt['l_id'];
		//$cnt++;?>
         <div id="addcom<?php echo $lid; ?>" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Add comment</b> </p></center>
 <form  action="addcom_a.php?lid=<?php echo $lid; ?>" method="post">
     <textarea value="" name="comment_a" rows="3" style="width:100%;"><?php echo $nt['comment_a']; ?></textarea><br/>
            <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer">Add comment </button><br/>
</form>
          </div>
          </div>

        
        <?php
	}
	
	?>   
    
          

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
<script type="text/javascript">
var uvOptions = {};
(function() {
var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/w3Csb0zNyfz2mxFx4zbtfQ.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
})();
</script>
</body>
</html>
<?php } 
else if ($_SESSION['role']=="faculty")
{
	header ('LOCATION:faculty.php');
}
else if ($_SESSION['role']=="director")
{
	header ('LOCATION:director.php');
}
?>