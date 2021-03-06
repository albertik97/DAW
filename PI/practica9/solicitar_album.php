<?php 
	session_start();
	require_once('validar.php');
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	require_once("plantillas/conexion.php");
	require_once('plantillas/datos_paises.php');
	if(isset($_SESSION['user']))
	{
			require_once('plantillas/nav_usuario_identificado.php');
			require_once("plantillas/conexion.php");
			$usuario = $_SESSION['user'];
			$consulta = 'select * from albumes,usuarios where NomUsuario="'. $usuario. '" AND IdUsuario=Usuario';
			if(!($res=$mysqli->query($consulta))){
				echo "Error al realizar la consulta " . $mysqli->error;
			}
?>
	<main id="solbum">
		<h1 id="titulo_solicitar_album">Solicitar álbum</h1>
			<p id="instrucciones">En esta sección de la web podrás rellenar los datos necesarios (Información de contacto, detalles del álbum y de envio) para recibir en tu casa tus álbumes de PI - Pictures & Images. Puedes consultar las diferentes tarifas al final de la página.</p>
			<form method="POST" action="resultado_album.php">
				<fieldset>
					<legend><h3>Información de contacto</h3></legend>

						<p><label for="nombreUsuario">Nombre (*)</label><input type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Ej. Alejandro (max. 200 carácteres)" maxlength="200" size="40" autofocus required=""></p>
						<p><label for="email">Email (*)</label><input type="email" name="email" id="email" placeholder="Ej. email@gmail.com (max. 200 carácteres)" maxlength="200" size="40" required=""></p>
						<p><label for="telefono">Teléfono (*)</label><input type="tel" name="telefono" id="telefono" placeholder="Teléfono de contacto (9 dígitos)" maxlength="9" size="40"></p>
				</fieldset>
				<fieldset>
					<legend><h3>Detalles del álbum</h3></legend>
						<p><label for="tituloAlbum">Título (*)</label><input type="text" name="tituloAlbum" id="tituloAlbum" placeholder="Ej. Vacaciones (max. 200 carácteres)" maxlength="200" size="40" required="">
						</p>
						<p><label for="albumUsuario">Álbum de PI (*)</label>
							<select id="albumUsuario" name="albumUsuario" required="">
								<?php
									while($fila=$res->fetch_assoc()){
										echo '<option value="' . $fila['Titulo'] . '">' . $fila['Titulo'] . '</option>';
									}
								?>								
							</select>
						 </p>
						<p><label for="textoAdicional">Texto adicional</label><textarea rows="4" cols="50" name="textoAdicional" id="textoAdicional" placeholder="dedicatoria, descripcion, etc. (max. 4000 carácteres)" maxlength="4000" ></textarea></p>
						<p><label for="colorPortada">Color de portada</label><input type="color" name="colorPortada" id="colorPortada" ></p>
						<p><label for="numeroCopias">Copias: </label><input type="number" name="numeroCopias" id="numeroCopias" min="1" max="100" value="1"></p>
						<p><label for="resolucion">Resolución de impresión</label>
							<select id="resolucion" name="resolucion"> 
								<option value="150">150 dpi</option>
							  	<option value="300">300 dpi</option>
							 	<option value="450">450 dpi</option>
							 	<option value="600">600 dpi</option>
							 	<option value="750">750 dpi</option>
							 	<option value="900">900 dpi</option>
							</select>
						</p>
						<fieldset id="tipo_impresion">
							<legend>Tipo de impresión</legend>
							<p><label><input type="radio" name="tipoImpresion" id="ImpresionColor" value="Color">Color</label></p> 
							<p><label><input type="radio" name="tipoImpresion" id="ImpresionBlancoNegro" value="Blanco/Negro" checked="">Blanco/Negro</label></p>
						</fieldset>
					</fieldset>
					<fieldset>
					<legend><h3>Detalles de envio (*)</h3></legend>
						<p>
							<label for="calle">Calle</label><input type="text" name="calle" id="calle" placeholder="calle, avenida, etc. (max. 200 carácteres)" maxlength="200" size="40" required=""> 
							<label for="numeroCalle">Número</label><input type="number" name="numeroCalle" id="numeroCalle" placeholder="Nº calle" min="1" max="1000" required="">
							<label for="numeroPiso">Piso</label><input type="number" name="numeroPiso" id="numeroPiso" placeholder="Nº piso" min="0" max="100" required="">
							<label for="numeroPuerta">Puerta</label><input type="text" name="numeroPuerta" id="numeroPuerta" placeholder="Ej. 1,2,3, A,B,C..." maxlength="3" required="">
						</p>
						<p>
							<label for="codigoPostal">Código postal: </label><input type="text" name="codigoPostal" id="codigoPostal" placeholder="Ej. 03698" maxlength="5" size="10" required="">
							<label for="localidad">Localidad: </label>
								<input type="text" name="localidad" required>
								<label for="provincia">Provincia</label>
								<input type="text" name="provincia" required>
								<label for="pais">Pais</label>
								<select id="pais" name="pais" required=""> 
									<?php
										while($linea=$res_paises->fetch_assoc()){
											echo "<option value=".$linea['NomPais'].">".$linea['NomPais']."</option>";
										}
									?>
								</select>
						</p>
						<p><label for="fechaRececpcion">Fecha de recepción (dd/mm/aaaa)</label><input type="date" name="fechaRecepcion" id="fechaRececpcion" size="15" required></p>
					</fieldset>

					<h3>Tarifas</h3>
				 	<table>
						  <tr>
						    <th>Concepto</th>
						    <th id="fila_tarifas">Tarifa</th>
						  </tr>
						  <tr>
						  	<td> menos de 5 páginas</td>
						  	<td>0.10 € por pág.</td>
						  </tr>
						  <tr>
						  	<td>entre 5 y 10 páginas</td>
						  	<td>0.08 € por pág.</td>
						  </tr>
						  <tr>
						  	<td>más de 10 páginas</td>

						  	<td>0.07 € por pág.</td>
						  </tr>
						  <tr>
						  	<td>Blanco y negro</td>
						  	<td>0 €</td>
						  </tr>
						  <tr>
						  	<td>Color</td>
						  	<td>0.05 € por foto</td>
						  </tr>
						  <tr>
						  	<td>Resolución > 300 dpi</td>
						  	<td>0.02 € por foto</td>
						  </tr> 
					</table>
				<p><input id="boton_solicitar_album" type="submit" value="Enviar"></p>
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
