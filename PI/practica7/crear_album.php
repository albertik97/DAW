<?php 
	session_start();
	require_once('validar.php');
	$title = "Crear álbum - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	
	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
		$mysqli = @new mysqli('localhost','root','','pibd');
			$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "No se ha podido establecer conxión con la base de datos";
		}
		$consulta = 'select * from paises';
		if(!($res=$mysqli->query($consulta))){
			echo "Error al procesar la peticion";
		}
?>
				<main>
				<h1 id="titulo_crear_album">Formulario de creación de álbum</h1>
			<form method="GET" action="menu_usuario.php">
				<p><label for="tituloAlbum">Título del álbum</label><input type="text" name="tituloAlbum" id="tituloAlbum" placeholder="Ej: Navidades 2016" autofocus required></p>
				<p><label for="textoDescripcion">Descripción del álbum</label><textarea rows="4" cols="50" name="textoDescripcion" id="textoDescripcion" placeholder="una descripción sobre la temática del álbum" maxlength="4000" ></textarea></p>
				<p><label for="fechaAlbum">Fecha de las fotos</label><input type="date" name="fechaAlbum" id="fechaAlbum" ></p>
				<p><label for="paisAlbum">Pais donde se hicieron</label>

					<select name="paisAlbum" id="paisAlbum">
						<?php
							while($fila=$res->fetch_assoc()){
								echo "<option value=" . $fila[NomPais] . ">" . $fila[NomPais] . "</option>";
							}
						?>
					</select></p>
				<p><input id="boton_crear" type="submit" value="Crear álbum"></p>
			</form>
		</main>
		<?php require_once('plantillas/footer.php');?>
	</body>
</html>
<?php
	$res->close();
	$mysqli->close();
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}	
?>

