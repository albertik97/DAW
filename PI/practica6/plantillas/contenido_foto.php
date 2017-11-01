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
