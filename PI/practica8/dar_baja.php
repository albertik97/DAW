<?php
	session_start();
	require_once("plantillas/conexion.php");

	$delete = "delete from usuarios where idUsuario = ".$_GET['id'].";";

	if(!($res=$mysqli->query($delete))){
			echo "Error al ejecutar la sentencia";
		}

		header('Location: cierra_sesion.php');



?>