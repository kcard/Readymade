<?php session_start();
require_once  'src/readymade.php';

$email = $_POST["email"];
$pass=$_POST["password"];
$user = mysql_real_escape_string($email);
$pass2=mysql_real_escape_string($pass);
$ready= new Readymade;
$readyId=$ready->checklogin($user, md5($password));
if($readyId!="false" )
{ 
$_SESSION[sess_userid]=session_id();
session_register("readyId");
header("Location: backoffice.php");
}

else {
	header("Location: login.php?e=1");
	
}

?>
