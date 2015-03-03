<?php
	include_once('./include/misc.php');
?>


<?php
	if(isset($_POST['response_submit']))
	{
		database::connect();
		$no=$_GET['no'];
		$testid=$_GET['testid'];
		$reg_no=$_GET['reg_no'];

		for($i=1;$i<=$no;$i++)
		{
			$question=$_POST["que$i"];
			$op=$_POST["op$i"];
			$que_sno=$_POST["que_sno$i"];
			mysql_query("insert into test_response values('$reg_no',$testid,'$question',$que_sno,'$op',NULL)") or die("cant insert");
			mysql_query("update test_response,test_table	set test_response.correct=true where test_table.que_sno=test_response.question_sno and test_response.response=test_table.correct_ans and test_table.testid=test_response.testid") or die("cant validte");
			// echo "update test_response set correct=false where testid=$testid and correct=NULL";
			

		}
		mysql_query("update test_response set correct=false where testid=$testid and correct IS NULL and reg_no=$reg_no") or die("cant validate 2nd");
		echo "Your Response has been recorded";
	}
	else
		echo"condition bypassed";


?>