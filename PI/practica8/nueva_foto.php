<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	require_once("plantillas/conexion.php");

	require_once('plantillas/datos_paises.php');


	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
		require_once("insert_foto.php");

?>

		<main>
				<h1 id="titulo_busqueda">Nueva foto añadida</h1>
				<p><label for="tituloFoto">Título</label><input type="text" name="tituloFoto" id="tituloFoto" placeholder="Título" value="<?php echo $titulo_foto ?>" readonly></p>
				<p><label for="fechaFoto">Fecha</label><input type="date" name="fechaFoto" id="fechaFoto" value="<?php echo $fecha_foto ?>" readonly></p>
				<p><label for="pais">Pais</label><input type="text" name="pais" id="pais" value="<?php echo $_POST['pais'] ?>" readonly></p>
				<p><label for="albumes">Álbumes</label><input type="text" name="albumes" id="albumes" value="<?php echo $_POST['albumes'] ?>" readonly></p>
				<a id="volver" href="menu_usuario.php">Volver al Inicio</a>
		</main>

<?php
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}
?>