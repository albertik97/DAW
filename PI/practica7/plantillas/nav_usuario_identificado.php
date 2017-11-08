<nav>
	<ul>
		<li><a href="formulario_busqueda.php">Buscar</a></li>
		<li class="derecha"><a href="cierra_sesion.php">Salir</a></li>
		<li class="derecha"><a href="menu_usuario.php">Mi perfil</a></li>

		<li class="derecha"><span id="iniciado">Hola, <?php 

		if(isset($_SESSION['user'])){
			echo $_SESSION['user'];
		}else
			echo $_COOKIE["user"]?>
				
			</span></li>
	</ul>		
</nav>