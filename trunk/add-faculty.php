<?
include("cxn.php");
session_start();
if ($_SESSION['role']=="admin")
{


$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$m_status=$_POST['m_status'];
$child=$_POST['child'];
$email=$_POST['email'];
$password_raw=$_POST['password'];
$password=md5($_POST['password']);

//echo $name.$address.$phone.$child.$password.$email;
mysql_query("INSERT INTO  `users` (name, email, address, password, role, phone, m_status, child, time) VALUES ('$name', '$email', '$address', '$password', 'faculty' ,'$phone','$m_status', '$child', now())") ; 

$to = $email;
$subject = "Your account has been created on Leave Desk";
$message = "Hi $name,
Your account on Leave Desk has been created by your admin. 
Use fllowing credentials to login:

Email Id: $email
Password: $password_raw
_______________
Thanks,
SoftCopy Team
";
$from = "SoftCopy <notify@wizters.com>";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);



echo "<br/><br/><center><h3> $name has been added as a Faculty on leave desk. </h3> </center>";
?><br>
<center><a href="faculty.php"> Go Back</a></center>

<?
}
//header ('LOCATION:'.$_SERVER['HTTP_REFERER']);
?>