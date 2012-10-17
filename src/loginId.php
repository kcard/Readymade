<?php
$ready= new Readymade;
?>
<div id="login-box">Your Login As : <? echo $ready->getRestaurantName($HTTP_SESSION_VARS["readyId"]);?>&nbsp;&nbsp;<a href="logout.php">Log out</a></div>
