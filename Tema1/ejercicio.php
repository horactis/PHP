<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Ejercicio 1</h3>
    <p>Crea un programa que muestre "Hola {aquí tu nombre}" usando una variable donde recojas tu nombre</p>
    <?php
        $nombre ="Alejandro";
        echo "Hola $nombre";
    ?>
    <hr>

    <h3>Ejercicio 2</h3>
    <p>Declara dos variables numéricas e imprime su suma, resta, multiplicación, división y módulo (%).
Además, el mensaje deberá de ser el siguiente: "El resultado de la suma entre {valor variable 1} y {valor variable 2} es: {solucion}"</p>
    <?php
        $num1 = 4;
        $num2 = 5;
        echo "El resultado de la suma entre $num1 y $num2 es: ".$num1+$num2."<br>
        El resultado de la resta entre $num1 y $num2 es: ".$num1-$num2."<br>
        El resultado de la multiplicacion entre $num1 y $num2 es: ".$num1*$num2."<br>
        El resultado de la division entre $num1 y $num2 es: ".$num1/$num2."<br>
        El resultado del modulo entre $num1 y $num2 es: ".$num1%$num2."<br>";
    ?>
    <hr>

    <h3>Ejercicio 3</h3>
    <p>Declara una variable con el valor 5. Imprime su valor antes y después de aplicar el incremento y el decremento</p>
    <?php
        $num = 5;
        echo "valor normal ".$num."<br>";
        $num++;
        echo "valor con incremento ".$num."<br>";
        $num = 5;
        $num--;
        echo "valor con decremento ".$num."<br>";
        

    ?>
    <hr>

    <h3>Ejercicio 4</h3>
    <p>Declara dos variables numéricas y comprueba si:</p>
    <p>1) el primero es mayor que el segundo </p>
    <p>2) ambos son iguales y mayores que 10 </p>
    <p>3) al menos uno es menor que 100  </p>
    <?php
        $num1 = 30;
        $num2 = 20;
        echo $num1>$num2."<br>";
        echo(($num1 == $num2)&&($num1>10))."<br>";
        echo(($num1<100)||($num2<100));
    ?>
    <hr>

    <h3>Ejercicio 5</h3>
    <p>Crea una variable fuera de una función e intenta imprimirla dentro de la función sin usar "global". En caso de no conseguirlo, corrige la llamada a la variable.</p>
    <?php
        $a = "hola";
        function saludo($a){
            echo $a;
        }
        saludo($a);
    ?>
    <hr>

    <h3>Ejercicio 6</h3>
    <p>Crea una función con una variable estática llamada "numerito" inicializada a 2.5, la función deberá de multiplicar por dos el valor de la variable estática y mostrarlo en el navegador. ¿Cambia el resultado de la multiplicación si llamamos a la función varias veces?</p>
    <?php
        function multiplicar(){
            static $numerito = 2.5;
            $numerito *= 2;
            echo $numerito."<br>";
        }
        multiplicar();
        multiplicar();
        multiplicar();
    ?>
    <hr>

    <h3>Ejercicio 7</h3>
    <p>Crea una función con una variable local llamada "numerito2" inicializada a 3.5, la función deberá de dividir por cuatro el valor de la variable local y mostrarlo en el navegador. ¿Cambia el resultado de la división si llamamos a la función varias veces?</p>
    <?php
        function dividir(){
            $numerito2 = 3.5;
            $numerito2 /= 4;
            echo $numerito2."<br>";
        }
        dividir();
        dividir();
        dividir();
    ?>
    <hr>

    <h3>Ejercicio 8</h3>
    <p>Define una constante llamada PHP con el valor "este lenguaje es precioso". Además, impríme el resultado de la constante dentro de una etiqueta h2</p>
    <?php
        define("PHP","este lenguaje es precioso");
        echo "<h2>".PHP."</h2>";
    ?>
    <hr>

    <h3>Ejercicio 9</h3>
    <p>Crea variables con un numero entero, un decimal, un número muy grande (haciendo uso de la notación científica), un booleano y un string. Ahora muestra cada variable haciendo uso de la función var_dump()</p>
    <?php
        $grande = 9.1e10;
        $grande = intval($grande);
        var_dump($grande);
    ?>
    <hr>

    <h3>Ejercicio 10</h3>
    <?php
        $hobby = "pádel";
    ?>
    <h1><?php echo $hobby; ?></h1>
</body>
</html>