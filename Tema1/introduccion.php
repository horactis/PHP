<?php
    $nombre = "Jesus";
    $edad = 24;
    $altura = 2.0;
    //echo "El nombre de mi compi es $nombre, tiene de edad $edad y su altura es $altura"

    //echo "El nombre de mi compi es ".$nombre.", tiene ".$edad." años y mide ".$altura." metros";

    //echo "La suma de la variable edad y la variable altura es ".$edad+$altura;

    //echo date("d/m/Y H:i:s");

    $num1 = 10;
    $num2 = 20;
    /*
    echo "La suma es ".$num1+$num2;
    echo "<br>";
    echo "La resta es ".$num1-$num2;
    echo "<br>";
    echo "La multiplicacion es ".$num1*$num2;
    echo "<br>";
    echo "La division es ".$num1/$num2;
    echo "<br>";
    */
    $num1 += $num2;
    echo "La suma es ".$num1;
    echo "<br>";
    $num1 = 10;
    $num1 -= $num2;
    echo "La resta es ".$num1;
    echo "<br>";
    $num1 = 10;
    $num1 /= $num2;
    echo "La division es ".$num1;
    echo "<br>";
    $num1 = 10;
    $num1 *= $num2;
    echo "La multiplicacion es ".$num1;
    echo "<br>";

    $num = 1;
    $float = 2.5;
    $cadena = "hola";
    $nulo;
    $boolean = true;

    echo gettype ($num);
    echo "<br>";
    echo gettype ($float);
    echo "<br>";
    echo gettype ($cadena);
    echo "<br>";
    echo gettype ($nulo);
    echo "<br>";
    echo gettype ($boolean);
    echo "<br>";

    $num1 = 10;
    $num2 = 20;
    $caso1 = !(($num1 > $num2) || (10<=11));
    echo "Caso 1: ".$caso1;
    echo "<br>";
    $num1 = "1";
    $num2 = 1;
    $caso2 = $num1 == $num2;
    echo "Caso 2 con ==: ".$caso2;
    echo "<br>";

    $caso2 = $num1 === $num2;
    echo "Caso 2 con ===: ".$caso2;
    echo "<br>";

    echo "Es mayor 14 que 10?: ".(14>10)."<br>";

    echo "Es igual 21 a 13 y es 14 menor o igual que 20?: ".( (21==13 && 14<=20) )."<br>";
    echo "Es 14 mayor o igual a 2 o es 21 menor que 20?: ".( (14>=2 || 21<20) )."<br>";

    define("PI", 3.14159);
    
    echo PI;//el nombre de la constante siempre sin el dolar
    
    //de X a String
    $numerito = 1;
    echo "<br>Número decimal: ";
    var_dump($numerito);
    $deIntAString = strval($numerito);
    var_dump($deIntAString);//tambien puedes poner var_dumpp(strval($numerito));

    //de X a Int
    $numerito ="12";
    echo "<br>Cadena de caracteres: ";
    var_dump($numerito);
    var_dump(intval($numerito));
?>