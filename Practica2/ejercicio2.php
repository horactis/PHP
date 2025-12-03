<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $estudiantes = [
        [
            "nombre" => "Ana García",
            "edad" => 20,
            "nota" => 8.5,
            "ciudad" => "Madrid",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Carlos Pérez",
            "edad" => 22,
            "nota" => 6.8,
            "ciudad" => "Barcelona",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Laura Martínez",
            "edad" => 19,
            "nota" => 9.2,
            "ciudad" => "Valencia",
            "curso" => "1º DAW"
        ],
        [
            "nombre" => "David López",
            "edad" => 21,
            "nota" => 7.5,
            "ciudad" => "Sevilla",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Elena Rodríguez",
            "edad" => 20,
            "nota" => 8.9,
            "ciudad" => "Madrid",
            "curso" => "1º DAW"
        ],
        [
            "nombre" => "Miguel Sánchez",
            "edad" => 23,
            "nota" => 5.5,
            "ciudad" => "Barcelona",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Sara Fernández",
            "edad" => 19,
            "nota" => 9.8,
            "ciudad" => "Valencia",
            "curso" => "1º DAW"
        ],
        [
            "nombre" => "Javier Gómez",
            "edad" => 22,
            "nota" => 7.2,
            "ciudad" => "Madrid",
            "curso" => "2º DAW"
        ]
    ];
    ?>
    <form action="" method="post">
        <h1>Gestion de Estudiantes</h1>
        <label for="datos">Acción a realizar</label>
        <select name="datos">
            <option disabled selected>-- Selecciona una opción --</option>
            <option value="n">Nombres(A-Z)</option>
            <option value="c">Ciudad(A-Z)</option>
            <option value="e">Extraer nombres y notas</option>
            <option value="cn">Calcular nota</option>
        </select>
        <input type="submit" value="Procesar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $media = 0;
        if($_POST["datos"] == "n"){
            echo "<table width='100%' cellpading='15' border='2'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Edad</th>";
            echo "<th>Nota</th>";
            echo "<th>Ciudad</th>";
            echo "<th>Curso</th>";
            foreach($estudiantes as $dato => $valor){
                echo "<tr>";
                foreach ($valor as $a) {
                    echo "<td>$a</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }elseif ($_POST["datos"] == "c"){
            
            echo "<table width='100%' cellpading='15' border='2'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Edad</th>";
            echo "<th>Nota</th>";
            echo "<th>Ciudad</th>";
            echo "<th>Curso</th>";
            foreach($estudiantes as $dato => $valor){
                echo "<tr>";
                foreach ($valor as $a) {
                    echo "<td>$a</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }elseif ($_POST["datos"] == "e"){
            echo "<ul>";
            foreach($estudiantes as $dato => $valor){
                echo "<li>";
                foreach ($valor as $a => $datos) {
                    if($a == "nombre") echo $datos." - ";
                    if($a == "nota") echo $datos;
                }
                echo "</li>";
            }
            echo "</ul>";
        }elseif ($_POST["datos"] == "cn"){
            $cont = 0;
            foreach($estudiantes as $dato => $valor){
                foreach ($valor as $a => $datos) {
                    if($a == "nota") $media += $datos;
                }
                $cont++;
            }
            $resultado = number_format($media/$cont, 2);
            echo "Nota media: ".$resultado;
        }else{
            echo "Elige una opcion";
        }
    }
    ?>
</body>
</html>