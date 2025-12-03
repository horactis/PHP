<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
      error_reporting( E_ALL ); //todos los errores que pueda recoger
      ini_set("display_errors",1); //para modificar el valor de una variable del fichero de configuracion. y el display es para mostrar los errores
    ?>
</head>
<body>
    <?php 
        $cadena;
        echo $cadena;
        echo 10/0;
    ?>
</body>
</html>