<?php 
require_once  'src/readymade.php';
require 'src/header.php';


$email = $_POST['email'];
$resname =$_POST['resname'];
$address=$_POST['address'];
$password=$_POST['password'];
$telephone=$_POST['telephone'];

$ready= new Readymade;
$readyId= $ready->generateId();
$check = $ready->sentRegister($ready->generateId(),$email, $resname, $address, md5($password), $telephone);

if($check==true)
{
?>
 <br>
Register Confirm <br>
You Readymade Id is  <? echo $readyId?>   <br>
<?php } 
else
{
?>
Register Failed, <br>Please tryagain later. <br>
<?php }?>
<a href="index.php">Back to Home</a>
<?php require 'src/footer.php';?>