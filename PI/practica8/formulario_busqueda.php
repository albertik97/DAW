<?php
	session_start();
	require_once('validar.php');
	$title = "PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	if(isset($_COOKIE['user']) || isset($_SESSION['user']))
		require_once('plantillas/nav_usuario_identificado.php');
	else
		require_once('plantillas/nav_usuario_no_identificado.php');

$mysqli = @new mysqli('localhost','web_user','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}

		$consulta_paises = 'select * from paises';

		if(!($res_paises=$mysqli->query($consulta_paises))){
			echo "Error al ejecutar la sentencia";
		}

		
?>
		<main>
				<h1 id="titulo_busqueda">Formulario de búsqueda</h1>
			<form method="GET" action="resultado_busqueda.php">
				<p><label for="tituloFoto">Título</label><input type="text" name="tituloFoto" id="tituloFoto" placeholder="Título" autofocus></p>
				<p><label for="fechaInicial">Fecha inicial </label><input type="date" name="fechaInicial" id="fechaInicial"></p>
				<p><label for="fechaFinal"> Fecha final </label><input type="date" name="fechaFinal" id="fechaFinal" ></p>
				<p><label for="pais">Pais: </label>
				<select name="pais" id="pais">
					<option value="Seleccionar">Seleccionar País</option>
				<?php
					while($fila=$res_paises->fetch_assoc()){
						echo "<option value='" . $fila['NomPais'] . "'>" . $fila['NomPais'] . "</option>";
					}
				?>
				</select></p>
				<p><input id="boton_buscar" type="submit" value="Buscar"></p>
			</form>
		</main>
		<?php require_once('plantillas/footer.php');
		//$res->close();
		$mysqli->close();

		?>

	</body>
</html>
