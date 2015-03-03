<?php
	include ("./include/form_elements.php");
	include ("./include/misc.php");
	time::setZone();
?>
<?php
	if(isset($_POST['reg_no']) && isset($_POST['tname']) && isset($_POST['pwd']) && isset($_POST['email']) && isset($_POST['reg_form_submit']))
	{
		$reg_no=$_POST['reg_no'];
		$tname=$_POST['tname'];
		$pwd=md5($_POST['pwd']);
		$email=$_POST['email'];

		database::connect();
			$teacher_result=mysql_query("select * from teacher where reg_id='$reg_no'");
			$email_result=mysql_query("select * from teacher where email='$email'");

			if(mysql_num_rows($teacher_result)==0 && mysql_num_rows($email_result)==0)
			{

				generate_key:
					$key=rand();
					$key=md5($key);
					$key_result=mysql_query("select * from non_verified_teacher where secret_code='$key'");
					if(mysql_num_rows($key_result)>0)
						goto generate_key;

					$date=date('Y/m/d');
					$time=date('h:i:s');
					mysql_query("insert into non_verified_teacher values ('$reg_no','$email','$key','$date','$time')");
					mysql_query("insert into teacher values('$reg_no','$pwd','$tname','$email','',0,'$date','$time','','')");
					$mail_content="This is an auto generated email from SRM Aakash Team\n\nPlease click the below link or copy and paste the link in the address bar of your browser to verify your email address the SRM Surprise Test portal\n\n";
					$mail_content.="http://connecting.hostingsiteforfree.com/aakash/teachers/email_verify.php?em_code=$key";
					$mail_content.="\n\n\nIf you have not registered on SRM Surprise test portal then kindly please ignore this email\n\n\nRegards,\n\nTeam IT Association";
					$headers="From: support_team_aakash@gmail.com";
					mail($email,"Registration Verification",$mail_content,$headers);
					echo "<script type='text/javascript'>alert('An email verification link has been sent to your email $email. Please verify your email address')</script>";
			}
			else if(mysql_num_rows($teacher_result)>0)
					echo "<script type='text/javascript'>alert('The entered registration id already exist')</script>";
			else if(mysql_num_rows($email_result)>0)
					echo "<script type='text/javascript'>alert('The entered email address is already associated with another account')</script>";

	}
?>
<html>
<head>
	<title>SRM Team Aakash Surprise Test Portal Registration</title>
	<style type="text/css">
		#wrapper
		{
			position: relative;
			min-height: 550px;	width:1100px;
			margin:0px auto;
			border:1px solid #000; border-radius: 0px 0px 10px 10px;
			overflow: hidden;
		}
		#container
		{
			position: relative;
			height: 560px;
		}
		#form_wrapper
		{
			position: relative;
			margin:50px auto;
			display: table;
			width: 500px;
			background-color: #dbdbdb;
			padding: 30px 0px;

		}
		#form_wrapper form{position: relative; margin:0px auto;}
		#form_wrapper form table{position: relative; margin:0px auto;}
		input[type="text"]{width:250px; height: 25px;}
		input[type="password"]{width:250px; height: 25px;}
		input[type="submit"]{width:120px;}
		.btn{border:1px solid #000; background-color:#590A1D; height: 25px;	width: 100px; border-radius:7px;  font-size:16px; color:#fff;}
		.btn:focus{outline: none; cursor:pointer;}
		body{padding: 0px; margin: 0px;}
		#instructions{position: relative; width: 400px; background-color: #dbdbdb; margin: 0px auto; }
	</style>
</head>
<body>
	<?php include("./header.inc"); ?>
	<div id='wrapper'>
		<div id='container'>
			<div id='instructions'>
				<h4>Instructions</h4>
				<ol>
					<li>Enter your valid registration number issued from SRM University</li>
					<li>Once details submitted wont be changed in the future</li>
					<li>Your every test created will be referred by the unique test id generated automatically</li>
					<li>This portal needs your email to be verified</li>
				</ol>
			</div>
			<div id='form_wrapper'>
				<center><h2>Teacher's Registration</h2></center>
				<br>
				<form method='post' name='register_form'>
					<table>
						<tr>
							<td>
								<input type='text' name='reg_no' placeholder='Enter Registration Number' maxlength=10>
							</td>
						</tr>
						<tr>
							<td>
								<input type='text' name='tname' placeholder="Enter your Name" maxlength=30>
							</td>
						</tr>
						<tr>
							<td>
								<input type='password' placeholder='Enter your password' name='pwd' maxlength=30>
							</td>
						</tr>
						<tr>
							<td>
								<input type='text' placeholder='Enter your email' name='email' maxlength=50>

							</td>
						</tr>
						<tr>
							<td>
								<center><input type='submit' class='btn' name='reg_form_submit' value='SUBMIT' onClick="return verify_data()"></center>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<?php  include("./footer.inc"); ?>
	</div>
</body>
<script type="text/javascript">
 	function verify_data()
 	{
 		var reg_no=document.forms['register_form'].elements['reg_no'].value;
 		var tname=document.forms['register_form'].elements['tname'].value;
 		var pwd=document.forms['register_form'].elements['pwd'].value;
 		var email=document.forms['register_form'].elements['email'].value;

 		if(reg_no.length!=10)
 			{alert("Enter a valid registraion number");
 				return false;}
 		else if(tname.length>30)
 			{alert("Value of Name is too long")
 				return false;}
 		else if(pwd.length<6 || pwd.length>30)
 			{	alert("Length of password should be between 6 and 30 characters")
 				return false;}
 		else if(valid_email(email)==false)
 			{alert("Enter a valid E-Mail address");
 				return false;}
 		else if(email.length>50)
 			{	alert("Email Address is too long");
 				return false;}
 		else 
 			return true;

 	}

 	function valid_email(email_val)
	{
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	return re.test(email_val);
	}


</script>
</html>