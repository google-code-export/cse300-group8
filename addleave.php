<?php
include("cxn.php");
session_start();
$id=$_SESSION['userid'];
$from=$_POST['from'];
$to=$_POST['to'];
$days=$_POST['days'];
$type=$_POST['type'];
$f_supp=$_POST['finsup'];
$amount=$_POST['amount'];
$reason=$_POST['reason'];
$n_cls=$_POST['n_cls'];
$city=$_POST['city'];
$country=$_POST['country'];
$arrange=$_POST['arrange'];
$agree=0;
$dir="files/".$id;
if (is_dir($dir)===false)
{
	mkdir($dir);
}

if (isset($_POST['agree']))
{
	$agree=1;
}
if ($f_supp=="Institute")
{
	$f_supp1=0; //int form of finsup
}
else if ($f_supp=="PDA")
{
	$f_supp1=1;
}
else if ($f_supp=="Project number")
{
	$f_supp1=2;
}
else if ($f_supp=="Other")
{
	$f_supp1=3;
}
$i=0;

//echo $type,$to,$days,$from;
$file='';
$file2='';
$file3='';
if (isset($_FILES['file1']['name'])){
$file=($_FILES['file1']['name']);
}
if (isset($_FILES['file2']['name'])){
$file2=($_FILES['file2']['name']);
}
if (isset($_FILES['file3']['name'])){
$file3=($_FILES['file3']['name']);
}

   
 //   echo "Upload: " . $_FILES["file"]["name"][0] . "<br />";
	
	//echo "Upload: " . $_FILES["file"]["name"][1]. "<br />";
	move_uploaded_file($_FILES["file1"]["tmp_name"], $dir ."/". $_FILES["file1"]["name"]);
       move_uploaded_file($_FILES["file2"]["tmp_name"], $dir ."/". $_FILES["file2"]["name"]);
	//   if (isset ($_FILES["file3"]["name"]))
	    move_uploaded_file($_FILES["file3"]["tmp_name"], $dir ."/". $_FILES["file3"]["name"]);
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

   
    
//echo $_FILES["file1"]["name"] ." ".$dir." ".$_FILES["file1"]["tmp_name"];

mysql_query("INSERT INTO `leave` (id,start,end,no_days,type,fin_support,amount,reason,c_miss,city,country,time,agree, arrangement, file1,file2,file3)  VALUES ('$id','$from','$to','$days','$type','$f_supp1','$amount','$reason','$n_cls','$city','$country',now(),'$agree','$arrange', '$file','$file2','$file3')") ; 
header ('LOCATION:faculty.php');


// echo $member['name'];
//echo "done";

/*if ($_SESSION['role']=="faculty") {
header ('LOCATION:faculty.php');
}*/
?>