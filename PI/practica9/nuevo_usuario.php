<?php
	session_start();
	require_once('validar.php');
	$title = "Registro - PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');


	require_once("plantillas/conexion.php");
?>
	<main>
		<!--Gestion de la peticion -->
		<?php
			
		require_once('insert_usuario.php');

		?>

		<h1 id="titulo_registro">Datos registrados</h1>
			<p><label for="usuario">Nombre de usuario :</label>
				<input type="text" name="usuario" id="usuario"  value="<?php echo $usuario; ?>" readonly>
			</p>
			<p><label for="mail">Email :</label>
				<input type="email" name="mail" id="mail"  value="<?php echo $email; ?>" readonly>
			</p>
				<p><label for="text">Sexo :</label>
				<input type="email" name="sexo" id="sexo" value="<?php echo $_POST['sexo']; ?>" readonly>
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