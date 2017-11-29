<?php
	session_start();
	require_once("plantillas/conexion.php");

	$delete = "delete from usuarios where IdUsuario = ".$_GET['id'].";";

	if(!($res=$mysqli->query($delete))){
			echo "Error al ejecutar la sentencia".$mysqli->error;
		}

		header('Location: cierra_sesion.php');



?>