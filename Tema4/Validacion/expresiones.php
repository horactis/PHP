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
    <?php
    /**
     * /patron/ : es el patron de la expresion regular
     * 
     * Patrones comunes
     * 
     * \d : Un digito (0-9)
     * \w : Un carácter alfanumerico (letras y números y guíon bajo)
     * \s : Un espacio en blanco
     * . : Cualquier carácter exceptuando el salto de linea
     * + : Uno o más de la expresion anterior(Ej: si tengo \d+ entonces mi patron será uno o mas digitos)
     * * : Cero o más de la expresion anterior
     * ^ : Comienza con
     * $ : Termina con
     * 
     * [] : Define un conjunto de caracteres que puede coincidir con cualquiera de los caracteres que están dentro del conjunto (Ej: [$%&!?])
     * {8} : Se repetira el patron anterior 8 veces
     * {8,10} : Se repetira de 8 a 10 veces
     * {8,} : Se repetira 8 o más veces
     * {,8} : Se repetira 8 o menos veces
     * 
     * (?=.*) : Es una expresion de busqueda anticipada positiva que verifica que la condicion dentro de los parentesis este presente en algun lugar de la cadena
     */

    $cadena = "hola123";
    if(preg_match("/\d/", $cadena)) echo "la cadena tiene numeritos";
    else echo "la cadena no tiene numeritos";
    echo "<br>";
    $cadena = "hola";
    if(preg_match("/\w/", $cadena)) echo "la cadena tiene caracteres alfanumericos";
    else echo "la cadena no tiene caracteres alfanumericos";
    echo "<br>";
    $cadena = "hola que tal";
    if(preg_match("/\S/", $cadena)) echo "la cadena tiene espacios";
    else echo "la cadena no tiene espacios";
    echo "<br>";
    $cadena = "1234hola";
    if(preg_match("/^\d{4}/", $cadena)) echo "la cadena tiene 4 numeros al principio";
    else echo "la cadena no 4 numeros al principio";
    echo "<br>";
    $cadena = "1234hola";
    if(preg_match("/\w$/", $cadena)) echo "la cadena termina con caracteres alfanumericos";
    else echo "la cadena no termina con caracteres alfanumericos";
    echo "<br>";
    $cadena = "1234";
    if(preg_match("/^\d+$/", $cadena)) echo "la cadena empieza y termina con números";
    //Sirve para acotar la cadena solamente digitos, sin letras de por medio
    else echo "la cadena no empieza y termina con números";
    echo "<br>";
    //Vamos a detectar vocales
    
    $cadena = "1a2b3";
    if(preg_match("/[aeiou]/", $cadena)) echo "la cadena tiene vocales";
    else echo "la cadena no tiene vocales";

    echo "<br>";
    //Vamos a detectar mayusculas
    $cadena = "1A23";
    if(preg_match("/[A-Z]/", $cadena)) echo "la cadena tiene mayusculas";
    else echo "la cadena no tiene mayusculas";
    echo "<br>";
    $cadena = "Hola123";
    //tiene que tener una mayuscula y una minuscula
    /**
     * Primer requisito: que haya una mayuscula (?=.*[A-Z])
     * Segundo requisito: que haya una minuscula (?=.*[a-z])
     */
    if(preg_match("/(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{8}/", $cadena)) echo "la cadena tiene mayusculas y minusculas";
    else echo "la cadena no tiene mayusculas y minusculas";
    ?>
</body>
</html>