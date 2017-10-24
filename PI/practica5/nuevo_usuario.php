<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro - PI - Pictures & images</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/general.css" media="screen" title="Estilo predeterminado">
	<link href="css/imprimible.css" rel="stylesheet" type="text/css" media="print">
	<link href="css/accesible.css" rel="alternate stylesheet" type="text/css" media="screen" title="Estilo accesible">
	<link rel="stylesheet" type="text/css" href="css/adaptable.css" media="screen">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<header>
		<a href="index.php"><img id="logo" src="imagenes/logo_cabecera.png" alt="Logotipo PI" width="256" height="256">
		<p id="letras_logo"><span lang="en">Pictures & Images</span></p></a>
	</header>
	<main>
		<!--Gestion de la peticion -->
		<?php
			$usuario = $_POST['usuario'];
			$mail = $_POST['mail'];
			$sexo = $_POST['sexo'];
			$nacimiento = $_POST['nacimiento'];
			$ciudad = $_POST['ciudad'];
			$pais = $_POST['pais'];
			$foto = $_POST['foto'];
		?>

		<h1 id="titulo_registro">Datos registrados</h1>
			<p><label for="usuario">Nombre de usuario :</label>
				<input type="text" name="usuario" id="usuario"  value="<?php echo $usuario; ?>" readonly>
			</p>
			<p><label for="mail">Email :</label>
				<input type="email" name="mail" id="mail"  value="<?php echo $mail; ?>" readonly>
			</p>
				<p><label for="text">Sexo :</label>
				<input type="email" name="sexo" id="sexo" value="<?php echo $sexo; ?>" readonly>
			</p>
			<p>
				<label for="nacimiento">Fecha de nacimiento :</label>
				<input type="date" name="nacimiento" id="nacimiento"  value="<?php echo $nacimiento; ?>" readonly>
			</p>
			<p>
				<label for="ciudad">Ciudad :</label>
				<input type="text" name="ciudad" id="ciudad"  value="<?php echo $ciudad; ?>" readonly>
			</p>
			<p>
				<label for="pais">Pais de residencia :</label>
				<input type="text" name="pais" id="pais" value="<?php echo $pais; ?>" readonly>
			</p>
			<a id="volver" href="index.php">Volver al Inicio</a>
	</main>
	<p id="copy">Todos los derechos reservados© 2017</p>
</body>
</html>