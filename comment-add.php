
<? 
$ready = new Readymade();
$comment= $_POST['comment'];
if($comment !=null)
{
	echo($commnet);
	$ready->addCommentTag($HTTP_SESSION_VARS["readyId"],$comment);
	$text= "Add Success.";
	
}


 ?>
<br>Add Comment Tag
<form action="<? echo $PHP_SELF."?s=7"; ?>" method="post" >
<table>
  <tr>
    <td width="166">Comment Tag id</td>
    <td width="376"><? echo($ready->getLastCommentTagId($HTTP_SESSION_VARS["readyId"])); ?></td>
    <td width="58">&nbsp;</td>
  </tr>
  <tr>
    <td>Comment Tag</td>
    <td><input type="text" name="comment" id="comment" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Add" /></td>
    <td>&nbsp;</td>
  </tr>

</table>
</form>
