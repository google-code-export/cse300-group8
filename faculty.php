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
           <link href="style/jquery-ui.css" rel="stylesheet">
           <link href="style/style.css" rel="stylesheet">
           <link rel="stylesheet" media="screen" type="text/css" href="style/datepicker.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
   <script>
function Checkfin(val){
 var element=document.getElementById('fin');
 if(val=='Work Leave')
   element.style.display='block';
 else  
   element.style.display='none';
}
</script>
<script>
function Checksource(val){
 var element=document.getElementById('cb');
 if((val=='PDA')|(val=='Project Number'))
   element.style.display='block';
 else  
   element.style.display='none';
}
</script>
<script>
 function weekdayc()
 {
Date1 = document.getElementById('Date').value;
Date2 = document.getElementById('Date2').value;
dDate1=new Date (Date1);
dDate2=new Date(Date2);
//document.getElementById('nod').value =date1;
//calcBusinessDays(date1, date2);
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

 // return (iDateDiff + 1);                         // add 1 because dates are inclusive
 
 //document.getElementById('nod').innerHTML = iDateDiff + 1;
 document.getElementById('nod').value =iDateDiff + 1;
 }
 
 function weekdayc2()
 {
Date3 = document.getElementById('Date3').value;
Date4 = document.getElementById('Date4').value;
//alert (Date3);
dDate1=new Date (Date3);
dDate2=new Date(Date4);
//document.getElementById('nod').value =date1;
//calcBusinessDays(date1, date2);
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

 // return (iDateDiff + 1);                         // add 1 because dates are inclusive
 
 //document.getElementById('nod').innerHTML = iDateDiff + 1;
 document.getElementById('nod2').value =iDateDiff + 1;
 }
</script>
<script>


function calcBusinessDays(dDate1,dDate2) {         // input given as Date objects

  var iWeeks, iDateDiff, iAdjust = 0;

  if (dDate2 < dDate1) return -1;                 // error code if dates transposed

  var iWeekday1 = dDate1.getDay();                // day of week
  var iWeekday2 = dDate2.getDay();
document.getElementById('nod').value =dDate1;
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

 // return (iDateDiff + 1);                         // add 1 because dates are inclusive
 
 //document.getElementById('nod').innerHTML = iDateDiff + 1;
// document.getElementById('nod').value =iDateDiff + 1;

}
</script>
  <script>
  function update(){
    // Assuming we have #shoutbox
    $('#body').load('faculty_f.php');
}
setInterval( "update()", 5000 );
  </script> 
  <script src="gen_validatorv4.js" type="text/javascript"></script>  
    </head>
<body onLoad="update();">
<div class="left_menu">
<!--<div id="leave"><a href="#"><b>Leaves</b></a></div>
<div id="rim"><a href="#"><b>Reimbursements</b></a></div>
<div id="bills"><a href="#"><b>Bills</b></a></div>-->
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
<img src="pics/dp.png"  style=" position:relative; top:0px;"/>

