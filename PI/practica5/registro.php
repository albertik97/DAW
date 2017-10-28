<?php
	$title = "Registro - PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
?>
	<main>
		<h1 id="titulo_registro">Formulario de registro</h1>
		<p id="obligatorio">IMPORTANTE: Todos los campos de este formulario son obligatorios.</p>
		<form method="POST" action="nuevo_usuario.php"> <!-- valor del action provisional para que no de error en la validacion del código -->
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
<<<<<<< HEAD
	<p id="copy">Todos los derechos reservados© 2017</p>
=======
	require_once('plantillas/footer.php');
>>>>>>> 4709f6ca3c09111f14b307f841fbdadafbd3817a
</body>
</html>