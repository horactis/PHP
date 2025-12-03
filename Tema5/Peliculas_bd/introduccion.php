<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    require "Sesion/conexion.php";
    ?>
</head>
<body>
    <?php
        $consulta = "SELECT * FROM peliculas";
        $resultado = $_conexion->query($consulta);
        //en resultado guardaremos un objeto mysqli_result. Es decir, el conjunto de resultados de la consulta. Incluye todas las filas devueltas por el SELECT y mantiene un puntero interno a la siguiente fila por leer.

        //var_dump($resultado);
        
        /*while($fila = $resultado->fetch_assoc()){
            echo "<pre>";
            print_r($fila);
            echo "</pre>";
        }
        var_dump($fila);
        */
    ?>
    <table border="1">
        <?php
        $fila = $resultado->fetch_assoc();
        echo "<tr>";
        foreach ($fila as $descrip => $dato) {
            if($descrip == "titulo"||$descrip == "nombre_estudio"||$descrip == "anno_estreno"||$descrip == "duracion"){
                echo "<th>$descrip</th>";
            }
        }
        echo "</tr>";
        $resultado = $_conexion->query($consulta);
        while($fila = $resultado->fetch_assoc()){
            echo "<tr>";
            foreach ($fila as $descrip => $dato) {
                if($descrip == "titulo"||$descrip == "nombre_estudio"||$descrip == "anno_estreno"||$descrip == "duracion"){
                    echo "<td>$dato</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <table border="1">
    <?php
    $resultado = $_conexion->query($consulta);
    //echo "<pre>";
    //print_r($resultado->fetch_all());
    //echo "</pre>";
    $cabecera = $resultado->fetch_assoc();
    echo "<tr>";
    foreach ($cabecera as $descrip => $dato) {
        if($descrip == "titulo"||$descrip == "nombre_estudio"||$descrip == "anno_estreno"||$descrip == "num_temporadas"){
            echo "<th>$descrip</th>";
        }
    }
    echo "</tr>";
    $resultado = $_conexion->query($consulta);
    $fila = $resultado->fetch_all();
    for ($i=0; $i < count($fila); $i++) {
        if($fila[$i][4] > 2){
            echo "<tr>";
            for ($j=0; $j < count($fila[$i]); $j++) {
                if($j == 1||$j == 2||$j == 3||$j == 4){
                    echo "<td>".$fila[$i][$j]."</td>";
                }
            }
            
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>