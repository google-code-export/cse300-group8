<?php
session_start();
include_once("cxn.php");
$id=$_SESSION['userid'];
function findexts ($pic) {
  $pic = strtolower($pic) ; 
    $exts = split("[/\\.]", $pic) ;
   $n = count($exts)-1;
    $exts = $exts[$n];
	 return $exts;
	  }

$dir="pics/";

$pic=($_FILES["photo"]["name"]);
$ext=findexts ($pic);
$pic=$id.".".$ext;
//echo $pic;
if (file_exists($dir.$pic)===true)
{
	unlink($dir.$pic);
}
 move_uploaded_file($_FILES["photo"]["tmp_name"], $dir.$pic);
 mysql_query("UPDATE users SET  pic='$pic'  where id='$id'") ; 
header ('LOCATION:'.$_SERVER['HTTP_REFERER']);    
      


?>