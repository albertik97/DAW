<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	

	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
<<<<<<< HEAD

		$mysqli = @new mysqli('localhost','web_user','','pibd');
		if($mysqli->connect_errno){
			echo "Error al conectarse a la base de datos";
		}	

		$consulta= 'select * from usuarios where NomUsuario='. $_SESSION['user'];
		if(!($res=$mysqli->query($consulta))){
			echo "Error al realziar la consulta";
		}
		$usuario = $res->fetch_assoc();
=======
		if(isset($_GET['baja']) && $_GET['baja'] == true)
		{
			echo '<section id="confirmar_baja">';
			echo '<p>¿Estás seguro de querer darte de baja?</p>';
			echo '<p><a href="dar_baja.php?id='.$_SESSION['id'].'">Si</a> <a href="menu_usuario.php">No</a></p>';
			echo '</section>';
		}
>>>>>>> 54a10f0c1443555285dd7834ab0333f16cccc5eb
?>
	
	<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Mis datos</h2></legend>
			<p><img id="imagen_perfil" src="imagenes/chocu.jpg" alt="foto perfil" width="100" height="100"></p>
			<table>
				<tr>
					<td>Usuario</td> <td><?php?></td>
				</tr>

				<tr><td>Nombre :</td> <td>Chocu Martínez de la Selva</td>
				</tr>
				<tr><td>Sexo :</td><td>Hombre</td>
				</tr>
				<tr><td>Fecha de Nacimiento :</td> <td>12/04/1990</td>
				</tr>
				<tr><td>Pais de residencia : </td><td>Tailandia</td>
				</tr>
				<tr><td>Ciudad :</td> <td>Lopburi</td></tr>
			</table>
			<p><a href="mis_datos.php" id="edit_perfil" >Modificar datos</a></p>
		</fieldset>
		<hr>
<<<<<<< HEAD
		<a class="botones_perfil" href="dar_baja.php" ><img src="imagenes/delete.png" alt="">Darse de baja</a>
=======
		<a class="botones_perfil" href="menu_usuario.php?baja=true" ><img src="imagenes/delete.png" alt="">Darse de baja</a>
>>>>>>> 54a10f0c1443555285dd7834ab0333f16cccc5eb
		<a class="botones_perfil" href="crear_album.php" ><img src="imagenes/add.png" alt="">Crear álbum nuevo</a>
		<a class="botones_perfil" href="anyadir_foto.php" ><img src="imagenes/add.png" alt="">  Añadir foto a álbum</a>
		<a class="botones_perfil" href="mis_albumes.php" ><img src="imagenes/album.png" alt="">Mis álbumes</a>
		<a class="botones_perfil" href="solicitar_album.php" ><img src="imagenes/print.png" alt="">Solicitar álbum impresion</a>
		<a class="botones_perfil" href="cierra_sesion.php"><img src="imagenes/exit.png" alt="">Salir</a>
	</main>
	<?php require_once('plantillas/footer.php');?>
</body>
</html>
<?php
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}
?>
	