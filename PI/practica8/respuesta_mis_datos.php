<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');

		//obtenemos los datos
		if(isset($_POST['usuario'])){
			$usuario=$_POST['usuario'];
		}
		if(isset($_POST['pass'])){
			$pass=$_POST['pass'];
		}
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		}

		if(isset($_POST['fecha'])){
			$fecha=$_POST['fecha'];
		}
		if(isset($_POST['pais'])){
			$pais=$_POST['pais'];
		}
		if(isset($_POST['ciudad'])){
			$ciudad=$_POST['ciudad'];
		}
		if(isset($_POST['foto'])){
			$foto=$_POST['foto'];
		}
		if(isset($_POST['sexo'])){
			$sexo_n=$_POST['sexo'];
		}
		require_once("plantillas/conexion.php");

		require_once("plantillas/comprobar.php");



		$consulta_pais='select * from paises where NomPais="' . $pais . '"';
		if(!($respuesta=$mysqli->query($consulta_pais))){
			echo "Error al realziar la consulta" . $mysqli->error;
		}
		$pais_c=$respuesta->fetch_assoc();
		$consulta= "update usuarios set NomUsuario='" . $usuario . "',Email='" . $email ."',Sexo='" . $sexo . "', FNacimiento='" . $nacimiento . "' ,Ciudad='" . $ciudad . "', Pais='" .$pais_c['IdPais'] ."',Clave='".$pass."' ";

		if(isset($_POST['foto'])&& $foto!=""){
			$consulta.=", Foto='" . $foto . "' ";
		}
		$consulta.="where NomUsuario='" .$_SESSION['user']."'";

		
		if(!($res=$mysqli->query($consulta))){
			echo "Error al realziar la consulta" . $mysqli->error;
			echo "No se han podido modificar sus datos";
		}else{

			$datos="select * from usuarios where IdUsuario='" .$_SESSION['id'] ."'";
			if(!($info=$mysqli->query($datos)))
				echo "Error al realziar la consulta" . $mysqli->error;
				
			$nuevos_datos=$info->fetch_assoc();
		
?>
	
	<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Sus datos han sido modificados</h2></legend>
			<p><img id="imagen_perfil" src="imagenes/<?php echo $nuevos_datos['Foto'];?>" alt="foto perfil" width="100" height="100"></p>
				<table>
					<tr>
						<td>Usuario</td> <td><?php echo $usuario;?></td>
					</tr>
					<tr><td>Correo :</td> <td><?php echo $email;?></td>
					</tr>
					<tr><td>Sexo :</td><td><?php echo $sexo_n;?></td>
					</tr>
					<tr><td>Fecha de Nacimiento :</td> <td><?php echo $nacimiento;?></td>
					</tr>
					<tr><td>País de residencia : </td><td><?php echo $pais;?></td>
					</tr>
					<tr><td>Ciudad :</td> <td><?php echo $ciudad;?></td></tr>
				</table>
		</fieldset>
		<hr>
	</main>
	<?php require_once('plantillas/footer.php');?>
</body>
</html>
<?php
$_SESSION['user'] = $usuario;
}
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}
?>