<?

$ready = new Readymade();
$query= $ready->getAllCategory($HTTP_SESSION_VARS["readyId"]);
 

?>

Menu Add

<form action="<? echo $PHP_SELF."?s=1"; ?>" method="post" >
<table>
  <tr>
    <td width="200">Menu Id</td>
    <td width="350"><? echo($ready->getLastMenuId($HTTP_SESSION_VARS["readyId"])); ?></td>
    <td width="200">&nbsp;</td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" id="name"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input type="text" name="price" id="price"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Detail</td>
    <td><textarea name="detail" id="detail" cols="25" rows="2"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><input type="file" name="menuUpload" id="menuUpload"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Category</td>
    <td><select name="select" id="select">
           <? 
           $query= $ready->getAllCategory($HTTP_SESSION_VARS["readyId"]);
           
           while ( 	$data = mysql_fetch_array($query))
           {?>	
              <option value="<?echo $data['id'];?>"><? echo $data['name'];?></option>

       <?}  ?>
    </select></td>
    <td>  </td>
  </tr>
  <tr>
    <td>Comment Tag</td>
    <td>
    
    <? 
           $query= $ready->getAllCommentTag($HTTP_SESSION_VARS["readyId"]);
           while ( 	$data = mysql_fetch_array($query))
           {	$i++;
           	 if($i%4==0){echo "<br>";}?>
                  <input type="checkbox" name="checkbox" id="checkbox" value="<?echo $data['commentTag'];?>"> <? echo $data['commentTag'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?}  ?>
   
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Add"></td>
    <td><input type="reset" name="button2" id="button2" value="Reset"></td>
  </tr>
</table>

</form>