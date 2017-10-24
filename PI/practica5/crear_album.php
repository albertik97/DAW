<?php  
	$title = "Crear álbum - Pictures & images";
	require_once('plantillas/cabecera.inc');
	require_once('plantillas/logotipo.inc');
	require_once('plantillas/nav_usuario_identificado.inc');
?>

		<main>
				<h1 id="titulo_crear_album">Formulario de creación de álbum</h1>
			<form method="GET" action="resultado_busqueda.php">
				<p><label for="tituloAlbum">Título del álbum</label><input type="text" name="tituloAlbum" id="tituloAlbum" placeholder="Ej: Navidades 2016" autofocus required></p>
				<p><label for="textoDescripcion">Descripción del álbum</label><textarea rows="4" cols="50" name="textoDescripcion" id="textoDescripcion" placeholder="una descripción sobre la temática del álbum" maxlength="4000" ></textarea></p>
				<p><label for="fechaAlbum">Fecha de las fotos</label><input type="date" name="fechaAlbum" id="fechaAlbum" ></p>
				<p><label for="paisAlbum">Pais donde se hicieron</label><input type="text" name="paisAlbum" id="paisAlbum" placeholder="Ej: España"></p>
				<p><input id="boton_crear" type="submit" value="Crear álbum"></p>
			</form>
		</main>
		<p id="copy">Todos los derechos reservados© 2017</p>
	</body>
</html>