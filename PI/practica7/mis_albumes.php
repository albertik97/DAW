<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');

$mysqli = @new mysqli('localhost','web_user','', 'pibd'); 
 $mysqli->set_charset('utf8');
 if($mysqli->connect_errno) { 
   echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error; 
   echo '</p>'; 
   exit; 
 }

 // Ejecuta una sentencia SQL 
 $sentencia = "SELECT DISTINCT albumes.* from albumes, usuarios where albumes.Usuario = (SELECT idUsuario from usuarios where NomUsuario = '" . $_SESSION['user'] . "')"; 
 if(!($resultado = $mysqli->query($sentencia))) { 
   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error; 
   echo '</p>';
   exit;
 } 

?>

<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Mis álbumes</h2></legend>
			<table>
				<th>Título</th>
				<th>Descripción</th>
				<th>Ver</th>

				<?php

				while($fila = $resultado->fetch_assoc()) { 
				   echo '<tr>'; 
				   echo '<td>' . $fila['Titulo'] . '</td>'; 
				   echo '<td>' . $fila['Descripcion'] . '</td>'; 
				   echo '<td><a class="botones_perfil" href="ver_album.php?AlbumId=' . $fila['IdAlbum'] .' "><img src="imagenes/exit.png" alt=""> Ver álbum</a></td>';
				   echo '</tr>'; 
 				}
				?>
			</table>
		</fieldset>
	</main>
	<?php require_once('plantillas/footer.php');?>


<?php
}
?>