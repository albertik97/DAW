<?php
	session_start();
	require_once('validar.php');
	$title = "PI - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
		require_once('plantillas/nav_usuario_identificado.php');

		$mysqli = @new mysqli('localhost','root','','pibd');
	$mysqli->set_charset('utf8');
	if($mysqli->connect_error){
		echo "Error al conectar con la base de datos ".  $mysqli->connect_error;
	}
	$id_album = $_GET['AlbumId'];
	$consulta='select a.Titulo as tituloAlbum,f.Titulo,f.Fecha,Fichero,NomPais,IdFoto from albumes a, fotos f,paises where IdAlbum = "' . $id_album . '" and f.Pais=IdPais';

	if(!($res=$mysqli->query($consulta))){
		echo "Error al realizar la consulta";
	}
	echo $mysqli->error;
	$fila=$res->fetch_assoc();

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
	}
	else{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}

	
?>

</section>
</body>
</html>