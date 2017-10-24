<!DOCTYPE html> 
<html lang="es"> 	 
	<head> 
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<title>PI - Pictures & images</title>
		<link href="css/estilo_index.css" rel="stylesheet" type="text/css" media="screen" title="Estilo predeterminado">
		<link href="css/adaptable_index.css" rel="stylesheet" type="text/css" media="screen">
		<link href="css/accesible_index.css" rel="alternate stylesheet" type="text/css" media="screen" title="Estilo accesible">
		<link href="css/imprimible.css" rel="stylesheet" type="text/css" media="print">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	</head>
	<body> 
		<header>
			<h1><a href="index.php" tabindex="-1"><img src="imagenes/pi.png" id="logo" alt="Logotipo PI" height="128" width="128"></a></h1>
		</header>
		<main>
			<div id="contenedor_principal">
				<section id="login">
					<h2>Iniciar Sesión</h2>
					<form method="POST" action="control_usuarios.php">
						<label for="userName">Usuario</label>
						<input type="text" name="userName" id="userName" placeholder="Introduce tu usuario" required>
						<label for="Password">Contraseña</label>
						<input type="password" name="Password" id="Password" placeholder="Introduce tu contraseña" required>
						<span id="error_sesion"><?php
								if(isset($_GET['error'])==true && $_GET['error']=='si'){
									echo "Usuario y/o contraseña incorrectos";
								}
						 ?>
						</span>
						<input type="submit" value="Iniciar sesión">
						<p><a href="registro.php">Registrarse</a></p>
					</form>
					
				</section>
			</div>
			<section id="UltimasFotos">
				<h2>Últimas fotos subidas - <a href="formulario_busqueda.php">Buscar más</a></h2>
				<hr>				
				<a href="detalles_foto.php?id=1" ><img src="imagenes/chocu.jpg" alt="Imagen1" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=2" ><img src="imagenes/ejemplo_imagen.jpg" alt="Imagen2" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=3" ><img src="imagenes/chocu.jpg" alt="Imagen3" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=4" ><img src="imagenes/ejemplo_imagen.jpg" alt="Imagen4" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=5" ><img src="imagenes/chocu.jpg" alt="Imagen5" height="164" width="164" ></a>
			</section>
		</main>
	</body> 
</html>