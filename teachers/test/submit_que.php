<?php
	require_once('../include/misc.php');
	database::connect();
	session_start();
	include("../header.inc");
?>

<?php	
			generate_key:							
			$key=rand(100000,999999); 
			$test_query_result=mysql_query("select * from test_table where test_id=$key");
			if($test_query_result)
			{goto generate_key;}

			$test_id=$key;
			$teacher_id=$_SESSION['reg_id'];
			$no_of_que=$_GET['no'];
			mysql_query("insert into test_index values(NULL,$test_id,'$teacher_id',false)");
			for($i=1;$i<=$no_of_que;$i++)
			{
				$que=$_POST["que".$i];
				$opa=$_POST["opA".$i];
				$opb=$_POST["opB".$i];
				$opc=$_POST["opC".$i];
				$opd=$_POST["opD".$i];
				$sol=$_POST["sol".$i];
				mysql_query("insert into test_table values('$que','$opa','$opb','$opc','$opd',$test_id,'$teacher_id','$sol',NULL)") or die(mysql_error());
				// echo "insert into test_table values('$que','$opa','$opb','$opc','$opd',$test_id,'$teacher_id','$sol',NULL)";
			}
			database::disconnect();
			echo "<div class='notify'>The unique test id for the result you entered is:<b>  ".$test_id." </b>Please keep it safely as this is the unique test id for the test your created</div>";
?>
<head>
	<style type="text/css">
		*{padding: 0px; margin:0px;}
		.notify{position: relative;font-size: 20px; display: table; margin: 0px auto;}
		.back_link{position: relative; font-size: 20px; display: table; margin:0px auto;}

	</style>
</head>
<div class='back_link'>
	<a href="../test">CLICK HERE TO GO BACK</a>
</div>