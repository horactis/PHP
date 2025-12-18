<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    require "sesion/conexion.php";
    
    ?>
</head>
<body>
    <?php
        $consulta = "SELECT * FROM peliculas";
        $resultado = $_conexion->query($consulta);
        // en resultado guardaremos un objeto mysqli_result. 
        //Es decir, el conjunto de resultados de la consulta. 
        //Incluye ftodas las filas devueltas por el SELECT y mantiene un puntero interno
        // a la siguiente fila por leer

        var_dump($resultado);

        while($fila = $resultado->fetch_assoc()){
            echo "<pre>";
            print_r($fila);
            echo "</pre>";
        }
        
        var_dump($fila);


        $resultado = $_conexion->query($consulta);
    ?>
    <table border="">
        <thead>
            <tr>
            <?php
            $cabecera = $resultado->fetch_assoc();
            foreach($cabecera as $clave => $valor){
                switch($clave){
                    case "titulo":
                        echo "<th>$clave</th>";
                        break;
                    case "nombre_estudio":
                        echo "<th>$clave</th>";
                        break;
                    case "anno_estreno":
                        echo "<th>$clave</th>";
                        break;
                    case "duracion":
                        echo "<th>$clave</th>";
                        break;
                }
            }
            
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultado = $_conexion->query($consulta);
            while($fila = $resultado->fetch_assoc()){
                echo "<tr>";
            foreach($fila as $clave => $valor){
                switch($clave){
                    case "titulo":
                        echo "<th>$valor</th>";
                        break;
                    case "nombre_estudio":
                        echo "<th>$valor</th>";
                        break;
                    case "anno_estreno":
                        echo "<th>$valor</th>";
                        break;
                    case "duracion":
                        echo "<th>$valor</th>";
                        break;
                }
            }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $resultado = $_conexion->query($consulta);
    echo "<pre>";
    print_r($resultado->fetch_all());
    echo "</pre>";
    ?>
</body>
</html>