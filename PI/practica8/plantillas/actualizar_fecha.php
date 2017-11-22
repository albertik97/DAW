<?php 
	$current_visit_date = date("d/m/y");
	$current_visit_hour = date("H:i:s");


	if(isset($_COOKIE['last_visit_date']))
	{
		$last_visit_date = $_COOKIE['last_visit_date'];
		$last_visit_hour = $_COOKIE['last_visit_hour'];

		setcookie("last_visit_date",$current_visit_date,time()+60*60*24*30);
		setcookie("last_visit_hour",$current_visit_hour,time()+60*60*24*30);
	}

 ?>

