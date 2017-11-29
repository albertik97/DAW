<?php


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
						//echo ord(substr($usuario, $i, 1)). "  es un caracter correcto<br>";
					}
					else
					{
						//echo substr($usuario, $i, 1). "  NO es un caracter correcto <br>";
						header('Location: mis_datos.php?error=true');
						exit();
					}
				}
			}
			
			$pass = $_POST['pass'];
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
			}

			if(isset($_POST['email']))
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
						header('Location: mis_datos.php?error=true');
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
				
			}
			

			//$sexo = $_POST['sexo'];
			if(isset($_POST['sexo']))
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
			}

			$nacimiento = $_POST['fecha'];
			//echo $nacimiento;

			date_default_timezone_set(date_default_timezone_get());
			$date = date('Y/m/d', time());
			if($nacimiento<$date){

			}else{
				header('Location: mis_datos.php?error=true');
				exit();
			}

			?>