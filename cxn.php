<?php 
$SERVER = 'localhost';
$USER = 'root'; //wiztersc
$PASS = ''; //****
$DATABASE = 'db'; //wiztersc_main
   

if (!($mylink = mysql_connect( $SERVER, $USER, $PASS))){
	echo  "<h3>Sorry, could not connect to database.</h3><br/>
	Please contact your system's admin for more help\n";
	exit;
}

mysql_select_db( $DATABASE );

?>
