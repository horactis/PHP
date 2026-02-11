<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1)
    ?>
</head>
<body>
    <h1><?= ucfirst($_GET["name"])?></h1>
    <?php
    //Ejercicio 3
    $apiURL = "https://pokeapi.co/api/v2/pokemon/".$_GET["name"];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($curl);
    curl_close($curl);
    $datos = json_decode($res, true);
    echo "<p>Altura: ".$datos["height"]."</p>";
    echo "<p>Peso: ".$datos["weight"]."</p>";
    echo "<p>Id: ".$datos["id"]."</p>";
    ?>
    <h2>Tipos:</h2>
    <ul>
        <?php
        foreach($datos["types"] as $tipos){
            echo "<li>".ucfirst($tipos["type"]["name"])."</li>";
        }
        ?>
    </ul>
</body>
</html>