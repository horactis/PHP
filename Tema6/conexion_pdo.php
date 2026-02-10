<?php

/**
 * PDO (PHP Data Objects) la usaremos para acceder a bases de datos de manera uniforme y segura.
 * 
 * Es un "traductor universal" que permite a PHP hablar con diferentes tipos de bases de datos usando el mismo lenguaje para todas.
 * 
 * Problemas de Mysqli:
 * 
 * - Solo funciona con MYSQLI/MariaDB
 * - Más vulnerable a inyecciones SQL (si no se usa bien)
 * - Código es menos portable
 * 
 * Ventajas de PDO:
 * 
 * - Compatible con muchos tipos de BBDD
 * - Consultas preparadas por defecto, por tanto es mas seguro
 * - Se pueden manejar errores con excepciones de forma mas robusta
 * - Sintaxis es consistente entre diferentes tipos de BBDD
 */

    $_servidor = "localhost";
    $_bd = "videojuegos_bd";
    $_usuario = "root";
    $_contrasena = "";

    //$_usuario = "MEDAC";
    //$_contrasena = "MEDAC";


    try {
        $_conexion = new PDO(
            "mysql:host=$_servidor;dbname=$_bd;charset=utf8mb4",
            $_usuario,
            $_contrasena
        );
        //DSN => Data Source Name
        //usuario
        //contraseña

        /**
         * :: Es el operador de resolución de ámbito
         * se usa para acceder a miembros estáticos de una clase (metodos estaticos, propiedades estaticas, constantes..)
         * 
         * PDO es una clase y cosas como PDO::ATTR_ERRMODE son constantes de clase que PDO expone para configurar o interpretar comportamientos del objeto
         */
        //Para lanzar exceptiones
        $_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Para que de manera predeterminada extraigamos la informacion de las querys en formato array asociativo
        $_conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        //echo "conectado";
    } catch (PDOException $e) {
        die(" ERROR: No se puede conectar a la BBDD<br> Detalles: {$e->getMessage()}");
    }
?>