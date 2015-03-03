<?php 
	require_once('../include/form_elements.php');
	require_once('../include/misc.php');
	$test_create = new form_elements();
	time::setZone();
	session_start();
?>
<head>
	<script type="text/javascript">
	// document.getElementById('question_paper_model').innerHTML="Anshul";
	function createAjaxObj()
	// {
	// 	if(window.XMLHttpRequest)
	// 		return new XMLHttpRequest();
	// 	else
	// 		return new ActiveXObject("Microsoft.XMLHTTP");
	// }

	// function createQuePaper(no_of_que)
	// {
	// 	var xml=createAjaxObj();
	// 	// var no_of_que=document.getElementsByName('no_que').value;
	// 	xml.open("GET","./createQue.php?no="+no_of_que,true);
	// 	xml.send();
	// 	xml.onreadystatechange=function()
	// 	{
	// 		if(xml.readyState==4 && xml.status==200)
	// 		{document.getElementById('question_paper_model').innerHTML=xml.responseText;}
	// 	}
	// }
	</script>
</head>

<div id='create_container'>
	<span>Select No. of Questions</span>
	<form>
		<table>
			<tr><td> <?php $test_create->drawOption('no_que','5','5 Questions',0,'','option','createQuePaper(5)'); ?>		</td></tr>
			<tr><td> <?php $test_create->drawOption('no_que','10','10 Questions',0,'','option','createQuePaper(10)'); ?> 	</td></tr>
			<tr><td> <?php $test_create->drawOption('no_que','20','20 Questions',0,'','option','createQuePaper(15)'); ?> 	</td></tr>
		</table>
	</form>
	<div id='question_paper_model'>
	</div>
</div>

