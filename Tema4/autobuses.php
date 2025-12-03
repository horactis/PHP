<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            text-align: center;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php 
        $lineas = [
            ["Malaga", "Ronda", "120",12],
            ["Churriana","Malaga","20",3],
            ["Malaga","Granada","120",10],
            ["Torrole","Malaga","20",2.5]
        ];

        //ej 1: Añadir dos lineas de autobus
        //ej 2: ordenar el array de mayor a menor duracion
        //ej 3: Mostrar las lineas en una tabla
        array_push($lineas, ["Fuengirola","Malaga","30",5],["Sevilla","Malaga","50",6.5]);
        $duracion = array_column($lineas, 2);
        array_multisort(
            $duracion, SORT_DESC,
            $lineas
        );
    ?>
    <table border="">
        <tr>
            <td>Salida</td>
            <td>Llegada</td>
            <td>Duracion</td>
            <td>Precio</td>
        </tr>
        <?php 
            for ($i=0; $i < count($lineas); $i++) {
                echo "<tr>"; 
                for ($j=0; $j < count($lineas[$i]); $j++) { 
                    echo "<td>".$lineas[$i][$j]."</td>";
                }
                echo "</tr>";  
            }
        ?>
    </table>

    <?php
    array_push($lineas, ["Malaga","Cadiz","120",12],["Sevilla","Granada","100",8]);
    $salida = array_column($lineas, 0);
    $destino = array_column($lineas, 1);
    array_multisort(
        $salida, SORT_ASC,
        $destino, SORT_ASC,
        $lineas
    );
    ?>
    <table border="">
        <tr>
            <td>Salida</td>
            <td>Llegada</td>
            <td>Duracion</td>
            <td>Precio</td>
        </tr>
        <?php 
            for ($i=0; $i < count($lineas); $i++) {
                echo "<tr>"; 
                for ($j=0; $j < count($lineas[$i]); $j++) { 
                    echo "<td>".$lineas[$i][$j]."</td>";
                }
                echo "</tr>";  
            }
        ?>
    </table>
</body>
</html>