<?php
	session_start();
	require_once('validar.php');
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	
	if(isset($_SESSION['user']))
	{
		if(isset($_POST['nombreUsuario']))
		{
			require_once('plantillas/nav_usuario_identificado.php');
			require_once('plantillas/contenido_resultado_album.php');
		}
		else
			header('Location: solicitar_album.php');
		
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}
?>
	