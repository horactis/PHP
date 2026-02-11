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
    <?php
    //Ejercicio 4
    $limite =  50;

    $apiURL = "https://pokeapi.co/api/v2/evolution-chain?".http_build_query([
        "offset" => 0,
        "limit" => $limite
    ]);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($curl);
    curl_close($curl);
    $datos = json_decode($res, true);

    $actual = htmlspecialchars($_SERVER["PHP_SELF"]);

    for ($i=0; $i < count($datos["results"]); $i++) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $datos["results"][$i]["url"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);
        $datose = json_decode($res, true);
        echo "<hr>";
        echo "<h2>Evoluciones</h2>";
        echo "<ul>";
        echo "<li>Pokemon: ".ucfirst($datose["chain"]["species"]["name"])."</li>";
        if(isset($datose["chain"]["evolves_to"][0]["species"]["name"]))          
        echo"<li>Pokemon: ".ucfirst($datose["chain"]["evolves_to"][0]["species"]["name"])."</li>";
        if(isset($datose["chain"]["evolves_to"][0]["evolves_to"][0]["species"]["name"]))
        echo"<li>Pokemon: ".ucfirst($datose["chain"]["evolves_to"][0]["evolves_to"][0]["species"]["name"])."</li>";
        echo "</ul>";
        echo "<hr>";
    }
    
    ?>
</body>
</html>