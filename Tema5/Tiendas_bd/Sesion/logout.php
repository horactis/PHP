<?php
session_start(); //Recogemos la sesion
$_SESSION = []; //Limpiamos el array de la sesión
session_destroy(); //Eliminamos todos los datos de la sesión del servidor PERO la cookie_PHPSESSID sigue existiendo en el navegador (pero sin datos asociados)
header("location: login.php"); //Redirigir al cliente al login
exit();
?>