<?


$name= $_POST['categoryName'];
//------ file control ---------

$fileName= $_FILES['categoryUpload']['name'];
$fileTempname = $_FILES["categoryUpload"]['tmp_name'];
$fileSize = $_FILES["categoryUpload"]['size'];
$filedataType =  $_FILES["categoryUpload"]['type'];
$max_size = 500*1000;  // front is size in short kb, x 1000 for makes its kb 
$folderpic = "uploads/" ;
if($fileTempname!=null){
	
	if($fileSize>$max_size)
		{echo "file is too large. not more than 500 kb " ; }
	else 
	{
	$fileType=".". strtolower(end(explode('.', $fileName)));
	$newname =$HTTP_SESSION_VARS["readyId"].$ready->getLastCategoryId($HTTP_SESSION_VARS["readyId"]).$fileType;

	$images = $_FILES["categoryUpload"]["tmp_name"];
	$width=200; 
	$size=GetimageSize($images);
	$height=round($width*$size[1]/$size[0]);
		if($filedataType=="image/gif") {
				$images_orig = imagecreatefromgif($images);}
		else if($filedataType=="image/jpeg") {
				$images_orig = imagecreatefromjpeg($images);}
		else if($filedataType=="image/png") {
				$images_orig = imagecreatefrompng($images);}

	$photoX = ImagesX($images_orig);
	$photoY = ImagesY($images_orig);
	$images_fin = ImageCreateTrueColor($width, $height);
	ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	imagepng($images_fin,$folderpic.$newname);
	ImageDestroy($images_orig);
	ImageDestroy($images_fin);

	}
}
//-------------------------------------------
$fileUrl = $folderpic.$newname;
if($newname ==null)
{$fileUrl="";}
	
if($name!=null)
{ $ready->addCategory($HTTP_SESSION_VARS["readyId"],$name, $fileUrl);
$text= "Add Success.";
}


?>
<br />
Category add

<form action="<? echo $PHP_SELF."?s=4"; ?>" method="post" enctype="multipart/form-data" >
<table>
  <tr>
    <td width="178">Category Id</td>
    <td width="370"><? echo($ready->getLastCategoryId($HTTP_SESSION_VARS["readyId"])); ?></td>
    <td width="52">&nbsp;</td>
  </tr>
  <tr>
    <td>Category Name</td>
    <td><input type="text" name="categoryName" id="categoryName" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><input type="file" name="categoryUpload" id="categoryUpload"  size="30"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Submit" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>