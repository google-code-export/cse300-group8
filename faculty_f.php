<? include('cxn.php');
session_start();
?>
<div class="leave-body">
<h1 style="color:#399;"> Leaves</h1>
<br/>
<h3><a data-toggle="modal"  href="#addleave">+ | Submit a leave application</a></h3>

<div class="l-notification">

<?
$id=$_SESSION['userid'];
$qr2="select * from `leave` where (id='$id') order by time DESC LIMIT 0,10 ";
$r1=mysql_query($qr2);
echo mysql_error();    
	
	while($nt=mysql_fetch_array($r1))
	{
	?>
   <div id="l-body"> <b>Leave from <? echo $nt['start'];?> to <? echo $nt['end']; ?><br/>
    for <? echo $nt['no_days'];?> days</b><br/>
    <b> Type: </b> <? echo $nt['type']; ?><br/>
    Reason being "<? echo $nt['reason']; ?>" <br/>
    <?
	if ($nt['comment_a']!='')
	{
		?>
        Admin's comment: <? echo $nt['comment_a'];?>
        <?
	}
	if ($nt['comment_d']!='')
	{
		?>
       Director's comment: <? echo $nt['comment_d'];?>
        <?
	}
	
    ?>
    </div>
    <div class="<? if ($nt['status']==0) {echo "pending";
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
	echo "sentback";	
	}
	?>"></div>
    <?   
	}
?>


</div>

</div>

<br/>

<div class="counter">
<div class="counter_con">
<h2>Leave Counter </h2><br/>
<?
$qry4 = "SELECT * FROM counter WHERE id='$id'";
  $result2 = mysql_query($qry4);
   $info2=mysql_fetch_assoc($result2);
  // $casual=8-$info2['casual'];
   ?>
   
   <b>Paid leaves:</b> <? echo " ". $info2['paid']." "; ?> remaining <br/>
   <b>Work leaves:</b> <? echo " ". 0+$info2['work']." "; ?> taken<br/>
   <b>Unpaid leaves:</b><? echo " ". 0+$info2['unpaid']." "; ?> taken <br/>
   <b>Vacation leaves:</b><? echo " ". 0+$info2['vacation']." "; ?> taken <br/>
   <b>Casual leaves:</b><? echo " ". $info2['casual']." "; ?> remaining <br/>
   
</div>
</div>
