<?php

	$mysqli = @new mysqli('localhost','root','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}

		$consulta = 'select * from paises';

		if(!($res=$mysqli->query($consulta))){
			echo "Error al ejecutar la sentencia";
		}
	
?>