<?php include('cxn.php');
session_start();
?>
<div class="leave-body">
<h1 style="color:#399;"> Leaves</h1>
<br/>
<h3><a data-toggle="modal"  href="#addleave">+ | Submit a leave application</a></h3>

<div class="l-notification">

<?php
$status=0;
$id=$_SESSION['userid'];
$qr2="select * from `leave` where (id='$id') order by time DESC LIMIT 0,10 ";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{

?><div id="<?php if ($nt['status']==5)
echo "l-body-del";
else
echo "l-body";

?>"> 
    <b>Leave from <?php echo $nt['start'];?> to <?php echo $nt['end']; ?> (applied on <?php echo $nt['time']; ?>)<br/>
    for <?php echo $nt['no_days'];?> days</b><br/>
    <b> Type: </b> <?php echo $nt['type']; ?><br/>
    Reason being "<?php echo $nt['reason']; ?>" <br/>
<b>
     <?php
if (($nt['file1']!="")||($nt['file2']!="")||($nt['file3']!=""))
{
  echo "Download File/s";
  ?>
  <a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file1']; ?>"><?php echo $nt['file1']; ?></a>
  <a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file2']; ?>"><?php echo $nt['file2']; ?></a>
  <a target="_blank" href="files/<?php echo $nt['id']; ?>/<?php echo $nt['file3']; ?>"><?php echo $nt['file3']; ?></a>
  <?php
}?>
</b>

     <?php
	
	if ($nt['comment_a']!='')
	{
		?>
      <br/><b>  Admin's comment:</b> <?php echo $nt['comment_a'];?>
        <?php
	}
	if ($nt['comment_d']!='')
	{
		?>
     <br/><b> Director's comment:</b><?php echo $nt['comment_d'];?>
        <?php
	}
	if ($nt['status']==4)
	{ ?>
    <br/><a data-toggle="modal"  href="#modify<?php echo $nt['l_id']; ?>" title="Modify Leave">Edit your leave</a>
    <?php
	}
  if ($nt['status']!=5)
  { ?>
    <br/><a data-toggle="modal"  href="#delete<?php echo $nt['l_id']; ?>" title="Delete Leave">Delete this leave</a>
    <?php
  }
    ?>
     
    </div>
    <div class="<?php if ($nt['status']==0) {echo "pending";
	}
	else if ($nt['status']==1)
	{
	echo "approved";	
	}
	else if ($nt['status']==2)
	{
	echo "rejected";	
	}
	else if ($nt['status']==3)
	{
	echo "progress";	
	}
	else if ($nt['status']==4)
	{
		$status=4;
	echo "sentback";	
	}
	?>"></div>
    <?php   
	}
?>


</div>

</div>

<br/>

<div class="counter">
<div class="counter_con">
<center><h2>Leave Counter </h2></center><br/>
<center>(<em>w.e.f</em> 1st April 2012 - 31st March 2013)</center>
<?php
$qry4 = "SELECT * FROM counter WHERE id='$id'";
  $result2 = mysql_query($qry4);
   $info2=mysql_fetch_assoc($result2);
  // $casual=8-$info2['casual'];
   ?>
   <table class="table ">
  <thead>
    <tr>
      <th>Types</th>
       <th>Entitled</th>
      <th> Taken</th>
      <th>Remaining</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> <b>Paid leaves*</b></td><td>30</td><td><?php echo " ". 30-$info2['paid']." "; ?></td><td><?php echo " ". $info2['paid']." "; ?></td></tr>
     <tr> <td><b>Work leaves</b></td><td>N.A.</td><td><?php echo " ". 0+$info2['work']." "; ?></td><td>N.A.</td></tr>
     <tr> <td><b>Unpaid leaves</b></td><td>N.A.</td><td><?php echo " ". 0+$info2['unpaid']." "; ?></td><td>N.A.</td></tr>
     <tr> <td> <b>Vacation leaves</b></td><td>N.A.</td><td><?php echo " ". 0+$info2['vacation']." "; ?></td><td>N.A.</td></tr>
    <tr>  <td> <b>Casual leaves</b></td><td>8</td><td><?php echo " ". 8-$info2['casual']." "; ?></td><td><?php echo " ". $info2['casual']." "; ?></td>
    
    </tr>
  </tbody>
  
</table>
 <center> *carry forward to next year</center>
   
</div>
</div>
