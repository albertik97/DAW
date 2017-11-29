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
	$consulta='select a.Titulo as tituloAlbum,f.Titulo,f.Fecha,Fichero,NomPais,IdFoto from albumes a, fotos f,paises where f.Album=IdAlbum and IdAlbum = "' . $id_album . '" and f.Pais=IdPais';

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
	if($usuario_propietario['NomUsuario']==$_SESSION['user']){

		if($fila){
			echo '<h1>' . $fila['tituloAlbum'] . '</h1>';
			do{
				echo '<article>';
				echo 	"<figure>";
				echo	'<a href="detalles_foto.php?id=' . $fila['IdFoto'] . '"><img src="fotos/' . $fila['Fichero'] . '" width="400" height="265"></a>';
				echo	'<figcaption>' . $fila['Titulo'] . '</figcaption>';
				echo	"</figure>";
				echo	'<p><span>Fecha :</span>' . $fila['Fecha'] . '</p>';
				echo	'<p><span>País :</span>' . $fila['NomPais'] . '</p>';
				echo	'</article>';
			}while($fila=$res->fetch_assoc());
				$res->close();
				$mysqli->close();
			
		}else{
			echo "<h2 class='sin_fotos'>Este Albúm aún no tiene fotos</h2>";
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