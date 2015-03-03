
<head>
	<title>View Test Result</title>
	<style type="text/css">
		*{font-family: "calibri";}
		#result_wrapper{position: relative; margin:10px auto; background-color: #dbdbdb; display: table; }
		#form_wrapper{position: relative; margin: 20px auto; display: table;}
		*{padding: 0px; margin:0px;}
		#result_wrapper table tr td{padding: 5px 20px;}
		.btn{border:1px solid #000; background-color:#590A1D; height: 25px;	width: 100px; border-radius:7px;  font-size:16px; color:#fff;}
		.btn:focus{outline: none; cursor:pointer;}
		.notify{font-size: 18px; color:;}
	</style>
</head>	
	<div id='result_wrapper'>

	</div>
	<div id='form_wrapper'>
		<form name='show_result_form'>
			<table>
				<tr>
					<td><span class='notify'>Enter Test Id:</span>   <input type='text' name='test_id'></td>
					<td><input type='submit' name='test_id_submit' class='btn' onClick="return show_result()"></td>
				</tr>
			</table>
		</form>
	</div>
<script type="text/javascript">
	
</script>