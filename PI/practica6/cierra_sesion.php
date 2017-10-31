<?php
	// Borra todas las variables de sesión 
 $_SESSION = array(); 
 
 // Borra la cookie que almacena la sesión 
 if(isset($_COOKIE[session_name()])) { 
   setcookie('session_name()', ’’, time() - 42000, ’/’);
}
   unset($_SESSION['user']); //nose si esta bien 
 // Finalmente, destruye la sesión 
 session_destroy();
 header('Location: index.php');
?>