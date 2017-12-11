<?php
	session_start();
	require_once('validar.php');
	$title = "PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
		require_once('plantillas/nav_usuario_identificado.php');
	require_once("plantillas/conexion.php");
	$id_album = $_GET['AlbumId'];
	$consulta='select a.Titulo as tituloAlbum,f.Titulo,f.Fecha,Fichero,IdFoto,f.Pais from albumes a, fotos f where f.Album=IdAlbum and IdAlbum = "' . $id_album . '"';

	if(!($res=$mysqli->query($consulta))){
		echo "Error al realizar la consulta";
	}


	$fila=$res->fetch_assoc();

	//miramos si el album pertenece al usuario que ha iniciado sesion

	$comprobar =  'select NomUsuario from albumes,usuarios where ' . $id_album . '=IdAlbum and Usuario=IdUsuario';
	if(!($var=$mysqli->query($comprobar))){
		echo "Error al realizar la consulta";
	}
	$usuario_propietario=$var->fetch_assoc();

	$comprobar_pais =  'select * from paises';
	if(!($var2=$mysqli->query($comprobar_pais))){
		echo "Error al realizar la consulta";
	}

	
	if($usuario_propietario['NomUsuario']==$_SESSION['user']){

		if($fila){
			
			

			echo '<h1>' . $fila['tituloAlbum'] . '</h1>';
			do{
				if($fila['Fecha']==""){
				$fec=" Desconocida";
			}else{
				$fec=$fila['Fecha'];
			}

			if($fila['Pais']==""){
				$pais="Desconocido";
			}else{
				while($pais_code=$var2->fetch_assoc()){
					if($pais_code['IdPais']==$fila['Pais']){
						$pais=$pais_code['NomPais'];
					}
				}

			}
				echo '<article>';
				echo 	"<figure>";
				echo	'<a href="detalles_foto.php?id=' . $fila['IdFoto'] . '"><img src="fotos/' . $fila['Fichero'] . '" width="400" height="265"></a>';
				echo	'<figcaption>' . $fila['Titulo'] . '</figcaption>';
				echo	"</figure>";
				echo	'<p><span>Fecha :</span>' . $fec . '</p>';
				echo	'<p><span>País : </span>' . $pais . '</p>';
				echo	'</article>';
			}while($fila=$res->fetch_assoc());
				$res->close();
				$mysqli->close();
			
		}else{
			echo "<h2 class='sin_fotos'>Este Álbum aún no tiene fotos</h2>";
			echo "<h2 class='sin_fotos'>:(</h2>";
		}
	}else{
		echo "<h2 class='sin_fotos'>No puede acceder a este álbum</h2>";
		echo "<h5 class='sin_fotos2'>Puede que no sea suyo o que no exista</h5>";
	}

	}else{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}

	
?>

</section>
</body>
</html>