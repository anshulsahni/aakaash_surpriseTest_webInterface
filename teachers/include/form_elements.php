<?php
	class form_elements
	{

		
		public function drawTextBox($name,$id=NULL,$class=NULL,$placeholder=NULL,$maxlength=NULL)
		{echo "<input type='text' name='".$name."' id='".$id."' class='".$class."' placeholder='".$placeholder."' maxlength=".$maxlength."/>";}

		public function drawPassword($name,$id=NULL,$class=NULL,$placeholder=NULL,$maxlength=NULL)
		{echo "<input type='password' name='".$name."' id='".$id."' class='".$class."' placeholder='".$placeholder."' maxlength=".$maxlength."/>";}

		public function drawButton($name,$value=NULL,$id=NULL,$class=NULL,$onclick=NULL)
		{echo "<input type='button' name='".$name."' value='".$value."' id='".$id."' class='".$class."' onClick='".$onclick."'/>";}


		public function drawSubmit($name,$value=NULL,$id=NULL,$class=NULL,$onclick=NULL)
		{echo "<input type='submit' name='".$name."' value='".$value."' id='".$id."' class='".$class."' onClick='".$onclick."'/>";}

		public function drawDropDown($name,$id=NULL,$class=NULL,$options)
		{
			echo "<select name='$name' id='$id' class='$class'/>";
			foreach ($options as $op)
			{echo "<option value='$op[0]'>$op[1]</option>";}
		}
		public function drawOption($name,$value,$text,$checked=0,$id=NULL,$class=NULL,$onClick=NULL)
		{echo "<input type='radio' name='$name' value='$value',id='$id',class='$class' onClick='$onClick'".self::checkedOrNot($checked).">$text<br>";}

		public function drawTextArea($name,$cols,$rows,$id=NULL,$class=NULL)
		{echo "<textarea name='".$name."' cols='".$cols."' rows='".$rows."' id='".$id."' class='".$class."'/></textarea>";}




		private function checkedOrNot($val)
		{if($val==1)	{return 'chedked';}	}

	}


?>