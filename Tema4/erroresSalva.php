<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, th , td{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 10px;
        }

    </style>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <table>
    <?php
    $suma = 0;
    $alum = 0;
    echo "<tr>";
    echo "<th> Alumnos </th>";
    echo "<th> Notas </th>";
    echo "</tr>";
    for ($i=1; $i < rand(15,25); $i++) { 
        echo "<tr>";
        echo "<td>";
        # aqui va el numero de alumno
        echo "Alumno $i";
        echo "</td>";
        echo "<td>";
        # aqui va la nota
        $nota = rand(1,20);
        if($nota > 10){
            echo "Nota no disponible...";
        }else{
            echo "$nota ";
            echo match ($nota){
                1,2,3,4 => "Suspenso",
                5,6 => "Bien",
                7,8 => "Notable",
                default => "Sobresaliente"
            };
            $suma += $nota;
            $alum++;
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan='2' ;>La media de la clase es: ". round($suma/$alum) ."</td>";
    echo "</tr>";

    ?>
    </table>
</body>
</html>