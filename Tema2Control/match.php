<?php
    /**
     * ESTRUCTURA DEL MATCH
     * $resultado = match ($numero){
     *      1 => "Se ha escogido el primer número",
     *      2 => "Se ha escogido el segundo número",
     *      3 => "Se ha escogido el tercer número",
     * };
     */
    $dia = rand(1,6);
    $clases = match ($dia) {
        1 => "No tenemos clases de servidor",
        2 => "No tenemos clases de servidor",
        3 => "TENEMOS servidor",
        4 => "TENEMOS servidor",
        5 => "TENEMOS servidor",
        default => "FINDEEEE",
    };
    echo $clases
?>