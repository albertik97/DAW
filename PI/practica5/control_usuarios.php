<?php
//usuarios
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
		header('Location: menu_usuario.php');
	}
}

if($acces==false){
	header('Location: index.php?error=si');
}

?>
