<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    ?>
</head>
<body>
    <?php
    $pelis = [
        "Shrek" => [
            "genero" => "niños",
            "precio_dia" => 3.2,
            "duracion" => 180,
        ],
        "LOTR" => [
            "genero" => "chads",
            "precio_dia" => 7.7,
            "duracion" => 3000,
        ],
        "Spider-man" => [
            "genero" => "supeheroe",
            "precio_dia" => 4.5,
            "duracion" => 300,
        ]
    ];
    ?>
    <form action="" method="POST">
        <label for="shrek">Shrek</label>
        <input type="number" name="shrek"><br><br>
        
        <label for="LOTR">LOTR</label>
        <input type="number" name="LOTR"><br><br>

        <label for="Spider-man">Spider-man</label>
        <input type="number" name="Spider-man"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $shrek = $_POST["shrek"];
        $lotr = $_POST["LOTR"];
        $spider = $_POST["Spider-man"];
    }
    ?>
    <table border="">
        <tr>
            <td>Peli</td>
            <td>Genero</td>
            <td>Precio_dia</td>
            <td>Duracion</td>
            <td>Dias</td>
            <td>Subtotal</td>
        </tr>
        <?php
        foreach ($pelis as $nombre => $a) {
            echo "<tr>";
            if($shrek > 0){
                if($nombre == "Shrek"){
                    echo "<td>$nombre</td>";
                    foreach ($a as $dato => $valor) {
                        echo "<td>$valor</td>";
                        if($dato == "precio_dia") $pv = $valor;
                    }
                    echo "<td>$shrek</td>";
                    echo "<td>".$shrek*$pv;
                }
            }if($lotr > 0){
                if($nombre == "LOTR"){
                    echo "<td>$nombre</td>";
                    foreach ($a as $dato => $valor) {
                        echo "<td>$valor</td>";
                        if($dato == "precio_dia") $pv = $valor;
                    }
                    echo "<td>$lotr</td>";
                    echo "<td>".$lotr*$pv;
                }
            }if($spider > 0){
                if($nombre == "Spider-man"){
                    echo "<td>$nombre</td>";
                    foreach ($a as $dato => $valor) {
                        echo "<td>$valor</td>";
                        if($dato == "precio_dia") $pv = $valor;
                    }
                    echo "<td>$spider</td>";
                    echo "<td>".$spider*$pv;
                }
            }
            
            echo "</tr>";
            
        }
        ?>
    </table>
</body>
</html>