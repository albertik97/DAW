<?php 
	session_start();
	require_once('validar.php');
	$title = "Crear álbum - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	
	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
		require_once('plantillas/contenido_crear_album.php');
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}

?>

