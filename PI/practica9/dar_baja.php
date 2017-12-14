<?php
	session_start();
	require_once("plantillas/conexion.php");

	$delete = "delete from usuarios where IdUsuario = ".$_GET['id'].";";
	$selfoto = "select Foto from usuarios where IdUsuario = ".$_GET['id'].";";

	if(!($res1=$mysqli->query($selfoto))){
			echo "Error al ejecutar la sentencia".$mysqli->error;
			
	}
	else
	{
		unlink("./fotos/" . $res1->fetch_assoc()["Foto"]);
	}
	if(!($res=$mysqli->query($delete))){
			echo "Error al ejecutar la sentencia".$mysqli->error;
	}

		

		header('Location: cierra_sesion.php');



?>