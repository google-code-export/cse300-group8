<?
include ('cxn.php');
session_start(); 
?>
<div class="leave-body2">
<h1 style="color:#399;"> Leaves</h1>
<br/>


<div class="la-notification">
<?
$id=$_SESSION['userid'];
$qr2="select * from `leave` where (status=0 or status=1 or status=2) order by time ASC";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="la-body">
    <strong><? 
	$lid=$nt['l_id'];
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
    <b>Going to</b> <? echo $nt['city'].",".$nt['country']; ?><br/>
    Number of classes missed: <? echo $nt['c_miss'];?>
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
	echo "<b>I have checked that in my PDA/Project there are sufficient funds under suitable budget head for this travel. </b>";
	}

	if ($nt['comment_a']!='')
	{
		?>
       <b> Your comment:</b><? echo $nt['comment_a'];?>
        <?
	}
	if ($nt['comment_d']!='')
	{
		?>
    <br/>  <b> Director's comment: </b><? echo $nt['comment_d'];?>
        <?
	}
	?>
    
    <br/>
     <a data-toggle="modal"  href="#addcom" title="Add a comment">Add\Change your comment</a>
    </div>
    <?
	if($nt['status']==0){
	
	?>
      <a href="forward.php?lid=<? echo $nt['l_id']; ?>" title="Forward this to the director"> <div class="forward"></div></a>
    <a href="sendback.php?lid=<? echo $nt['l_id']; ?>" title="Send it back"> <div class="sendback"></div></a>

      <?   }
	  
	  else if ($nt['status']==1){
	  ?>
     <div class="approved"></div>
      <?
	  
	  }
	  
	  else if ($nt['status']==2){
	  ?>
     <div class="rejected"></div>
      <?
	  
	  }
	}
?>


</div>

</div>

<br/>