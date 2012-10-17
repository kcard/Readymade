<?php
class Readymade
{
	
		function Readymade()
		{/*constuctor*/	
		 require 'database.php';
		 mysql_select_db($database);
		 mysql_query("SET NAMES UTF8");
		 
		}	
		function checklogin($user,$password)
		{
			$sql ="select  readyMadeID  from readymade where memberUser='$user' and memberPass='$password' ";
			$objQuery = mysql_query($sql) or die(mysql_error());
			$data = mysql_fetch_assoc($objQuery);
			
			if($data['readyMadeID']!=null)
			{return $data['readyMadeID'];}
			else{return "false";}
		}

		
		function sentRegister($readymadeId,$email,$resname,$address,$password,$telephone)
		{
			$checkpass=0;
			$thistime = date("Y-m-d H:i");	
			$strInsertRegis = "INSERT INTO information(readyMadeId, name, address,phone, email,dateJoin) VALUES ('$readymadeId', '$resname', '$address', '$telephone', '$email', '$thistime')";
			$objQuery = mysql_query($strInsertRegis);
			if($objQuery ){
				$checkpass=1;
			}else{
				print "error".mysql_error();
				$checkpass=0;
			}
			
			$strInsertRed= "INSERT INTO readymade(readyMadeId, memberUser, memberPass) VALUES ('$readymadeId', '$email', '$password')";
			$objQuery2 = mysql_query($strInsertRed);
			if($objQuery2 ){
				$checkpass=1;
			}else{
				print "error".mysql_error();
				$checkpass=0;
			}
			
			if($checkpass==1)
			{return  true;}
			else {return false;}
			
		}
		function generateId()
		{ 			
			$str = "SELECT readyMadeID FROM readymade order by readyMadeID desc limit 1";
			$query = mysql_query($str) or die(mysql_error());
			$data = mysql_fetch_assoc($query );
			$test =intval(substr($data['readyMadeID'],1, 5));
			$test++;
			return "R".str_pad($test,5,"0",STR_PAD_LEFT);
		}
		
		//============manage menu function============
		function getMenu()
		{}
		function getAllMenu()
		{}
		function addMenu($readyId,$name,$price,$detail,$tag,$category,$picture)
		{
			$id=$readyId.self::getLastMenuId($readyId);
			$str = "INSERT INTO menu (id, readymadeId, name,price,detail,tag,category,picture) VALUES ('$id','$readyId','$name','$price','$detail','$tag','$category','$picture')";
			$objQuery = mysql_query($str) or die(mysql_error());
			
		}
		function editMenu()
		{}
		
		function getLastMenuId($readyId)
		{
		
			$str = "SELECT id FROM  menu where readymadeId= '$readyId' order by id desc limit 1";
			$query = mysql_query($str) or die(mysql_error());
			$data = mysql_fetch_assoc($query );
			$id=substr ($data['id'],6,6);
			if($id==null)
			{$id ="M00001";
			return $id;
			}
			else {
				$test =intval(substr($id,1, 5));
				$test++;
				$test=  str_pad($test,5,"0",STR_PAD_LEFT);
				return"M".$test;}
		
					
		}
		
		
		//----------comment tag-----------
		
		function getAllCommentTag($readyId)
		{
			$str = "SELECT * FROM  commenttag where readymadeId= '$readyId' order by id asc";
			$query = mysql_query($str) or die(mysql_error());
			
	return $query;
			
		}
		function addCommentTag($readyId,$comment)
		{
			$id=$readyId.self::getLastCommentTagId($readyId);
			$str = "INSERT INTO commenttag(id, readymadeId, commentTag) VALUES ('$id', '$readyId', '$comment')";
			$objQuery = mysql_query($str) or die(mysql_error());
		
			
		}
		function editCommentTag()
		{}
		
		function getLastCommentTagId($readyId)
		{

			$str = "SELECT id FROM  commenttag where id like '%$readyId%' order by id desc limit 1";
			$query = mysql_query($str) or die(mysql_error());
			$data = mysql_fetch_assoc($query );
			$id=substr ($data['id'],6,6);
			if($id==null)
			{$id ="CT0001";
			return $id;
			}
			else {
			$test =intval(substr($id,2, 4));
			$test++;
		  $test=  str_pad($test,4,"0",STR_PAD_LEFT);
			return"CT".$test;}

			
			
		}
		
		//----------category-----------
		
		function getCategory()
		{}
		function getAllCategory($readyId)
		{
			$str = "SELECT * FROM  category where id like  '%$readyId%' order by id asc";
			$query = mysql_query($str) or die(mysql_error());
			return $query;
		}
		function addCategory($readyId,$name,$fileUrl)	
		{
			$id=$readyId.self::getLastCategoryId($readyId);
			$str = "INSERT INTO category(id, name, picture) VALUES ('$id', '$name', '$fileUrl')";
			$objQuery = mysql_query($str) or die(mysql_error());
			
		}
		function editCategory()
		{}
		
		function getLastCategoryId($readyId)
		{
		
			$str = "SELECT id FROM  category where id like '%$readyId%' order by id desc limit 1";
			$query = mysql_query($str) or die(mysql_error());
			$data = mysql_fetch_assoc($query );
			$id=substr ($data['id'],6,6);
			if($id==null)
			{$id ="C00001";
			return $id;
			}
			else {
				$test =intval(substr($id,1, 5));
				$test++;
				$test=  str_pad($test,5,"0",STR_PAD_LEFT);
				return"C".$test;}
		
					
					
		}
		
		//==============staff and information function====================
		function getRestaurantName($readyId)
		{
			$str = "SELECT name FROM  information where readyMadeId	= '$readyId' ";
			$query = mysql_query($str) or die(mysql_error());
			$data = mysql_fetch_assoc($query );
			$name=$data['name'];
			return $name;
		}
		function getStaffId()
		{}
		function getAllstaff()
		{}
		function editStaff()
		{}
		function getInformation()
		{}
		function editInformation()
		{}
		//==============Real time order===========================
		function getOrder()
		{}
		function setOrderStatus()
		{}
		function sendOrder()
		{}

}



?>