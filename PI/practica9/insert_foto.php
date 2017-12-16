<?php
	require_once("plantillas/conexion.php");

		$titulo_foto 	= $_POST['tituloFoto'];
		$fecha_foto		= $_POST['fechaFoto'];
		
		$album			= "select IdAlbum from albumes where Titulo = '" . $_POST['albumes'] . "';";
		$archivo_foto 	= $_FILES['foto']['name'];
 
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


		$ext_allowed = array('png', 'jpg', 'jpeg', 'gif');
		if(!in_array(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION), $ext_allowed))
		{
			header('Location: anyadir_foto.php?error=1');
			exit();
		}

		$tam = $_FILES["foto"]["size"] / 1024;
		if( $tam > 5000 )
		{
			header('Location: anyadir_foto.php?error=2');
			exit();
		}

		if(file_exists("./fotos/" . $_FILES["foto"]["name"]))
	   { 
	    	for($i = 0; ; $i++)
	    	{
	    		if(!file_exists("./fotos/" . $i . "_" . $_FILES["foto"]["name"]))
	    		{
	    			$archivo_foto = $i . "_" . $_FILES["foto"]["name"];
	    			break;
	    		}
	    	}
	   }
		
		if(!($album_foto=$mysqli->query($album))){
			echo "Error al ejecutar la sentencia";
		}
		$res2 = $album_foto->fetch_assoc();
		$insert = "INSERT INTO `fotos`( `Titulo`, `Fecha`, `Pais`, `Album`, `Fichero`, `FRegistro`)
					VALUES ('" . $titulo_foto . "', " . $fecha_foto . " ," . $pais . ", " . $res2['IdAlbum'] . ", '" . $archivo_foto . "', NOW());";
		



		$msgError = array(0 => "No hay error, el fichero se subió con éxito", 
               1 => "El tamaño del fichero supera la directiva 
                   upload_max_filesize el php.ini", 
               2 => "El tamaño del fichero supera la directiva 
                   MAX_FILE_SIZE especificada en el formulario HTML", 
               3 => "El fichero fue parcialmente subido", 
               4 => "No se ha subido un fichero", 
               6 => "No existe un directorio temporal", 
               7 => "Fallo al escribir el fichero al disco", 
               8 => "La subida del fichero fue detenida por la extensión"); 
 
 if($_FILES["foto"]["error"] > 0) 
 { 
   echo "Error: " . $msgError[$_FILES["foto"]["error"]] . "<br />"; 
 } 
 else 
 { 
  /* echo "Nombre original: " . $_FILES["foto"]["name"] . "<br />"; 
   echo "Tipo: " . $_FILES["foto"]["type"] . "<br />"; 
   echo "Tamaño: " . ceil($_FILES["foto"]["size"] / 1024) . " Kb<br />"; 
   echo "Nombre temporal: " . $_FILES["foto"]["tmp_name"] . "<br />"; 
   echo "./fotos/" . $archivo_foto . "<br />";
   echo pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION) . "<br />";*/


   if(file_exists("./fotos/" . $archivo_foto))
   { 
    //echo $_FILES["foto"]["name"] . " ya existe (ya no deberia salir?)"; 
   } 
   else 
   { 
   	if(!($res=$mysqli->query($insert))){
		echo "Error al ejecutar la sentencia";
	}
    move_uploaded_file($_FILES["foto"]["tmp_name"], 
                  "./fotos/" . $archivo_foto); 
   } 
 }


		//header('Location: menu_usuario.php');
?>