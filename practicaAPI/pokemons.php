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
    <h1>Lista de pokemitos</h1>
    <?php
    //Ejercicio 1
    $pagina = isset($_GET["offset"]) ? $_GET["offset"] : 0;
    
    $limite =  50;

    $apiURL = "https://pokeapi.co/api/v2/pokemon-form?".http_build_query([
        "offset" => $pagina,
        "limit" => $limite
    ]);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($curl);
    curl_close($curl);
    $datos = json_decode($res, true);

    $actual = htmlspecialchars($_SERVER["PHP_SELF"]);

    if($datos["previous"] != null){
        echo "<a href='$actual?offset=".($pagina-50)."&limit=$limite'>Anterior | </a>";
    }

    echo "<a href='$actual?offset=".($pagina+50)."&limit=$limite'>Siguiente</a>";    

    //Ejercicio 2
    $pokemons = $datos["results"];
    foreach($pokemons as $pokemon){
        echo "<p><b>".$pokemon["name"]."</b></p>";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $pokemon["url"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);
        $datosp = json_decode($res, true);
        echo "<img src='".$datosp["sprites"]["front_default"]."'><br>";
        echo "<a href='infoPokemon.php?name=".$pokemon["name"]."'>Más informacion sobre ".$pokemon["name"]."</a>";
    }

    ?>
</body>
</html>