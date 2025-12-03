<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table{
            text-align: center;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php 
    $alumno=[
        "Ale" =>[ 
            "Servidor" => 7,
            "Cliente" => 8,
            "Ingles" => 10,
            "Despliegue" => 6,
            "Diseño" => 4,
            "IPE" => 2,
            "Seguridad" => 5,
            "Proyecto" => 7,
        ],
        "Salva" =>[ 
            "Servidor" => 6,
            "Cliente" => 9,
            "Ingles" => 7,
            "Despliegue" => 4,
            "Diseño" => 3,
            "IPE" => 5,
            "Seguridad" => 10,
            "Proyecto" => 8,
        ],
        "Alvaro" =>[ 
            "Servidor" => 6,
            "Cliente" => 10,
            "Ingles" => 7,
            "Despliegue" => 8,
            "Diseño" => 9,
            "IPE" => 1,
            "Seguridad" => 3,
            "Proyecto" => 4,
        ]
    ];
    ?>
    <!--Ej1-->
    <table border="">
        <tr>
            <th>Alumno</th>
            <th>Asignatura</th>
            <th>Nota</th>
            <th>Calificaciones</th>
        </tr>
        <?php
            foreach ($alumno as $nombre => $asignatura) {      
        ?>
        <tr>
            <td rowspan="9"><?php echo $nombre?></td>
        </tr>
            <?php
                foreach ($asignatura as $nombreAsignatura => $nota) {
                    switch (true) {
                case ($nota < 5):
                    $notaA = "Susp";//rojo
                    $color = "red";
                    break;
                case ($nota < 7):
                    $notaA = "Bien";//naranja
                    $color = "yellow";
                    break;
                case ($nota < 9):
                    $notaA = "Notable";//verde
                    $color = "green";
                    break;
                default:
                    $notaA = "Sobresaliente";//azul
                    $color = "blue";
                    break;
            }      
            ?>
        <tr>
            <td><?php echo $nombreAsignatura?></td>
            <td style="background-color: <?php echo $color?>;"><?php echo $nota?></td>
            <td style="background-color: <?php echo $color?>;"><?php echo $notaA?></td>
        </tr>
        <?php }}?>
    </table>
    <!--Ej2-->
    <?php 
        krsort($alumno);
            foreach ($alumno as $nombre => $asignatura) {
                asort($alumno[$nombre]);
            }
    ?>
    <table border="">
        <tr>
            <th>Alumno</th>
            <th>Asignatura</th>
            <th>Nota</th>
            <th>Calificaciones</th>
        </tr>
        <?php
            foreach ($alumno as $nombre => $asignatura) {
        ?>
        <tr>
            <td rowspan="9"><?php echo $nombre?></td>
        </tr>
            <?php
                foreach ($asignatura as $nombreAsignatura => $nota) {
                    switch (true) {
                case ($nota < 5):
                    $notaA = "Susp";//rojo
                    $color = "red";
                    break;
                case ($nota < 7):
                    $notaA = "Bien";//naranja
                    $color = "yellow";
                    break;
                case ($nota < 9):
                    $notaA = "Notable";//verde
                    $color = "green";
                    break;
                default:
                    $notaA = "Sobresaliente";//azul
                    $color = "blue";
                    break;
            }      
            ?>
        <tr>
            <td><?php echo $nombreAsignatura?></td>
            <td style="background-color: <?php echo $color?>;"><?php echo $nota?></td>
            <td style="background-color: <?php echo $color?>;"><?php echo $notaA?></td>
        </tr>
        <?php }}?>
    </table>
</body>
</html>