<?php }
else
{
	echo "<img src='pics/".$info['pic']."' height='150' width='150'/>";
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
<div style="position:relative; top:80px; width:40%; left:20%;">
<?php
if (isset($_GET['err']))
{
  if ($_GET['err']=="casual")
  {
    echo "<h3>Your casual leave application can not be submitted because you are exceeding the limit.</h3>";
  }
}
?>
</div>

<div class="body" id="body">

</div>


<div id="addleave" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Submit leave application</b> </p></center>


        <form enctype="multipart/form-data" action="addleave.php" method="post" id="myform">
From (mm/dd/yy):<br/>
<!-- <textarea id="inputDate"  name='from' rows='1' cols='500' wrap="physical" placeholder="12/12/12" ></textarea>-->
 <div id='myform_from_errorloc' style="color:red;"></div>
 <input class="d1" id="Date" name="from" type="date" value="" style="width:100%;"> <br/>
To (mm/dd/yy):<br/>
 <div id='myform_to_errorloc' style="color:red;"></div>
 <input class="d2" id="Date2" name="to" type="date" value="" style="width:100%;" onChange="weekdayc();" > <br/> 
 
No. of days <br/>
<div id='myform_days_errorloc' style="color:red;"></div>
<input  id="nod"  name='days' rows='1' cols='1000' wrap="physical" value="" /> <br/>
Type of leave <br/>
<select style="width:100%;" name="type" id="type" onchange='Checkfin(this.value);'> <option value="Paid Leave">Paid Leave</option> <option  value="Work Leave">Work Leave</option> <option value="Unpaid Leave">Unpaid Leave</option> <option value="Vacation Leave">Vacation Leave</option>
 
 <option value="Casual Leave">Casual Leave</option>
 <option value="Sabbatical Leave">Sabbatical Leave</option></select><br/>

Reason<br/>
<div id='myform_reason_errorloc' style="color:red;"></div>
<textarea style="width:100%;" name="reason" rows="3"></textarea><br/>
Number of Classes Missed<br/>
<div id='myform_n_cls_errorloc' style="color:red;"></div>
<textarea  name="n_cls" rows="1" ></textarea><br/>


<div id="fin" style="display:none;">
Source of Financial Support<br/>
<select style="width:100%;" name='finsup' id="finsup"  value='' onchange='Checksource(this.value);'><option value="Institute">Institute</option><option value="PDA">PDA</option><option value="Project Number">Project Number</option><option value="Other">Other</option></select><br/>

Attach file/s: <br>
<input type="file" name="file1" /> <br/>
<input type="file" name="file2" /> <br/>
<input type="file" name="file3" /> <br/>
<!--Attach a file: <input type="file" name="file[]" value=""><br/>
Attach a file: <input type="file" name="file[]" value=""><br/>-->
Approximate expenses for the travel<br/>
<textarea style="width:100%;" name='amount' rows='1' value=""></textarea><br/>
<div id="cb" style="display:none;">
<input style="width:100%;" type='checkbox' name='agree' value='1'  /> I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel.</div><br />
</div>
Destination<br/>
<textarea style="width:100%;"name="city" rows="1" placeholder="City"></textarea><textarea style="width:100%;" name="country" rows="1" placeholder="Country"></textarea><br/>
Arrangement of classes missed: <br/>
<textarea style="width:100%;" name="arrange" rows="3" ></textarea><br/>




  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer"> Submit </button>
  
</form>
           

          </div>
          </div>
<script  type="text/javascript">
 var frmvalidator = new Validator("myform");
 frmvalidator.addValidation("n_cls","req","Please enter Number of classes missed");
 frmvalidator.addValidation("days","req","Please enter Number of days");
 frmvalidator.addValidation("reason","req","Please give a reason");
 frmvalidator.addValidation("from","req","Please pick a date");
 frmvalidator.addValidation("to","req","Please pick a date");
 frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
 

</script>

     <div id="addpic" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Add/Change your photo</b> </p></center>
 <form  action="addpic.php" method="post"  enctype="multipart/form-data" >
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
  <?php  if($info['m_status']==="married"){
   echo "single"; }
   else if($info['m_status']==="single"){
  echo "married"; }?>
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
	   
	   $qr2="select * from `leave` where id='$id'";
$r1=mysql_query($qr2);
echo mysql_error();    
	$cnt=0;
	while($nt=mysql_fetch_array($r1))
	{
		$lid=$nt['l_id'];
		//$cnt++;?>
         <div id="modify<?php echo $lid; ?>" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Modify/Edit Leave</b> </p></center>
 <form enctype="multipart/form-data" action="modleave.php?lid=<?php echo $lid; ?>" method="post">
From (mm/dd/yy):<br/>
<!-- <textarea id="inputDate"  name='from' rows='1' cols='500' wrap="physical" placeholder="12/12/12" ></textarea>-->
 <input class="d3" id="Date3" name="from" type="date" value="" > <br/>
To (mm/dd/yy):<br/>
 <input class="d4" id="Date4" name="to" type="date" value="" onChange="weekdayc2();" > <br/> 
 
No. of days <br/>
<input  id="nod2"  name='days' rows='1' cols='1000' wrap="physical" value="" /> <br/>
Type of leave <br/>
<select name="type" id="type" onchange='Checkfin(this.value);'> <option value="Paid Leave">Paid Leave</option> <option  value="Work Leave">Work Leave</option> <option value="Unpaid Leave">Unpaid Leave</option> <option value="Vacation Leave">Vacation Leave</option> <option value="Casual Leave">Casual Leave</option><option value="Sabbatical Leave">Sabbatical Leave</option></select><br/>

Reason<br/>
<textarea name="reason" rows="3"><?php echo $nt['reason']; ?></textarea><br/>
Number of Classes Missed<br/>
<textarea name="n_cls" rows="1"><?php echo $nt['c_miss']; ?></textarea><br/>

<div id="fin" style="display:none;">
Source of Financial Support<br/>
<select name='finsup' id="finsup"  value='' onchange='Checksource(this.value);'><option value="Institute">Institute</option><option value="PDA">PDA</option><option value="Project Number">Project Number</option><option value="Other">Other</option></select><br/>

Attach a file: <input type="file" name="file" value=""><br/>
Approximate expenses for the travel<br/>
<textarea name='amount' rows='1' value=""></textarea><br/>
<div id="cb" style="display:none;">
<input type='checkbox' name='agree' value='1'  /> I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel.</div><br />
</div>
Destination<br/>
<textarea name="city" rows="1" placeholder="City"><?php echo $nt['city']; ?></textarea><textarea name="country" rows="1" placeholder="Country"><?php echo $nt['country']; ?></textarea><br/>
Arrangement of classes missed: <br/>
<textarea name="arrange" rows="3" ><?php echo $nt['arrangement']; ?></textarea><br/>




  <button type="submit" class="btn btn-primary btn-info " name="submit" value="Login" style="cursor:pointer"> Re-submit </button>
  
</form>
           
          </div>
          </div>

<div id="delete<?php echo $lid; ?>" class="modal hide fade" style="display: none; ">
            
              <button class="close" data-dismiss="modal">×</button>
           
            
            <div class="modal-body">
              <center><p><b>Do you want to delete this application?</b> </p></center>
              <center>
                <a href="delete.php?lid=<?php echo $lid; ?>" class="btn btn-primary">Yes</a>
   <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</a>
</center>
                  
           
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
		 $('#date2').datepicker(); 
		 $('#date3').datepicker(); 
		 $('#date4').datepicker();   
      }  
   })();  
  
</script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script> 
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>  
<script src="js/jquery-ui.js"></script>

</body>
</html>
<?php }
else if ($_SESSION['role']=="admin")
{
	header('LOCATION:admin.php');
}
else if ($_SESSION['role']=="director")
{
	header ('LOCATION:director.php');
}
?>