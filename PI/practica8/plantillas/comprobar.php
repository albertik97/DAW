<?php





	$nombre_usuarios = "select usuarios.NomUsuario, usuarios.IdUsuario from usuarios;";
	if(!($res_usuarios=$mysqli->query($nombre_usuarios)))
	{
		echo "Error al realizar la consulta de los nombres de usuarios existentes";
	}

	// Validacion del nombre de usuario
	if(isset($_POST['usuario']) && preg_match('/^[A-Za-z\d]{3,15}$/', $_POST['usuario'])) // Comprobamos su tamaño, los caracteres que debe contener y luego si se encuentra en la base de datos
	{
		while($fila=$res_usuarios->fetch_assoc())
			{
				if($fila['NomUsuario'] == $_POST['usuario'] && $fila['IdUsuario'] != $_SESSION['id'])
				{
					header('Location: mis_datos.php?error=true');
					exit();
				}
			}
			$usuario = $_POST['usuario'];
	}
	else
	{
		header('Location: mis_datos.php?error=true');
		exit();
	}

	if(isset($_POST['pass']) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z_\d]{6,15}$/', $_POST['pass'])) // Comprobamos tamaño, caracteres que debe contener y si contiene 1 mayusc, minusc
	{																											   // y numero
		$pass = $_POST['pass'];
	}
	else
	{
		header('Location: mis_datos.php?error=true');
		exit();
	}

	if(isset($_POST['email']) && $_POST['email'] != "")  // Se comprueba que se ha pasado un email y que este no está vacio
	{
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z\d._]+(@[a-zA-Z\d.-]{2,4})+(\.[a-zA-Z.]{2,4})$/', $_POST['email']))
		{
			$email = $_POST['email'];
		}
		else
		{
			header('Location: mis_datos.php?error=true');
			exit();
		}
	}
	else
	{
		header('Location: mis_datos.php?error=true');
		exit();
	}

	if(!isset($_POST['sexo']) || $_POST['sexo'] == "" || !preg_match('/^(Hombre|Mujer|Otro)$/', $_POST['sexo']))
	{
		header('Location: registro.php');
		exit();
	}
	else
	{
		if($_POST['sexo'] == "Hombre")
			$sexo = 0;
		if($_POST['sexo'] == "Mujer")
			$sexo = 1;
		if($_POST['sexo'] == "Otro")
			$sexo = 2;
	}

	date_default_timezone_set(date_default_timezone_get());
	$date = date('Y/m/d', time());

	$d = getdate(strtotime($_POST['fecha']))['mday'];
	$m = getdate(strtotime($_POST['fecha']))['mon'];
	$y = getdate(strtotime($_POST['fecha']))['year'];
	//echo $date;
	if(isset($_POST['fecha']) && checkdate($m, $d, $y) && $_POST['fecha'] <= $date)
	{
		$nacimiento = $_POST['fecha'];
	}
	else
	{
		header('Location: mis_datos.php?error=true');
		exit();
	}

/*if(strlen($usuario)>=3 && strlen($usuario)<=15)
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
						//echo ord(substr($usuario, $i, 1)). "  es un caracter correcto<br>";
					}
					else
					{
						//echo substr($usuario, $i, 1). "  NO es un caracter correcto <br>";
						header('Location: mis_datos.php?error=true');
						exit();
					}
				}
			}*/
			
			/*$pass = $_POST['pass'];
			$uppr = false;
			$lowr = false;
			$nmbr = false;
			
			if(strlen($pass) >= 6 && strlen($pass) <= 15)
			{
				for($i = 0; $i < strlen($pass); $i++)
				{
					if(ord(substr($pass, $i, 1)) >= 48  && ord(substr($pass, $i, 1)) <=57)
					{
						if(!$nmbr)
						{
							//echo substr($pass, $i, 1). "  es un caracter correcto y se pone a true nmbr<br>";
							$nmbr = true;
						}
					}
					else
					{
						if(ord(substr($pass, $i, 1)) >= 65  && ord(substr($pass, $i, 1)) <=90)
						{
							if(!$uppr)
							{
								//echo substr($pass, $i, 1). "  es un caracter correcto y se pone a true uppr<br>";
								$uppr = true;	
							}
						}
						else
						{
							if(ord(substr($pass, $i, 1)) >= 97  && ord(substr($pass, $i, 1)) <=122)
							{
								if(!$lowr)
								{
									//echo substr($pass, $i, 1). "  es un caracter correcto y se pone a true lowr<br>";
									$lowr = true;	
								}
							}
							else
							{
								if(ord(substr($pass, $i, 1))==95)
								{
									//echo substr($pass, $i, 1). "  es un caracter correctoooo<br>";
								}
								else
								{
									//echo substr($pass, $i, 1). " NO es un caracter correcto<br>";
									header('Location: mis_datos.php?error=true');
									exit();
								}
							}
							
						}
					}
				}
			}*/

			/*if(isset($_POST['email']))
			{
				//echo "el email se ha introducido en el formulario <br>";
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != false)
				{
					//echo "el email tiene la estructura correcta <br>";
					//echo $_POST['mail']."<br>";
					$dom = substr($_POST['email'], strpos($_POST['email'],'@'));
					$dom2 = explode(".", $dom);
					
					if((strlen($dom2[0])-1) >= 2 && (strlen($dom2[0])-1) <= 4)
					{
						//echo "okey";
						$email = $_POST['email'];
					}
					else
					{
						header('Location: mis_datos.php?error=trueeeee');
						exit();
					}
					//echo "dom2 = ".(strlen($dom2[0])-1). "<br>";
					//echo "dom = ".$dom. "<br>";
					
				}
				else
				{
					//echo "El email no tiene la estructura correcta <br>";
					header('Location: mis_datos.php?error=true');
					exit();
				}
				
			}*/
			

			//$sexo = $_POST['sexo'];
			/*if(isset($_POST['sexo']))
			{
				//echo "Se ha introducido el sexo correctamente";
				if($_POST['sexo'] == "Hombre")
					$sexo = 0;
				if($_POST['sexo'] == "Mujer")
					$sexo = 1;
				if($_POST['sexo'] == "Otro")
					$sexo = 2;
			}
			else
			{
				//echo "No se ha introducido el sexo correctamente";
				header('Location: mis_datos.php?error=true');
				exit();
			}*/

			/*$nacimiento = $_POST['fecha'];
			//echo $nacimiento;

			date_default_timezone_set(date_default_timezone_get());
			$date = date('Y/m/d', time());
			if($nacimiento<$date){

			}else{
				header('Location: mis_datos.php?error=true');
				exit();
			}*/

			?>