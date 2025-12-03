<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            display: flex;
            justify-content: center;
        }

        tr, td, th{
            border: 1px solid black;

        }
    </style>
</head>
<body>
    <?php
        $doc = array(
            "213213213" => "Ale",
            "543536363" => "Salva",
            "077674390" => "Alvaro",
            "412737485" => "Jesu",
            "318426525" => "Laura"
        );
        print_r($doc);
        echo "<br>".$doc["213213213"];
        
    ?>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
            foreach ($doc as $clave => $elemento) {
        ?>
        <tr>
            <td><?php echo $clave ?></td>
            <td><?php echo $elemento ?></td>
        </tr>
        <?php }?>
    </table>
    <?php
        $doc ["3131314126"] = "pakito";
        $doc [] ="maripili";
        print_r($doc);

        unset($doc[0]);
        unset($doc["318426525"]);
        print_r($doc);

        $doc = array_values($doc);
        print_r($doc);
        echo "<br>";
        //sort($doc); //Ordena un array por valor reseteando las claves ascendentemente
        //rsort($doc);//Ordena un array por valor reseteando las claves descendentemente
        asort($doc);//Ordena por valor ascendentemente manteniendo claves
        arsort($doc);//Ordena por valor descendentemente manteniendo claves
        ksort($doc)//Ordena por clave ascendentemente
        //---------------------IMPORTANTE----------- sort() y rsort() RESETEAN CLAVES!!!!!!!

    ?>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
            foreach ($doc as $clave => $elemento) {
        ?>
        <tr>
            <td><?php echo $clave ?></td>
            <td><?php echo $elemento ?></td>
        </tr>
        <?php }?>
    </table>

    <?php
        $alumnos = array(
            "Ale" => 8,
            "Salva" => 10,
            "alvaro" => 9,
            "Lucia" => 6,
            "Laura" => 7,
            "Carlos" => 3,
            "Mario" => 2,
            "Ismael" => 5
        );
        $color="";
        $notaA=0;
    ?>

    <table>
        <tr>
            <th>Alumno</th>
            <th>Nota</th>
            <th>Nota String</th>
        </tr>
        <?php foreach ($alumnos as $nombre => $nota) { 
            switch (true) {
                case ($alumnos[$nombre] < 5):
                    $notaA = "Susp";//rojo
                    $color = "red";
                    break;
                case ($alumnos[$nombre] < 7):
                    $notaA = "Bien";//naranja
                    $color = "orange";
                    break;
                case ($alumnos[$nombre] < 9):
                    $notaA = "Notable";//verde
                    $color = "green";
                    break;
                default:
                    $notaA = "Sobresaliente";//azul
                    $color = "blue";
                    break;
            }
        ?>
        <tr style="background-color: <?php echo $color?>;">
            <td><?php echo $nombre?></td>
            <td><?php echo $nota?></td>
            <td><?php echo $notaA?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>