<?php
	session_start();
	$mysqli = @new mysqli('localhost','web_user','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}

	$delete = "delete from usuarios where idUsuario = ".$_GET['id'].";";

	if(!($res=$mysqli->query($delete))){
			echo "Error al ejecutar la sentencia";
		}

		header('Location: cierra_sesion.php');



?>