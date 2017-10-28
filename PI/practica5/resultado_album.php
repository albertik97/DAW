<?php  
	$title = "Menú usuario - Pictures & images";
	include_once('plantillas/cabecera.php');
	include_once('plantillas/logotipo.php');
	include_once('plantillas/nav_usuario_identificado.php');
?>
	<main  class="resultado_album">
		<h1>Resumen del pedido</h1>
		<!--Tratamiento de la solicitud -->
		<?php
			$nombre = $_POST['nombreUsuario'];
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];
			$titulo = $_POST['tituloAlbum'];
			$album = $_POST['albumUsuario'];
			if(isset($_POST['textoAdicional'])){
				$texto_add = $_POST['textoAdicional'];
			}
			$color =  $_POST['colorPortada'];
			$copias =  $_POST['numeroCopias'];
			$resolucion = $_POST['resolucion'];
			$tipo_impresion = $_POST['tipoImpresion'];
			$calle = $_POST['calle'];
			$numero = $_POST['numeroCalle'];
			$piso = $_POST['numeroPiso'];
			$puerta = $_POST['numeroPuerta'];
			$postal = $_POST['codigoPostal'];
			$localidad = $_POST['localidad'];
			$provincia = $_POST['provincia'];
			$pais = $_POST['pais'];
			$recepcion = $_POST['fechaRecepcion'];

			//calculamos costes
			$paginas=3;
			$fotos=7;
				if($paginas<5){
					$total=$paginas*0.10;
				}else if($paginas>=5 && $paginas<=10){
					$total=$paginas*0.08;
				}else{
					$total=$paginas*0.07;
				}
			if($tipo_impresion=="Color"){
				$total =$total + $fotos*0.05;
			}

			if($resolucion>300){
				$total = $total + $fotos*0.02;
			}
				$total =$total*$copias;
		?>
			<h3>Datos de solicitud</h3>
			<fieldset class="resultado_album">
				<legend><h3>Información de contacto</h3></legend>
					<p><label for="nombre">Nombre : </label><input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" readonly></p>
					<p><label for="correo">Correo: </label><input type="text" name="correo" id="correo" value="<?php echo $email;?>" readonly></p>
					<p><label for="telefono">Teléfono: </label><input type="text" name="telefono" id="telefono" value="<?php echo $telefono;?>" readonly></p>
			</fieldset>
			<fieldset>
				<legend><h3>Detalles de álbum</h3></legend>
					<p><label for="titulo_album">Título del álbum : </label><input type="text" name="titulo_album" id="titulo_album" value="<?php echo $titulo;?>" readonly></p>
					<p><label for="album">Álbum : </label><input type="text" name="album" id="album" value="<?php echo $album;?>" readonly></p> 
					<p><label for="texto">Texto adicional : </label> <textarea rows="4" cols="50" id="texto" readonly><?php echo $texto_add;?></textarea></p>
					<p class="peque"><label for="color">Color : </label><input type="color" name="color" value="<?php echo $color;?>" id="color" readonly></p>
					<p class="peque"><label for="copias">Número de copias : </label><input type="text" name="copias" id="copias" value="<?php echo $copias;?>" readonly size="3"></p>
					<p class="peque"><label for="resolucion"> Resolución: </label><input type="text" name="resolucion" id="resolucion" value="<?php echo $resolucion;?>dpi" readonly size="3"></p>
					<p class="peque"><label for="tipo_impresion">Tipo de impresión : </label><input type="text" name="tipo_impresion"  id="tipo_impresion" value="<?php echo $tipo_impresion;?>" readonly></p>
			</fieldset>
			<fieldset>
				<legend><h3>Detalles de envio</h3></legend>
					<p class="peque"><label for="calle">Calle: </label><input type="text" name="calle" id="calle" value="<?php echo $calle;?>" readonly></p>
					<p class="peque"><label for="numero"> Número: </label><input type="text" name="numero" id="numero" value="<?php echo $numero;?>" readonly size="3"></p>
					<p class="peque"><label for="piso">Piso: </label><input type="text" name="piso" id="piso" value="<?php echo $piso;?>" readonly size="3"></p>
					<p class="peque"><label for="puerta">Puerta: </label><input type="text" name="puerta" id="puerta" value="<?php echo $puerta;?>" readonly size="3"></p>
					 <label for="localidad">Localidad: </label><input type="text" name="localidad" id="localidad" value="<?php echo $localidad;?>" readonly>
					 <p class="peque"><label for="cp">Código postal: </label><input type="text" name="cp" id="cp" value="<?php echo $postal;?>" readonly size="4"></p>
					<p class="peque"> <label for="provincia">Provincia: </label><input type="text" name="provincia" id="provincia" value="<?php echo $provincia;?>" readonly></p>
				 <p class="peque">	<label for="pais">País: </label><input type="text" name="pais" id="pais" value="<?php echo $pais;?>" readonly></p>
				<p class="peque"><label for="recepcion">Fecha de recepción: </label><input type="text" name="recepcion" id="recepcion" value="<?php echo $recepcion;?>" readonly></p>
			</fieldset>
			<h2><span id="precio_total">Coste total:</span><?php echo $total;?>€</h2>
			<a id="volver" href="menu_usuario.php">Volver a mi perfil</a>
	</main>
<?php include_once('plantillas/pie_pagina.php'); ?>