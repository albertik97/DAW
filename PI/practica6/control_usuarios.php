<?php
session_start();
$acces = false;
$acceso ="Usuario y/o contraseña incorrectos";
$usuarios =array( array('usuario'=>'user1',
					'contraseña'=>'pass'
			),array('usuario'=>'user2',
					'contraseña'=>'pass2'
			),array('usuario'=>'user3',
					'contraseña'=>'pass3'));

for($i=0;$i<count($usuarios);$i++){
	if($_POST['userName']==$usuarios[$i]['usuario'] && $_POST['Password']==$usuarios[$i]['contraseña']){
		$acces =true;
		 // Caduca en 1 hora
		$_SESSION['user'] = $_POST['userName'];
		 if(isset($_POST['recordar'])&& $_POST['recordar']=="Recordar mis datos"){
			setcookie('user', $_POST['userName'], time() + 60*60); //1 hora de duracion
			setcookie('pass', $_POST['Password'], time() + 60*60);  
			
		}
			header('Location: menu_usuario.php');
		}
	
}

if($acces==false){
	header('Location: index.php?error=si');
}

?>
