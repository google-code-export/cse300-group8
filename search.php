<?php
include('cxn.php');
if($_POST)
{

$q=$_POST['searchword'];

$sql_res=mysql_query("select * from users where name like '%$q%' and role!='admin' and role!='director' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$fname=$row['name'];
$email=$row['email'];
$img=$row['pic'];
$address=$row['address'];
$id=$row['id'];
$re_fname='<b>'.$q.'</b>';
$re_lname='<b>'.$q.'</b>';

//$final_fname = str_ireplace($q, $re_fname, $fname);

//$final_lname = str_ireplace($q, $re_lname, $lname);


?>
<div class="display_box" align="left">
<a href="archive.php?id=<?php echo $id;?>">

<img src="pics/<?php
if ($img!="")
	echo $img; 
else
	echo "dp.png";
?>" style="width:25px; float:left; margin-right:6px" /><b><?php echo $fname."<br>".$email; ?></b><br/>

<span style="font-size:9px; color:#999999"><?php echo $address; ?></span></div>
</a>


<?php
}

}
else
{

}


?>
