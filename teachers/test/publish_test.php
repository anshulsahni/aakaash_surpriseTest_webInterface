<?php
	include("../include/misc.php");
	session_start();
	function enableorNot($enable_val,$id_val)
	{
		if($enable_val==false)
			return "<input type=button class='publish_test_btn_disabled' value='DISABLED' onClick='enable($id_val)'>";
		else if($enable_val==true)
			return  "<input type=button class='publish_test_btn_enabled' value='ENABLED' onClick='disable($id_val)'>";
	}	
?>
<?php
	
	if(isset($_SESSION['reg_id']))
	{
		$teacher_id=$_SESSION['reg_id'];
		database::connect();
		$publish_test_query=mysql_query("select * from test_index where teacher_id='$teacher_id'");
		if(mysql_num_rows($publish_test_query)>0)
		{
			echo "<table id='publish_test_table' border=1px><tr><th>Serial No.</th><th>Test ID</th><th>Status</th></tr>";
			$i=1;
			while($row=mysql_fetch_assoc($publish_test_query))
			{
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row['testid']."</td>";
				echo "<td>".enableorNot($row['enabled'],$row['testid'])."</td>";
				echo "</tr>";
				$i++;
			}
		}
	}
?>
<head>
	<style type="text/css">
		#publish_test_table{position: relative; margin-left: 20px;}
		#publish_test_table tr td{padding: 5px 10px;}

		.publish_test_btn_enabled{border:1px solid #000; background-color:#590A1D; height: 20px;	width: 100px; border-radius:7px;  font-size:16px; color:#fff; font-size:15px;}
		.publish_test_btn_enabled:focus{outline: none;}
		.publish_test_btn_disabled{border:1px solid #000; background-color:rgba(89,10,29,0.3); height: 20px;	width: 100px; border-radius:7px;  font-size:16px; color:#666; font-size:15px;}
		.publish_test_btn_disabled:focus{outline: none;}
		.publish_test_btn_enabled+.publish_test_btn_disabled{cursor: pointer;}

	</style>
</head>
