<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Ejercicio1</h1>
    <?php
        
        for ($i=1; $i <= 100; $i++) {
            if($i%2 == 0) echo $i." ";
        }
        
    //EJERCICIO 3: Muestra los múltiplos de 3 y 5 entre el 1 y el 100.

    //EJERCICIO 4: declara una variable llamada suma que sea igual a cero y suma todos los números del 1 al 100 creando una suma acumulada.
    //EJERCICIO 5: declara una función con un argumento, dicho argumento servirá para indicar el factorial de qué numero se calculará
    //EJERCICIO 6: haz la suma acumulada de todos los número pares e imprímela por pantalla. También deberá de aparecer la suma acumulada de los impares
    //EJERCICIO 7: Empezando por el número 100, recorre hacia abajo todos los número hasta encontrar el primer múltiplo de 12. Deberá
        // de aparecer por pantalla el primer múltiplo encontrado y a cuantas posiciones estaba del número 100.
    ?>
    <h1>Ejercicio 2</h1>
    <?php
        $num = rand(1,10);
        for ($i=0; $i <= 10; $i++) { 
            echo "$num x $i =".($num*$i)."<br>";
        }
    ?>
    <h1>Ejercicio 3</h1>
    <?php
        for ($i=0; $i <= 100; $i++) { 
            switch (true) {
                case (($i%5==0)&&($i%3==0)):echo $i." Es multiplo de cinco y de tres <br>";
                    break;
                case ($i%5==0): echo $i." Es multiplo de cinco <br>";
                    break;
                case ($i%3==0): echo $i." Es multiplo de tres <br>";
                    break;
            }
        }
    ?>
    <h1>Ejercicio 4</h1>
    <?php
        $suma = 0;
        for ($i=0; $i < 100; $i++) { 
            $suma += $i;
            echo $suma." ";
        }
    ?>
    <h1>Ejercicio 5</h1>
    <?php
        $num1 = rand(0,30);
        function factorial($num1){
            for ($i=0; $i < $num1; $i++) { 
                echo ($num1*$i)." ";
            }
        }
        factorial($num1);
    ?>
    <h1>Ejercicio 6</h1>
    <?php
        $sumapar = 0;
        $sumaimpar = 0;
        for ($i=0; $i < 100; $i++) { 
            if($i%2 == 0){
                $sumapar += $i;
                echo $sumapar." par <br>";
            }else{
                $sumaimpar += $i;
                echo $sumaimpar." impar <br>";
            }
        }
    ?>
    <h1>Ejercicio estrella</h1>
    <?php
        function x($n){
            echo "<pre>";
            for ($i=1; $i <= $n; $i++) { 
                for ($l=1; $l <= $n; $l++) { 
                    echo match(true){
                        (($i == $l)&&($i + $l == $n + 1)) => "X",
                        ($i == $l) => "\\ ",
                        ($i + $l == $n + 1) => "/ ",
                        default => "  "
                    };
                }
                echo "\n";
            }
        }
        x(7)
    ?>
    <h1>Ejercicio floid</h1>
    <?php
        function escalera($n){
            $contador = 1;
            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $i; $j++) { 
                    echo $contador." ";
                    $contador++;
                }
               echo "<br>"; 
            }
        }
        escalera(6)
    ?>
    <h1>Ejercicio floid en piramide</h1>
    <?php
        function piramide($n){
            $contador = 1;
            echo "<pre>";
            
            for ($i=0; $i <= $n; $i++) {
                for ($esp=$n-1; $esp >= $i; $esp--) { 
                    echo " ";
                }
                for ($j=0; $j < $i; $j++) { 
                    echo $contador." ";
                    $contador++;
                    
                }
                
               echo "\n"; 
            }
            echo "</pre>";
        }
        piramide(4)
    ?>
    <h1>Ejercicio porro</h1>
    <?php
        function porro($n){
            echo "<pre>";
            for ($i=1; $i <= $n; $i++) { 
                for ($l=1; $l <= $n; $l++) {
                    echo match(true){
                        (($i == $l)&&($i + $l == $n + 1)) => "X",
                        ($i == $l) => "\\",
                        ($i + $l == $n + 1) => "/",
                        (($l+$i)%2==0) => "+",
                        default => "-"
                    };
                }
                echo "\n";
            }
            echo "</pre>";
        }
        porro(7)
        //Una funcion que devuelva
    ?>
    <h1>Ejercicio 7</h1>
    <?php
        function numeros($n){
            for ($i=0; $i < $n; $i++) { 
                if(2){

                }elseif(1){

                }
            }
        }
    ?>
    
</body>
</html>