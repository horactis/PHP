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
    <h1>Primeros 20 personajes</h1>
<!--Sacar el nombre, la altura, peso, genero 
la info de cada personaje estara dentro de un contenedos-->
    <?php
    for ($i=1; $i <= 20; $i++) { 
        $apiURL ="https://swapi.info/api/people/$i";
        $curl = curl_init(); // Iniciar una sesion cURL. Por que? Porque cURL requiere de una estructura en memoria para almacenar la informacio

        //curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $apiURL); //Establece la URL que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Devuelve el resultado de url en vez de imprimirlo
        $res = curl_exec($curl); // Ejecutar la peticion y almacenar la respuesta
        curl_close($curl);
        $datos = json_decode($res, true);
        ?>
        <div border=1px solid black>
            <h3>Datos de <?= $datos["name"]?></h3>
            <ul>
                <li>Altura: <?= $datos["height"]?></li>
                <li>Peso: <?= $datos["mass"]?></li>
                <li>Genero: <?php
                if($datos["gender"] == "n/a")
                    echo "No preguntes";
                else
                    echo $datos["gender"];
                ?>
                </li>
            </ul>

            <h3>Nombre del planeta natal</h3>
            <?php
            $apiURL = $datos["homeworld"];
            $curl = curl_init(); // Iniciar una sesion cURL. Por que? Porque cURL requiere de una estructura en memoria para almacenar la informacio
            
            curl_setopt($curl, CURLOPT_URL, $apiURL); //Establece la URL que vamos a consultar
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Devuelve el resultado de url en vez de imprimirlo
            $res = curl_exec($curl); // Ejecutar la peticion y almacenar la respuesta
            curl_close($curl);
            $datosPlaneta = json_decode($res, true);

            echo "<p>".$datosPlaneta["name"]."</p>";

            // Hay que sacar el nombre de todas las pelis en las que ha salido cada pj en un li cada peli de una lista ordenada

            // Sacar nombre, longitud y clase de los vehiculos que ha usado cada pj

            // Sacar nombre, tripulacion y precio de las naves espaciales que ha pilotado cada pj
            ?>
            <h3>Pelis en las que sale</h3>
            <ol>
                <?php
                $pelis = $datos["films"];
                for ($i=0; $i < count($pelis); $i++) {
                    $apiURL = $pelis[$i];
                    $curl = curl_init(); // Iniciar una sesion cURL. Por que? Porque cURL requiere de una estructura en memoria para almacenar la informacio
                        
                    curl_setopt($curl, CURLOPT_URL, $apiURL); //Establece la URL que vamos a consultar
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Devuelve el resultado de url en vez de imprimirlo
                    $res = curl_exec($curl); // Ejecutar la peticion y almacenar la respuesta
                    curl_close($curl);
                    $datosPeli = json_decode($res, true);

                    echo "<li>".$datosPeli["title"]."</li>";    
                }
                ?>
            </ol>
            <h3>Vehiculos usados</h3>
            <ol>
                <?php
                $vehiculos = $datos["vehicles"];
                for ($i=0; $i < count($vehiculos); $i++) {
                    $apiURL = $vehiculos[$i];
                    $curl = curl_init(); // Iniciar una sesion cURL. Por que? Porque cURL requiere de una estructura en memoria para almacenar la informacio
                        
                    curl_setopt($curl, CURLOPT_URL, $apiURL); //Establece la URL que vamos a consultar
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Devuelve el resultado de url en vez de imprimirlo
                    $res = curl_exec($curl); // Ejecutar la peticion y almacenar la respuesta
                    curl_close($curl);
                    $datosvehiculo = json_decode($res, true);

                    echo "<li>Nombre: ".$datosvehiculo["name"]."</li>";
                    echo "<li>Longitud: ".$datosvehiculo["length"]."</li>";
                    echo "<li>Clase: ".$datosvehiculo["vehicle_class"]."</li>";    
                }
                ?>
            </ol>
            <h3>Naves espaciales que ha pilotado</h3>
            <ol>
                <?php
                $naves = $datos["starships"];
                for ($i=0; $i < count($naves); $i++) {
                    $apiURL = $naves[$i];
                    $curl = curl_init(); // Iniciar una sesion cURL. Por que? Porque cURL requiere de una estructura en memoria para almacenar la informacio
                        
                    curl_setopt($curl, CURLOPT_URL, $apiURL); //Establece la URL que vamos a consultar
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Devuelve el resultado de url en vez de imprimirlo
                    $res = curl_exec($curl); // Ejecutar la peticion y almacenar la respuesta
                    curl_close($curl);
                    $datosnave = json_decode($res, true);

                    echo "<li>Nombre: ".$datosnave["name"]."</li>";
                    echo "<li>Precio: ".$datosnave["cost_in_credits"]."</li>";
                    echo "<li>Tripulacion: ".$datosnave["crew"]."</li>";    
                }
                ?>
            </ol>
        </div>
        <?php
        }
        ?>
</body>
</html>