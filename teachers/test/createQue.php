<?php
	include_once('../include/form_elements.php');
	$no_que_create= new form_elements();
?>
<?php
	if(isset($_GET['no']))
	{
		$no=$_GET['no'];
		echo "Number of questions selected are: ".$_GET['no'];
		echo "<form action='submit_que.php?no=$no'method='POST'>";
		for($i=1;$i<=$_GET['no'];$i++)
		{
			$no_que_create->drawTextArea('que'.$i,75,5,'','que');
			echo "<br><br>";
			echo "<span class='op_label'>A.</span>";
			$no_que_create->drawTextBox('opA'.$i,'','options');	echo "<br><br>";
			echo "<span class='op_label'>B.</span>";
			$no_que_create->drawTextBox('opB'.$i,'','options');	echo "<br><br>";
			echo "<span class='op_label'>C.</span>";
			$no_que_create->drawTextBox('opC'.$i,'','options');	echo "<br><br>";
			echo "<span class='op_label'>D.</span>";
			$no_que_create->drawTextBox('opD'.$i,'','options');	echo "<br><br>";
			echo "<span class='op_label'>Solution</span>";
			$no_que_create->drawOption('sol'.$i,'A','A');
			$no_que_create->drawOption('sol'.$i,'B','B');
			$no_que_create->drawOption('sol'.$i,'C','C');
			$no_que_create->drawOption('sol'.$i,'D','D');

		}
		echo"<br>";
		$no_que_create->drawSubmit('submit_que_paper','SUBMIT','','btn');
		echo "</form>";
	}
	

?>