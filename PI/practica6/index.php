<?php
	session_start();
	$current_visit_date = date("d/m/y");
	$current_visit_hour = date("H:i:s");
	require_once('validar.php'); 
?>
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
					<?php
						if(isset($_SESSION['user'])){
								if(isset($_COOKIE['last_visit_date'])){
										$last_visit_date = $_COOKIE['last_visit_date'];
										$last_visit_hour = $_COOKIE['last_visit_hour'];
									echo "<span class=\"ultima_visita\">Hola, " . $_SESSION['user'] . " su última visita fue el " .$last_visit_date . " a las " . $last_visit_hour . "<br><a href=\"menu_usuario.php\">Acceder</a><br><a href=\"cierra_sesion.php\">Salir</a></span></span>";
								}else{
									echo "<span class=\"ultima_visita\">Hola, " . $_SESSION['user'] . " hoy es tu primera visita ;)<br><a href=\"menu_usuario.php\">Acceder</a><br><a href=\"cierra_sesion.php\">Salir</a></span>";
								}
								
								setcookie("last_visit_date",$current_visit_date,time()+60*60*24*30);
								setcookie("last_visit_hour",$current_visit_hour,time()+60*60*24*30);
						}else{
								echo '<h2>Iniciar Sesión</h2>';
								echo '<form method="POST" action="control_usuarios.php">';
								echo '<label for="userName">Usuario</label>';
								echo '<input type="text" name="userName" id="userName" placeholder="Introduce tu usuario" required>';
								echo '<label for="Password">Contraseña</label>';
								echo '<input type="password" name="Password" id="Password" placeholder="Introduce tu contraseña" required>';
								echo '<input type="checkbox" name="recordar" id="recordar" value="Recordar mis datos">Recordar mis datos';
								echo '<span id="error_sesion">';
										if(isset($_GET["error"])==true&&isset($_GET["error"])==true&&isset($_SESSION['reiniciar'])&&$_SESSION['reiniciar']==false){
											 echo "Usuario y/o contraseña incorrectos";
											 $_SESSION['reiniciar']=true;
										}
								
								echo '</span>';
								echo '<input type="submit" value="Iniciar sesión">';
								echo '<p><a href="registro.php">Registrarse</a></p>';
							echo '</form>';
						}
					?>
				</section>
			</div>
			<section id="UltimasFotos">
				<h2>Últimas fotos subidas - <a href="formulario_busqueda.php">Buscar más</a></h2>
				<hr>				
				<a href="detalles_foto.php?id=1" ><img src="imagenes/delfin.jpg" alt="Imagen1" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=2" ><img src="imagenes/playa.jpg" alt="Imagen2" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=3" ><img src="imagenes/delfin.jpg" alt="Imagen3" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=4" ><img src="imagenes/playa.jpg" alt="Imagen4" height="164" width="164" ></a>
				<a href="detalles_foto.php?id=5" ><img src="imagenes/delfin.jpg" alt="Imagen5" height="164" width="164" ></a>
			</section>
		</main>
	</body> 
</html>