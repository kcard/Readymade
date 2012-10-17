<?php 
session_start();
 if ($_SESSION[sess_userid] <> session_id()) {
 header("Location: login.php"); exit();}
 require_once  'src/readymade.php';
 require 'src/header.php';
 require 'src/loginId.php';
 /* --------------------  test zone----------------------
echo $readyId;
echo $HTTP_SESSION_VARS["readyId"];
--------------------------------------------------------------*/
?>
back office<br>

<a href="information.php">Information </a><br>
<a href="realtime.php">Real Time Order </a><br>

<a href="menumanage.php">Menu management</a><br>


<a href="stat.php">Statitics</a>

<br><br>


<?php require 'src/footer.php';?>