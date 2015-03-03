<?php
	require_once('../include/form_elements.php');
	{$test_form = new form_elements();}
	session_start();
?>
<?php
	if(!(isset($_SESSION['reg_id'])))
	die("Illegal Entry into the page");
?>
<html>
<head>
	<title>Test Centre</title>
	<link rel="stylesheet" type="text/css" href="./test.css">
</head>
<body>
	<?php include('../header.inc'); ?>
	<div id='wrapper'>
		<div id='container'>
			<div id='option_container'>
				<ul>
					<li> <?php $test_form->drawButton('create','CREATE TEST','','btn',"selectAction(\"create.php\")");	?></li><br>
					<li> <?php $test_form->drawButton('view','VIEW TEST','','btn',"selectAction(\"view.php\")");	?>		  </li><br>
					<li> <?php $test_form->drawButton('publish','PUBLISH TEST','','btn',"selectAction(\"publish_test.php\")");	?>	</li><br>	
					<li> <?php $test_form->drawButton('view_result','VIEW RESULT','','btn',"selectAction(\"show_result.php\")"); ?> </li><br>
				</ul>
			</div>
			<div id='action_container'>

			</div>
		</div>
	</div>
	<?php  include ('../footer.inc'); ?>
</body>
<script type="text/javascript">
	function createAjaxObj()
	{
		if(window.XMLHttpRequest)
			return new XMLHttpRequest();
		else
			return new ActiveXObject("Microsoft.XMLHTTP");
	}

	function selectAction(action)
	{
		var xml=createAjaxObj();
		xml.open("GET","./"+action,true);
		xml.send();
		xml.onreadystatechange=function()
		{
			if(xml.readyState==4 && xml.status==200)
			{document.getElementById('action_container').innerHTML=xml.responseText;}
		}
	}

	function createQuePaper(no_of_que)
	{
		var xml=createAjaxObj();
		// var no_of_que=document.getElementsByName('no_que').value;
		xml.open("GET","./createQue.php?no="+no_of_que,true);
		xml.send();
		xml.onreadystatechange=function()
		{
			if(xml.readyState==4 && xml.status==200)
			{document.getElementById('question_paper_model').innerHTML=xml.responseText;}
		}
	}
	function show_result()
	{
		var testid=document.forms['show_result_form'].elements['test_id'].value;
		var xml=createAjaxObj();
		xml.open("get","./get_result.php?test_id_submit=OK&test_id="+testid,false);
		xml.send();
		document.getElementById("result_wrapper").innerHTML=xml.responseText; 
		return false;
	}
	function show_test()
	{
		var testid=document.forms['view_test_form'].elements['test_id'].value;
		var xml=createAjaxObj();
		xml.open("get","./view_test.php?submit_view=OK&test_id="+testid,false);
		xml.send();
		document.getElementById("test_content_div").innerHTML=xml.responseText;
		return false;
	}
	function enable(val)
	{
		var xml=createAjaxObj();
		xml.open("get","./test_enable.php?val="+val,true);
		xml.send();
		xml.onreadystatechange=function()
		{
			if(xml.readyState==4 && xml.status==200)
				selectAction("publish_test.php");
		}
	}
	function disable(val)
	{
		var xml=createAjaxObj();
		xml.open("get","./test_disable.php?val="+val,true);
		xml.send();
		xml.onreadystatechange=function()
		{
			if(xml.readyState==4 && xml.status==200)
				selectAction("publish_test.php");
		}
	}
</script>

</html>