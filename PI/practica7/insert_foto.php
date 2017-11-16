<?php
	session_start();
	$mysqli = @new mysqli('localhost','root','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}

		$titulo_foto 	= $_POST['tituloFoto'];
		$fecha_foto		= $_POST['fechaFoto'];
		$pais			= "select IdPais from paises where NomPais = '" . $_POST['pais'] . "';";
		$album			= "select IdAlbum from albumes where Titulo = '" . $_POST['albumes'] . "';";
		$archivo_foto 	= $_POST['foto'];


		/*echo $pais;
		echo $album;
		echo $archivo_foto;
*/

		if(!($pais_foto=$mysqli->query($pais))){
			echo "Error al ejecutar la sentencia";
		}
		$res1 = $pais_foto->fetch_assoc();
		if(!($album_foto=$mysqli->query($album))){
			echo "Error al ejecutar la sentencia";
		}
		$res2 = $album_foto->fetch_assoc();
		$insert = "INSERT INTO `fotos`( `Titulo`, `Fecha`, `Pais`, `Album`, `Fichero`, `FRegistro`)
					VALUES ('" . $titulo_foto . "', '" . $fecha_foto . "' ," . $res1['IdPais'] . ", " . $res2['IdAlbum'] . ", '" . $archivo_foto . "', NOW());";

		echo $insert;

		if(!($res=$mysqli->query($insert))){
			echo "Error al ejecutar la sentencia";
		}

		header('Location: menu_usuario.php');


	
?>