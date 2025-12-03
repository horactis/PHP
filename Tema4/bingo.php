<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $carton = [];
    $cont = 0;
    //crear carton
    for ($i=0; $i < 3; $i++) { 
        $carton[$i] = [];
        for ($j=0; $j < 9; $j++){
            if($i == 1){
                do{
                $carton[$i][$j] = rand(0,9) + $cont;
                }while($carton[$i][$j] == $carton[$i-1][$j]);
                $cont += 10;
            }else if($i == 2){
                do{
                $carton[$i][$j] = rand(0,9) + $cont;
                }while(($carton[$i][$j] == $carton[$i-1][$j])||($carton[$i][$j] == $carton[$i-2][$j]));
                $cont += 10;
            }else{
                $carton[$i][$j] = rand(0,9) + $cont;
                $cont += 10;
            }
            echo $carton[$i][$j]." ";
        }
        $cont = 0;
        echo "<br>";
    }
    echo "<hr>";
    $random = 0;
    ?>
    <table border="solid">
    <?php
    for ($i=0; $i < count($carton); $i++) {
        echo "<tr>"; 
        for ($j=0; $j < count($carton); $j++) { 
            $random = rand(1,2);
            if ($random == 1) {
                $carton[$i][$j] = "";
            }
            echo "<td>".$carton[$i][$j]."</td>";
        }
        echo "</tr>";
    }

    ?>
    </table>
    
</body>
</html>