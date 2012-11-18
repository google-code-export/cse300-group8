<?php
include ('cxn.php');
session_start(); 
if (isset($_SESSION['userid'])){
?>
<div class="leave-body3">
<h1 style="color:#399;"><a name="pending"> Pending</a></h1>
<br/>


<div class="la-notification">
<?php
$id=$_SESSION['userid'];
$qr2="select * from `leave` where (status=0) order by time DESC LIMIT 0,5";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
    <strong><?php 
	$lid=$nt['l_id'];
   $fac=$nt['id'];
   $qr3="select * from `users` where id='$fac'";
$r2=mysql_query($qr3);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($r2))
	{
		 echo $nt2['name']; 
		 if ($nt2['pic']!="")
		 {
		 	?>
<img src="pics/<?php echo $nt2['pic']; ?>" style="width:50px; float:left; margin-right:6px" />
		 	<?php
		 }
else{
	?>
	<img src="pics/dp.png" style="width:50px; float:left; margin-right:6px" />
	<?php
}

	}?></strong>
   <br/>
    <b><span style="color:#36b593; font-size:15px;"><?php echo $nt['type']; ?></span> from <?php echo $nt['start'];?> to <?php echo $nt['end']; ?> (applied on <?php echo $nt['time']; ?>)<br/>
    for <?php echo $nt['no_days'];?> days</b><br/>
   <!-- <b> Type: </b> <?php echo $nt['type']; ?><br/>-->
    <b>Reason being</b> "<?php echo $nt['reason']; ?>" <br/>
    <b>Going to</b> <?php echo $nt['city'].",".$nt['country']; ?><br/>
    <b>Number of classes missed:</b> <?php echo $nt['c_miss'];?>
     <br/><b>Arrangement for classes missed:</b> <?php echo $nt['arrangement']; ?>
     <br>
     <b>
     <?php
if (($nt['file1']!="")||($nt['file2']!="")||($nt['file3']!=""))
{
	echo "Download File/s";
	?>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file1']; ?>"><?php echo $nt['file1']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file2']; ?>"><?php echo $nt['file2']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file3']; ?>"><?php echo $nt['file3']; ?></a>
	<?php
}?>
</b>
    <?php if ($nt['type']=="Work Leave") {
	?><br/>
	Source of financial support <?php $f_supp=$nt['fin_support'];
	if ($f_supp=0)
{
	echo "Institute"; //int form of finsup
}
else if ($f_supp=1)
{
	echo "PDA";
}
else if ($f_supp=2)
{
	echo "Project number";
}
else if ($f_supp=3)
{
	echo "Other";
}
  ?>
  	<br/>Expenses <?php  echo $nt['amount'];
	?> <br/>
	
	<?php
	if ($nt['agree']==1)
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel. </b>";
	}

	if ($nt['comment_a']!='')
	{
		?>
      <br/> <b> Your comment:</b><?php echo $nt['comment_a'];?>
        <?php
	}
	if ($nt['comment_d']!='')
	{
		?>
    <br/>  <b> Director's comment: </b><?php echo $nt['comment_d'];?>
        <?php $lid=$nt['l_id'];
	}
	?>
    
    <br/>
   
    <a data-toggle="modal"  href="#addcom<?php echo $nt['l_id']; ?>" title="Add a comment">Add\Change your comment</a>
  
    </div>
   
      <a href="forward.php?lid=<?php echo $nt['l_id']; ?>" title="Forward this to the director"> <div class="forward"></div></a>
    <a href="sendback.php?lid=<?php echo $nt['l_id']; ?>" title="Send it back"> <div class="sendback"></div></a>

     
      <?php
	  
	  
	}
?>


<br/>
<h1 style="color:#399;"><a name="approved"> Approved</a></h1>
<br/>



<?php

$qr2="select * from `leave` where (status=1 ) order by time DESC LIMIT 0,5";
$r1=mysql_query($qr2);
echo mysql_error();    
	
while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
    <strong><?php 
	$lid=$nt['l_id'];
   $fac=$nt['id'];
   $qr3="select * from `users` where id='$fac'";
