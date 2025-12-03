<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Extraño</title>
</head>
<body>
    



    <?php
    #tamaño nxn
    # Si i == j entonces => *
    # Si la suma de las posiciones es par => +
    # Si la suma es impar entonces => -

    function matrizGraciosa($n){
        echo "<pre>";
        for ($i=1; $i <= $n; $i++) { 
            for ($j=1; $j <= $n; $j++) { 
                if ($i == $j) echo "  *  ";
                else{
                    if(($i+$j)%2 == 0) echo "  +  ";
                    else echo "  -  ";
                }            
            }
            echo "<br>";
        }
        echo "</pre>";
    }
    
    matrizGraciosa(5);


    #
    # n= 4
    #
    #

    function floid($n){
        $contador = 1;
        for ($i=1; $i <= $n; $i++) { 
            for ($j=1; $j <= ($i); $j++) { 
                echo " $contador ";
                $contador++;
            }
            echo "<br>";
        }
    }

    floid(5);


    function floidRecto($n){
        echo "<pre>";
        $contador = 1;
        
        for ($i=1; $i <= $n; $i++) { 
            for ($k=$i; $k < ($n+2); $k++) { 
                    if ($contador <10 ) echo "  ";
                    else echo "  ";
                }
            
            for ($j=1; $j <= ($i); $j++) { 
                echo " $contador ";
                $contador++;
                if($contador > 10) echo " ";
                else echo "  ";
            }
            echo "<br>";
        }
        echo "</pre>";
    }
    echo "<br>";
    floidRecto(10);

    echo "<br>";


    function Pascal($n){
        $contador = 1;
        for ($i=1; $i <= $n; $i++) { 
            #if($i>1) 
            echo "1";
            for ($j=1; $j < $i; $j++) { 
                echo " ".($i-1) + ($j)." ";
                $contador++;
            }
            $contador = 0;
            if($i>1)echo "1";
            echo "<br>";
        }
    }

    Pascal(5);

    //EJERCICIO 2: Dado un número guardado en una variable, mostrar la tabla de multiplicar de dicho número con el siguiente formato
        //      num x 1 = ..
        //      num x 2 = ..
    //EJERCICIO 3: Muestra los múltiplos de 3 y 5 entre el 1 y el 100.

    //EJERCICIO 4: declara una variable llamada suma que sea igual a cero y suma todos los números del 1 al 100 creando una suma acumulada.
    //EJERCICIO 5: declara una función con un argumento, dicho argumento servirá para indicar el factorial de qué numero se calculará
    //EJERCICIO 6: haz la suma acumulada de todos los número pares e imprímela por pantalla. También deberá de aparecer la suma acumulada de los impares
    //EJERCICIO 7: Empezando por el número 100, recorre hacia abajo todos los número hasta encontrar el primer múltiplo de 12. Deberá
        // de aparecer por pantalla el primer múltiplo encontrado y a cuantas posiciones estaba del número 100.
    
    
    ?>



</body>
</html>