<?php
session_start();
$acces = false;
$acceso ="Usuario y/o contraseña incorrectos";
require_once("plantillas/conexion.php");

$consulta= 'select * from usuarios';
if(!($res=$mysqli->query($consulta))){
	echo "Error al realziar la consulta";
}

while($line = $res->fetch_assoc()){
	if($_POST['userName']==$line['NomUsuario'] && $_POST['Password']==$line['Clave']){
			$acces =true;
			$_SESSION['user'] = $_POST['userName'];
			$_SESSION['id'] = $line['IdUsuario'];
			 if(isset($_POST['recordar'])&& $_POST['recordar']=="Recordar mis datos"){
				setcookie('user', $_POST['userName'], time() + 60*60); //1 hora de duracion		
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
