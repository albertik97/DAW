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

	if(isset($_SESSION['user']))
	{

		$id_foto=$_GET['id'];
		$usuario = $_SESSION['user'];
		$mysqli = @new mysqli('localhost','web_user','normaluser','pibd');
		$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "No se ha podido establecer conxión con la base de datos";
		}
		$consulta = 'select Fichero,f.Titulo as titulo_foto,f.Fecha,NomPais,NomUsuario,a.Titulo,IdAlbum from fotos f,usuarios,albumes a,paises where f.Album = IdAlbum and Usuario=IdUsuario and f.Pais=IdPais and IdFoto="' . $id_foto . '"';
		if(!($resultado=$mysqli->query($consulta))){
			echo "Error al realizar consulta";
		}
		$res=$resultado->fetch_assoc();

		if(!$res){
			echo "No se ha encontrado ninguna foto";
		}else{
			if($res['Fecha']!='null'){
				$date = new DateTime($res['Fecha']);
				$fecha = $date->format('d-m-Y');
			}
	?>
			<main>
				<figure>
					<img src="fotos/<?php echo $res['Fichero']?>" class="imagen" alt=""><br>
					<figcaption>
						<p class="negrita"><?php echo $res['titulo_foto'];?> </p> 
						<p id="FechaPais">Tomada el <?php if($res['Fecha']!='null'){echo $fecha;}else echo "?";?> en <?php if($res['NomPais']!='null'){echo $res['NomPais'];}else echo "?";?></p>
						<p><a href=""><?php echo $res['NomUsuario']; ?></a> - 
						<a href=<?php echo 'ver_album.php?AlbumId='. $res['IdAlbum'].''?>><?php echo $res['Titulo'];?></a></p>
					</figcaption>
				</figure>	
			</main>
		
		<?php require_once('plantillas/footer.php');?>
	<?php
		}
	?>
	</body> 
</html>
<?php
		$resultado->close();
		$mysqli->close();	
	}else
		require_once('plantillas/error_test.php');
?>
		