$r2=mysql_query($qr3);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($r2))
	{
		 echo $nt2['name']; 
		 if ($nt2['pic']!="")
		 {
		 	?>
<img src="pics/<?php echo $nt2['pic']; ?>" style="width:50px; float:left; margin-right:6px" />
		 	<?php
		 }
else{
	?>
	<img src="pics/dp.png" style="width:50px; float:left; margin-right:6px" />
	<?php
}

	}?></strong>
   <br/>
    <b><span style="color:#36b593; font-size:15px;"><?php echo $nt['type']; ?></span> from <?php echo $nt['start'];?> to <?php echo $nt['end']; ?> (applied on <?php echo $nt['time']; ?>)<br/>
    for <?php echo $nt['no_days'];?> days</b><br/>
   <!-- <b> Type: </b> <?php echo $nt['type']; ?><br/>-->
    <b>Reason being</b> "<?php echo $nt['reason']; ?>" <br/>
    <b>Going to</b> <?php echo $nt['city'].",".$nt['country']; ?><br/>
    <b>Number of classes missed:</b> <?php echo $nt['c_miss'];?>
     <br/><b>Arrangement for classes missed:</b> <?php echo $nt['arrangement']; ?>
     <br>
     <b>
     <?php
if (($nt['file1']!="")||($nt['file2']!="")||($nt['file3']!=""))
{
	echo "Download File/s";
	?>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file1']; ?>"><?php echo $nt['file1']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file2']; ?>"><?php echo $nt['file2']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file3']; ?>"><?php echo $nt['file3']; ?></a>
	<?php
}?>
</b>
    <?php if ($nt['type']=="Work Leave") {
	?><br/>
	Source of financial support <?php $f_supp=$nt['fin_support'];
	if ($f_supp=0)
{
	echo "Institute"; //int form of finsup
}
else if ($f_supp=1)
{
	echo "PDA";
}
else if ($f_supp=2)
{
	echo "Project number";
}
else if ($f_supp=3)
{
	echo "Other";
}
  ?>
  	<br/>Expenses <?php  echo $nt['amount'];
	?> <br/>
	
	<?php
	if ($nt['agree']==1)
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel. </b>";
	}

	if ($nt['comment_a']!='')
	{
		?>
      <br/> <b> Your comment:</b><?php echo $nt['comment_a'];?>
        <?php
	}
	if ($nt['comment_d']!='')
	{
		?>
    <br/>  <b> Director's comment: </b><?php echo $nt['comment_d'];?>
        <?php $lid=$nt['l_id'];
	}
	?>
    
    <br/>
     <a data-toggle="modal"  href="#addcom<?php echo $nt['l_id']; ?>" title="Add a comment">Add\Change your comment</a>
    </div>
   
     <div class="approved"></div>
     
      <?php
	  
	  
	}
?>


<br/>
<h1 style="color:#399;"><a name="rejected"> Rejected</a></h1>
<br/>



<?php

$qr2="select * from `leave` where (status=2) order by time DESC LIMIT 0,5";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
    <strong><?php 
	$lid=$nt['l_id'];
   $fac=$nt['id'];
   $qr3="select * from `users` where id='$fac'";
$r2=mysql_query($qr3);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($r2))
	{
		 echo $nt2['name']; 
		 if ($nt2['pic']!="")
		 {
		 	?>
<img src="pics/<?php echo $nt2['pic']; ?>" style="width:50px; float:left; margin-right:6px" />
		 	<?php
		 }
else{
	?>
	<img src="pics/dp.png" style="width:50px; float:left; margin-right:6px" />
	<?php
}

	}?></strong>
   <br/>
    <b><span style="color:#36b593; font-size:15px;"><?php echo $nt['type']; ?></span> from <?php echo $nt['start'];?> to <?php echo $nt['end']; ?> (applied on <?php echo $nt['time']; ?>)<br/>
    for <?php echo $nt['no_days'];?> days</b><br/>
   <!-- <b> Type: </b> <?php echo $nt['type']; ?><br/>-->
    <b>Reason being</b> "<?php echo $nt['reason']; ?>" <br/>
    <b>Going to</b> <?php echo $nt['city'].",".$nt['country']; ?><br/>
    <b>Number of classes missed:</b> <?php echo $nt['c_miss'];?>
     <br/><b>Arrangement for classes missed:</b> <?php echo $nt['arrangement']; ?>
     <br>
     <b>
     <?php
