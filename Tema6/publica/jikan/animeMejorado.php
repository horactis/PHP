<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id = $_GET["patapa"];
    $apiURL ="https://api.jikan.moe/v4/anime/$id/full";

    //Qué es cURL? Es un recurso que mantiene la configuración de la peticion URL:
    // en la configuracion de la URL podemos especificar cosas como metodos GET/POST(para los formularios), headers, timeouts, si te devuelve las respuestas como string.. etc


    $curl = curl_init(); // Iniciar una sesion cURL. Por que? Porque cURL requiere de una estructura en memoria para almacenar la informacio

    //curl_setopt()
    curl_setopt($curl, CURLOPT_URL, $apiURL); //Establece la URL que vamos a consultar
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Devuelve el resultado de url en vez de imprimirlo
    $res = curl_exec($curl); // Ejecutar la peticion y almacenar la respuesta
    curl_close($curl);

    //var_dump($res)

    // vamos a sacar en una tabla el ranking, el titulo, titulo en japo, nota, imagen de portada
    $datos = json_decode($res, true);
    $anime = $datos["data"];
    ?>

    <h1><?= $anime["title"] ?></h1>
    <h1><?= $anime["title_japanese"] ?></h1>
    <p><?= "Puntuacion: ".$anime["score"], "Episodios: ".$anime["episodes"]?></p>
    <img src="<?= $anime["images"]["jpg"]["large_image_url"]?>" alt="">
    <h3>Sinopsis</h3>
    <p><?= $anime["synopsis"]?></p>

    <h4>Productores</h4>
    <ul>
        <?php
        foreach($anime["producers"] as $productoras){
        ?>
        <li>
            <a href="<?= $productoras["url"]?><?= $productoras["name"]?>"></a>
        </li>
        <?php
        }
        ?>
    </ul>
    <h3>Generos</h3>
    <ol>
        <?php
        $generos = $anime["genres"];
        foreach($generos as $genero){
            ?>
            <li>
                <?= "Nombre del género: ".$genero["name"]. "URL: ".$genero["url"] ?>
            </li>
        <?php
        }
        ?>
    </ol>
    
</body>
</html>