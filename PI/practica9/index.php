<?php
	session_start();
	$current_visit_date = date("d/m/y");
	$current_visit_hour = date("H:i:s");
	require_once('validar.php');
	$mysqli = @new mysqli('localhost','web_user','','pibd');
		if($mysqli->connect_errno){
			echo "<p>Error al conectar con la base de datos :(</p>";
		}else{
			$mysqli->set_charset('utf8');
			$sentencia = 'select * from fotos order by FRegistro DESC LIMIT 0, 5';
			if(!($resultado=$mysqli->query($sentencia))){
				echo "Error de sentencia";
			}

	}
?>
<!DOCTYPE html> 
<html lang="es">
	<head> 
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<title>PI - Pictures & images</title>
		<link href="css/estilo_index.css" rel="stylesheet" type="text/css" media="screen" title="Estilo predeterminado">
		<link href="css/adaptable_index.css" rel="stylesheet" type="text/css" media="screen">
		<link href="css/accesible_index.css" rel="alternate stylesheet" type="text/css" media="screen" title="Estilo accesible">
		<link href="css/imprimible.css" rel="stylesheet" type="text/css" media="print">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	</head>
	<body> 
		<header>
			<h1><a href="index.php" tabindex="-1"><img src="imagenes/pi.png" id="logo" alt="Logotipo PI" height="128" width="128"></a></h1>
		</header>
		<main>
			<div id="contenedor_principal">
				<section id="login">
					<?php
						if(isset($_SESSION['user'])){
								if(isset($_COOKIE['last_visit_date'])){
										$last_visit_date = $_COOKIE['last_visit_date'];
										$last_visit_hour = $_COOKIE['last_visit_hour'];
									echo "<span class=\"ultima_visita\">Hola, " . $_SESSION['user'] . " su última visita fue el " .$last_visit_date . " a las " . $last_visit_hour . "<br><a href=\"menu_usuario.php\">Acceder</a><br><a href=\"cierra_sesion.php\">Salir</a></span></span>";
								}else{
									echo "<span class=\"ultima_visita\">Hola, " . $_SESSION['user'] . " hoy es tu primera visita ;)<br><a href=\"menu_usuario.php\">Acceder</a><br><a href=\"cierra_sesion.php\">Salir</a></span>";
								}
								
								setcookie("last_visit_date",$current_visit_date,time()+60*60*24*30);
								setcookie("last_visit_hour",$current_visit_hour,time()+60*60*24*30);
						}else{
								echo '<h2>Iniciar Sesión</h2>';
								echo '<form method="POST" action="control_usuarios.php">';
								echo '<label for="userName">Usuario</label>';
								echo '<input type="text" name="userName" id="userName" placeholder="Introduce tu usuario" required>';
								echo '<label for="Password">Contraseña</label>';
								echo '<input type="password" name="Password" id="Password" placeholder="Introduce tu contraseña" required>';
								echo '<input type="checkbox" name="recordar" id="recordar" value="Recordar mis datos">Recordar mis datos';
								echo '<span id="error_sesion">';
										if(isset($_GET["error"])==true&&isset($_GET["error"])==true&&isset($_SESSION['reiniciar'])&&$_SESSION['reiniciar']==false){
											 echo "Usuario y/o contraseña incorrectos";
											 $_SESSION['reiniciar']=true;
										}
								
								echo '</span>';
								echo '<input type="submit" value="Iniciar sesión">';
								echo '<p><a href="registro.php">Registrarse</a></p>';
							echo '</form>';
						}
					?>
				</section>
				<?php
                    ///generamos linea aleatoria
                    $aleatorio=rand(0,4);
                     $cont=0;
                     $ruta="";
                    //llemos  el archivo

                        if(($fichero = @file("./premio/ganadores.txt")) == false) {
                               echo "No se ha podido abrir el fichero";
                         }else{
                         
                           foreach($fichero as $numLinea => $linea){
                                
                               if($cont==$aleatorio*3){
                               	$caracteres = preg_split('//', $linea, -1, PREG_SPLIT_NO_EMPTY);
                               			for($i=0;$i<strlen($linea)-2;$i++){
                               				$ruta.=$caracteres[$i];
                               			}
                                     //  $ruta = $linea;
                               }
                               else if($cont==$aleatorio*3+1){
                               		$trans = utf8_encode($linea);
                                      $critico= $trans;

                               }else if($cont==$aleatorio*3+2){
                               		$trans = utf8_encode($linea);
                                      
                                    $comentario= $trans;
                               }
                            $cont++;
                          }
                        }

                        $sol_foto_selec = 'select * from fotos inner join paises on Pais=IdPais where Fichero = "'.$ruta.'"';
                        if(!($select_foto_seleccionada=$mysqli->query($sol_foto_selec))){
							echo "Error al realizar la consulta";
						}
						$cosa = $select_foto_seleccionada->fetch_assoc();

                    ?>
			</div>
			<section id="UltimasFotos">
				<h2>Últimas fotos subidas - <a href="formulario_busqueda.php">Buscar más</a></h2>
				<hr>
				<?php 
				while($fila=$resultado->fetch_assoc()){
					if($fila['Fecha']==""){
				$fec=" Desconocida";
			}else{
				$fec=$fila['Fecha'];
			}

			if($fila['Pais']==""){
				$pais="Desconocido";
			}else{
				

					$comprobar_pais =  'select * from paises';
			if(!($var2=$mysqli->query($comprobar_pais)))
					echo "Error al realizar la consulta";

				while($pais_code=$var2->fetch_assoc()){
					if($pais_code['IdPais']==$fila['Pais']){
						$pais=$pais_code['NomPais'];
					}
				}

			}

					$date = new DateTime($fila['Fecha']);
					$fecha = $date->format('d-m-Y');
					echo "<article>";
					echo	"<figure>";
					echo		'<a href="detalles_foto.php?id=' . $fila['IdFoto'] . '" ><img src="fotos/' . $fila['Fichero'] .'" alt="Imagen1" height="164" width="164" ></a>';
					echo		'<figcaption>' . $fila['Titulo'] . '</figcaption>';
					echo '<p>Fecha : '. $fec .'</p>';
					echo '<p>Pais : '. $pais .'</p>';
					echo	'</figure>';
					echo '</article>';

				} ?>
				<br>
				<h2 class="texto_foto_seleccionada">Fotos seleccionadas</h2>
				<hr>
				<article>
					<figure>
						<?php echo '<a href="detalles_foto.php?id=' . $cosa['IdFoto'] . '" ><img src="fotos/' . $cosa['Fichero'] .'" alt="Imagen Seleccionada"  height="512" width="512"></a>'; 
						echo		'<figcaption>' . $fila['Titulo'] . '</figcaption>';
						echo '<p>Fecha : '. $cosa["Fecha"] .'</p>';
						echo '<p>Pais : '. $cosa["NomPais"] .'</p>';
					?>
						<p>Selector: <?php echo $critico ?></p>
					</figure>
				</article>
				<p class="texto_foto_seleccionada">" <?php echo $comentario ?> "</p>			
		</main>
		
		<?php
				$resultado->close();
				$mysqli->close();	
		?>
	</body> 
</html>