<?php
/**
 * Vamos a crear una conexión entre PHP y la bbdd mysql, usando la clase "mysqli"
 * 
 * new mysqli(...) es el constructor de la clave mysqli, que se utiliza para inicializar
 * un objeto que representa la conexion a la bbdd.
 * 
 * si se produce la conexión, la variable donde guardamos el objeto, contendrá un objeto
 * de la clase mysqli, que podemos usar con la bbdd (realizar consultas, manejor de
 * errores...)
 * si se produce un fallo al conectarse, el método "connect_error" de este objeto
 * contendrá info sobre el por qué no hemos podido conectarnos.
 * 
 */
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    
    $_servidor = "localhost";
    $_usuario = "MEDAC";
    $_contraseña = "MEDAC";
    $_bd = "peliculas_bd";

    $_conexion = new mysqli($_servidor, $_usuario, $_contraseña, $_bd);

    if($_conexion->connect_error){
        die("Errpr en la conexión: ".$_conexion->connect_error);
    }
    //var_dump($_conexion->connect_error);
    //echo "Conectaos :D";
    //$_conexion->close();
    //echo "<br>".$_conexion->host_info;
    //echo "<br>".$_conexion->server_info;
    //echo "<br>".$_conexion->server_version;
?>