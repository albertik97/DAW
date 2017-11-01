<?php
	session_start();
	$title = "PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	if(isset($_COOKIE['user']) || isset($_SESSION['user']))
		require_once('plantillas/nav_usuario_identificado.php');
	else
		require_once('plantillas/nav_usuario_no_identificado.php');

	$img = array
	(
		array('"imagenes/playa.jpg"', "Mis vacaciones en Hawai", "12/12/2004", "Hawai", "Alejandro Domenech", "Viajes"),
		array('"imagenes/delfin.jpg"', "Un delfín en el mar", "23/10/2004", "España", "Alejandro Domenech", "Viajes")
	);

	$n_img;
	if (isset($_GET['id']))
		if(intval($_GET['id'])%2==0) $n_img=0;
			else $n_img=1;

	if(isset($_SESSION['user']))
		require_once('plantillas/contenido_foto.php');
	else
		require_once('plantillas/error_test.php');


?>
		