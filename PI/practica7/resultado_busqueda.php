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
?>

	<form id="formulario_busqueda" method="GET" action=""> <!-- Como no esta la pagina php ponemos esta en action -->
			<input type="search" name="busqueda" id="barra_busqueda" placeholder="Fotos divertidas, paisaje , playa ..." size="40">
			<input id="boton_barra_busqueda" type="submit" value="Buscar">			
	</form>
	<section>
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


			$mysqli = @new mysqli('localhost', 'root', '', 'pibd');
			$mysqli->set_charset('utf8');
 
		 if($mysqli->connect_errno) { 
		   echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error; 
		   echo '</p>'; 
		   exit; 
		 }


		 $sentencia = "SELECT fotos.*, NomPais FROM fotos, paises where fotos.Pais = paises.IdPais and Titulo = '" . $titulo . "' and paises.NomPais = '" . $pais ."'";

		 if($_GET['fechaInicial'] != "")
		 	$sentencia .= "and Fecha >= '" . $fecha1 . "'";
		 if($_GET['fechaFinal'] != "")
		 	$sentencia .= "and Fecha <= '" . $fecha2 . "'";
		 /*if($_GET['pais'] != "")
		 	$sentencia .= "and Pais = (select IdPais from paises where NomPais = '". $pais ."')";*/
		 
		 	//echo $sentencia;

		 if(!($resultado = $mysqli->query($sentencia))) { 
		   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error; 
		   echo '</p>';
		   exit;
		 } 

		?>

		<h3 id="texto_resultado">Resultado de búsqueda de "<?php echo $titulo?>"</h3>
		<p class ="imprimir">Entre 01/02/2005 y 01/02/2017 , España</p>

		<?php

		while($fila = $resultado->fetch_assoc()) { 
			echo '<article>';
			echo '<figure>';
			echo '<a href="detalles_foto.php?id=' . $fila['IdFoto'] . '"><img src="fotos/' . $fila['Fichero'] . '" alt="' . $fila['Descripcion'] . '" width="400" height="290"></a>';
			echo '<figcaption>' . $fila['Titulo'] . '</figcaption>';
			echo '</figure>';
			echo '<p><span>Fecha :</span> ' . $fila['Fecha'] . '</p>';
			echo '<p><span>País :</span>' . $fila['NomPais'] .'</p>';
			echo '</article>';

		}

		?>
		
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
		<?php require_once('plantillas/footer.php');?>
		<p><button class="pasar" value="Anterior">Anterior</button><span class="cantidad">Página 1 de 3</span><button class="pasar" value="Anterior">Siguiente</button></p>
	</footer>
	
</body>
</html>