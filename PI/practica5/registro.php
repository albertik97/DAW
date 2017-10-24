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
		<h1 id="titulo_registro">Formulario de registro</h1>
		<p id="obligatorio">IMPORTANTE: Todos los campos de este formulario son obligatorios.</p>
		<form method="POST" action="nuevo_usuario.php">
			<p><label for="usuario">Nombre de usuario :</label>
				<input type="text" name="usuario" id="usuario" required autofocus>
			</p>
			<p><label for="pass">Contraseña :</label>
				<input type="password" name="pass" id="pass" required>
			</p>
			<p><label for="pass2">Repetir contraseña :</label>
				<input type="password" name="pass2" id="pass2" required>
			</p>
			<p><label for="mail">Email :</label>
				<input type="email" name="mail" id="mail" required>
			</p>
				<fieldset>
				<legend>Sexo :</legend>
					<p><label><input type="radio" name="sexo" value="Hombre" checked> Hombre </label></p>
					<p><label><input type="radio" name="sexo" value="Mujer"> Mujer </label></p>
					<p><label><input type="radio" name="sexo" value="Otro"> Otro </label></p>
				</fieldset>
			<p>
				<label for="nacimiento">Fecha de nacimiento :</label>
				<input type="date" name="nacimiento" id="nacimiento" required>
			</p>
			<p>
				<label for="ciudad">Ciudad :</label>
				<input type="text" name="ciudad" id="ciudad" required>
			</p>
			<p>
				<label for="pais">Pais de residencia :</label>
				<input type="text" name="pais" id="pais" required>
			</p>
			<p>
				<label for="foto">Foto de perfil :</label>
				<input type="file" name="foto" id="foto" required>
			</p>
			<p>
				<input id="boton_registro" type="submit" value="Registrar">
			</p>
		</form>
	</main>
	<p id="copy">Todos los derechos reservados© 2017</p>
</body>
</html>