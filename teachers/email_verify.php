<?php
	include("./include/misc.php");
	time::setZone();
	$date=date("Y/m/d");
	$time=date("h:i:s");
	include("./header.inc");
?>
<?php
	
	if(isset($_GET['em_code']))
	{
		$em_code=$_GET['em_code'];
		database::connect();
		$sec_code_result=mysql_query("select * from non_verified_teacher where secret_code='$em_code'");
		if(mysql_num_rows($sec_code_result)>0)
		{
			$sec_code_result=mysql_fetch_assoc($sec_code_result);
			$reg_no=$sec_code_result['reg_no'];
			mysql_query("delete from non_verified_teacher where secret_code='$em_code'") or die(mysql_error());
			mysql_query("update teacher set email_verified=true, email_verify_date='$date', email_verify_time='$time' where reg_id='$reg_no'");
			echo "<div class='msg'>Your email is verified</div>";
		}
		else
			{echo "<div class='msg'>This mail has been already verified</div>";}
		database::disconnect();
	}
?>
<head>
	<style type="text/css">
		body{padding:0px; margin:0px;}
		.msg{display: table; margin: 20px auto; font-size: 25px;}
	</style>
</head>
<div class='msg'>
	You can <a href='./login.php'>LOGIN</a> to start
</div>