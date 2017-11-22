<?php
	$usuarios =array( array('usuario'=>'user1',
					'contraseña'=>'pass',
					'id_session'=>'1234567'
			),array('usuario'=>'user2',
					'contraseña'=>'pass2',
					'id_session'=>'1234567'
			),array('usuario'=>'user3',
					'contraseña'=>'pass3',
					'id_session'=>'1234567'));
	$login=false;
	if(isset($_COOKIE['user'])&&isset($_COOKIE['id_session'])){
		for($i=0;$i<count($usuarios);$i++){
			if($_COOKIE['user']==$usuarios[$i]['usuario'] && $_COOKIE['id_session']==$usuarios[$i]['id_session']){
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