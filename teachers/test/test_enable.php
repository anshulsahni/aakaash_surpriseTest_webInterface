<?php
	include("../include/misc.php");
	if($_GET['val'])
	{
		$testid=$_GET['val'];
		database::connect();
		mysql_query("update test_index set enabled=true where testid=$testid");
		database::disconnect();
	}

?>