<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	

	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
		require_once("plantillas/conexion.php");

		$consulta= 'select * from usuarios, paises where NomUsuario="'. $_SESSION['user'] .'" and Pais=IdPais';
		if(!($res=$mysqli->query($consulta))){
			echo "Error al realziar la consulta" . $mysqli->error;
		}
		$usuario = $res->fetch_assoc();
		$date = new DateTime($usuario['FNacimiento']);
		$fecha = $date->format('d-m-Y');

		if(isset($_GET['baja']) && $_GET['baja'] == true)
		{
			echo '<section id="confirmar_baja">';
			echo '<p>¿Estás seguro de querer darte de baja?</p>';
			echo '<p><a href="dar_baja.php?id='.$_SESSION['id'].'">Si</a> <a href="menu_usuario.php">No</a></p>';
			echo '</section>';
		}
?>
	
	<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Mis datos</h2></legend>
			<p><img id="imagen_perfil" src="imagenes/<?php echo $usuario['Foto'];?>" alt="foto perfil" width="100" height="100"></p>
			<table>
				<tr>
					<td>Usuario</td> <td><?php echo $usuario['NomUsuario'];?></td>
				</tr>
				<tr><td>Correo :</td> <td><?php echo $usuario['Email'];?></td>
				</tr>
				<tr><td>Sexo :</td><td><?php 
				if($usuario['Sexo']==0){
					echo "Hombre";
				}elseif($usuario['Sexo']==1){
					echo "Mujer";
				}else
					echo "Otro";
				?></td>
				</tr>
				<tr><td>Fecha de Nacimiento :</td> <td><?php echo $fecha;?></td>
				</tr>
				<tr><td>Pais de residencia : </td><td><?php echo $usuario['NomPais'];?></td>
				</tr>
				<tr><td>Ciudad :</td> <td><?php echo $usuario['Ciudad'];?></td></tr>
			</table>
			<p><a href="mis_datos.php" id="edit_perfil" >Modificar datos</a></p>
		</fieldset>
		<hr>

		<a class="botones_perfil" href="menu_usuario.php?baja=true" ><img src="imagenes/delete.png" alt="">Darse de baja</a>
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
	