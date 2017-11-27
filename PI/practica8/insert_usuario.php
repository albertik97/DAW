<?php
	require_once('validar.php');

	session_start();
	$mysqli = @new mysqli('localhost','web_user','','pibd');
	$mysqli->set_charset('utf8');
		if($mysqli->connect_errno){
			echo "Se ha producido un error al conectar con la base de datos" . $mysqli->connect_error;
		}


		echo $_POST['usuario'];
			echo "<br>";
			$usuario = $_POST['usuario'];
			//echo substr($usuario, 1,1);
			echo "<br>";
			if(strlen($usuario)>=3 && strlen($usuario)<=15)
			{
				for($i = 0; $i < strlen($usuario); $i++)
				{
					if
					(
						(ord(substr($usuario, $i, 1)) >= 48  && ord(substr($usuario, $i, 1)) <=57) ||
						(ord(substr($usuario, $i, 1)) >= 65  && ord(substr($usuario, $i, 1)) <=90) ||
						(ord(substr($usuario, $i, 1)) >= 97  && ord(substr($usuario, $i, 1)) <=122)
						
					)
					{
						echo ord(substr($usuario, $i, 1)). "  es un caracter correcto<br>";
					}
					else
					{
						echo substr($usuario, $i, 1). "  NO es un caracter correcto <br>";
						header('Location: registro.php');
						exit();
					}
				}
			}
			echo "<br>";
			$pass = $_POST['pass'];
			$uppr = false;
			$lowr = false;
			$nmbr = false;
			echo $pass;
			echo "<br>";
			if(strlen($pass) >= 6 && strlen($pass) <= 15)
			{
				for($i = 0; $i < strlen($pass); $i++)
				{
					if(ord(substr($pass, $i, 1)) >= 48  && ord(substr($pass, $i, 1)) <=57)
					{
						if(!$nmbr)
						{
							echo substr($pass, $i, 1). "  es un caracter correcto y se pone a true nmbr<br>";
							$nmbr = true;
						}
					}
					else
					{
						if(ord(substr($pass, $i, 1)) >= 65  && ord(substr($pass, $i, 1)) <=90)
						{
							if(!$uppr)
							{
								echo substr($pass, $i, 1). "  es un caracter correcto y se pone a true uppr<br>";
								$uppr = true;	
							}
						}
						else
						{
							if(ord(substr($pass, $i, 1)) >= 97  && ord(substr($pass, $i, 1)) <=122)
							{
								if(!$lowr)
								{
									echo substr($pass, $i, 1). "  es un caracter correcto y se pone a true lowr<br>";
									$lowr = true;	
								}
							}
							else
							{
								if(ord(substr($pass, $i, 1))==95)
								{
									echo substr($pass, $i, 1). "  es un caracter correctoooo<br>";
								}
								else
								{
									echo substr($pass, $i, 1). " NO es un caracter correcto<br>";
									header('Location: registro.php');
									exit();
								}
							}
							
						}
					}
				}
			}
			$pass2 = $_POST['pass2'];
			if($pass2 == $pass)
			{
				echo "Se ha repetido la contraseña correctamente";
			}
			else
			{
				echo "No se ha repetido la contraseña correctamente";
				header('Location: registro.php');
				exit();
			}




			if(isset($_POST['mail']))
			{
				echo "el email se ha introducido en el formulario <br>";
				if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) != false)
				{
					echo "el email tiene la estructura correcta <br>";
					echo $_POST['mail']."<br>";
					$dom = substr($_POST['mail'], strpos($_POST['mail'],'@'));
					$dom2 = explode(".", $dom);
					
					if((strlen($dom2[0])-1) >= 2 && (strlen($dom2[0])-1) <= 4)
					{
						echo "okey";
						$email = $_POST['mail'];
					}
					else
					{
						header('Location: registro.php');
						exit();
					}
					echo "dom2 = ".(strlen($dom2[0])-1). "<br>";
					//echo "dom = ".$dom. "<br>";
					
				}
				else
				{
					echo "El email no tiene la estructura correcta <br>";
					header('Location: registro.php');
					exit();
				}
				
			}
			

			//$sexo = $_POST['sexo'];
			if(isset($_POST['sexo']))
			{
				echo "Se ha introducido el sexo correctamente";
				if($_POST['sexo'] == "Hombre")
					$sexo = 0;
				if($_POST['sexo'] == "Mujer")
					$sexo = 1;
				if($_POST['sexo'] == "Otro")
					$sexo = 2;
			}
			else
			{
				echo "No se ha introducido el sexo correctamente";
				header('Location: registro.php');
				exit();
			}

			$nacimiento = $_POST['nacimiento'];
			echo $nacimiento;

			date_default_timezone_set(date_default_timezone_get());
			$date = date('Y/m/d', time());
			echo $date;

			if($nacimiento <= $date)
				echo "La fecha es correcta<br>";
			else
			{
				header('Location: registro.php');
				exit();
			}


			$ciudad = $_POST['ciudad'];

			$pais			= "select IdPais from paises where NomPais = '" . $_POST['pais'] . "';";
			if(!($pais_foto=$mysqli->query($pais))){
			echo "Error al ejecutar la sentencia";
			}
			$res1 = $pais_foto->fetch_assoc();

			if($_POST['foto'] == "")
				$foto = "defecto.jpg";
			else
				$foto = $_POST['foto'];

			$insert = "INSERT INTO `usuarios`(`NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`)
					 VALUES ('".$usuario."', '".$pass."', '".$email."', ".$sexo.", '".$nacimiento."', '".$ciudad."', ".$res1['IdPais'].", '".$foto."', NOW())";
					 echo $insert;

			if(!($res=$mysqli->query($insert))){
				echo "Error al ejecutar la sentencia";
			}
?>