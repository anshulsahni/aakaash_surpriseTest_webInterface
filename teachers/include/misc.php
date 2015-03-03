<?php

	class database
	{
		private static $db_connect;

		public static function connect($database='localhost',$db_user='ansh',$db_pwd='ansh')		//static function to connect to datbase
		{
                       self::$db_connect=mysql_connect($database,$db_user,$db_pwd);
			mysql_select_db("aakash");
		}

		public static function disconnect()		//static function to disconnect from database
                {mysql_close(self::$db_connect);}
	}


	class time
	{
		public static function setZone($timeZone='Asia/Calcutta')		//static function to set the time zone of website
		{date_default_timezone_set($timeZone);}
	}
	

?>
