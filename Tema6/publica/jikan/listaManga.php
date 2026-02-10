<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   error_reporting(E_ALL);
   ini_set("display_errors",1);
    //Paginacion.

    //1) vamos a leer la pagina actual desde la url, es decir, en que pagina estamos
    //url?page=1, ?page=2...
    //if(isset($_GET["page"]))
    //    $pagina = $_GET["page"];
    //$pagina = 1;

    $pagina = isset($_GET["page"]) ? $_GET["page"] : 1;

    //2) Cuantos resultados quiero por pagina
    $maxPorPagina = 15;

    //3) Construimos la URL con paginacion (no todas las APIS me dejan, jikan en especifico si me deja pero hay que tener cuidado porque puede ser que otras no)

    $apiURL ="https://api.jikan.moe/v4/top/manga?". http_build_query([
        "page" => $pagina,
        "limit" => $maxPorPagina
    ]);
    //$apiURL = "https://api.jikan.moe/v4/top/anime?page=$pagina&limit=$maxPorPagina";
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
    $animes = $datos["data"];

    $paginacion = $datos["pagination"];

    $paginaActual = $paginacion["current_page"] ?? $pagina;
    $ultimaPagina = $paginacion["last_visible_page"] ?? $pagina;
    $tieneSiguiente = $paginacion["has_next_page"] ?? false;

    // para construir un enlace a la misma pagina usaremos $_SERVEr
    $actual = htmlspecialchars($_SERVER["PHP_SELF"]);

   ?>
   <div>
        <?php
            if($paginaActual > 1){
                echo "<a href='$actual?page=".($paginaActual-1)."'>Ir atrás</a>";
            }
            echo "Pagina ".$paginaActual." de ".$ultimaPagina." (".$maxPorPagina." animes por pagina)";
            if($tieneSiguiente){
                echo "<a href='$actual?page=".($paginaActual+1)."'>Siguiente</a>";
            }
            
        ?>
   </div>
   <table>
    <thead>
        <tr>
            <th>Posicion</th>
            <th>Tiutlo</th>
            <th>Arigato</th>
            <th>Nota</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($animes as $anime){
 
        ?>
        <tr>
            <td><?=$anime["rank"]?></td>
            <td><?=$anime["title"]?></td>
            <td><a href="animeMejorado.php?patapa"<?= $anime["mal_id"]?>></a></td>
            <td><?=$anime["title_japanese"]?></td>
            <td><?=$anime["score"]?></td>
            <td>
                <img src="<?= $anime["images"]["jpg"]["image_url"] ?>">
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
   </table>
</body>
</html>