if (($nt['file1']!="")||($nt['file2']!="")||($nt['file3']!=""))
{
	echo "Download File/s";
	?>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file1']; ?>"><?php echo $nt['file1']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file2']; ?>"><?php echo $nt['file2']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file3']; ?>"><?php echo $nt['file3']; ?></a>
	<?php
}?>
</b>
    <?php if ($nt['type']=="Work Leave") {
	?><br/>
	Source of financial support <?php $f_supp=$nt['fin_support'];
	if ($f_supp=0)
{
	echo "Institute"; //int form of finsup
}
else if ($f_supp=1)
{
	echo "PDA";
}
else if ($f_supp=2)
{
	echo "Project number";
}
else if ($f_supp=3)
{
	echo "Other";
}
  ?>
  	<br/>Expenses <?php  echo $nt['amount'];
	?> <br/>
	
	<?php
	if ($nt['agree']==1)
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel. </b>";
	}

	if ($nt['comment_a']!='')
	{
		?>
      <br/> <b> Your comment:</b><?php echo $nt['comment_a'];?>
        <?php
	}
	if ($nt['comment_d']!='')
	{
		?>
    <br/>  <b> Director's comment: </b><?php echo $nt['comment_d'];?>
        <?php $lid=$nt['l_id'];
	}
	?>
    
    <br/>
     <a data-toggle="modal"  href="#addcom<?php echo $nt['l_id']; ?>" title="Add a comment">Add\Change your comment</a>
    </div>
   
     <div class="rejected"></div>
      <?php
	  
	  
	}
?>


<br/>
<h1 style="color:#399;"><a name="deleted"> Deleted</a></h1>
<br/>



<?php

$qr2="select * from `leave` where (status=5) order by time DESC LIMIT 0,5";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
    <strong><?php 
	$lid=$nt['l_id'];
   $fac=$nt['id'];
   $qr3="select * from `users` where id='$fac'";
$r2=mysql_query($qr3);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($r2))
	{
		 echo $nt2['name']; 
		 if ($nt2['pic']!="")
		 {
		 	?>
<img src="pics/<?php echo $nt2['pic']; ?>" style="width:50px; float:left; margin-right:6px" />
		 	<?php
		 }
else{
	?>
	<img src="pics/dp.png" style="width:50px; float:left; margin-right:6px" />
	<?php
}

	}?></strong>
   <br/>
    <b><span style="color:#36b593; font-size:15px;"><?php echo $nt['type']; ?></span> from <?php echo $nt['start'];?> to <?php echo $nt['end']; ?> (applied on <?php echo $nt['time']; ?>)<br/>
    for <?php echo $nt['no_days'];?> days</b><br/>
   <!-- <b> Type: </b> <?php echo $nt['type']; ?><br/>-->
    <b>Reason being</b> "<?php echo $nt['reason']; ?>" <br/>
    <b>Going to</b> <?php echo $nt['city'].",".$nt['country']; ?><br/>
    <b>Number of classes missed:</b> <?php echo $nt['c_miss'];?>
     <br/><b>Arrangement for classes missed:</b> <?php echo $nt['arrangement']; ?>
     <br>
     <b>
     <?php
if (($nt['file1']!="")||($nt['file2']!="")||($nt['file3']!=""))
{
	echo "Download File/s";
	?>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file1']; ?>"><?php echo $nt['file1']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file2']; ?>"><?php echo $nt['file2']; ?></a>
	<br><a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file3']; ?>"><?php echo $nt['file3']; ?></a>
	<?php
}?>
</b>
    <?php if ($nt['type']=="Work Leave") {
	?><br/>
	Source of financial support <?php $f_supp=$nt['fin_support'];
	if ($f_supp=0)
{
	echo "Institute"; //int form of finsup
}
else if ($f_supp=1)
{
	echo "PDA";
}
else if ($f_supp=2)
{
	echo "Project number";
}
else if ($f_supp=3)
{
	echo "Other";
}
  ?>
  	<br/>Expenses <?php  echo $nt['amount'];
	?> <br/>
	
	<?php
	if ($nt['agree']==1)
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel. </b>";
	}

	if ($nt['comment_a']!='')
	{
		?>
      <br/> <b> Your comment:</b><?php echo $nt['comment_a'];?>
        <?php
	}
	if ($nt['comment_d']!='')
	{
		?>
    <br/>  <b> Director's comment: </b><?php echo $nt['comment_d'];?>
        <?php $lid=$nt['l_id'];
	}
	?>
    
    
    </div>
   
     
      <?php
	  
	  
	}
?>



</div>

</div>
<div class="nav-box">
<div class="admin-box-con">
<a href="#pending"><h4>Pending Leaves</h4></a>
<hr />
<a href="#approved"><h4>Approved Leaves</h4></a>
<hr/>
<a href="#rejected"><h4>Rejected Leaves</h4></a>
<hr/>
<a href="#deleted"><h4>Deleted Leaves</h4></a>
</div>
</div>
<br/>
<?php
}
else 
echo ":P";

?>