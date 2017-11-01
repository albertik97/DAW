<main id="main_usuario">
		<fieldset id="misdatos">
			<legend><h2>Mis datos</h2></legend>
			<p><img id="imagen_perfil" src="imagenes/chocu.jpg" alt="foto perfil" width="100" height="100"></p>
			<table>
				<tr>
					<td>Usuario</td> <td>el_chocu</td>
				</tr>

				<tr><td>Nombre :</td> <td>Chocu Martínez de la Selva</td>
				</tr>
				<tr><td>Sexo :</td><td>Hombre</td>
				</tr>
				<tr><td>Fecha de Nacimiento :</td> <td>12/04/1990</td>
				</tr>
				<tr><td>Pais de residencia : </td><td>Tailandia</td>
				</tr>
				<tr><td>Ciudad :</td> <td>Lopburi</td></tr>
			</table>
			<p><button id="edit_perfil" >Modificar datos</button></p>
		</fieldset>
		<hr>
		<a class="botones_perfil" href="#" ><img src="imagenes/delete.png" alt="">Darse de baja</a>
		<a class="botones_perfil" href="crear_album.php" ><img src="imagenes/add.png" alt="">Crear álbum nuevo</a>
		<a class="botones_perfil" href="#" ><img src="imagenes/album.png" alt="">Mis álbumes</a>
		<a class="botones_perfil" href="solicitar_album.php" ><img src="imagenes/print.png" alt="">Solicitar álbum impresion</a>
		<a class="botones_perfil" href="cierra_sesion.php"><img src="imagenes/exit.png" alt="">Salir</a>
	</main>
	<?php require_once('plantillas/footer.php');?>
</body>
</html>