<?php

    $globalMal = "MAL holi desde fuera";
    function mostrarMal(){
       //echo $globalMal;
    }

    mostrarMal();

    $globalBien = "BIEN holi desde fuera";
    function mostrarBien(){
        global $globalBien;
        echo $globalBien."<br>";
    }

    mostrarBien();

    function contador(){
        static $local = 10;
        $local++;
        echo $local."<br>";
    }
    contador();
    contador();
    $a = 11;
    $b = 12;
    function suma($a,$b){
        $solucion = $a+$b;
        return $solucion;
        //return $a+$b;
    }
    suma($a,$b);

    if($a <= $b){
        $a++;
        $b--;
    }else{
        $a--;
        $b++;
    }
    function igualar($a,$b){
        if($a < $b){
        $a++;
        $b--;
        }elseif($a > $b){
        $a--;
        $b++;
        }
        $res = $a."---".$b;
        return $res;
    }
    $a = 8;
    $b = 10;
    echo igualar($a,$b);
?>