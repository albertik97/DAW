<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	

	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
?>
	<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Mis datos</h2></legend>
			<p><img id="imagen_perfil" src="imagenes/chocu.jpg" alt="foto perfil" width="100" height="100"></p>
			<table>
				<tr>
					<td>Usuario</td> <td>el_chocu</td>
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
			<p><a href="res_mis_datos.php" id="edit_perfil" >Modificar</a></p>
		</fieldset>
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
	