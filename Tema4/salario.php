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
    <form action="" method="post">
        <label for="salario">Salario:</label>
        <input type="text" name="salario">
        <input type="submit" value="Ok">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $salario = floatval($_POST["salario"]);
        $neto = 0.0;
        $cont = 0;
        $tramos = [
            [0,12450,0.19],
            [12451,20200,0.24],
            [20201,35200,0.30],
            [35201,60000,0.37],
            [60001,300000,0.45],
            [300000,INF,0.47]
        ];
        $i = 0;
        $salir = false;
        while($i < count($tramos) && !$salir){
            if((min($tramos[$i][0], $salario) == $tramos[$i][0]) && (max($tramos[$i][1], $salario) == $tramos[$i][1])){
                $neto += ($salario-$tramos[$i][0])*$tramos[$i][2];
                $cont++;
                $salir = true;
            }
            else if((min($tramos[$i][0], $salario) == $tramos[$i][0]) && (max($tramos[$i][1], $salario) == $salario)){
                $neto += ($tramos[$i][1]-$tramos[$i][0])*$tramos[$i][2];
                $cont++;
                $i++;
            }else{
                $salir = true;
            }
        }
        echo $neto;
        echo "Salario neto: ".($salario-$neto);
    }
    ?>
</body>
</html>