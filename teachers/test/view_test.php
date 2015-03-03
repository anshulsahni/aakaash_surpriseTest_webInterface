<?php
	include('../include/misc.php');
	database::connect();
?>
<?php
	if(isset($_GET['test_id']) and isset($_GET['submit_view']))
	{
		$test_id=$_GET['test_id'];
		$view_result=mysql_query("select * from test_table where testid=$test_id" );
		if($view_result)
		{
			echo "<table border='1px'>";
			echo "<tr><th>Question</th><th>Option A</th><th>Option B</th><th>Option C</th><th>Option D</th><th>Correct Ans</th></tr>";
			while($row=mysql_fetch_assoc($view_result))
			{
				echo"
				<tr>
					<td>".$row['question']."</td>
					<td>".$row['optiona']."</td>
					<td>".$row['optionb']."</td>
					<td>".$row['optionc']."</td>
					<td>".$row['optiond']."</td>
					<td>".$row['correct_ans']."</td>
				</tr>";
			}
			echo "</table>";
		}
	}
	database::disconnect();
?>
<head>
	<style type="text/css">
		#test_content_div{padding: 20px; display: table; margin-left: 25px;}
	</style>

</head>