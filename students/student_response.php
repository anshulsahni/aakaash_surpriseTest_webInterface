<?php
	include('./include/misc.php');
	include("header.inc");

?>
<?php
	if(isset($_POST['submit_query']))
	{
		$testid=$_POST['test_id'];
		$reg_no=$_POST['reg_no'];
		database::connect();
		$result=mysql_query("select * from test_response where testid=$testid and reg_no=$reg_no");
		if(mysql_num_rows($result)>0)
		{
			$correct=mysql_query("select count(*) from test_response where testid=$testid and reg_no=$reg_no and correct=true");

			$wrong=mysql_query("select count(*) from test_response where testid=$testid and reg_no=$reg_no and correct=false");
		}
		echo "<div id=wrapper>";
		echo "<br>Test Id: ".$testid;
		echo "<br>Regisration No.: ".$reg_no;
		echo"<table border=1px><tr><th>question</th><th>Student Response</th><th>Correct?</th></tr>";
		while($row=mysql_fetch_assoc($result))
		{
			echo"<tr><td>".$row['question']."</td><td>".$row['response']."</td><td>".correctOrNot($row['correct'])."</td></tr>";
		}
		echo "</table>";
		if(mysql_num_rows($result)>0)
		{
			$correct=mysql_query("select count(*) from test_response where testid=$testid and reg_no=$reg_no and correct=true");			
			$wrong=mysql_query("select count(*) from test_response where testid=$testid and reg_no=$reg_no and correct=false");
			$correct=mysql_fetch_assoc($correct);
			$wrong=mysql_fetch_assoc($wrong);

			echo "<p>Your score is: ".$correct['count(*)']." out of ".($correct['count(*)']+$wrong['count(*)'])."</p>";
			echo "</div>";			
		}
		database::disconnect();
	}

	function correctOrNot($val)
	{
	if($val==0)
		return 'no';
	else
		return 'yes';
	}
?>

<html>
<head>
	<title></title>
	<style type="text/css">
		#wrapper
		{
			position: relative;
			margin:20px auto;
			display: table;
			background-color: #dbdbdb;
			width:500px;

		}
		#wrapper table{position: relative; margin: 0px auto;}
		#form_wrapper{position: relative; margin:10px auto; display: table; background-color: #dbdbdb; width:500px;}
		#submit_wrapper{position: relative; margin:0px auto; display: table; }
		form table tr td{font-weight: 900; }
		*{padding: 0px; margin: 0px;}
	</style>
</head>
<body>
	<div id='form_wrapper'>
		<form action='./student_response.php' method='POST'>
			<br><br>
			<table>
				<tr>
					<td>TEST ID</td>
					<td><input type='text' name='test_id'></td>
				</tr>
				<tr>
					<td>REGISTRATION NO.</td>
					<td><input type='reg_no' name='reg_no'><br><br></td>
				</tr>
			</table>
			<div id='submit_wrapper'><input type='submit' name='submit_query'></div>
		</form>
	</div>
</body>
</html>