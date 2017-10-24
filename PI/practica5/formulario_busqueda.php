<?php
	$title = "PI - Pictures & images";
	require_once('plantillas/cabecera.inc');
	require_once('plantillas/logotipo.inc');
	require_once('plantillas/nav_usuario_no_identificado.inc');
?>
		<main>
				<h1 id="titulo_busqueda">Formulario de búsqueda</h1>
			<form method="GET" action="resultado_busqueda.php">
				<p><label for="tituloFoto">Título</label><input type="text" name="tituloFoto" id="tituloFoto" placeholder="Título" autofocus required></p>
				<p><label for="fechaInicial">Fecha inicial </label><input type="date" name="fechaInicial" id="fechaInicial"></p>
				<p><label for="fechaFinal"> Fecha final </label><input type="date" name="fechaFinal" id="fechaFinal" ></p>
				<p><label for="pais">Pais: </label><input type="text" name="pais" id="pais" placeholder="Pais"></p>
				<p><input id="boton_buscar" type="submit" value="Buscar"></p>
			</form>
		</main>
		<p id="copy">Todos los derechos reservados© 2017</p>
	</body>
</html>
