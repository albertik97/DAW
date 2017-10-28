<?php
	$title = "Resultados de búsqueda - PI - Pictures & Images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	require_once('plantillas/nav_usuario_no_identificado.php');
?>

	<form id="formulario_busqueda" method="GET" action=""> <!-- Como no esta la pagina php ponemos esta en action -->
			<input type="search" name="busqueda" id="barra_busqueda" placeholder="Fotos divertidas, paisaje , playa ..." size="40">
			<input id="boton_barra_busqueda" type="submit" value="Buscar">			
	</form>
	<section>
		<!--tratamos la peticion-->
		<?php
			$array = getdate();
			if(isset($_GET['tituloFoto'])==true){
				$titulo = $_GET['tituloFoto'];
				$fecha1 = $_GET['fechaInicial'];
				$fecha2 = $_GET['fechaFinal'];
				$pais = $_GET['pais'];
				if($fecha1 ==""){
					$fecha1 = "Origen de los tiempos";
				}
				if($fecha2 ==""){
					$fecha2 = "$array[mday]/$array[mon]/$array[year]";
				}
				if($pais==""){
					$pais="Todo el mundo";
				}
			}else{
				$titulo =$_GET['busqueda'];
				$fecha1 = "Origen de los tiempos";
				$fecha2 = "$array[mday]/$array[mon]/$array[year]";
				$pais="Todo el mundo";
			}

		?>

		<h3 id="texto_resultado">Resultado de búsqueda de "<?php echo $titulo?>"</h3>
		<p class ="imprimir">Entre 01/02/2005 y 01/02/2017 , España</p>

		<article>
			<figure>
			<a href="detalles_foto.php?id=1"><img src="imagenes/delfin.jpg" alt="Descripcion de imagen" width="256" height="256"></a>
			<figcaption>Mis vacaiones</figcaption>
			</figure>
			<p><span>Fecha :</span> 02/04/2017</p>
			<p><span>País :</span> Alemania</p>
		</article>
		<article>
			<figure>
			<a href="detalles_foto.php?id=2"><img src="imagenes/playa.jpg" alt="Descripcion de imagen" width="256" height="256"></a>
			<figcaption>Viajando</figcaption>
			</figure>
			<p><span>Fecha :</span> 02/04/2017</p>
			<p><span>País :</span> España</p>
		</article>

		<article>
			<figure>
			<a href="detalles_foto.php?id=3"><img src="imagenes/delfin.jpg" alt="Descripcion de imagen" width="256" height="256"></a>
			<figcaption>Visita a Valencia</figcaption>
			</figure>
			<p><span>Fecha :</span> 02/04/2017</p>
			<p><span>País :</span> España</p>
		</article>

		<article>
			<figure>
			<a href="detalles_foto.php?id=4"><img src="imagenes/playa.jpg" alt="Descripcion de imagen" width="256" height="256"></a>
			<figcaption>Visita a Berlín</figcaption>
			</figure>
			<p><span>Fecha :</span> 20/04/2015</p>
			<p><span>País :</span> Alemania</p>
		</article>
	</section>
	<aside>
			<fieldset>
				<legend><h3>Filtros</h3></legend>
				<p class="titulo">Fecha:</p>
				<p><?php echo " Entre el $fecha1 y  el $fecha2"?></p>
				<p class="titulo">País :</p>
				<p><?php echo $pais;?></p>
			</fieldset>
	</aside>
	<footer>
<<<<<<< HEAD
		<p id="copy">Todos los derechos reservados© 2017</p>
=======
		<?php require_once('plantillas/footer.php');?>
>>>>>>> 4709f6ca3c09111f14b307f841fbdadafbd3817a
		<p><button class="pasar" value="Anterior">Anterior</button><span class="cantidad">Página 1 de 3</span><button class="pasar" value="Anterior">Siguiente</button></p>
	</footer>
	
</body>
</html>