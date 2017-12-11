<?php
	require_once("plantillas/conexion.php");

	$consulta='select * from usuarios';
	 if(!($datos=$mysqli->query($consulta))) 
		   echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error; 

	$login=false;
	if(isset($_COOKIE['user'])&&isset($_COOKIE['id_session'])){
		while($res=$datos->fecth_assoc()){
			if($_COOKIE['user']==$res['NomUsuario']){
				$login=true;
				$_SESSION['user']=$_COOKIE['user'];
			}
		}

		if($login==false){//si se acaba el tiempo de sesion o la cookie no conincide con los datos almacenados , se cierra la sesion
				
			// Borra todas las variables de sesión 
		 	$_SESSION = array(); 
		  // Borra la cookie que almacena la sesión 
		  if(isset($_COOKIE[session_name()])) { 
		    setcookie(session_name(), '', time() - 42000, '/');
		    setcookie('user','',-1);
		    setcookie('id_session','',-1);
		    setcookie('last_visit_date','',-1);
		    setcookie('last_visit_hour','',-1);
		    //se borra la session tambien en la db
		  } 
		  // Finalmente, destruye la sesión 
		  session_destroy();

		  header('Location: index.php');
		}
	}
	
?>