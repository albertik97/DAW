<?php 
	session_start();
	require_once('validar.php');
	$title = "Crear álbum - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	
	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');

		if(isset($_GET['tituloAlbum']))
			$titulo = $_GET['tituloAlbum'];
		if(isset($_GET['textoDescripcion']))
			$desc = $_GET['textoDescripcion'];

		if(isset($_GET['fechaAlbum'])){
			$fecha="'".$_GET['fechaAlbum']."'";
			$fecha_aux=$_GET['fechaAlbum'];
			if($fecha_aux!=""){
				$date = new DateTime($fecha_aux);
				$fecha_f = $date->format('d-m-Y');
			}else{
				$fecha_f = 'Desconocida';
			}
			
			

		}
		if(isset($_GET['paisAlbum']))
			$pais=$_GET['paisAlbum'];

		if($fecha==''){
			$fecha='NULL';
		}
		require_once("plantillas/conexion.php");

		if($pais!="Seleccionar"){
		$consulta1= "select * from paises where '" . $pais . "'=NomPais";
		
		if(!($res1=$mysqli->query($consulta1)))
			echo "error consulta" .$mysqli->error;

			$codigo_pais=$res1->fetch_assoc();
			$codigo_pais=$codigo_pais['IdPais'];
		}else{
			$codigo_pais='NULL';
		}

		$consulta2 = "select * from usuarios where '" . $_SESSION['user'] . "'=NomUsuario";
		if(!($res2=$mysqli->query($consulta2)))
			echo "error consulta" .$mysqli->error;

			$user=$res2->fetch_assoc();

		$consultaje = "INSERT INTO albumes(Titulo,Descripcion,Fecha,Pais,Usuario) values('". $titulo ."','" . $desc . "',".$fecha ."," . $codigo_pais . ",'" . $user['IdUsuario'] . "')";
		if(!($mysqli->query($consultaje))){
			echo '<h1 id="titulo_crear_album">No se ha podido crear :(</h1>';
			echo '<a id="volver" href="menu_usuario.php">Volver a mi perfil</a>';
			echo $mysqli->error;
		}else{
		
?>
		<main>
				<h1 id="titulo_crear_album">Álbum creado correctamente</h1>
				<hr>
				<p class="res_album"><span class="t_res_album">Título del álbum : </span><?php echo $titulo; ?></p>
				<p class="res_album"><span class="t_res_album">Descripción del álbum : </span><?php echo $desc; ?></p>
				<p class="res_album"><span class="t_res_album">Fecha de las fotos : </span><?php echo $fecha_f; ?></p>
				<p class="res_album"><span class="t_res_album">Pais : </span><?php if($pais=="Seleccionar"){echo "Desconocido";}else echo $pais; ?></p>
		
		</main>

		<?php require_once('plantillas/footer.php');?>
			</body>
</html>


<?php
}
$mysqli->close();
	}
	else{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}	
?>