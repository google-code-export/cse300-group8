<?php
include('cxn.php');
session_start();
?>
<div class="leave-body2">
<h1 style="color:#399;"> Leaves</h1>
<br/>


<div class="la-notification">
<?php
$id=$_SESSION['userid'];
$qr2="select * from `leave` where (status=3) order by time ASC";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
   <strong><?php 
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
       Going to <?php echo $nt['city'].",".$nt['country']; ?><br/>
    <b>Number of classes missed:</b> <?php echo $nt['c_miss'];?>
     <br/><b>Arrangement for classes missed:</b> <?php echo $nt['arrangement']; ?>

     <b>
     <?php
if (($nt['file1']!="")||($nt['file2']!="")||($nt['file3']!=""))
{
	echo "Download File/s";
	?>
	<br><a target="_blank"  href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file1']; ?>"><?php echo $nt['file1']; ?></a>
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
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel.</b>";
	}
	if ($nt['comment_a']!='')
	{
		?>
       <br/> <b>Admin's comment:</b> <?php echo $nt['comment_a'];?>
        <?php
	}
	if ($nt['comment_d']!='')
	{
		?>
       <br/><b>Your comment:</b> <?php echo $nt['comment_d'];?>
        <?php
	}
	?>
    <br/>
     <a data-toggle="modal"  href="#addcom<?php echo $nt['l_id']; ?>" title="Add a comment">Add\Change your comment</a>
    </div>
       <a href="reject.php?lid=<?php echo $nt['l_id']; ?>" title=" Reject this application"> <div class="reject"></div></a>
   <a href="approve.php?lid=<?php echo $nt['l_id']; ?>" title="Approve this application"> <div class="approve"></div></a>

    <?php   
	}
?>


</div>

</div>
<br/>
