<?
include('cxn.php');
session_start();
?>
<div class="leave-body2">
<h1 style="color:#399;"> Leaves</h1>
<br/>


<div class="la-notification">
<?
$id=$_SESSION['userid'];
$qr2="select * from `leave` where (status=3) order by time ASC";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
   <strong><? 
   $fac=$nt['id'];
   $qr3="select * from `users` where id='$fac'";
$r2=mysql_query($qr3);
echo mysql_error();    
	
	while($nt2=mysql_fetch_array($r2))
	{
		 echo $nt2['name']; 
	}?></strong>
   <br/>
    <b>Leave from <? echo $nt['start'];?> to <? echo $nt['end']; ?><br/>
    for <? echo $nt['no_days'];?> days</b><br/>
    <b> Type: </b> <? echo $nt['type']; ?><br/>
    <b>Reason being</b> "<? echo $nt['reason']; ?>" <br/>
       Going to <? echo $nt['city'].",".$nt['country']; ?><br/>
    <b>Number of classes missed:</b> <? echo $nt['c_miss'];?>
    <? if ($nt['type']=="Work Leave") {
	?><br/>
	Source of financial support <? $f_supp=$nt['fin_support'];
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
  	<br/>Expenses <?  echo $nt['amount'];
	
	
	?> <br/>
   
	
	<?
	
	
	if ($nt['agree']==1)
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel.</b>";
	}
	if ($nt['comment_a']!='')
	{
		?>
       <br/> <b>Admin's comment:</b> <? echo $nt['comment_a'];?>
        <?
	}
	if ($nt['comment_d']!='')
	{
		?>
       <br/><b>Your comment:</b> <? echo $nt['comment_d'];?>
        <?
	}
	?>
    <br/>
     <a data-toggle="modal"  href="#addcom" title="Add a comment">Add\Change your comment</a>
    </div>
       <a href="reject.php?lid=<? echo $nt['l_id']; ?>" title=" Reject this application"> <div class="reject"></div></a>
   <a href="approve.php?lid=<? echo $nt['l_id']; ?>" title="Approve this application"> <div class="approve"></div></a>

    <?   
	}
?>


</div>

</div>
<br/>
