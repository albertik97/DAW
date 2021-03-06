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

			}else{
				$titulo =$_GET['busqueda'];
				$fecha1 = "Origen de los tiempos";
				$fecha2 = "$array[mday]/$array[mon]/$array[year]";
				$pais="";
			}


			$mysqli = @new mysqli('localhost','web_user','', 'pibd');
			$mysqli->set_charset('utf8');
 
		 if($mysqli->connect_errno) { 
		   echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error; 
		   echo '</p>'; 
		   exit;
		 }


		 		if (isset($_GET["pagina"])) {

		//Si el GET de HTTP SÍ es una string / cadena, procede
		if (is_string($_GET["pagina"])) {

			//Si la string es numérica, define la variable 'pagina'
			 if (is_numeric($_GET["pagina"])) {

				 //Si la petición desde la paginación es la página uno
				 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
				 if ($_GET["pagina"] == 1) {
					 header("Location: index.php");
					 die();
				 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
					 $pagina = $_GET["pagina"];
				};

			 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
				 header("Location: index.php");
				die();
			 };
		};

		} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
			$pagina = 1;
		};


		$RESULTADOS_PAGINA = 4;
		$empezar_desde = ($pagina-1) * $RESULTADOS_PAGINA;
		

		 $sentencia = "SELECT fotos.*, NomPais FROM fotos, paises where fotos.Pais = paises.IdPais and Titulo like '%" . $titulo . "%'";
		 
		 if(!($resultado_sin_filtro = $mysqli->query($sentencia))) { 
		   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error; 
		   echo '</p>';
		   exit;
		 } 

		  if(isset($_GET['pais'])){
		 	$sentencia.= " and paises.NomPais = '" . $pais ."'";
		 } 
		 if(isset($_GET['fechaInicial'])){
			 if($_GET['fechaInicial'] != "")
			 	$sentencia .= " and Fecha >= '" . $fecha1 . "'";
			 if($_GET['fechaFinal'] != "")
			 	$sentencia .= " and Fecha <= '" . $fecha2 . "'";
			}

		//echo $sentencia;

		 if( isset($_GET['pais']) && $_GET['pais'] != "")
		 	$sentencia .= " and Pais = (select IdPais from paises where NomPais = '". $pais ."')";

		 		$sentencia .= " LIMIT $empezar_desde, $RESULTADOS_PAGINA"; //LIMITE PARA PAGINACION

		 
		 	//echo $sentencia;

		 if(!($resultado = $mysqli->query($sentencia))) { 
		   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error; 
		   echo '</p>';
		   exit;
		 } 

		 $num_total_fotos = mysqli_num_rows($resultado_sin_filtro);
		 //echo "fotos: ".$num_total_fotos;
		 $total_paginas = ceil($num_total_fotos / $RESULTADOS_PAGINA);
		


		 	

		?>

		<h3 id="texto_resultado">Resultado de búsqueda "<?php echo $titulo?>"</h3>
		<p class ="imprimir">Entre 01/02/2005 y 01/02/2017 , España</p>

		<?php

		while($fila = $resultado->fetch_assoc()) { 
			$date = new DateTime($fila['Fecha']);
			$fecha = $date->format('d-m-Y');
			echo '<article>';
			echo '<figure>';
			echo '<a href="detalles_foto.php?id=' . $fila['IdFoto'] . '"><img src="fotos/' . $fila['Fichero'] . '" alt="' . $fila['Descripcion'] . '" width="400" height="290"></a>';
			echo '<figcaption>' . $fila['Titulo'] . '</figcaption>';
			echo '</figure>';
			echo '<p><span>Fecha :</span> ' . $fecha . '</p>';
			echo '<p><span>País :</span>' . $fila['NomPais'] .'</p>';
			echo '</article>';

		}

/*
	//echo "total paginas: " . $total_paginas;
		for ($i=1; $i<=$total_paginas; $i++) {
	//En el bucle, muestra la paginación
	echo "<a href='?pagina=".$i."&busqueda='>".$i."</a> | ";
}; */

		?>
		
	</section>
	<aside>
			<fieldset>
				<legend><h3>Filtros</h3></legend>
				<p class="titulo">Fecha:</p>
				<p><?php echo " Entre el $fecha1 y  el $fecha2"?></p>
				<p class="titulo">País :</p>
				<p><?php if($pais=="") echo "todo el mundo"; else echo $pais; ?></p>
			</fieldset>
	</aside>
</body>
</html>