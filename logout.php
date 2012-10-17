<?php session_start();
session_destroy();
header("Location: login.php");

require 'src/header.php';


?>


Log Out เรียบร้อย<br>
<br>

<a href="index.php">กลับสู่หน้าหลัก</a>
<?php require 'src/footer.php';?>