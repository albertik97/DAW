<?php
	require_once('validar.php');
	require_once("plantillas/conexion.php");



	// variables para la insercion que hay que validar
	$usuario;
	$contrasenya;
	$email;
	$sexo;
	$nacimiento;



	// consulta de los nombre de usuarios de la base de datos para la validacion del nuevo nombre
	$nombre_usuarios = "select usuarios.NomUsuario from usuarios;";
	if(!($res_usuarios=$mysqli->query($nombre_usuarios)))
	{
		echo "Error al realizar la consulta de los nombres de usuarios existentes";
	}

	// Validacion del nombre de usuario
	if(isset($_POST['usuario']) && preg_match('/^[A-Za-z\d]{3,15}$/', $_POST['usuario'])) // Comprobamos su tamaño, los caracteres que debe contener y luego si se encuentra en la base de datos
	{
		while($fila=$res_usuarios->fetch_assoc())
			{
				if($fila['NomUsuario'] == $_POST['usuario'])
				{
					header('Location: registro.php?error=1');
					exit();
				}
			}
			$usuario = $_POST['usuario'];
	}
	else
	{
		header('Location: registro.php?error=1');
		exit();
	}

	// Validacion de la contraseña del usuario
	if(isset($_POST['pass']) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z_\d]{6,15}$/', $_POST['pass'])) // Comprobamos tamaño, caracteres que debe contener y si contiene 1 mayusc, minusc
	{																											   // y numero
		$contrasenya = $_POST['pass'];
	}
	else
	{
		header('Location: registro.php?error=2');
		exit();
	}

	// Validacion de la repeticion de la contraseña
	if( !isset($_POST['pass2']) || $contrasenya != $_POST['pass2'])
	{
		header('Location: registro.php?error=3');
		exit();
	}

	// Validacion del email del usuario
	if(isset($_POST['mail']) && $_POST['mail'] != "")  // Se comprueba que se ha pasado un email y que este no está vacio
	{
		if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z\d._]+(@[a-zA-Z\d.-]{2,4})+(\.[a-zA-Z.]{2,4})$/', $_POST['mail']))
		{
			$email = $_POST['mail'];
		}
		else
		{
			header('Location: registro.php?error=4');
			exit();
		}
	}
	else
	{
		header('Location: registro.php?error=4');
		exit();
	}

	// Validacion del sexo
	if(!isset($_POST['sexo']) || $_POST['sexo'] == "" || !preg_match('/^(Hombre|Mujer|Otro)$/', $_POST['sexo']))
	{
		header('Location: registro.php');
		exit();
	}
	else
	{
		if($_POST['sexo'] == "Hombre")
			$sexo = 0;
		if($_POST['sexo'] == "Mujer")
			$sexo = 1;
		if($_POST['sexo'] == "Otro")
			$sexo = 2;
	}

	// Validacion de la fecha de nacimiento
	date_default_timezone_set(date_default_timezone_get());
	$date = date('Y/m/d', time());

	$d = getdate(strtotime($_POST['nacimiento']))['mday'];
	$m = getdate(strtotime($_POST['nacimiento']))['mon'];
	$y = getdate(strtotime($_POST['nacimiento']))['year'];
	//echo $date;
	if(isset($_POST['nacimiento']) && checkdate($m, $d, $y) && $_POST['nacimiento'] <= $date)
	{
		$nacimiento = $_POST['nacimiento'];
	}
	else
	{
		header('Location: registro.php?error=5');
		exit();
	}

	// Obtenemos el id del pais introducido
	
	if(isset($_POST['ciudad']))
		$ciudad = $_POST['ciudad'];
	else
	{
		header('Location: registro.php');
		exit();
	}

	$pais = "select IdPais from paises where NomPais = '" . $_POST['pais'] . "';";
	if(!($pais_foto=$mysqli->query($pais)))
	{
		echo "Error al ejecutar la consulta de los datos de los paises<br>";
	}
	$res1 = $pais_foto->fetch_assoc();

	// configuramos la foto de perfil a subir

	if($_FILES["foto"]["name"] == "")
		$foto = "defecto.jpg";
	else
		$foto = $_FILES['foto']['name'];

	//subida de la imagen
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
 
 	$cont =1;
 if($_FILES["foto"]["error"] > 0) 
 { 
   echo "Error: " . $msgError[$_FILES["foto"]["error"]] . "<br />"; 
 } 
 else 
 {  
   if(file_exists("./fotos/" . $_FILES["foto"]["name"])) 
   { 
   	while(file_exists("./fotos/" . $cont . "_" . $_FILES["foto"]["name"])){

   		$cont++;
   	}
 	  //	rename($_FILES["foto"]["name"],  $cont . $_FILES["foto"]["name"]); 
   	 move_uploaded_file($_FILES["foto"]["tmp_name"],"./fotos/" . $cont . "_" . $_FILES["foto"]["name"]);
   	 $sube=$cont . "_" . $_FILES["foto"]["name"];
   } 
   else 
   { 
   		move_uploaded_file($_FILES["foto"]["tmp_name"],"./fotos/" . $_FILES["foto"]["name"]);
   		$sube= $_FILES["foto"]["name"];

   } 
 } 
	// creamos la insercion y la ejecutamos

	$insert = "INSERT INTO `usuarios`(`NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`)
			 VALUES ('".$usuario."', '".$contrasenya."', '".$email."', ".$sexo.", '".$nacimiento."', '".$ciudad."', ".$res1['IdPais'].", '". $sube. "', NOW())";
				 //echo $insert;

	if(!($res=$mysqli->query($insert)))
	{
		echo "Error al ejecutar la insercion del nuevo usuario<br>";
	}


	?>