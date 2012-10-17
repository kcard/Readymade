<?php
$hostname = "localhost";
$database = "readymade";
$username = "readymade";
$password = "123qwe";
$connect = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);

?>