<?php

		$consulta_paises = 'select * from paises';

		if(!($res_paises=$mysqli->query($consulta_paises))){
			echo "Error al ejecutar la sentencia";
		}
	
?>