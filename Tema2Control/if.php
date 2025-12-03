<?php
    //Formas de hacer una estructura de control if
    $a = 3;
    //primera forma
    if($a > 0){
        echo "El numero es positivo<br>";
    }

    //segunda forma
    if($a > 0) echo "El numero es positivo<br>";
    
    //tercera forma
    if($a > 0):
        echo "El numero es positivo<br>";
    endif;

    //Formas de hacer una estructura de control if else
    $b = 3;
    //primera forma
    if($b < 0){
        echo "El numero es negativo<br>";
    }else{
        echo "El numero es positivo o 0<br>";
    }

    //segunda forma
    if($b < 0) echo "El numero es negativo<br>";
    else echo "El numero es positivo o 0<br>";

    //tercera forma
    if($b < 0):
        echo "El numero es negativo<br>";
    else:
        echo "El numero es positivo o 0<br>";
    endif;

    //Formas de hacer una estructura de control else if
    $c = 3;
    //primera forma
    if($c == 0){
        echo "El numero es 0<br>";
    }elseif($c < 0){
        echo "El numero es negativo<br>";
    }else{
        echo "El numero es positivo<br>";
    }

    //segunda forma
    if($c == 0) echo "El numero es 0<br>";
    elseif($c < 0) echo "El numero es negativo<br>";
    else echo "El numero es positivo<br>";
    
    //tercera forma
    if($c == 0):
        echo "El numero es 0<br>";
    elseif($c < 0):
        echo "El numero es negativo<br>";
    else:
        echo "El numero es positivo<br>";
    endif;
?>