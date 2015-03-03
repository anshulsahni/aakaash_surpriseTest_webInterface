<?php
	require_once('./include/misc.php');
	require_once('./include/form_elements.php');
	include('../teachers/header.inc');
	$que_generator=new form_elements();
?>
<?php
	if(isset($_GET['testid']) && isset($_GET['reg_no']))
	{
		$testid=$_GET['testid'];
		$reg_no=$_GET['reg_no'];
		database::connect();
		$test_valid=mysql_query("select enabled from test_index where testid=$testid");
		$test_valid=mysql_fetch_assoc($test_valid);
		if($test_valid['enabled']==false)
			header("Location: ./test_disabled.php");
		
		$test_count=mysql_query("select count(*) from test_table where testid=$testid");
		$test_count=mysql_fetch_assoc($test_count);
		$no=$test_count['count(*)'];
		$questions=mysql_query("select * from test_table where testid=$testid");
		database::disconnect();
		echo "<div id='question_paper_heading'>";
		echo "Registration Number: ".$reg_no."<br>";
		echo "Unique Test Id: ".$testid."<br>";
		echo "No. of questions: ".$test_count['count(*)'];
		echo "</div>"."<br><br>";
		echo "<div id='question_paper'><form name='question_response_form' action='test_submit.php?reg_no=$reg_no&testid=$testid&no=$no' method='POST'>";
		$i=1;
		while($que=mysql_fetch_assoc($questions))
		{
			echo "<div id='question$i'>";
			echo "<span>".$que['question']."</span><br>";
			$que_content=$que['question'];
			echo "<input name ='que$i'type=hidden value='$que_content'/>";
			$que_generator->drawOption("op".$i,'A',$que['optiona']);
			$que_generator->drawOption("op".$i,'B',$que['optionb']);
			$que_generator->drawOption("op".$i,'C',$que['optionc']);
			$que_generator->drawOption("op".$i,'D',$que['optiond']);
			$que_sno=$que['que_sno'];
			echo "<input name='que_sno$i' type=hidden value=$que_sno>";
			echo"</div><br><br>";
			$i++;
		}
		$que_generator->drawSubmit('response_submit','SUBMIT');
		echo "</form></div>";
	}
?>
<head>
	<style type="text/css">
		*{padding:0px; margin:0px;}
		#question_paper_heading{position: relative; margin:0px auto; padding-left: 10px; padding-bottom: 10px;}
		#question_paper{position: relative; margin:0px auto; padding-left: 10px; padding-bottom: 10px;}
	</style>
</head>