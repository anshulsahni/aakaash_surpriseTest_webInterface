<?php
	include("../include/misc.php");
?>

<?php
	if(isset($_GET['test_id_submit']) && isset($_GET['test_id'])) 
	{
		database::connect();
		$testid=$_GET['test_id'];
		echo "<table border=1px>";
		$reg_no_list=mysql_query("select distinct reg_no from test_response where testid=$testid order by reg_no") or die("cant select");

		echo "<tr><th>Registration No.</th><th>Marks</th></tr>";
		while($reg_no=mysql_fetch_assoc($reg_no_list))
		{
			$no=$reg_no['reg_no'];
			$correct=mysql_query("select count(*) from test_response where testid=$testid and reg_no=$no and correct=true");
			$correct=mysql_result($correct, 0);
			$wrong=mysql_query("select count(*) from test_response where testid=$testid and reg_no=$no and correct=false");
			$wrong=mysql_result($wrong, 0);
			echo"<tr><td>$no</td><td>$correct out of ".($correct+$wrong)."</td></tr>";
		}
		echo"</table></div>";
	}
?>