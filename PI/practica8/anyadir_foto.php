<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	


	$mysqli = @new mysqli('localhost','web_user','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}

	require_once('plantillas/datos_paises.php');



	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');

		$albumes_usuario = "SELECT DISTINCT albumes.* from albumes, usuarios where albumes.Usuario = ". $_SESSION['id'] .";";
		
		if(!($res_albumes=$mysqli->query($albumes_usuario))){
			echo "Error al ejecutar la sentencia";
		}
?>


		<main>
				<h1 id="titulo_busqueda">Añadir foto</h1>
			<form method="POST" action="insert_foto.php">
				<p><label for="tituloFoto">Título</label><input type="text" name="tituloFoto" id="tituloFoto" placeholder="Título" autofocus required></p>
				<p><label for="fechaFoto">Fecha</label><input type="date" name="fechaFoto" id="fechaFoto" required></p>
				<p><label for="pais">Pais</label>
				<select name="pais" id="pais">
				<?php
					while($fila=$res_paises->fetch_assoc()){
						echo "<option value='" . $fila['NomPais'] . "'>" . $fila['NomPais'] . "</option>";
					}
				?>
				<select name="pais" id="pais">
				</select></p>
				<p><label for="albumes">Álbumes </label>
				<select name="albumes" id="albumes">
				<?php
					while($fila_albumes=$res_albumes->fetch_assoc()){
						echo "<option value='" . $fila_albumes['Titulo'] . "'>" . $fila_albumes['Titulo'] . "</option>";
					}
				?>
				</select></p>
				<p>
					<label for="foto">Archivo de la foto</label>
					<input type="file" name="foto" id="foto" required>
				</p>
				<p><input id="boton_buscar" type="submit" value="Subir foto"></p>
			</form>
		</main>
		<?php require_once('plantillas/footer.php');
		//$res->close();
		$mysqli->close();

		?>
<?php
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}
?>