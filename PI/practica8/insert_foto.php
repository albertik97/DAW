<?php
	require_once("plantillas/conexion.php");

		$titulo_foto 	= $_POST['tituloFoto'];
		$fecha_foto		= $_POST['fechaFoto'];
		
		$album			= "select IdAlbum from albumes where Titulo = '" . $_POST['albumes'] . "';";
		$archivo_foto 	= $_POST['foto'];
 
		if($_POST['pais']=="Seleccionar"){
			$pais='NULL';
		}else{
			$pais			= "select IdPais from paises where NomPais = '" . $_POST['pais'] . "';";
			if(!($pais_foto=$mysqli->query($pais))){
			echo "Error al ejecutar la sentencia";
			}
		$res1 = $pais_foto->fetch_assoc();
		$pais=$res1['IdPais'];
			$pais="'".$pais."'";
		}
		if($fecha_foto==""){
			$fecha_foto='NULL';

		}else{
			$fecha_foto="'".$fecha_foto."'";
		}

		/*echo $pais;
		echo $album;
		echo $archivo_foto;
*/

		
		if(!($album_foto=$mysqli->query($album))){
			echo "Error al ejecutar la sentencia";
		}
		$res2 = $album_foto->fetch_assoc();
		$insert = "INSERT INTO `fotos`( `Titulo`, `Fecha`, `Pais`, `Album`, `Fichero`, `FRegistro`)
					VALUES ('" . $titulo_foto . "', " . $fecha_foto . " ," . $pais . ", " . $res2['IdAlbum'] . ", '" . $archivo_foto . "', NOW());";
		

		if(!($res=$mysqli->query($insert))){
			echo "Error al ejecutar la sentencia";
		}

		//header('Location: menu_usuario.php');
?>