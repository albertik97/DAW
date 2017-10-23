<!DOCTYPE html> 
<html lang="es"> 
	<head> 
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<title>PI - Pictures & images</title>
		<link rel="stylesheet" type="text/css" href="css/general.css" media="screen" title="Estilo predeterminado">
		<link href="css/imprimible.css" rel="stylesheet" type="text/css" media="print">
		<link href="css/accesible.css" rel="alternate stylesheet" type="text/css" media="screen" title="Estilo accesible">
		<link rel="stylesheet" type="text/css" href="css/adaptable.css" media="screen">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	</head>
	<body>
		<header>
			<a href="index.html"><img id="logo" src="imagenes/logo_cabecera.png" alt="Logotipo PI" height="128" width="128">
			<p id="letras_logo"><span lang="en">Pictures & Images</span></p></a>
		</header>
		<nav>
			<ul>
				<li><a href="formulario_busqueda.html">Buscar</a></li>
				<li><a href="registro.html">Registrarse</a> </li>
				<li><a href="index.html">Iniciar sesion</a></li>
			</ul>
		</nav>
		<main>
				<h1 id="titulo_busqueda">Formulario de búsqueda</h1>
			<form method="GET" action="resultado_busqueda.php">
				<p><label for="tituloFoto">Título</label><input type="text" name="tituloFoto" id="tituloFoto" placeholder="Título" autofocus required></p>
				<p><label for="fechaInicial">Fecha inicial </label><input type="date" name="fechaInicial" id="fechaInicial"></p>
				<p><label for="fechaFinal"> Fecha final </label><input type="date" name="fechaFinal" id="fechaFinal" ></p>
				<p><label for="pais">Pais: </label><input type="text" name="pais" id="pais" placeholder="Pais"></p>
				<p><input id="boton_buscar" type="submit" value="Buscar"></p>
			</form>
		</main>
		<p id="copy">Todos los derechos reservados© 2017</p>
	</body> 
</html>
