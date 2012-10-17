<?php 

require 'src/header.php';?>
<link rel="stylesheet" type="text/css" media="screen" href="js/validate/css/screen.css" />
<script src="js/validate/jquery-1.7.2.js" type="text/javascript"></script>
<script src="js/validate/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">
$().ready(function() {
	 
	 $('#register-form').validate(
	 {
	  rules: {
		address:"required",
		 resname:"required",
		 		
	    email: {
	      		required: true,
	      		email: true
	   		 },
		 telephone: {digits:true,
	      		minlength:8,
	      		
	     		maxlength:10,
	      		required: true
	    	},
	    password:{
	    		required: true,
				minlength: 5
		    },
	    repassword:
		    	{required: true,
				minlength: 5,
				equalTo: "#password"}
	  		},
	  messages: {
		address:"กรุณาระบุบที่อยู่",
	 	resname: "กรุณาระบุบชื่อร้าน",
 		email: "กรุณาระบุบอีเมล์ให้ถูกต้อง",
  		telephone: {
  			required: "กรุณาระบุบเบอร์โทรศัพท์",
    		minlength: "เบอร์โทรศัพท์ต้องมีไม่น้อยกว่า 8 ตัวอักษร",
   		maxlength:"เบอร์โทรศัพท์ต้องมีไม่เกิน 10 ตัวอักษร",
   			digits:"ต้องเป็นตัวเลขเท่านั้น"
  	},
  password:{required: "กรุณาระบุบรหัสผ่าน",
			minlength: "รหัสผ่านต้องมีไม่น้อยกว่า 5 ตัวอักษร"
				
	    },
  repassword:
	    	{required: "กรุณาระบุบรหัสผ่าน",
  			minlength: "รหัสผ่านต้องมีไม่น้อยกว่า 5 ตัวอักษร",
			equalTo: "รหัสผ่าน ไม่ตรงกัน"}
		}
		
	 });
	}); // end document.ready
</script>

register
<form  method="post"  id="register-form" name="register-form" action="register-send.php">
<table >
  <tr>
    <td width="206" align="right">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="257">&nbsp;</td>
    <td width="117">&nbsp;</td>
  </tr>
  
   <tr>
    <td align="right">Email Address</td>
    <td>&nbsp;</td>
    <td><input name="email" type="text" id="email" size="40" maxlength="255"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Restaurant Name</td>
    <td>&nbsp;</td>
    <td><input name="resname" type="text" id="resname" size="40" maxlength="255"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Address</td>
    <td>&nbsp;</td>
    <td><textarea name="address" id="address" cols="42" rows="2"></textarea></td>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Password</td>
    <td>&nbsp;</td>
    <td><input name="password" type="password" id="password" size="20"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Retype Password</td>
    <td>&nbsp;</td>
    <td><input name="repassword" type="password" id="repassword" size="20"></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td align="right">Telephone Number</td>
    <td>&nbsp;</td>
    <td><input name="telephone" type="text" id="telephone" size="20" maxlength="10"></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Submit"></td>
    <td><input type="reset" name="button2" id="button2" value="reset"></td>
  </tr>
</table></form>
	
<?php require 'src/footer.php';?>