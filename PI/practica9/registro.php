<?php
	require_once('validar.php');
	$title = "Registro - PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	require_once("plantillas/conexion.php");

	require_once('plantillas/datos_paises.php');

?>
	<main>
		<h1 id="titulo_registro">Formulario de registro</h1>
		<p id="obligatorio">IMPORTANTE: Todos los campos de este formulario son obligatorios.</p>
		<form method="POST" action="nuevo_usuario.php"> <!-- nuevo_usuario.php -->
			<p><label for="usuario">Nombre de usuario : <?php  if(isset($_GET['error']) && $_GET['error'] == 1) echo "<span id='error'>Usuario no válido</span>"?></label>
				<input type="text" name="usuario" id="usuario" required autofocus>
			</p>
			<p><label for="pass">Contraseña : <?php  if(isset($_GET['error']) && $_GET['error'] == 2) echo "<span id='error'>contraseña no válida</span>"?></label>
				<input type="password" name="pass" id="pass" required>
			</p>
			<p><label for="pass2">Repetir contraseña : <?php  if(isset($_GET['error']) && $_GET['error'] == 3) echo "<span id='error'>Las contraseñas no coinciden</span>"?></label>
				<input type="password" name="pass2" id="pass2" required>
			</p>
			<p><label for="mail">Email : <?php  if(isset($_GET['error']) && $_GET['error'] == 4) echo "<span id='error'>Email no válido</span>"?></label>
				<input type="email" name="mail" id="mail" required>
			</p>
				<fieldset>
				<legend>Sexo :</legend>
					<p><label><input type="radio" name="sexo" value="Hombre" checked> Hombre </label></p>
					<p><label><input type="radio" name="sexo" value="Mujer"> Mujer </label></p>
					<p><label><input type="radio" name="sexo" value="Otro"> Otro </label></p>
				</fieldset>
			<p>
				<label for="nacimiento">Fecha de nacimiento : <?php  if(isset($_GET['error']) && $_GET['error'] == 5) echo "<span id='error'>Fecha no válida</span>"?></label>
				<input type="date" name="nacimiento" id="nacimiento" required>
			</p>
			<p>
				<label for="ciudad">Ciudad : </label>
				<input type="text" name="ciudad" id="ciudad" required>
			</p>
			<p>
				<label for="pais">Pais de residencia :</label>
				
				<select name="pais" id="pais">
				<?php
					while($fila=$res_paises->fetch_assoc()){
						echo "<option value='" . $fila['NomPais'] . "'>" . $fila['NomPais'] . "</option>";
					}
				?>
				</select>
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
	<?php require_once('plantillas/footer.php'); ?>
</body>
</html>