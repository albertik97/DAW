<?php


	$mysqli = @new mysqli('localhost','web_user','','pibd');
	$mysqli->set_charset('utf8');
	if($mysqli->connect_errno){
		echo "No se ha podido establecer conxión con la base de datos";
	}

?>