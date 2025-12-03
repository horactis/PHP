<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="number" name="1"><input type="number" name="2"><input type="number" name="3">
    <br>
    <input type="number" name="4"><input type="number" name="5"><input type="number" name="6">
    <br>
    <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lista = [];
        for ($i=1; $i <= 6; $i++) { 
            $lista[] = $_POST["$i"];
        }
            
        SORT($lista);
        if ($lista[5] > 20) {
            echo "Hay un algun numero mayor a 20 <br>";
        }else{
            $num = 0;
            $repe = false;
            for ($i=0; $i < count($lista); $i++) { 
                if ($lista[$i] == $num){
                    $repe = true;
                }else{
                    $num = $lista[$i];
                }
            }
            if ($repe) {
                echo "Hay repetidos";
            }else{
                $premio = [];
                for ($i=0; $i < 6; $i++) { 
                    $premio[$i] = rand(1,20);
                }
            }
            if($lista === $premio){
                echo "HAS GANADOOOO!!!";
            }else{
                echo "No has ganado na";
            }
        }
        
    }
        
    ?>
</body>
</html>