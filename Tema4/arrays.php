<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
      error_reporting( E_ALL );
      ini_set("display_errors",1); 
    ?>
</head>
<body>
    <?php
        //ARRAYS NO ASOCIATIVOS (SOLO VALORES)
        $array = array(1,2,3,4,"5",true,null,1.2,"la vida es preciosa");
        //$array =[1,2,3,4,"5"];
        echo var_dump($array);

        echo "<br>";

        print_r($array);

        echo "<br>";

        $array1 = [1,2,3,4,"5"];
        $array2 = [1,2,3,4,5];

        if ($array1 == $array2) echo "<br>Son iguales.<br>";
        else "<br>No son iguales<br>";

        //ARRAY ASOCIATIVOS (CLAVE VALOR)
        $verduras = array(
            2 => "pimientos",
            true => "lechuga",
            2.3 => "nabo",
            "xino" => "calabacin"
        );
        $verduras2 = [
            "mercadona" => "pimientos",
            "lidl" => "lechuga",
            "supercor" => "nabo",
            "xino" => "calabacin"
        ];

        print_r($verduras2);

        $frutas = ["manzana","pera","platano","mango"];
        foreach($verduras2 as $pepe){
            echo $pepe;
        }
        echo "<br>";
        print_r($verduras2);
        echo "<br>";
        foreach($verduras2 as $supermercado => $verdura){

        }
        array_push($frutas, "sandia","pera","chirimoya");
        $frutas[7] ="melon";
        $frutas[]= "tomate";
        $frutas[80]="papaya";
        print_r($frutas);
        $frutas = array_values($frutas);
        print_r($frutas);
    ?>

    <ol>
        <?php
            for ($i=0; $i < count($frutas); $i++) { //el count es el .length
        ?>
        <li>
            <?php echo $frutas[$i] ?> 
        </li>

        <?php }?>
    </ol>

    <?php
        unset($frutas[7]);
        print_r($frutas);
        $frutas = array_values($frutas);
    ?>
</body>
</html>