<?php
$mysql_hostname = "localhost";
$mysql_user = "your_user";
$mysql_password = "passwrod";
$mysql_database = "database_name";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");

?>
