<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ol{
            list-style-type: lower-roman;
        }
        table{
            text-align: center;
            
            border-collapse: collapse;
            display: flex;
            justify-content: center;

        }
        td{
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
    $numeroSecreto = 9;
    $intentos = 0;
        do {
            $num = rand(1,50);
            $intentos++;
            echo "Intento numero $intentos. Numero probado: $num<br>";
        } while ($num != $numeroSecreto);
        echo "Se ha encontrado el numero secreto $numeroSecreto en $intentos intentos<br>";

        //primera forma de hacer una lista de los multiplos de 7
       /* echo "<ol>";
            $multiplos=1;
            while($multiplos < 20){
                echo "<li>".($multiplos*7)."</li>";
                $multiplos++;
            }
        echo "</ol>";
        */
        //segunda forma
        /*
        $multiplos=1;
    ?>
    <ol>
        <?php while($multiplos < 20)?>
        <li>
            <?php echo ($multiplos*7);
            $multiplos++;
            ?>
        </li>
        
    </ol>
    */
    ?>

    <?php 
        $numero = intval(rand(300,10000));
        $digitos;
        echo "<br>El numero es $numero";
        while ($numero > 1) {
            $numero /= 10;
            $digitos++;
        }
        echo " y tiene $digitos<br>";

        function exponente($base,$exp){
            $contador=0;
            $multiplica=1;
            while ($contador < $exp) {
                $multiplica *= $base;
                $contador++;
            }
            echo $multiplica."<br>";
        }
        exponente(2,2);
        echo pow(2,2);
    ?>

    <table>
        <?php
            $intentos=1;
            $a=0;
            while ($a <= 100){
                $num = rand(1,10);
                echo "<tr><th colspan='2'>Intento $intentos</th></tr>";
                $intentos++;
                $a += $num;
                echo "<tr>
                    <td> Num $num</td>
                    <td> Acum $a</td>
                </tr>";
            } 
        ?>
    </table>
</body>
</html>