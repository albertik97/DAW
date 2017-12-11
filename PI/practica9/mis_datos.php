<?php
session_start();
	require_once('validar.php'); 
	$title = "Menú usuario - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');

	if(isset($_SESSION['user']))
	{
		require_once('plantillas/nav_usuario_identificado.php');
		require_once("plantillas/conexion.php");	

		$consulta= 'select * from usuarios, paises where NomUsuario="'. $_SESSION['user'] .'" and Pais=IdPais';
		if(!($res=$mysqli->query($consulta))){
			echo "Error al realziar la consulta" . $mysqli->error;
		}
		$usuario = $res->fetch_assoc();

		$consulta2= 'select * from paises';
		if(!($res2=$mysqli->query($consulta2))){
			echo "Error al realziar la consulta" . $mysqli->error;
		}

		
?>
	
	<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Mis datos</h2></legend>
			<?php if(isset($_GET['error']) && $_GET['error']==true) echo"<p id='error'>Introduzca unos datos correctos</p>"?>
			<form method="post" action="respuesta_mis_datos.php">
				<p><img id="imagen_perfil" src="imagenes/<?php echo $usuario['Foto'];?>" alt="foto perfil" width="100" height="100"><input type="file" name="foto"></p>
				<table>
					<tr>
						<td>Usuario</td> <td><input type="text" name="usuario" value="<?php echo $usuario['NomUsuario'];?>"></td>
					</tr>
					<tr>
						<td>Contraseña</td> <td><input type="password" name="pass" value="<?php echo $usuario['Clave'];?>"</td>
					</tr>
					<tr><td>Correo :</td> <td><input type="text" name="email" value="<?php echo $usuario['Email'];?>"></td>
					</tr>
					<tr><td>Sexo :</td><td>
					<select name="sexo">
						<option <?php 
					if($usuario['Sexo']==0)
						echo "selected";?> 
						value="Hombre">Hombre</option>
						<option  <?php 
					if($usuario['Sexo']==1)
						echo "selected";?>
						 value="Mujer">Mujer</option>
						<option <?php 
					if($usuario['Sexo']==2)
						echo "selected";?>
						value="Otro">Otro</option>
					</select>
					</td>
					</tr>
					<tr><td>Fecha de Nacimiento :</td> <td><input type="date" name="fecha" value="<?php echo  $usuario['FNacimiento'];?>"></td>
					</tr>
					<tr><td>País de residencia : </td><td>
						<select name="pais" id="pais">
					<?php
						while($fila=$res2->fetch_assoc()){
							if($fila['IdPais']==$usuario['Pais']){
								echo "<option selected value='" . $fila['NomPais'] . "'>" . $fila['NomPais'] . "</option>";
							}else
								echo "<option value='" . $fila['NomPais'] . "'>" . $fila['NomPais'] . "</option>";
						}
					?>
					</select>
							
						</td>
					</tr>
					<tr><td>Ciudad :</td> <td><input type="text" name="ciudad" value="<?php echo $usuario['Ciudad'];?>"></td></tr>
				</table>
				<p><input type="submit" id="edit_perfil" value="Modificar datos"></p>
			</form>
		</fieldset>
		<hr>
	</main>
	<?php require_once('plantillas/footer.php');?>
</body>
</html>
<?php
	}
	else
	{
		require_once('plantillas/nav_usuario_no_identificado.php');
		require_once('plantillas/error_test.php');
	}
?>