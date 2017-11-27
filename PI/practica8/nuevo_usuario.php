<?php
	require_once('validar.php');
	$title = "Registro - PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	session_start();
	$mysqli = @new mysqli('localhost','web_user','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}
?>
	<main>
		<!--Gestion de la peticion -->
		<?php
			
		require_once('insert_usuario.php');

			/*$mail = $_POST['mail'];
			$sexo = $_POST['sexo'];
			$nacimiento = $_POST['nacimiento'];
			$ciudad = $_POST['ciudad'];
			$pais = $_POST['pais'];
			v*/


			/*$usuario = $_POST['usuario'];
			$mail = $_POST['mail'];
			$sexo = $_POST['sexo'];
			$nacimiento = $_POST['nacimiento'];
			$ciudad = $_POST['ciudad'];
			$pais = $_POST['pais'];
			$foto = $_POST['foto'];*/
		?>

		<h1 id="titulo_registro">Datos registrados</h1>
			<p><label for="usuario">Nombre de usuario :</label>
				<input type="text" name="usuario" id="usuario"  value="<?php echo $usuario; ?>" readonly>
			</p>
			<p><label for="mail">Email :</label>
				<input type="email" name="mail" id="mail"  value="<?php echo $email; ?>" readonly>
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
				<input type="text" name="pais" id="pais" value="<?php echo $_POST['pais']; ?>" readonly>
			</p>
			<a id="volver" href="index.php">Volver al Inicio</a>
	</main>
	<?php require_once('plantillas/footer.php');?>
</body>
</html>