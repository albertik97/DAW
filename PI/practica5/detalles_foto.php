<?php
	$title = "Detalles imagen - Pictures & images";
	require_once('plantillas/cabecera.php');
	require_once('plantillas/logotipo.php');
	require_once('plantillas/nav_usuario_no_identificado.php');

	$img = array
	(
		array('"imagenes/playa.jpg"', "Mis vacaciones en Hawai", "12/12/2004", "Hawai", "Alejandro Domenech", "Viajes"),
		array('"imagenes/delfin.jpg"', "Un delfín en el mar", "23/10/2004", "España", "Alejandro Domenech", "Viajes")
	);


	$n_img;
	if (isset($_GET['id']))
		if(intval($_GET['id'])%2==0) $n_img=0;
			else $n_img=1;
				  
?>
		<main>
			<figure>
				<img src=<?php echo $img[$n_img][0]; ?> class="imagen" alt="Foto de lo que sea"><br>
				<figcaption>
					<p class="negrita"> <?php echo $img[$n_img][1]; ?> </p> 
					<p id="FechaPais">Tomada el <?php echo $img[$n_img][2]; ?> en <?php echo $img[$n_img][3]; ?></p>
					<p><a href=""><?php echo $img[$n_img][4]; ?></a> - 
					<a href=""><?php echo $img[$n_img][5]; ?></a></p>
				</figcaption>
			</figure>	
		</main>
		<?php require_once('plantillas/footer.php');?>
	</body> 
</html>
