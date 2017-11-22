<?php
session_start();
$acces = false;
$acceso ="Usuario y/o contraseña incorrectos";
$mysqli = @new mysqli('localhost','web_user','','pibd');
if($mysqli->connect_errno){
	echo "Error al conectarse a la base de datos";
}

$consulta= 'select * from usuarios';
if(!($res=$mysqli->query($consulta))){
	echo "Error al realziar la consulta";
}

while($line = $res->fetch_assoc()){
	if($_POST['userName']==$line['NomUsuario'] && $_POST['Password']==$line['Clave']){
			$acces =true;
			$_SESSION['user'] = $_POST['userName'];
			 if(isset($_POST['recordar'])&& $_POST['recordar']=="Recordar mis datos"){
				setcookie('user', $_POST['userName'], time() + 60*60); //1 hora de duracion
				//se genera un id de sesion 
			/*	mt_srand (time());
	      		$id_session = mt_rand(1000000,999999999);
	    		$id_session =$id_session."|" .time+60*60;//id de sesion compuesta por cadena aleatoria mas fecha de caducidad
	    	*/
	      		setcookie('id_session','1234567',time()+60*60);			
			}
		header('Location: menu_usuario.php');
	}
}

$res->close();
$mysqli->close();
if($acces==false){
	$_SESSION['reiniciar']=false;
	header('Location: index.php?error=true');
}
?>
