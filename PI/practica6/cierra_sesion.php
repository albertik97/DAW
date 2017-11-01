<?php
session_start();
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
?>