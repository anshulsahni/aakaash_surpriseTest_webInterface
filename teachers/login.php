<?php
	require_once('./include/form_elements.php');
	include('./include/misc.php');
	time::setZone();
	$aksh_te = new form_elements();
?>
<?php
	if(isset($_POST['login_submit']))
	{
		$user=$_POST['username'];	$pwd=md5($_POST['user_pwd']);
		database::connect();
		$login_result=mysql_query("select * from teacher where reg_id='$user' and pwd='$pwd'");
		database::disconnect();
		$row=mysql_fetch_assoc($login_result);		
		if(mysql_num_rows($login_result)>0  && $row['email_verified']==1)
		{
			session_start();			
			$_SESSION['reg_id']=$row['reg_id'];
			$_SESSION['name']=$row['name'];
			$_SESSION['no_of_test']=$row['no_of_test'];
			header('Location: ./test');
		}
		else if(mysql_num_rows($login_result)<1)
		{echo "<script type='text/javascript'>alert('Either user name or password entered is wrong')</script>";}
		else if($row['email_verified']==0)
		{echo "<script type='text/javascript'>alert('Your email verification is still pending please verify your email address')</script>";}		
	}
?>
<html>
<head>
	<title>Surprise Test Teaher's Login</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
	<?php  include('./header.inc'); ?>
	<div id='wrapper'>
	<div id='container'>
		<div id='login_container'>
			<!-- <div><?php //if(isset($_POST['login_submit'])){echo "<span style='font-size:16px; color:#f00;'>Wrong User Name or Password</span>";} ?>			</div> -->
			<form action='./login.php' name='teacher_login_form' class='form' method='post'>
				<table>
					<tr>
						<td>
							<?php $aksh_te->drawTextBox('username','username_text','txtbox','Enter User Name');?>
						</td>
					</tr>
					<tr>
						<td>
							<?php $aksh_te->drawPassword('user_pwd','user_pwd_text','txtbox','Enter Password'); ?>
						</td>
					</tr>
				</table>
				<div class='btn_wrapper'>
					<?php $aksh_te->drawSubmit('login_submit','LOG IN','','btn');?>
				</div>
			</form>
		</div>
	</div>
	<?php include ("./footer.inc"); ?>
	</div>
	
</body>
</html>