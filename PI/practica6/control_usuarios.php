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
		 $_SESSION['user'] = $_POST['userName'];
		 // Caduca en 1 hora
		 if(isset($_POST['recordar'])&& $_POST['recordar']=="Recordar mis datos"){
			setcookie('user', $_POST['userName'], time() + 20);
			setcookie('pass', $_POST['Password'], time() + 20);  
			
		}
			header('Location: menu_usuario.php');
	}
}

if($acces==false){
	header('Location: index.php?error=si');
}

?>
