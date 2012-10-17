<?php 
require_once  'src/readymade.php';
require 'src/header.php';

$error = $_GET["e"];
if($error==1)
{ echo "เข้าสู่ระบบล้มเหลว";}
?>

Login
<form action="login_session.php" method="post">
<table >
  <tr>
    <td width="155">&nbsp;</td>
    <td width="245">&nbsp;</td>
    <td width="200">&nbsp;</td>
  </tr>
  <tr>
    <td>Email or Username</td>
    <td><input type="text" name="email" id="email"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" id="password"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Submit"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<?php require 'src/footer.php';?>